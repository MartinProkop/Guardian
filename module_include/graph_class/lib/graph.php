<?php

/**
 * @autor: Jiri Zachar
 * @email: zaachi@gmail.com
 * @url: http://grafy.zaachi.com
 */
define("AUTO", "1");

//error_reporting(15);
//include './interface.php';

class graph {//implements i_graph{
    //kontstanty
    const title_vertical_padding = 3;
    //proměnné
    public $image;
    public $type;
    public $width;
    public $height;
    public $bgcolor;
    public $shadow;
    public $shadow_border = 0;
 //px
    public $padding_top = 15;
 //px
    public $padding_left = 15;
 //px
    public $padding_bottom = 15;
 //px
    public $padding_right = 15;
 //px
    public $graph_center_x = NULL;
    public $graph_center_y = NULL;
    public $graph_width = NULL;
    public $graph_height = NULL;
    public $column_padding = 20;
  //px
    public $border_width = 0;
 //px
    public $line_last_x;
    public $spline_quality = 100;
    public $spline_data = array();
    public $line_last_y;
    public $transition_type = 'left';
    public $pie_line_color = 'black';
    public $pie_hole = false;
    //barva pozad? grafu
    public $background_color = '#ffffff';
    public $types = array('line',
        'xy',
        'impulse',
        'area',
        'transparentarea',
        'sumarea',
        'column',
        'transparentcolumn',
        'sumcolumn',
        '3dcolumn',
        '3dsumcolumn',
        'bar',
        'spline',
        'transition',
        'pie',
        '3dpie',
        'piehole');
    public $pie_height = 0;
    private $column_3d_sum_plane_width = 0;
    private $center_x = 0;
 //px
    private $center_y = 0;
 //px
    private $transitions_types = array();
    private $spline_xdata, $spline_ydata;
   //hodnoty pro spline graph
    private $spline_y2;
   // druha defivace pro y
    private $n = 0;
    private $data = array();
    private $graph_data = array();
    private $font = NULL;
    private $getmicrotime;
    private $more = null;
    private $pie_values = array();
    private $pie_out = array();
    private $pie_colors = array();
    private $pie_about = array();
    //alokované barvy 
    private $default_colors = array('white' => '16777215',
        'black' => '0',
        'red' => '16711680',
        'gold' => '16766720',
        'yellow' => '16776960',
        'green' => '32768',
        'blue' => '255',
        'lightblue' => '14745599');
    //private prom?nn?
    private $move_left;
    private $move_up;
    private $section_x;
    private $section_y;
    private $x_positions = array();
    private $y_positions = array();
    private $calculate_lines = 0;
    private $calculate_positions = 0;
    private $transparent = 0;
    private $transparent_colors = array();
    private $aliasing = 'off';
    private $image_name;
    //konec proměnných

    /** constructor
     *   @param  string[$type]    typ grafu
     *   @param  int[$width]      šířka obrázku
     *   @param  int[$height]     výška obrázku
     *   @param  string[$bgcolor] barva pozadí - html kód nebo n?zev
     *   @param  string[$font]    font
     *   @return null
     * */
    public function __construct($type, $width=400, $height=400, $bgcolor='#ffffff', $font = NULL) {
        $this->type = $type;
        //pokud je typ transparent area, pracuje se s nim stejne jako s klasickou areou, jenom jsou pouzity transparentni barvy
        $this->column_padding = $width / 20;

        if ($type == '3dpie') {
            $this->type = 'pie';
            $this->more = '3d';
        } else if ($type == 'piehole') {
            $this->type = 'pie';
            $this->pie_hole = true;
        } else if ($this->type == 'spline') {
            $this->type = 'line';
            $this->more = 'spline';
        } else if ($this->type == 'transition') {
            $this->type = 'line';
            $this->more = 'transition';
        } else if ($this->type == 'transparentarea') {
            $this->type = 'area';
            $this->transparent = 1;
        } else if ($this->type == 'transparentcolumn') {
            $this->type = 'column';
            $this->transparent = 1;
        } else if ($this->type == 'column') {
            $this->column_padding = $width / 100;
        } else if ($this->type == 'sumcolumn') {
            $this->type = 'column';
            $this->more = 'sum';
        } else if ($this->type == '3dcolumn') {
            $this->column_padding = 10;  //px
            $this->type = 'column';
            $this->more = '3d';
            $this->column_3d_sum_plane_width = $width / 20;
            $this->padding_right += $this->column_3d_sum_plane_width;
        } else if ($this->type == '3dsumcolumn') {
            $this->type = 'column';
            $this->more = '3dsum';
            $this->column_3d_sum_plane_width = $width / 20;
            $this->padding_right += $this->column_3d_sum_plane_width;
        } else if ($this->type == 'sumarea') {
            $this->type = 'area';
            $this->more = 'sum';
        }
        else
            $this->type = $type;

        if (!in_array($type, $this->types)) {
            self::_error_handle('' . $type . '<br><br>Neplatny typ grafu!');
        }
        if ($width == 0 || $height == 0)
            self::_error_handle('Neplatne rozmery grafu');
        //nastaveni velikosti
        $this->width = $width;
        $this->height = $height;
        self::_create_empty_image();

        $this->bgcolor = array_key_exists($bgcolor, $this->default_colors) ? $this->default_colors[$bgcolor] : self::allocatecolor($bgcolor);
        self::set_background();
        self::_load_font($font);
    }

    /**
     *   set_background
     *   nastaví pozadí do obrázku
     */
    public function set_background() {
        self::_imagefilledrectangle($this->image, 0, 0, $this->width, $this->height, $this->bgcolor);
    }

    /**
     *   vytvoří prázdný obrázek o určené velikosti
     *   @param null
     *   @return null
     */
    public function _create_empty_image() {
        $this->image = ImageCreateTrueColor($this->width, $this->height);
    }

    /** alokuje barvu
     *   @param string[$htmlCode]    html kod barvy( #ffeeaa )
     *   @return int[allocatecollor]
     */
    public function allocatecolor($htmlCode) {
        //use self method
        $color = self::decodeColor($htmlCode);
        return ImageColorAllocate($this->image, $color[0], $color[1], $color[2]);
    }

    /** dekoduje barvu z jejiho html vyjadreni na RGB
     *   @param string[$htmlColor]   html kod barvy
     *   return array($R, $G, $B)
     */
    public function decodeColor($htmlColor) {
        if ($htmlColor[0] != '#') {
            return FALSE;
        }
        //Create RGB code:
        $red = hexdec(@substr($htmlColor, 1, 2));
        $green = hexdec(@substr($htmlColor, 3, 2));
        $blue = hexdec(@substr($htmlColor, 5, 2));
        return $vcolor = array($red, $green, $blue);
    }

    /** nacte soubor s fontem
     *   @param string[$filename]
     *   @return null;
     */
    public function _load_font($file_name) {
        if (file_exists($file_name))
            $this->font = ImageLoadFont($file_name);
        else
            $this->font = 3;
        /*
         * ImageString test
          ImageString( $this->image, $this->font, 30, 30, 'Ahojkz', $this->default_colors['black'] );
         * end ImageString test
         */
    }

    /** vykresli stin kolem obrazku
     *   @param string[$color] - HtML kod barvy
     *   @param int[$widht] - sirka stinu
     *   @return null
     * */
    public function set_shadow($color, $width = 2) {
        $this->shadow = array_key_exists($color, $this->default_colors) ? $this->default_colors[$color] : self::allocatecolor($color);
        $this->shadow_border = $width;
        //ramecek
        self::_imagefilledrectangle($this->image, $this->width - $width, $width, $this->width, $this->height, $this->shadow);
        self::_imagefilledrectangle($this->image, $this->width, $this->height, $width, $this->height - $width, $this->shadow);
        //rohy
        self::_imagefilledrectangle($this->image, $this->width - $width, $width, $this->width, 0, $color = self::allocatecolor($this->background_color));
        self::_imagefilledrectangle($this->image, 0, $this->height, $width, $this->height - $width, $color);
        //upravy rozmery pro graf
        $this->padding_bottom += $width;
        $this->padding_right += $width;
    }

    /** vykresli ramecek kolem borazku
     *   @param string[$color] - HtML kod barvy
     *   @param int[$widht] - sirka stinu
     *   @return null
     */
    public function border($color, $width = 1) {
        $this->border_width = $width;

        $border_line = array_key_exists($color, $this->default_colors) ? $this->default_colors[$color] : self::allocatecolor($color);
        //vypocita souradnice rohu obrazku
        $x1 = array(0,
            $this->width - $this->shadow_border - $width,
            0,
            0);
        $y1 = array(0,
            0,
            $this->height - $this->shadow_border - $width,
            0);
        $x2 = array($this->width - $this->shadow_border,
            $this->width - $this->shadow_border,
            $this->width - $this->shadow_border,
            $width);
        $y2 = array($width,
            $this->height - $this->shadow_border,
            $this->height - $this->shadow_border,
            $this->height - $this->shadow_border);

        for ($i = 0; $i < 4; $i++) {
            self::_imagefilledrectangle($this->image, $x1[$i], $y1[$i], $x2[$i], $y2[$i], $border_line);
        }
        //upravi rozmery pro obrazek
        $this->padding_bottom += $width;
        $this->padding_left += $width;
        $this->padding_right += $width;
        $this->padding_top += $width;
        return TRUE;
    }

    /** nastavi rozmery grafu pred jeho vykreslenim
     *   @param null
     *   @return null
     */
    private function _set_dimensions() {
        //nastavi sirku a vysku grafu
        $this->graph_width = $this->width - $this->padding_left - $this->padding_right;
        $this->graph_height = $this->height - $this->padding_top - $this->padding_bottom;
        //vypocita stred grafu
        $this->center_y = ( $this->graph_height / 2 ) + $this->padding_top;
        $this->center_x = ( $this->graph_width / 2 ) + $this->padding_left;
        return;
    }

    /** vykresli graf
     *   @param null
     *   @return null
     * */
    public function plot($name = null) {
        if ($name != null) {
            $this->image_name = $name;
        }
        self::_set_dimensions();

        //podle typu grafu voli metodu pro jeho vykresleni
        switch ($this->type) {
            case 'bar': self::_paint_bar_graph();
                break;
            case 'column' : self::_paint_column_graph();
                break;
            case 'pie': self::_pie_graph();
                break;
            case 'line':
            case 'area':
            case 'impulse':
            case 'xy': self::_paint_line_graph();
                break;
            default: return FALSE;
        }


        //vola se funkce pro zobrazeni
        self::output( );
    }

    /** funkce pro zobrazeni grafu
     *   @param null
     *   @return null
     */
    public function output() {
        //generovany obrazek je typu PNG

        if ($this->image_name != null)
            ImagePng($this->image, $this->image_name);
        else {
            Header("Content-Type: image/png");
            header('Pragma: public');
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Cache-Control: pre-check=0, post-check=0, max-age=0');
            header("Pragma: no-cache");
            ImagePng($this->image);
        }
    }

    /** funkce pro vykresleni titulku
     *   @param string[ $title ] retezec titulku
     *   @param string[$color]   HTML kod barvy
     *   @return int[0/1]
     */
    public function title($title, $color = NULL, $font = NULL) {
        $title = trim($title);
        //pokud je titulek prazdny, metoda se ukonci
        if (empty($title)) {
            return 0;
        }
        //nastavi se font
        $font = ( $font == NULL ? $this->font : $font );
        //nastavi se barva
        $color = array_key_exists($color, $this->default_colors) ? $this->default_colors[$color] : self::allocatecolor($color);
        //nastavi se maximalni sirka pro titulek
        $maxwidth = $this->width - $this->padding_left - $this->padding_right;
        //pocatecni souradnice pro titulek
        $title_begin_x = $this->padding_left + ImageFontWidth($font);
        $title_begin_y = $this->padding_top;
        //vypocet velikosti pisma + potrebne okraje
        $letter_height = ImageFontHeight($font) + self::title_vertical_padding;
        $letter_width = ImageFontWidth($font) + 1;

        //zjisti, zda musi titulek zalomit, nebo ne
        if ($maxwidth < ( strlen($title) * $letter_width )) {
            $titles = self::_title_return_array_of_string($title, $maxwidth, $letter_width);
            for ($i = 0; $i < count($titles); $i++) {
                ImageString($this->image, $font, $title_begin_x, $title_begin_y, $titles[$i], $color);
                //nastavi novou hodnotu pro pocatek vykreslovani
                $title_begin_y += $letter_height;
            }
        } else {
            ImageString($this->image, $font, $title_begin_x, $title_begin_y, $title, $color);
            //nastavi konecnou hodnotu pro pocatek vykreslovani
            $title_begin_y += $letter_height;
        }

        //prepocita hodnototy pro okraje grafu
        $this->padding_top += $title_begin_y;

        if ($this->type == 'column') {
            $this->padding_top += imagefontwidth(2);
        }
        return 1;
    }

    /** vraci pole, kde jednotlive hodnoty predstavuji radky pro titulek
     *   @param  string[ $title ]    retezec titulku
     *   @param  int[$maxwidth]      maximalni sirka
     *   @param  int[$letter_width]  sirka jednoho pismena
     *   @return array($title);
     */
    private function _title_return_array_of_string(& $title, & $maxwidth, & $letter_width) {
        $titles = array();
        $j = 0;
        $max = floor($maxwidth / $letter_width);
        do {
            for ($i = $max; $i >= 0; $i--) {
                if (ord($title[$i]) == 32) {
                    $titles[$j] = substr($title, 0, $i);
                    $title = trim(substr($title, $i));
                    break;
                }
                if ($i == 0) {
                    $titles[$j] = substr($title, 0, $max);
                    $title = trim(substr($title, $max));
                }
            }
            $j++;
            if (strlen($title) < $max) {
                $titles[$j] = $title;
                break;
            }
        } while (strlen($title) != 0);

        return $titles;
        //quicker alternative:
        //return str_split( $title, floor( $maxwidth / $letter_width ) );
    }

    /** nastavi hodnoty pro graf
     *   @param array($first) hodnoty pro osu x
     *   @param array($second)   hodnoty pro osu y
     *   @param string[$color]   barva pro hodnoty
     *   @param string[$type]    nepovinny parametr pro typ bodu
     *   @return int
     */
    private function _return_color($color) {
        switch ($color) {
            case 'white': $alpha_c = '#ffffff';
                break;
            case 'black' : $alpha_c = '#000000';
                break;
            case 'red' : $alpha_c = '#ff0000';
                break;
            case 'gold' : $alpha_c = '#ffd700';
                break;
            case 'yellow' : $alpha_c = '#ffff00';
                break;
            case 'green' : $alpha_c = '#008000';
                break;
            case 'blue' : $alpha_c = '#0000ff';
                break;
            case 'lightblue' : $alpha_c = '#add8e6';
                break;
            default : $alpha_c = $color;
        }

        return $alpha_c;
    }

    public function set_values($first, $second = null, $color = 'blue', $type = null) {
        if ($this->type == 'pie') {
            self::_set_pie_data($first, $second, $color, $type);
            return;
        }
        //pokud je zvolen transparentni typ grafu, musi se slovni vyjadreni barev prevest zpet na html kody a ty potom alokovat
        if ($this->transparent == 1) {

            $alpha_c = self::_return_color($color);
            $red = hexdec(@substr($alpha_c, 1, 2));
            $green = hexdec(@substr($alpha_c, 3, 2));
            $blue = hexdec(@substr($alpha_c, 5, 2));
            $vcolor = array($red, $green, $blue);

            //alokace transparentnich barev
            //alpha = 30
            $this->transparent_colors[] = imagecolorallocatealpha($this->image, $red, $green, $blue, 30);
        }

        //pro grafy typu impulse a area se nastavi souradnice na ose y jako pole vychazejici od zadane hodnoty
        if ($this->type == 'impulse' || $this->type == 'area' || $this->type == 'column' || $this->type == 'bar') {
            if ($this->type == 'column' || $this->type == 'bar')
                $from = intval(abs($second));
            else
                $from = intval(( $second));

            if ($this->type == 'column' || $this->type == 'bar') {
                if ($from != 0) {
                    for ($i = 0; $i < $from; $i++) {
                        $help_arr[] = 0;
                    }
                    $first = array_merge($help_arr, $first);

                    $second = $from = 0;
                }
            }

            $second = $first;
            $first = array();
            for ($i = 0; $i < count($second); $i++) {
                $first[] = $from++;
            }
        }

        //pokud je pocet hodnot na ose x nebo na ose y roven 0, return 0;
        if (count($first) == 0 && count($second) == 0)
            return 0;

        if ($this->type == 'line' || $this->type == 'xy' || $this->type == 'impulse' || $this->type == 'area' || $this->type == 'column' || $this->type == 'bar') {
            //zkontroluje, zda jsou jsou zadany vsechny souradnice.
            if (count($second) == 0 || count($first) == 0) {
                $y = count($first) == 0 ? $second : $first;
                //pokud ne, Y osa se dopocita
                $x = self::_equal_arrays($first, $second);
            } else {
                $x = $first;
                $y = $second;
                if (count($y) != count($x)) {
                    $y = self::_equal_arrays($x, $y);
                }
            }

            //pokud se ma pocitat suma na osach
            if ($this->more == 'sum' || $this->more == '3dsum') {
                //pokud uz byla zadana nejaka data, musi se pripocitavat       
                if (count($this->data) > 0) {

                    $array = array();
                    //vytvori se nove pole
                    for ($i = 0; $i < count($x); $i++) {
                        $array[$x[$i]] = $y[$i];
                    }

                    for ($i = 0; $i < count($this->data[0][1]); $i++) {
                        if (array_key_exists($this->data[0][1][$i], $array)) {
                            $array[$this->data[0][1][$i]] = $array[$this->data[0][1][$i]] + $this->data[0][2][$i];
                        }
                    }
                    foreach ($array as $value) {
                        $new_a[] = $value;
                    }
                    $array = $new_a;
                } else {
                    $array = $y;
                }

                $d[0] = array($color, $x, $array, $type);
                if (count($this->data) > 0) {
                    foreach ($this->data as $value) {
                        $d[] = $value;
                    }
                }

                $y = $array;
                $this->data = $d;

                //print_r( $this->data);
            } else {
                if ($this->type == 'line' && $this->more == 'spline') {
                    self::_create_spline_data($x, $y, $color, $type);
                    //$this->spline_data[] = array($color, $x, $y, $type );
                }
                //else
                $this->data[] = array($color, $x, $y, $type);
            }

            //print_r( $this->data );
            //$this->graph_data[ count( $this->graph_data ) + 1 ] = array( 'x' => $x, 'y' => $y );

            if (@ is_array($this->graph_data['x'])) {
                $x = array_merge($x, $this->graph_data['x']);
            }
            if (@ is_array($this->graph_data['y'])) {
                $y = array_merge($y, $this->graph_data['y']);
            }

            //vsechny hodnoty jsou ulozeny do jednoho pole
            $this->graph_data = array('x' => $x, 'y' => $y);
        }
        if ($this->more == 'transition') {
            $this->transitions_types[] = ( in_array($this->transition_type, array('left', 'right')) ? $this->transition_type : 'left' );
        }
        //print_r( $this->graph_data );
    }

    function _set_pie_data($first, $second, $color, $name) {
        if (!is_numeric($first) || !is_numeric($second)) {
            self::_error_handle('Neplatne vstupni hodnoty');
        }
        $this->pie_values[] = $first;
        $this->pie_out[] = ( abs($second) > 2 ? 0 : abs($second) );
        $this->pie_colors[] = $color;
        $this->pie_about[] = strlen($name) > 4 ? substr($name, 0, 4) : $name;
        return;
    }

    private function _create_spline_data($x, $y, $color, $type) {
        $min = min($x) - 1;
        for ($i = 0; $i < count($x); $i++) {
            if ($x[$i] <= $min) {
                $this->error = 'failed x-data';
                return;
            }
            $min = $x[$i];
        }

        self::Spline($x, $y);
        $data[] = self::Get(count($x) * 50 * ( ( $this->spline_quality > 1 ? $this->spline_quality : 1 ) / 100));

        $this->spline_data[] = array($color, $data[0][0], $data[0][1], $type);
        if (@ is_array($this->graph_data['x'])) {
            $x = array_merge($data[0][0], $this->graph_data['x']);
        }
        if (@ is_array($this->graph_data['y'])) {
            $y = array_merge($data[0][1], $this->graph_data['y']);
        }

        //vsechny hodnoty jsou ulozeny do jednoho pole
        $this->graph_data = array('x' => $x, 'y' => $y);
    }

    function Spline($spline_xdata, $spline_ydata) {
        $this->spline_y2 = array();
        $this->spline_xdata = $spline_xdata;
        $this->spline_ydata = $spline_ydata;

        //n je počet vektorů na ose y
        $n = count($spline_ydata);
        $this->n = $n;
        //pocet vektoru se musi rovnat
        if ($this->n !== count($spline_xdata)) {
            $this->error = 'count x != count y';
        }

        $this->spline_y2[0] = 0.0;
        $this->spline_y2[$n - 1] = 0.0;
        $delta[0] = 0.0;

        for ($i = 1; $i < $n - 1; ++$i) {
            $d = ( $spline_xdata[$i + 1] - $spline_xdata[$i - 1]);
            if ($d == 0) {
                self::_error_handle();
            }
            $s = ( $spline_xdata[$i] - $spline_xdata[$i - 1] ) / $d;
            $p = $s * $this->spline_y2[$i - 1] + 2.0;
            $this->spline_y2[$i] = ($s - 1.0) / $p;
            $delta[$i] = ( $spline_ydata[$i + 1] - $spline_ydata[$i] ) / ( $spline_xdata[$i + 1] - $spline_xdata[$i] ) -
                    ( $spline_ydata[$i] - $spline_ydata[$i - 1]) / ($spline_xdata[$i] - $spline_xdata[$i - 1] );
            $delta[$i] = (6.0 * $delta[$i] / ($spline_xdata[$i + 1] - $spline_xdata[$i - 1]) - $s * $delta[$i - 1]) / $p;
        }

        // Backward substitution
        for ($j = $n - 2; $j >= 0; --$j) {
            $this->spline_y2[$j] = $this->spline_y2[$j] * $this->spline_y2[$j + 1] + $delta[$j];
        }
    }

    // Return the two new data vectors
    function Get($num=50) {
        $n = $this->n;
        $step = ($this->spline_xdata[$n - 1] - $this->spline_xdata[0]) / ($num - 1);
        $xnew = array();
        $ynew = array();
        $xnew[0] = $this->spline_xdata[0];
        $ynew[0] = $this->spline_ydata[0];
        for ($j = 1; $j < $num; ++$j) {
            $xnew[$j] = $xnew[0] + $j * $step;
            $ynew[$j] = $this->Interpolate($xnew[$j]);
        }
        return array($xnew, $ynew);
    }

    // Return a single interpolated Y-value from an x value
    function Interpolate($xpoint) {

        $max = $this->n - 1;
        $min = 0;

        // Binary search to find interval
        while ($max - $min > 1) {
            $k = ($max + $min) / 2;
            if ($this->spline_xdata[$k] > $xpoint)
                $max = $k;
            else
                $min=$k;
        }

        // Each interval is interpolated by a 3:degree polynom function
        $h = $this->spline_xdata[$max] - $this->spline_xdata[$min];

        if ($h == 0) {
            ;
            //('Invalid input data for spline. Two or more consecutive input X-values are equal. Each input X-value must differ since from a mathematical point of view it must be a one-to-one mapping, i.e. each X-value must correspond to exactly one Y-value.');
        }


        $a = ($this->spline_xdata[$max] - $xpoint) / $h;
        $b = ($xpoint - $this->spline_xdata[$min]) / $h;
        return $a * $this->spline_ydata[$min] + $b * $this->spline_ydata[$max] +
        (($a * $a * $a - $a) * $this->spline_y2[$min] + ($b * $b * $b - $b) * $this->spline_y2[$max]) * ($h * $h) / 6.0;
    }

    /** doplni dalsi rozmery do grafu, v pripade ze byly zadany jenom souradnice jedne osy
     *   @param array($array1) hodnoty prvni osy
     *   @param array($array2) hodnoty druhe osy
     *   @return array
     */
    private function _equal_arrays($array1, $array2) {
        if (count($array1) > count($array2)) {
            $first = $array1;
            $second = $array2;
        } else {
            $first = $array2;
            $second = array1;
        }
        for ($i = 0; $i < count($first); $i++) {
            if (!array_key_exists($i, $second)) {
                $second[$i] = 0;
            }
        }

        return $second;
    }

    /** prepocita souradnice pred vykresnim grafu
     *   @param null
     *   @return null
     */
    private function _calculate_lines() {

        $this->calculate_lines = 1;

        $this->place = $this->width - $this->padding_left - $this->padding_right;
        //start / osa x
        $this->from_x = floor(min($this->graph_data['x'])) - 1;
        $this->to_x = ceil(max($this->graph_data['x'])) + 1;

        //osy se musi krizit
        if (( $this->from_x ) >= 0)
            $this->from_x = -1;
        else if (!is_int($this->from_x)) {
            $this->from_x = floor($this->from_x);
        }
        if ($this->to_x <= 0)
            $this->to_x = 1;
        else if (!is_int($this->to_x)) {
            $this->to_x = ceil($this->to_x);
        }

        $this->section_x = $this->place / ( ( $this->to_x - $this->from_x ));
        //zde se osy krizi
        $this->cross_x = abs($this->from_x);
        //konec / osa x

        $this->place = $this->height - $this->padding_bottom - $this->padding_top;
        //start / osa y
        $this->from_y = floor(min($this->graph_data['y'])) - 1;
        $this->to_y = ceil(max($this->graph_data['y'])) + 1;
        //osy se musi krizit
        if (( $this->from_y ) >= 0)
            $this->from_y = -1;
        else if (!is_int($this->from_y)) {
            $this->from_y = floor($this->from_y);
        }
        if ($this->to_y <= 0)
            $this->to_y = 1;
        else if (!is_int($this->to_y)) {
            $this->to_y = ceil($this->to_y);
        }

        $this->section_y = $this->place / ( $this->to_y - $this->from_y);
        //zde se osy krizi na ose y
        $this->cross_y = abs($this->from_y);
        //konec / osa y
        //posun jednotlivych os smerem nahoru a doprava po prepocitani souradnic
        $this->move_up = $this->cross_y * $this->section_y;
        $this->move_left = $this->cross_x * $this->section_x;
    }

    /** prepocitani souradnic pro vykresleni linek grafu
     *   @param null
     *   @return null
     */
    private function _line_graph_calculate_lines() {
        //print_r(  $this->graph_data );

        if ($this->type == 'column' || $this->type == 'bar') {
            self::_column_graph_calculate_lines();
            return;
        }
        //print_r(  $this->graph_data );

        if ($this->more == 'spline') {
            $this->from_x = floor(min($this->graph_data['x'])) - 1;
            $this->to_x = ceil(max($this->graph_data['x'])) + 1;
            $this->from_y = floor(min($this->graph_data['y'])) - 1;
            $this->to_y = ceil(max($this->graph_data['y'])) + 1;
            if (( $this->from_x ) >= 0)
                $this->from_x = -1;
            else if (!is_int($this->from_x)) {
                $this->from_x = floor($this->from_x);
            }
            if ($this->to_x <= 0)
                $this->to_x = 1;
            else if (!is_int($this->to_x)) {
                $this->to_x = ceil($this->to_x);
            }
            if (( $this->from_y ) >= 0)
                $this->from_y = -1;
            else if (!is_int($this->from_y)) {
                $this->from_y = floor($this->from_y);
            }
            if ($this->to_y <= 0)
                $this->to_y = 1;
            else if (!is_int($this->to_y)) {
                $this->to_x = ceil($this->to_y);
            }
        }

        $return = array();
        //minimalni sirka mezi linkami
        $min = 20;
        //rozmer, ve kterem se budou linky vykreslovat
        $width = $this->width - $this->padding_left - $this->padding_right;
        //pocet souradnic na ose x
        $num = ( ( $this->to_x - $this->from_x ));
        //sirka mezi dvema souradnicema
        $section = $width / $num;
        //$section = $this->place / ( ( $this->to_x - $this->from_x ));
        //pokud je sirka mensi nez minimalni, prepocita se
        if ($section >= $min) {
            $start = $this->padding_left;
            for ($i = 0; $i < $num - 1; $i++) {
                $start += $section;
                $return[] = array($start, 1);
            }
        } else {
            $keys = array();
            $num = abs($this->from_x);
            $section = $this->move_left / $num;
            $start = $this->padding_left + $this->move_left;
            $last = 0;

            for ($i = 0; $i < $num; $i++) {
                if ($last == 0 || ( abs($start - $last) >= $min )) {
                    if (!in_array($start, $keys)) {
                        $return[] = array($start, 1);
                    }
                    $last = $start;
                }
                else
                    $return[] = array($start, 0);

                $keys[] = $start;
                $start -= $section;
            }

            $num = abs($this->to_x);
            $section = ($this->width - $this->padding_left - $this->padding_right - $this->move_left) / $num;
            $start = $this->padding_left + $this->move_left;
            $last = 0;

            for ($i = 0; $i < $num; $i++) {
                if ($last == 0 || ( abs($start - $last) >= $min )) {
                    if (!in_array($start, $keys)) {
                        $return[] = array($start, 1);
                    }
                    $last = $start;
                }
                else
                    $return[] = array($start, 0);

                $keys[] = $start;
                $start += $section;
            }
        }
        sort($return);
        $this->x_positions = $return;

        unset($return);
        $return = array();

        $height = $this->height - $this->padding_top - $this->padding_bottom;
        $num = abs($this->from_y - $this->to_y);
        $section = $height / $num;

        if ($section >= $min) {
            $start = $this->padding_top;
            for ($i = 0; $i < $num - 1; $i++) {
                $start += $section;
                $return[] = array($start, 1);
            }
        } else {
            $keys = array();
            $num = abs($this->from_y);
            $section = $this->move_up / $num;
            $start = $this->height - $this->padding_bottom - $this->move_up;
            $last = 0;

            for ($i = 0; $i < $num; $i++) {
                if ($last == 0 || ( abs($start - $last) >= $min )) {
                    if (!in_array($start, $keys)) {
                        $return[] = array($start, 1);
                    }
                    $last = $start;
                } else {
                    $return[] = array($start, 0);
                }

                $keys[] = $start;
                $start += $section;
            }

            $num = abs($this->to_y);
            $section = ($this->height - $this->padding_top - $this->padding_bottom - $this->move_up) / $num;
            $start = $this->height - $this->padding_bottom - $this->move_up;
            $last = 0;

            for ($i = 0; $i < $num; $i++) {
                if ($last == 0 || ( abs($start - $last) >= $min )) {
                    if (!in_array($start, $keys)) {
                        $return[] = array($start, 1);
                    }
                    $last = $start;
                }
                else
                    $return[] = array($start, 0);

                $keys[] = $start;
                $start -= $section;
            }
        }
        sort($return);
        $this->y_positions = $return;

        $this->calculate_positions = 1;
    }

    /** kresli osy grafu
     *   @param string[$color] barva os
     *   @param string[$x_title] popisek na ose x
     *   @param string[$y_title] popisek na ose y
     *   @param int[$border] ramecek kolem popisku os
     *   @param
     *   @return
     */
    public function paint_axes($color = 'black', $x_title = null, $y_title = null, $border = false, $area = false) {
        if ($this->type == 'pie')
            return;
        if ($this->type == 'area' && empty($this->paint_axes_var)) {
            $this->paint_axes_var = 1;
            $this->paint_axes_color = $color;
            $this->paint_axes_x_titles = $x_title;
            $this->paint_axes_y_titles = $y_title;
            $this->paint_axes_border = $border;
            return;
        }


        $alpha_c = self::_return_color($color);
        $red = hexdec(@substr($alpha_c, 1, 2));
        $green = hexdec(@substr($alpha_c, 3, 2));
        $blue = hexdec(@substr($alpha_c, 5, 2));
        $vcolor = array($red, $green, $blue);

        //alokace transparentnich barev
        //alpha = 30
        $this->tr_color = imagecolorallocatealpha($this->image, $red, $green, $blue, 100);
        $color = array_key_exists($color, $this->default_colors) ? $this->default_colors[$color] : self::allocatecolor($color);

        //p ocita jenom jednou
        if ($this->calculate_lines == 0) {

            switch ($this->type) {
                case 'bar':
                case 'column':self::_calculate_lines_column();
                    break;
                default: self::_calculate_lines();
            }
        }


        //line y

        self::paint_imageline($this->image,
                        $this->padding_left + $this->move_left,
                        $this->padding_top,
                        $this->padding_left + $this->move_left,
                        $this->height - $this->padding_bottom,
                        $color);

        if ($this->type != 'column') {
            self::paint_imageline($this->image,
                            $this->padding_left + $this->move_left + 1,
                            $this->padding_top + 3,
                            $this->padding_left + $this->move_left + 1,
                            $this->height - $this->padding_bottom,
                            $color);

            self::paint_imageline($this->image,
                            $this->padding_left + $this->move_left - 1,
                            $this->padding_top + 3,
                            $this->padding_left + $this->move_left - 1,
                            $this->height - $this->padding_bottom,
                            $color);
        }
        //line x
        if ($this->more == '3d' || $this->more == '3dsum') {
            $this->paint_x_line_3d = 1;
            $this->paint_x_line_3d_color = $color;
        }
        else
            self::paint_imageline($this->image,
                            $this->padding_left + ( $this->more == '3d' || $this->more == '3dsum' ? $this->move_left : 0 ),
                            $this->height - $this->padding_bottom - $this->move_up,
                            $this->width - $this->padding_right,
                            $this->height - $this->padding_bottom - $this->move_up,
                            $color);

        if ($this->type != 'column') {
            self::paint_imageline($this->image,
                            $this->padding_left,
                            $this->height - $this->padding_bottom - $this->move_up + 1,
                            $this->width - $this->padding_right - 3,
                            $this->height - $this->padding_bottom - $this->move_up + 1,
                            $color);
            self::paint_imageline($this->image,
                            $this->padding_left,
                            $this->height - $this->padding_bottom - $this->move_up - 1,
                            $this->width - $this->padding_right - 3,
                            $this->height - $this->padding_bottom - $this->move_up - 1,
                            $color);
        }

        if ($this->more == '3d' || $this->more == '3dsum') {
            self::paint_imageline($this->image,
                            $this->padding_left + $this->move_left + $this->column_3d_sum_plane_width,
                            $this->padding_top - $this->column_3d_sum_plane_width,
                            $this->padding_left + $this->move_left + $this->column_3d_sum_plane_width,
                            $this->height - $this->padding_bottom - $this->column_3d_sum_plane_width,
                            $color);
            self::paint_imageline($this->image,
                            $this->padding_left + $this->move_left,
                            $this->height - $this->padding_bottom - $this->move_up,
                            $this->padding_left + $this->move_left + $this->column_3d_sum_plane_width,
                            $this->height - $this->padding_bottom - $this->move_up - $this->column_3d_sum_plane_width,
                            $color
            );
            self::paint_imageline($this->image,
                            $this->width - $this->padding_right,
                            $this->height - $this->padding_bottom - $this->move_up,
                            $this->width - $this->padding_right + $this->column_3d_sum_plane_width,
                            $this->height - $this->padding_bottom - $this->move_up - $this->column_3d_sum_plane_width,
                            $color);
            self::paint_imageline($this->image,
                            $this->padding_left + $this->move_left + $this->column_3d_sum_plane_width,
                            $this->height - $this->padding_bottom - $this->move_up - $this->column_3d_sum_plane_width,
                            $this->width - $this->padding_right + $this->column_3d_sum_plane_width,
                            $this->height - $this->padding_bottom - $this->move_up - $this->column_3d_sum_plane_width,
                            $color);

            $this->paint_axes_plot = 1;
        }

        if ($this->type != 'column')
        //vykresleni sipek
            self::_paint_darts($this->move_up, $this->move_left, $color);

        //popisek os:
        $width = ImageFontWidth(2);
        $height = imagefontheight(2);

        if ($x_title != NULL) {
            $to_left = $width * strlen($x_title);
            //positon is upper right
            if ($border == true) {
                self::_imagefilledrectangle($this->image,
                                $this->width - $this->padding_right - $to_left - 16,
                                $this->height - $this->move_up - $this->padding_bottom - $height - 6,
                                $this->width - $this->padding_right - $to_left - 6 + $to_left,
                                $this->height - $this->move_up - $this->padding_bottom - $height - 2 + $height,
                                $color);
                self::_imagefilledrectangle($this->image,
                                $this->width - $this->padding_right - $to_left - 15,
                                $this->height - $this->move_up - $this->padding_bottom - $height - 5,
                                $this->width - $this->padding_right - $to_left - 7 + $to_left,
                                $this->height - $this->move_up - $this->padding_bottom - $height - 2 + $height,
                                $this->bgcolor);
            }
            ImageString($this->image, 2,
                    $this->width - $this->padding_right - $to_left - 10,
                    $this->height - $this->move_up - $this->padding_bottom - $height - 2,
                    $x_title,
                    $color);
        }

        if ($y_title != NULL) {
            $to_bottom = $width * strlen($y_title);
            if ($border == true) {
                self::_imagefilledrectangle($this->image,
                                $this->padding_left + $this->move_left + 2,
                                $this->padding_top + $to_bottom + 15,
                                $this->padding_left + $this->move_left + $height + 5,
                                $this->padding_top + $to_bottom + 10 - $to_bottom - 3,
                                $color);
                self::_imagefilledrectangle($this->image,
                                $this->padding_left + $this->move_left + 2,
                                $this->padding_top + $to_bottom + 14,
                                $this->padding_left + $this->move_left + $height + 4,
                                $this->padding_top + $to_bottom + 10 - $to_bottom - 2,
                                $this->bgcolor);
            }
            ImageStringUp($this->image, 2,
                    $this->padding_left + $this->move_left + 2,
                    $this->padding_top + $to_bottom + 10,
                    $y_title,
                    $color);
        }
        //konec popisek os
    }

    /** kresli graf typu line
     *   @param null
     *   @return null
     */
    public function _paint_line_graph() {
        if (count($this->data) < 1) {
            return false;
        }

        if ($this->calculate_lines == 0)
            switch ($this->type) {
                case 'bar' :
                case 'column ': self::_calculate_lines_column();
                    break;
                default: self::_calculate_lines();
            }
        for ($i = 0; $i < count($this->data); $i++) {
            $color = array_key_exists($this->data[$i][0], $this->default_colors) ? $this->default_colors[$this->data[$i][0]] : self::allocatecolor($this->data[$i][0]);
            $this->line_last_x = NULL;
            $this->line_last_y = NULL;
            for ($j = 0; $j < count($this->data[$i][1]); $j++) {
                self::_paint_line_graph_type($this->data[$i][1][$j],
                                $this->data[$i][2][$j],
                                $color,
                                $this->data[$i][3],
                                !isset($this->data[$i][1][$j + 1]), $i);
            }
        }

        if ($this->more == 'spline' && $this->type == 'line') {
            for ($i = 0; $i < count($this->spline_data); $i++) {
                $color = array_key_exists($this->spline_data[$i][0], $this->default_colors) ? $this->default_colors[$this->data[$i][0]] : self::allocatecolor($this->spline_data[$i]);
                for ($j = 0; $j < count($this->spline_data[$i][1]); $j++) {

                    $left = $this->spline_data[$i][1][$j] * $this->section_x;

                    $up = $this->spline_data[$i][2][$j] * $this->section_y;
                    if (is_numeric($line_last_x) && is_numeric($line_last_y)) {
                        self::paint_imageline($this->image,
                                        $line_last_x,
                                        $line_last_y,
                                        $this->padding_left + $this->move_left + $left,
                                        $this->height - $this->padding_bottom - $this->move_up - $up,
                                        $color);
                    }

                    $line_last_x = $this->padding_left + $this->move_left + $left;
                    $line_last_y = $this->height - $this->padding_bottom - $this->move_up - $up;
                }
                unset($line_last_x);
                unset($line_last_y);
            }
        }
    }

    /** kresli osy grafu
     *   @param int[$x] souradnice x pro soucasnou polohu
     *   @param int[$y] souradnice y pro soucasnou polohu
     *   @param string[$color]   barva pso aktualni bod
     *   @param string[$type] typ bodu na grafu
     *   @param int[$last] posledni souradnice
     *   @param int[$index] index v poradi vykreslovani kvuli rozliseni
     *   @return
     */
    private function _paint_line_graph_type($x, $y, $color, $type, $last = true, $index) {
        $left = $x * $this->section_x;
        $up = $y * $this->section_y;

        switch ($type) {
            case 'fullcross': {
                    self::_imagefilledrectangle($this->image,
                                    $this->padding_left + $this->move_left + $left - 1,
                                    $this->height - $this->padding_bottom - $this->move_up - $up + 4,
                                    $this->padding_left + $this->move_left + $left + 1,
                                    $this->height - $this->padding_bottom - $this->move_up - $up - 4,
                                    $color
                    );
                    self::_imagefilledrectangle($this->image,
                                    $this->padding_left + $this->move_left + $left - 4,
                                    $this->height - $this->padding_bottom - $this->move_up - $up + 1,
                                    $this->padding_left + $this->move_left + $left + 4,
                                    $this->height - $this->padding_bottom - $this->move_up - $up - 1,
                                    $color
                    );
                    break;
                }
            case 'cross': {
                    self::paint_imageline($this->image,
                                    $this->padding_left + $this->move_left + $left - 3,
                                    $this->height - $this->padding_bottom - $this->move_up - $up,
                                    $this->padding_left + $this->move_left + $left + 3,
                                    $this->height - $this->padding_bottom - $this->move_up - $up,
                                    $color);
                    self::paint_imageline($this->image,
                                    $this->padding_left + $this->move_left + $left,
                                    $this->height - $this->padding_bottom - $this->move_up - $up - 3,
                                    $this->padding_left + $this->move_left + $left,
                                    $this->height - $this->padding_bottom - $this->move_up - $up + 3,
                                    $color);
                    break;
                }
            case 'box': {
                    self::_imagefilledrectangle($this->image,
                                    $this->padding_left + $this->move_left + $left - 3,
                                    $this->height - $this->padding_bottom - $this->move_up - $up - 3,
                                    $this->padding_left + $this->move_left + $left + 3,
                                    $this->height - $this->padding_bottom - $this->move_up - $up + 3,
                                    $color
                    );
                    break;
                }
            case 'wheel': {
                    imagefilledarc($this->image,
                            $this->padding_left + $this->move_left + $left,
                            $this->height - $this->padding_bottom - $this->move_up - $up,
                            10, 10, 0, 360, $color, IMG_ARC_PIE);
                    imagefilledarc($this->image,
                            $this->padding_left + $this->move_left + $left,
                            $this->height - $this->padding_bottom - $this->move_up - $up,
                            3, 3, 0, 360, $this->bgcolor, IMG_ARC_PIE);
                    break;
                }
            default:
        }

        switch ($this->type) {
            case 'xy': return;
            case 'line': {
                    if ($this->more == 'transition') {
                        if (is_numeric($this->line_last_x) && is_numeric($this->line_last_y)) {
                            if ($this->transitions_types[$index] == 'left') {
                                self::paint_imageline($this->image,
                                                $this->line_last_x,
                                                $this->line_last_y,
                                                $this->line_last_x,
                                                $this->height - $this->padding_bottom - $this->move_up - $up,
                                                $color);
                                self::paint_imageline($this->image,
                                                $this->line_last_x,
                                                $this->height - $this->padding_bottom - $this->move_up - $up,
                                                $this->padding_left + $this->move_left + $left,
                                                $this->height - $this->padding_bottom - $this->move_up - $up,
                                                $color);
                            } else {
                                self::paint_imageline($this->image,
                                                $this->line_last_x,
                                                $this->line_last_y,
                                                $this->padding_left + $this->move_left + $left,
                                                $this->line_last_y,
                                                $color);
                                self::paint_imageline($this->image,
                                                $this->padding_left + $this->move_left + $left,
                                                $this->line_last_y,
                                                $this->padding_left + $this->move_left + $left,
                                                $this->height - $this->padding_bottom - $this->move_up - $up,
                                                $color);
                            }
                        }
                    } else if ($this->more != 'spline') {
                        if (is_numeric($this->line_last_x) && is_numeric($this->line_last_y)) {
                            self::paint_imageline($this->image,
                                            $this->line_last_x,
                                            $this->line_last_y,
                                            $this->padding_left + $this->move_left + $left,
                                            $this->height - $this->padding_bottom - $this->move_up - $up,
                                            $color);
                        }
                    }

                    $this->line_last_x = $this->padding_left + $this->move_left + $left;
                    $this->line_last_y = $this->height - $this->padding_bottom - $this->move_up - $up;
                    break;
                }
            case 'impulse': {
                    self::paint_imageline($this->image,
                                    $this->padding_left + $this->move_left + $left,
                                    $this->height - $this->padding_bottom - $this->move_up - $up,
                                    $this->padding_left + $this->move_left + $left,
                                    $this->height - $this->padding_bottom - $this->move_up,
                                    $color);
                    break;
                }
            case 'area' : {
                    if (is_numeric($this->line_last_x) && is_numeric($this->line_last_y)) {
                        self::paint_imageline($this->image,
                                        $this->line_last_x,
                                        $this->line_last_y,
                                        $this->padding_left + $this->move_left + $left,
                                        $this->height - $this->padding_bottom - $this->move_up - $up,
                                        $color);

                        $array = array(
                            $this->line_last_x + 1,
                            $this->line_last_y,
                            $this->line_last_x,
                            $this->height - $this->padding_bottom - $this->move_up,
                            $this->padding_left + $this->move_left + $left - 1,
                            $this->height - $this->padding_bottom - $this->move_up,
                            $this->padding_left + $this->move_left + $left,
                            $this->height - $this->padding_bottom - $this->move_up - $up,
                        );
                        //print_r($array);
                        //$array = array(10, 10, 30, 30, 10, 30, 10, 10 );
                        if ($this->transparent == 1) {
                            imagefilledpolygon($this->image, $array, 4, $this->transparent_colors[$index]);
                        } else {
                            imagefilledpolygon($this->image, $array, 4, $color);
                        }
                    } else {
                        self::paint_imageline($this->image,
                                        $this->padding_left + $this->move_left + $left,
                                        $this->height - $this->padding_bottom - $this->move_up - $up,
                                        $this->padding_left + $this->move_left + $left,
                                        $this->height - $this->padding_bottom - $this->move_up,
                                        $color);
                    }

                    if ($last == true) {
                        self::paint_imageline($this->image,
                                        $this->padding_left + $this->move_left + $left,
                                        $this->height - $this->padding_bottom - $this->move_up - $up,
                                        $this->padding_left + $this->move_left + $left,
                                        $this->height - $this->padding_bottom - $this->move_up,
                                        $color);
                    }

                    $this->line_last_x = $this->padding_left + $this->move_left + $left;
                    $this->line_last_y = $this->height - $this->padding_bottom - $this->move_up - $up;
                    break;
                }
        }

        if ($this->type == 'area') {
            if (isset($this->paint_axes_var) && $this->paint_axes_var == 1) {
                self::paint_axes($this->paint_axes_color,
                                $this->paint_axes_x_titles,
                                $this->paint_axes_y_titles,
                                $this->paint_axes_border);
            }

            if (isset($this->points_on_axes_var) && $this->points_on_axes_var == 1) {
                self::points_on_axes($this->points_on_axes_color,
                                $this->points_on_axes_x_titles,
                                $this->points_on_axes_y_titles
                );
            }
        }
    }

    /** kresli linky v pozadi grafu
     *   @param string[$color] barva linek
     *   @param string[$x] typ linek osy x
     *   @param string[$y] typ linek na ose y
     *   @return null
     */
    function paint_lines($color, $x = 'dashed', $y = 'dashed') {
        if ($this->type == 'pie')
            return;
        $color = array_key_exists($color, $this->default_colors) ? $this->default_colors[$color] : self::allocatecolor($color);
        //pocita jenom jednou
        if ($this->calculate_lines == 0)
            switch ($this->type) {
                case 'bar':
                case 'column ': {
                        self::_calculate_lines_column();
                        $x = 'lines';
                        break;
                    }
                default: self::_calculate_lines();
            }

        if ($this->calculate_positions == 0) {
            self::_line_graph_calculate_lines();
            $this->calculate_positions = 1;
        }


        for ($i = 0; $i < count($this->y_positions); $i++) {
            if ($this->y_positions[$i][1] == 1) {
                $start = $this->padding_left;
                switch ($y) {
                    case 'dashed': {
                            while (( ( $this->width - $this->padding_right ) - 10 ) > $start) {
                                self::paint_imageline($this->image, $start, $this->y_positions[$i][0], $start + 10, $this->y_positions[$i][0], $color);
                                $start += 20;
                            }
                            break;
                        }
                    default : {
                            self::paint_imageline($this->image, $start + ( $this->more == '3d' || $this->more == '3dsum' ? ( $this->move_left + $this->column_3d_sum_plane_width ) : 0 ),
                                            $this->y_positions[$i][0] - ( $this->more == '3d' || $this->more == '3dsum' ? $this->column_3d_sum_plane_width : 0 ),
                                            $this->width - $this->padding_right + ( $this->more == '3d' || $this->more == '3dsum' ? $this->column_3d_sum_plane_width : 0 ),
                                            $this->y_positions[$i][0] - ( $this->more == '3d' || $this->more == '3dsum' ? $this->column_3d_sum_plane_width : 0 ),
                                            $color);

                            if ($this->more == '3d' || $this->more == '3dsum') {
                                self::paint_imageline($this->image,
                                                $start + ( $this->more == '3d' || $this->more == '3dsum' ? ( $this->move_left ) : 0 ),
                                                $this->y_positions[$i][0],
                                                $start + ( $this->more == '3d' || $this->more == '3dsum' ? ( $this->move_left + $this->column_3d_sum_plane_width ) : 0 ),
                                                $this->y_positions[$i][0] - $this->column_3d_sum_plane_width,
                                                $color
                                );
                            }
                            break;
                        }
                }
            }
        }
        if ($this->type == 'column')
            return;
        //start top
        for ($i = 0; $i < count($this->x_positions); $i++) {
            if ($this->x_positions[$i][1] == 1) {
                $start = $this->height - $this->padding_bottom;
                switch ($x) {
                    //carkovana cara        
                    case 'dashed' : {
                            do {
                                self::paint_imageline($this->image, $this->x_positions[$i][0], $start, $this->x_positions[$i][0], $start - 10, $color);
                                //kresli po 10 px
                                $start -= 20;
                            } while ($start > ( $this->padding_top + 10 ));
                            break;
                        }
                    //cara
                    default: {
                            self::paint_imageline($this->image, $this->x_positions[$i][0], $start, $this->x_positions[$i][0], $this->padding_top, $color);
                        }
                }
            }
        }
    }

    /** body na osach x a y
     *   @param string[$color] html kod barvy pro kresleni
     *   @param array[$x_titles] hodnoty na ose x
     *   @param array[$y_titles] hodnoty na ose y
     *   @return null
     */
    public function points_on_axes($color = 'black', $x_titles = 'auto', $y_titles = 'auto') {
        if ($this->type == 'pie')
            return;
        if ($this->type == 'area' && empty($this->points_on_axes_var)) {
            $this->points_on_axes_var = 1;
            $this->points_on_axes_color = $color;
            $this->points_on_axes_x_titles = $x_titles;
            $this->points_on_axes_y_titles = $y_titles;
        }

        $color = array_key_exists($color, $this->default_colors) ? $this->default_colors[$color] : self::allocatecolor($color);

        if ($this->calculate_lines == 0)
            switch ($this->type) {
                case 'bar':
                case 'column ': self::_calculate_lines_column();
                    break;
                default: self::_calculate_lines();
            }
        self::_paint_points($this->move_up, $this->move_left,
                        $this->section_x, $this->section_y,
                        ( $this->to_x - $this->from_x),
                        ( $this->to_y - $this->from_y), $color,
                        $x_titles);

        self::_calculate_titles_values($x_titles, $y_titles);
        $max = null;
        foreach ($x_titles as $value)
            $max = strlen($value) > strlen($max) ? $value : $max;
        $font_width = imagefontwidth(2);
        $font_height = imagefontheight(2);
        $move_down = 5; //px

        if ($this->move_up < $font_height + $move_down) {
            $move_down = 0 - abs($font_height + $move_down);
        }

        $span = $this->width - $this->padding_left - $this->padding_right;
        $last = 0;
        for ($i = 0; $i < count($this->x_positions); $i++) {
            if ($this->x_positions[$i][1] == 1) {
                if ($last == 0)
                    $last = $this->x_positions[$i][0];
                else {
                    $span = $this->x_positions[$i][0] - $last;
                    break;
                }
            }
        }

        $max = 0;
        foreach ($y_titles as $value)
            $max = strlen($value) > strlen($max) ? $value : $max;

        $move_right = 0 - 7 - ( strlen($max) * $font_width ); //px

        if ($this->move_left < ( strlen($max) * $font_width ) + 7 /* px */) {
            $move_right += 7 + ( strlen($max) * $font_width ) + 7;
        }

        for ($i = 0; $i < count($this->y_positions); $i++) {
            //for( $i = count( $this->y_positions ); $i > 0; $i-- ){
            if ($this->y_positions[$i][1] == 1) {
                ImageString($this->image, 2,
                        $this->padding_left + $this->move_left + $move_right,
                        $this->y_positions[$i][0] - $font_height / 2,
                        @ $y_titles[$i],
                        $color
                );
            }
        }


        if ($this->type == 'column' || $this->type == 'bar') {
            self::_column_titles_x($x_titles);
            return;
        }

        //foreach( $x_titles as $value ) $max = strlen( $value ) > strlen( $max ) ? $value : $max;
        $horizontal = ( ( strlen($max) * $font_width + 3 ) > $span ) ? true : false;
        if ($horizontal == true) {
            if ($this->move_up < ( strlen($max) * $font_width ) + 5) {
                $move_down = -7;
                $move_right = $font_height / 2;
            } else {
                $move_down = 5 + strlen($max) * $font_width;
                $move_right = $font_height / 2;
            }
        }


        for ($i = 0; $i < count($this->x_positions); $i++) {
            if ($this->x_positions[$i][1] == 1) {
                if ($horizontal == false)
                    imagestring($this->image, 2,
                            $this->x_positions[$i][0] - ( $font_width * strlen(@ $x_titles[$i])) / 2,
                            $this->height - $this->move_up - $this->padding_bottom + $move_down,
                            @ $x_titles[$i],
                            $color);
                else
                    ImageStringUp($this->image, 2,
                            $this->x_positions[$i][0] - $move_right,
                            $this->height - $this->move_up - $this->padding_bottom + $move_down,
                            @ $x_titles[$i],
                            $color);
            }
        }
    }

    /** prepocita hodnoty na osach x a y pri vykreslovani bodu
     *   pokud jsou bory moc blizko u sebe
     *   @param array[$x_titles] body na ose x
     *   @param array[$y_titles] body na ose y
     *   @return
     */
    function _calculate_titles_values(& $x_titles, & $y_titles) {
        $x_new_titles = $y_new_titles = array();
        switch (gettype($x_titles)) {
            case 'array' : {
                    foreach ($x_titles as $value) {
                        $x_new_titles[] = $value;
                    }
                    break;
                }
            case 'string':
            default: {
                    $minus = ( $this->from_x ) + 1;
                    $j = 0;

                    for ($i = $minus; $i < count($this->x_positions) - abs($minus); $i++) {
                        $x_new_titles[] = $i;
                    }
                    if ($this->type == 'column') {
                        $x_new_titles[] = ++$i;
                    }
                    break;
                }
        }
        $x_titles = $x_new_titles;

        switch (gettype($y_titles)) {
            case 'array' : {
                    foreach ($y_titles as $value) {
                        $y_new_titles[] = $value;
                    }
                    break;
                }
            case 'string':
            default: {
                    $minus = ( $this->from_y ) + 1;
                    $j = 0;

                    for ($i = count($this->y_positions) - abs($minus) - 1; $i >= $minus; $i--) {
                        $y_new_titles[] = $i;
                    }

                    break;
                }
        }
        $y_titles = $y_new_titles;
    }

    private function paint_imageline(& $image, $x1, $y1, $x2, $y2, $color) {
        if ($this->aliasing != 'on') {
            imageLine($image, $x1, $y1, $x2, $y2, $color);
            return;
        }
        //vraceni RGB do colors
        $colors = imagecolorsforindex($image, $color);

        //pokud je x1 == x2 tak je cara rovna 
        if ($x1 == $x2 || $y1 == $y2) {
            imageline($image, $x1, $y1, $x2, $y2, $color);
            return;
        } else {
            //m = rozdil y / rozdil x       
            $m = ( $y2 - $y1 ) / ( $x2 - $x1 );
            $b = $y1 - $m * $x1;
            if (abs($m) <= 1) {
                //start a konec x;
                $x = min($x1, $x2);
                $endx = max($x1, $x2);
                while ($x <= $endx) {

                    $y = $m * $x + $b;
                    $y == floor($y) ? $ya = 1 : $ya = $y - floor($y);

                    $yb = ceil($y) - $y;
                    //barvy z indexu
                    $tmp = imagecolorsforindex($image, imagecolorat($image, $x, floor($y)));
                    //nove barvy
                    $tmp['red'] = $tmp['red'] * $ya + $colors['red'] * $yb;
                    $tmp['green'] = $tmp['green'] * $ya + $colors['green'] * $yb;
                    $tmp['blue'] = $tmp['blue'] * $ya + $colors['blue'] * $yb;

                    //alokovani nove barvy
                    if (imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']) == -1) {
                        imagecolorallocate($image, $tmp['red'], $tmp['green'], $tmp['blue']);
                    }
                    //imagesetpixel + $y
                    imagesetpixel($image, $x, floor($y), imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']));
                    $tmp = imagecolorsforindex($image, imagecolorat($image, $x, ceil($y)));

                    $tmp['red'] = $tmp['red'] * $yb + $colors['red'] * $ya;
                    $tmp['green'] = $tmp['green'] * $yb + $colors['green'] * $ya;
                    $tmp['blue'] = $tmp['blue'] * $yb + $colors['blue'] * $ya;

                    if (imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']) == -1) {
                        imagecolorallocate($image, $tmp['red'], $tmp['green'], $tmp['blue']);
                    }
                    //imagesetpixel -$y
                    imagesetpixel($image, $x, ceil($y), imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']));

                    $x++;
                }
            } else {
                $y = min($y1, $y2);
                $endy = max($y1, $y2);
                while ($y <= $endy) {
                    $x = ( $y - $b ) / $m;
                    $x == floor($x) ? $xa = 1 : $xa = $x - floor($x);
                    $xb = ceil($x) - $x;

                    $tmp = imagecolorsforindex($image, imagecolorat($image, floor($x), $y));

                    $tmp['red'] = $tmp['red'] * $xa + $colors['red'] * $xb;
                    $tmp['green'] = $tmp['green'] * $xa + $colors['green'] * $xb;
                    $tmp['blue'] = $tmp['blue'] * $xa + $colors['blue'] * $xb;

                    if (imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']) == -1) {
                        imagecolorallocate($image, $tmp['red'], $tmp['green'], $tmp['blue']);
                    }
                    imagesetpixel($image, floor($x), $y, imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']));
                    $tmp = imagecolorsforindex($image, imagecolorat($image, ceil($x), $y));

                    $tmp['red'] = $tmp['red'] * $xb + $colors['red'] * $xa;
                    $tmp['green'] = $tmp['green'] * $xb + $colors['green'] * $xa;
                    $tmp['blue'] = $tmp['blue'] * $xb + $colors['blue'] * $xa;

                    if (imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']) == -1) {
                        imagecolorallocate($image, $tmp['red'], $tmp['green'], $tmp['blue']);
                    }

                    imagesetpixel($image, ceil($x), $y, imagecolorexact($image, $tmp['red'], $tmp['green'], $tmp['blue']));

                    $y++;
                }
            }
        }
    }

    public function enable_aliasing() {
        $this->aliasing = 'on';
    }

    /** vykresli body v podobe car na osach
     *   @param int[$move_up] posun nahoru osy x
     *   @param int[$move_left] posun doprava, doleva osy y
     *   @param int[$section_x] sirka mezi body na ose x
     *   @param int[$section_y] sirka mezi body na ose y
     *   @param int[$size_x]
     *   @param int[$size_y]
     *   @param string[$color] html kod barvy pro kresleni
     *   @param array[$x_titles]
     *   @return null
     */
    public function _paint_points($move_up, $move_left, $section_x, $section_y, $size_x, $size_y, $color, $x_titles) {

        if ($this->calculate_positions == 0) {
            self::_line_graph_calculate_lines();
            $this->calculate_positions = 1;
        }

        $x1 = $this->padding_left + $move_left;
        for ($i = 0; $i < count($this->y_positions); $i++) {
            if ($this->y_positions[$i][1] == 1) {
                @self::paint_imageline($this->image, $x1 + 3, $this->y_positions[$i][0], $x1 - 3, $this->y_positions[$i][0], $this->default_colors[$color]);
            }
        }

        if ($this->type == 'column')
            return;

        $y1 = $this->height - $this->padding_bottom - $move_up;
        for ($i = 0; $i < count($this->x_positions); $i++) {
            if ($this->x_positions[$i][1] == 1) {
                @self::paint_imageline($this->image, $this->x_positions[$i][0], $y1 + 4, $this->x_positions[$i][0], $y1 - 4, $this->default_colors[$color]);
            }
            if ($this->type == 'column')
                @self::paint_imageline($this->image, $this->x_positions[$i][0], $y1 + 4, $this->x_positions[$i][0], $y1 - 4, $this->default_colors[$color]);
        }
        return;
    }

    /** kresli sipky na konci os
     *   @param int[$move_up] posun nahoru osy x
     *   @param int[$move_left] posun doprava, doleva osy y
     *   @param string[$color] html kod barvy pro kresleni
     *   @return null
     */
    public function _paint_darts($move_up, $move_left, $color) {
        $size = 4; //px
        //x axe + { dart }
        self::paint_imageline($this->image,
                        $this->width - $this->padding_right,
                        $this->height - $this->padding_bottom - $move_up,
                        $this->width - $this->padding_right - $size,
                        $this->height - $this->padding_bottom - $move_up - $size / 2,
                        $color);
        self::paint_imageline($this->image,
                        $this->width - $this->padding_right,
                        $this->height - $this->padding_bottom - $move_up,
                        $this->width - $this->padding_right - $size,
                        $this->height - $this->padding_bottom - $move_up + $size / 2,
                        $color);

        //y axe + {dart}
        self::paint_imageline($this->image,
                        $this->padding_left + $move_left,
                        $this->padding_top,
                        $this->padding_left + $move_left + $size / 2,
                        $this->padding_top + $size,
                        $color);
        self::paint_imageline($this->image,
                        $this->padding_left + $move_left,
                        $this->padding_top,
                        $this->padding_left + $move_left - $size / 2,
                        $this->padding_top + $size,
                        $color);
    }

    /** kresli legendu v grafu
     *   @param  string[$position] pozice legendy
     *   @param  array[$legend] pole s hodnotami legendy
     *   @param  string[$bgcolor] kod barvy pro pozadi
     *   @param  string[$border] kod barvy pro ramecek
     *   @param  string[$text] kod barvy pro text legendy
     *   @return null
     */
    public function legend($position = 'topright', $legend = array(), $bgcolor = 'white', $border = 'black', $text = 'black') {
        if (@ $this->print_legend_b == 1) {
            return 1;
        }
        else
            $this->print_legend_b = 1;

        if (count($legend) == 0)
            return 0;

        $bgcolor = array_key_exists($bgcolor, $this->default_colors) ? $this->default_colors[$bgcolor] : self::allocatecolor($bgcolor);

        $padding = 10; //px
        $max = 0;
        foreach ($legend as $value)
            $max = strlen($value) > $max ? strlen($value) : $max;

        $width = 2 * $padding + imagefontwidth(3) * $max + 10;
        $height = 2 * $padding + ( imagefontheight(3) + 3 ) * count($legend) - 6;

        switch ($position) {
            case 'bottomright': {
                    $start_x = $this->width - $this->padding_right;
                    $start_y = $this->height - $height - $this->padding_bottom;
                    if ($this->calculate_positions == 0) {
                        $this->padding_bottom += $height;
                    }
                    break;
                }
            case 'topleft': {
                    $start_x = $this->padding_left + $width;
                    $start_y = $this->padding_top;
                    if ($this->calculate_positions == 0) {
                        $this->padding_top += $height;
                    }
                    break;
                }
            case 'bottomleft': {
                    $start_x = $this->padding_left + $width;
                    $start_y = $this->height - $this->padding_bottom - $height;
                    if ($this->calculate_positions == 0) {
                        $this->padding_bottom += $height;
                    }
                    break;
                }
            case 'right': {
                    $start_x = $this->width - $this->padding_right;
                    $start_y = $this->padding_top + ( $this->height - $this->padding_top - $this->padding_bottom) / 2 - $height / 2;
                    if ($this->calculate_positions == 0) {
                        $this->padding_right += $width + 10;
                    }
                    break;
                }
            case 'left': {
                    $start_x = $this->padding_left + $width;
                    $start_y = $this->padding_top + ( $this->height - $this->padding_top - $this->padding_bottom) / 2 - $height / 2;
                    if ($this->calculate_positions == 0) {
                        $this->padding_left += $width + 10;
                    }
                    break;
                }
            case 'top': {
                    $start_x = $this->padding_right + ( $this->width - $this->padding_right - $this->padding_left ) / 2 + $width / 2;
                    $start_y = $this->padding_top;
                    if ($this->calculate_positions == 0) {
                        $this->padding_top += $height + 10;
                    }
                    break;
                }
            case 'bottom': {
                    $start_x = $this->padding_right + ( $this->width - $this->padding_right - $this->padding_left ) / 2 + $width / 2;
                    $start_y = $this->height - $this->padding_bottom - $height;
                    if ($this->calculate_positions == 0) {
                        $this->padding_bottom += $height + 10;
                    }
                    break;
                }
            case 'topright':
            default: {
                    $start_x = $this->width - $this->padding_right;
                    $start_y = $this->padding_top;
                    if ($this->calculate_positions == 0) {
                        $this->padding_top += $height;
                    }
                }
        }

        self::_imagefilledrectangle($this->image,
                        $start_x - $width,
                        $start_y + $height,
                        $start_x,
                        $start_y,
                        $bgcolor);

        if ($border != null) {
            $bordercolor = array_key_exists($border, $this->default_colors) ? $this->default_colors[$border] : self::allocatecolor($border);
            self::paint_imageline($this->image, $start_x, $start_y, $start_x, $start_y + $height, $bordercolor);
            self::paint_imageline($this->image, $start_x, $start_y + $height, $start_x - $width, $start_y + $height, $bordercolor);
            self::paint_imageline($this->image, $start_x - $width, $start_y + $height, $start_x - $width, $start_y, $bordercolor);
            self::paint_imageline($this->image, $start_x - $width, $start_y, $start_x, $start_y, $bordercolor);
        }

        $text = array_key_exists($text, $this->default_colors) ? $this->default_colors[$text] : self::allocatecolor($text);
        $top = $start_y + $padding + 3;
        foreach ($legend as $id => $value) {
            $color = array_key_exists($id, $this->default_colors) ? $this->default_colors[$id] : self::allocatecolor($id);
            imagefilledarc($this->image, $start_x - $width + $padding, $top, imagefontwidth(3), imagefontwidth(3), 0, 360, $color, IMG_ARC_PIE);

            ImageString($this->image, 3,
                    $start_x - $width + $padding + 10,
                    $top - imagefontheight(3) / 2,
                    $value, $text);

            $top += imagefontheight(3) + 3;
        }
    }

    /** prepocita souradnice pred vykresnim grafu pro graf typu column a bar
     *   @param null
     *   @return null
     */
    private function _calculate_lines_column() {
        $this->calculate_lines = 1;

        if ($this->more == '3d' || $this->more == '3dsum') {
            $this->padding_right -= 10;
        }

        $this->place = $this->width - $this->padding_left - $this->padding_right - 40;
        //start / osa x
        $this->from_x = min($this->graph_data['x']);
        $this->to_x = max($this->graph_data['x']) + 1;

        //osy se musi krizit
        if (( $this->from_x ) > 0)
            $this->from_x = 0;
        else if (!is_int($this->from_x)) {
            $this->from_x = floor($this->from_x);
        }
        if ($this->to_x < 0)
            $this->to_x = 0;
        else if (!is_int($this->to_x)) {
            $this->to_x = ceil($this->to_x);
        }

        $this->section_x = $this->place / ( ( $this->to_x - $this->from_x ));
        //zde se osy krizi
        $this->cross_x = abs($this->from_x);
        //konec / osa x

        $this->place = $this->height - $this->padding_bottom - $this->padding_top;
        //start / osa y
        $this->from_y = min($this->graph_data['y']) - 1;
        $this->to_y = max($this->graph_data['y']) + 1;

        //osy se musi krizit
        if (( $this->from_y ) >= 0)
            $this->from_y = -1;
        else if (!is_int($this->from_y)) {
            $this->from_y = floor($this->from_y);
        }
        if ($this->to_y <= 0)
            $this->to_y = 1;
        else if (!is_int($this->to_y)) {
            $this->to_x = ceil($this->to_y);
        }

        $this->section_y = $this->place / ( $this->to_y - $this->from_y);
        //zde se osy krizi na ose y
        $this->cross_y = abs($this->from_y);
        //konec / osa y
        //posun jednotlivych os smerem nahoru a doprava po prepocitani souradnic
        $this->move_up = $this->cross_y * $this->section_y;
        $this->move_left = $this->cross_x * $this->section_x + 40;
    }

    private function _column_graph_calculate_lines() {
        $min = 20;

        $width = $this->width - $this->move_left - $this->padding_right - $this->padding_left;

        $max = 0;

        for ($i = 0; $i < count($this->data); $i++) {
            if ($max < count($this->data[$i][1])) {
                $max = count($this->data[$i][1]);
            }
        }

        if ($max <= 0)
            return 0;
        $num = $max + 1;

        $section = $width / $num;

        $last = 0;
        $start = $this->padding_left + $this->move_left;
        for ($i = 0; $i < $num; $i++) {
            if ($start - $last > 20) {
                $return[] = array($start, 1);
                $last = $start;
            }
            else
                $return[] = array($start, 0);

            $start += $section;
        }


        sort($return);
        $this->x_positions = $return;

        unset($return);
        $return = array();

        $height = $this->height - $this->padding_top - $this->padding_bottom;
        $num = ceil(abs($this->from_y - $this->to_y));
        $section = $height / $num;

        if ($section >= $min) {
            $start = $this->padding_top;
            for ($i = 0; $i < $num - 1; $i++) {
                $start += $section;
                $return[] = array($start, 1);
            }
        } else {
            $keys = array();
            $num = abs($this->from_y);
            $section = $this->move_up / $num;
            $start = $this->height - $this->padding_bottom - $this->move_up;
            $last = 0;

            for ($i = 0; $i < $num; $i++) {
                if ($last == 0 || ( abs($start - $last) >= $min )) {
                    if (!in_array($start, $keys)) {
                        $return[] = array($start, 1);
                    }
                    $last = $start;
                } else {
                    $return[] = array($start, 0);
                }

                $keys[] = $start;
                $start += $section;
            }

            $num = abs($this->to_y);
            $section = ($this->height - $this->padding_top - $this->padding_bottom - $this->move_up) / $num;
            $start = $this->height - $this->padding_bottom - $this->move_up;
            $last = 0;

            for ($i = 0; $i < $num; $i++) {
                if ($last == 0 || ( abs($start - $last) >= $min )) {
                    if (!in_array($start, $keys)) {
                        $return[] = array($start, 1);
                    }
                    $last = $start;
                }
                else
                    $return[] = array($start, 0);

                $keys[] = $start;
                $start -= $section;
            }
        }
        sort($return);
        $this->y_positions = $return;

        $this->calculate_positions = 1;
    }

    private function _column_titles_x($x_titles) {
        $font = imagefontheight(2);
        $font_width = imagefontwidth(2);

        for ($i = 0; $i < count($this->data); $i++) {
            for ($j = 0; $j < count($this->data[$i][1]); $j++) {
                $x[$j] = ( $x[$j] <= $this->data[$i][2][$j] ? $this->data[$i][2][$j] : $x[$j] );
            }
        }

        for ($i = 0; $i < count($x); $i++) {
            $height = $this->section_y * max($x) + $font;
            if ($height < 0)
                $height = $font;

            $start = $this->x_positions[$i][0];

            $start += ( $this->section_x / 2 - ( strlen($x_titles[$i]) * $font_width ) / 2 );
            if ($this->x_positions[$i][1] == 1)
                ImageString($this->image, 2,
                        $start + ( $this->more == '3d' || $this->more == '3dsum' ? $this->column_3d_sum_plane_width : 0 ),
                        $this->height - $this->move_up - $this->padding_bottom - $height - ( $this->more == '3d' || $this->more == '3dsum' ? 24 : 0 ),
                        $x_titles[$i],
                        $this->default_colors['black']);
        }
    }

    private function _paint_column_3d($max) {
        $max_width = 100; //px
        $padding_lines = 2;



        //sirka pro jeden sloupec
        $width = ( $this->width - $this->move_left - $this->padding_right - $this->padding_left) / ( $max + 1 );
        //sirka pro jednu cast ve sloupci, pokud je jich vice. 
        $part = $width / ( count($this->data) ) - ( $this->column_padding / 2 );
        $part_3d = $part / 2;
        $part_3d = ( $part_3d > $this->column_3d_sum_plane_width ? $this->column_3d_sum_plane_width : $part_3d );
        $first = 1;

        if ($this->column_padding < $part_3d && count($this->data) > 1) {
            $this->column_padding = $part_3d;
            $width = ( $this->width - $this->move_left - $this->padding_right - $this->padding_left) / ( $max + 1 );
            $part = $width / ( count($this->data) ) - ( $this->column_padding / 2 );
            $part_3d = $part / 2;
            $part_3d = ( $part_3d > $this->column_3d_sum_plane_width ? $this->column_3d_sum_plane_width : $part_3d );
        }
        for ($i = 0; $i < count($this->data); $i++) {
            for ($j = 0; $j < count($this->data[$i][1]); $j++) {

                $start = $this->padding_left + $this->move_left + ( $this->data[$i][1][$j] * $width );
                $height = $this->section_y * $this->data[$i][2][$j];

                $start_x = $start + ( $i ) * $part + ( $this->column_padding / 2 );

                $vcolor = self::decodeColor(self::_return_color($this->data[$i][0]));
                $color1 = ImageColorAllocate($this->image, $vcolor[0], $vcolor[1], $vcolor[2]);
                $color2 = ImageColorAllocate($this->image, $vcolor[0] / 1.3, $vcolor[1] / 1.3, $vcolor[2] / 1.3);
                $color3 = ImageColorAllocate($this->image, $vcolor[0] / 1.7, $vcolor[1] / 1.7, $vcolor[2] / 1.7);

                $array1 = array(
                    $start_x + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d,
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d,
                    $start_x + $part + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width,
                    $start_x + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width,
                );


                $array2 = array(
                    $start_x + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d,
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d,
                    $start_x + $part + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width,
                    $start_x + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width,
                );

                //imagefilledpolygon( $this->image, $array2, 4, $color2);

                $array3 = array(
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d,
                    $start_x + $part + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width,
                    $start_x + $this->column_3d_sum_plane_width + $part,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width,
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d,
                );


                imagefilledpolygon($this->image, $array1, 4, $color2);
                imagefilledpolygon($this->image, $array2, 4, $color3);
                imagefilledpolygon($this->image, $array3, 4, $color3);

                self::_imagefilledrectangle($this->image,
                                $start_x + $this->column_3d_sum_plane_width - $part_3d,
                                $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d,
                                $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                                $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d,
                                $color1);
            }
            $first = 0;
        }
    }

    private function _paint_column_3dsum($max) {
        $max_width = 100; //px                                                                       
        $padding_lines = 2;



        //sirka pro jeden sloupec
        $width = ( $this->width - $this->move_left - $this->padding_right - $this->padding_left) / ( $max + 1);
        $first = 1;

        $part = $width - ( $this->column_padding / 2 );
        $part_3d = ( $this->column_3d_sum_plane_width - ( count($this->data) ) * 2 ) / count($this->data);

        for ($i = 0; $i < count($this->data); $i++) {
            for ($j = 0; $j < count($this->data[$i][1]); $j++) {

                $start = $this->padding_left + $this->move_left + ( $this->data[$i][1][$j] * $width );
                $height = $this->section_y * $this->data[$i][2][$j];

                $start_x = $start + ( $this->column_padding / 2 ) - $last_part;

                $vcolor = self::decodeColor(self::_return_color($this->data[$i][0]));
                $color1 = ImageColorAllocate($this->image, $vcolor[0], $vcolor[1], $vcolor[2]);
                $color2 = ImageColorAllocate($this->image, $vcolor[0] / 1.3, $vcolor[1] / 1.3, $vcolor[2] / 1.3);
                $color3 = ImageColorAllocate($this->image, $vcolor[0] / 1.7, $vcolor[1] / 1.7, $vcolor[2] / 1.7);

                $array1 = array(
                    $start_x + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                    $start_x + $part + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $last_part,
                    $start_x + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $last_part,
                );


                $array2 = array(
                    $start_x + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                    $start_x + $part + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $last_part,
                    $start_x + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $last_part,
                );


                $array3 = array(
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                    $start_x + $part + $this->column_3d_sum_plane_width,
                    $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $last_part,
                    $start_x + $this->column_3d_sum_plane_width + $part,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $last_part,
                    $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                    $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                );


                //horni podstava grafu
                imagefilledpolygon($this->image, $array2, 4, $color3);

                //dolni podstava grafu
                imagefilledpolygon($this->image, $array1, 4, $color2);

                imagefilledpolygon($this->image, $array3, 4, $color3);

                self::_imagefilledrectangle($this->image,
                                $start_x + $this->column_3d_sum_plane_width - $part_3d,
                                $this->height - $this->move_up - $this->padding_bottom - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                                $start_x + $part + $this->column_3d_sum_plane_width - $part_3d,
                                $this->height - $this->move_up - $this->padding_bottom - $height - $this->column_3d_sum_plane_width + $part_3d + $last_part,
                                $color1);
            }
            $last_part += $part_3d + 2;
            //$part_3d += $part_3d;
        }
    }

    public function _paint_column_graph() {
        if ($this->calculate_lines == 0) {
            switch ($this->type) {
                case 'column':self::_calculate_lines_column();
                    break;
                default:;
            }
        }

        $max_width = 100; //px
        $padding_lines = 2;

        $max = 0;

        for ($i = 0; $i < count($this->data); $i++) {
            if ($max < count($this->data[$i][1])) {
                $max = count($this->data[$i][1]);
            }
        }

        if ($max <= 0)
            return 0;

        //sirka pro jeden sloupec
        $width = ( $this->width - $this->move_left - $this->padding_right - $this->padding_left) / ( $max + 1 );
        //sirka pro jednu cast ve sloupci, pokud je jich vice. 
        $part = $width / ( count($this->data) ) - ( $this->column_padding / 2 );
        $part_3d = $part / 2;
        $part_3d = ( $part_3d > $this->column_3d_sum_plane_width ? $this->column_3d_sum_plane_width : $part_3d );

        $first = 1;

        if ($this->paint_axes_plot == 1) {
            $pos = array(
                $this->padding_left + $this->move_left,
                $this->height - $this->padding_bottom - $this->move_up,
                $this->width - $this->padding_right,
                $this->height - $this->padding_bottom - $this->move_up,
                $this->width - $this->padding_right + $this->column_3d_sum_plane_width,
                $this->height - $this->padding_bottom - $this->move_up - $this->column_3d_sum_plane_width,
                $this->padding_left + $this->move_left + $this->column_3d_sum_plane_width,
                $this->height - $this->padding_bottom - $this->move_up - $this->column_3d_sum_plane_width,
                $this->padding_left + $this->move_left,
                $this->height - $this->padding_bottom - $this->move_up,
            );

            imagefilledpolygon($this->image, $pos, 5, $this->tr_color);
        }

        if ($this->more == '3d') {
            self::_paint_column_3d($max);
        } else if ($this->more == '3dsum') {
            self::_paint_column_3dsum($max);
        } else {
            $first = 1;
            for ($i = 0; $i < count($this->data); $i++) {
                for ($j = 0; $j < count($this->data[$i][1]); $j++) {

                    $start = $this->padding_left + $this->move_left + ( $this->data[$i][1][$j] * $width );
                    $height = $this->section_y * $this->data[$i][2][$j];

                    if ($this->transparent != 1) {
                        if ($this->more == 'sum')
                            $start_x = $start;
                        else
                            $start_x = $start + ( $i ) * $part + ( $this->column_padding / 2 );
                    }
                    else
                        $start_x = $start;

                    if ($this->transparent == 1) {

                        self::_imagefilledrectangle($this->image,
                                        $start_x + $this->column_padding / 2 + 1,
                                        $this->height - $this->move_up - $this->padding_bottom,
                                        $start_x + $width - $this->column_padding / 2,
                                        $this->height - $this->move_up - $this->padding_bottom - $height,
                                        $this->transparent_colors[$i]);
                    } else if ($this->more == 'sum') {
                        self::_imagefilledrectangle($this->image,
                                        $start_x + $this->column_padding / 2 + 1,
                                        $this->height - $this->move_up - $this->padding_bottom,
                                        $start_x + $width - $this->column_padding / 2,
                                        $this->height - $this->move_up - $this->padding_bottom - $height,
                                        $this->default_colors[$this->data[$i][0]]);
                    } else {
                        self::_imagefilledrectangle($this->image,
                                        $start_x + ( $first == 1 && $j > 0 ? 1 : 0 ),
                                        $this->height - $this->move_up - $this->padding_bottom,
                                        $start_x + $part,
                                        $this->height - $this->move_up - $this->padding_bottom - $height,
                                        $this->default_colors[$this->data[$i][0]]);
                    }
                }
                $first = 0;
            }
        }

        if (@ $this->paint_x_line_3d == 1)
            self::paint_imageline($this->image,
                            $this->padding_left + ( $this->more == '3d' || $this->more == '3dsum' ? $this->move_left : 0 ),
                            $this->height - $this->padding_bottom - $this->move_up,
                            $this->width - $this->padding_right,
                            $this->height - $this->padding_bottom - $this->move_up,
                            $this->paint_x_line_3d_color);
    }

    function _imagefilledrectangle(& $img, $x1, $y1, $x2, $y2, $color) {
        $array = array($x1, $y1,
            $x1, $y2,
            $x2, $y2,
            $x2, $y1);

        imagefilledpolygon($img, $array, 4, $color);
    }

    private function _paint_bar_graph() {
        if ($this->calculate_lines == 0) {
            switch ($this->type) {
                case 'bar':
                case 'column':self::_calculate_lines_column();
                    break;
                default:;
            }
        }

        $max_width = 100; //px
        $padding_lines = 2;

        $max = 0;

        for ($i = 0; $i < count($this->data); $i++) {
            if ($max < count($this->data[$i][1])) {
                $max = count($this->data[$i][1]);
            }
        }

        if ($max <= 0)
            return 0;

        $height = ( $this->height - $this->move_up - $this->padding_top - $this->padding_bottom) / ( $max + 1 );
        //sirka pro jednu cast ve sloupci, pokud je jich vice. 
        $part = $height / ( count($this->data) ) - ( $this->column_padding / 2 );

        $first = 1;
        for ($i = 0; $i < count($this->data); $i++) {
            for ($j = 0; $j < count($this->data[$i][1]); $j++) {

                $start = $this->height - $this->padding_bottom - $this->move_up;
                $height = $this->section_x * $this->data[$i][2][$j];

                $start_y = $start;

                self::_imagefilledrectangle($this->image,
                                $this->move_left + $this->padding_left,
                                $start_y,
                                $this->move_left + $this->padding_left + $heigth,
                                $start_y - $part,
                                $this->default_colors[$this->data[$i][0]]);
                $first = 0;
            }
        }
    }

    function _error_handle($input_string) {
        $width = 300;
        $height = 100;
        $img = imagecreate($width, $height);
        $color = imagecolorallocate($img, 233, 233, 233);
        self::_imagefilledrectangle($img, 0, 0, $width, $height, $color);
        $line_color = imagecolorallocate($img, 255, 0, 0);
        for ($i = 3; $i < 20; $i+=3)
            self::paint_imageline($img, 3, $i, $width - 3, $i, $line_color);

        $white_color = imagecolorallocate($img, 240, 240, 240);
        self::_imagefilledrectangle($img, 50, 4, $width - 50, 17, $white_color);

        $string = 'GRAPH ERROR!';
        $im_width = imagefontwidth(3);
        ImageString($img, 3, $width / 2 - (strlen($string) * $im_width) / 2, 3, $string, $line_color);

        //vykresleni trojuhelniku
        $gold_color = imagecolorallocate($img, 255, 0, 0);
        $array = array(10, 80, 50, 80, 30, 40, 10, 80);
        Imagepolygon($img, $array, 4, $gold_color);
        $array = array(11, 79, 49, 79, 31, 39, 11, 79);
        Imagepolygon($img, $array, 4, $gold_color);
        $array = array(30, 62, 31, 50, 29, 50, 30, 62);
        imagefilledpolygon($img, $array, 4, $gold_color);
        imagefilledarc($img, 30, 70, 3, 3, 0, 360, $gold_color, IMG_ARC_PIE);

        //ramecek
        imagerectangle($img, 1, 1, $width - 1, $height - 1, $line_color);
        imagerectangle($img, 2, 22, $width - 2, $height - 2, $line_color);

        //rozme ry pole pro text
        $start_x = 75;
        $end_x = $width - 20;
        $start_y = 30;
        $end_y = $height - 10;
        $width = $end_x - $start_x;
        $height = $end_y - $start_y;

        //dopocitani zakladnich veci
        $font_width = imagefontwidth(3);
        $font_height = imagefontheight(3) + 1;
        $maximum = floor($width / $font_width);
        //rozdeleni cisel po maximalni sirce
        $words = wordwrap($input_string, $maximum, '<br>');
        $words = explode('<br>', $words);
        $black_color = imagecolorallocate($img, 0, 0, 0);

        //vypsani radku
        for ($i = 0; $i < count($words); $i++) {
            if (( ( $i * $font_height ) + $font_height ) < $height)
                ImageString($img, 3, $start_x, $start_y + ( $i * $font_height ), $words[$i], $black_color);
        }
        //odeslani
        Header("Content-Type: image/png");
        header('Pragma: public');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: pre-check=0, post-check=0, max-age=0');
        header("Pragma: no-cache");
        imagepng($img);
        exit;
    }

    function _calculate_pie_graph() {
        $sum = array_sum($this->pie_values);
        if ($sum == 0) {
            self::_error_handle('Neexistují hodnoty pro vykreslení. ');
        }

        $size = $this->graph_width >= $this->graph_height ? $this->graph_height : $this->graph_width;
        $this->graph_width = $size;
        $this->graph_height = $size;
        if ($this->more == '3d') {
            if ($this->pie_height == 0)
                $this->pie_height = $this->graph_height / 10;
            $this->graph_height = $this->graph_width / 2;
            $this->center_y += $this->pie_height / 2;
        }
        $part = 360 / $sum;
        $start = 10;
        $array = $center = array();
        $i = 0;
        $space = false;
        $space_width = $this->graph_width / 17;
        if ($space_width < 10) {
            $space_width = 10;
        }
        for ($i; $i < count($this->pie_values); $i+=1) {
            //vypocet uhlu části gragu
            $section = $this->pie_values[$i] * $part;
            $array[] = array($start, $start + $section);
            $start+= $section;

            if ($this->pie_out[$i] == 1) {
                $space = true;
                //print ( $start - ( $array[$i][1] - $array[$i][0]) /2);
                $angle = $start - ( $array[$i][1] - $array[$i][0]) / 2;
                $x = $this->center_x + cos(deg2rad($angle)) * $space_width;
                $y = $this->center_y + sin(deg2rad($angle)) * $space_width;
                $center[] = array($x, $y, $this->pie_out[$i]);
            } else {
                $center[] = array($this->center_x, $this->center_y, $this->pie_out[$i]);
            }
        }
        if ($space == true) {
            $this->graph_width -= $space_width;
            $this->graph_height -= $space_width;
        }

        //print_r( $center );
        $this->pie_out = $center;
        $this->pie_values = $array;
    }

    function _paint_pie_legned($legend) {
        if (count($legend) == 0)
            return;

        $this->pie_line_color = array_key_exists($this->pie_line_color, $this->default_colors) ? $this->default_colors[$this->pie_line_color] : self::allocatecolor($this->pie_line_color);

        foreach ($legend as $i) {
            $space_width = ( $this->graph_width >= $this->graph_height ? $this->graph_height : $this->graph_width ) / 3;

            $angle = $this->pie_values[$i][1] - ($this->pie_values[$i][1] - $this->pie_values[$i][0]) / 2;

            $x = $this->center_x + cos(deg2rad($angle)) * $space_width;
            $y = $this->center_y + sin(deg2rad($angle)) * $space_width - 5;

            imagestring($this->image, 3, $x, $y - $this->pie_height, $this->pie_about[$i], $this->pie_line_color);
            $start_y += $line_height;
        }
    }

    private function _pie_graph() {
        self::_calculate_pie_graph();

        for ($i = 0; $i < count($this->pie_values); $i++) {
            if (array_key_exists($this->pie_colors[$i], $this->default_colors)) {
                $c = self::_return_color($this->pie_colors[$i]);
            }
            else
                $c = $this->pie_colors[$i];

            $red = hexdec(@substr($c, 1, 2));
            $green = hexdec(@substr($c, 3, 2));
            $blue = hexdec(@substr($c, 5, 2));

            $colors[$i] = imagecolorallocate($this->image, $red / 1.7, $green / 1.7, $blue / 1.7);
        }

        if ($this->more == '3d') {
            for ($j = 0; $j < $this->pie_height; $j++) {
                for ($i = 0; $i < count($this->pie_values); $i++) {
                    if ($this->pie_out[$i][2] == 2)
                        continue;
                    imagefilledarc($this->image,
                            $this->pie_out[$i][0], $this->pie_out[$i][1] - $j,
                            $this->graph_width, $this->graph_height,
                            $this->pie_values[$i][0], $this->pie_values[$i][1],
                            $colors[$i], IMG_ARC_EDGED);
                }
            }

            for ($i = 0; $i < count($this->pie_values); $i++) {
                if ($this->pie_out[$i][2] == 2)
                    continue;
                $color = array_key_exists($this->pie_colors[$i], $this->default_colors) ? $this->default_colors[$this->pie_colors[$i]] : self::allocatecolor($this->pie_colors[$i]);
                imagefilledarc($this->image,
                        $this->pie_out[$i][0], $this->pie_out[$i][1] - $j,
                        $this->graph_width, $this->graph_height,
                        $this->pie_values[$i][0], $this->pie_values[$i][1],
                        $color, IMG_ARC_PIE);
            }
        }
        else {
            for ($i = 0; $i < count($this->pie_values); $i++) {
                if ($this->pie_out[$i][2] == 2)
                    continue;
                $color = array_key_exists($this->pie_colors[$i], $this->default_colors) ? $this->default_colors[$this->pie_colors[$i]] : self::allocatecolor($this->pie_colors[$i]);
                imagefilledarc($this->image,
                        $this->pie_out[$i][0], $this->pie_out[$i][1],
                        $this->graph_width, $this->graph_height,
                        $this->pie_values[$i][0], $this->pie_values[$i][1],
                        $color, IMG_ARC_PIE);
                if ($this->pie_about[$i] != null)
                    $legend[] = $i;

                if ($this->pie_hole == true) {
                    self::_pie_hole($i);
                }
            }


            self::_paint_pie_legned($legend);
        }
    }

    function _pie_hole($i) {
        $hole_width = $this->graph_width / 2;
        $hole_height = $this->graph_height / 2;

        imagefilledarc($this->image,
                $this->pie_out[$i][0], $this->pie_out[$i][1],
                $hole_width, $hole_height,
                $this->pie_values[$i][0] - 1, $this->pie_values[$i][1] + 1,
                $this->bgcolor, IMG_ARC_PIE);
    }

}
?>
