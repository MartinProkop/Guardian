<?php
/**
* @autor: Jiri Zachar
* @email: zaachi@gmail.com
* @url: http://grafy.zaachi.com
*/
interface i_graph{
    /** 
    *   Konstruktor třídy graph
    *   V konstruktoru jsou nastaveny hodnoty pro výšku, šířku, pozadí a používané písmo v generovaném obrázku
    *   @param  string[$type]    typ grafu
    *   @param  int[$width]      výška obrázku
    *   @param  int[$height]     šířka obrázku
    *   @param  string[$bgcolor] barva pozadí - html kód nebo název
    *   @param  string[$font]    font
    *   @return null
    */
    public function __construct( $type, $width=400, $height=400, $bgcolor='#ffffff', $font = NULL );
    
    /**
    *   Nastaví pozadí do obrázku
    *   Dle výchozí barvy zadané v konstruktoru vytvoří barevné pozadí
    *
    *   @param: null
    *   @return null
    */
    public function set_background();

    /** 
    *   Vytvoření nového obrázku
    *   Dle zadané barvy v konstruktoru vytvoří obrázek o určité velikosti
    *   
    *   @param null
    *   @return null
    */
    public function _create_empty_image();
    
    /** 
    *   Alokace barvy
    *   Dle vstupního parametru alokuje příslušnou barvu
    *   
    *   @param string[$htmlCode]    html kod barvy( #ffeeaa )
    *   @return int[allocatecollor]
    */
    public function allocatecolor( $htmlCode );
    
    /** 
    *   Dekoduje barvu z jejiho html vyjadreni na RGB
    *   funkce dekóduje barvu a ze zadaného HTML formátu vrací pole RGB
    *   
    *   @param string[$htmlColor]   html kod barvy
    *   return array($R, $G, $B)
    */
    public function decodeColor( $htmlColor );
    
    /** 
    *   Nacte soubor s fontem
    *   Při použití jiného než výchozího písma v grafu funkce načte soubor s písmem
    *   
    *   @param string[$filename]
    *   @return null;
    */
    public function _load_font( $file_name );
    
    /** 
    *   Vykreslení stínu kolem obrázku
    *   Funkce vykreslí stín kolem obrázku dle zadané barvy a šířky rámečku
    *   
    *   @param string[$color] - HtML kod barvy
    *   @param int[$widht] - sirka stinu
    *   @return null
    **/
    public function set_shadow( $color, $width = 2 );
    
    /** 
    *   Vykreslení stínu kolem obrázku
    *   Funkce vykreslí rámeček kolem obrázku dle zadané barvy a šířky
    *   
    *   @param string[$color] - HtML kod barvy
    *   @param int[$widht] - sirka stinu
    *   @return null
    */
    public function border( $color, $width = 1 );
    
    /** 
    *   Nastavení rozměrů prostoru pro graf před jeho vykreslením
    *   Funkce je volána před vykreslením grafu a vypočítá hodnoty pro použitelnou velikost grafu, jeho výšku a šířku, a střed grafu. 
    *   
    *   @param null
    *   @return null
    */
    // privatefunction _set_dimensions();
    
    /** 
    *   Vykreslení grafu
    *   Funkce rozhodne o volané funkci pro kreslení dle typu grafu. 
    *   
    *   @param string[$name] název vygenerovaného obrázku
    *   @return null
    **/
    public function plot( $name = null );
    
    /** 
    *   Zobrazení obrázku
    *   Funkce odešle příslušné hlavičky dle typu obrázku a vykreslí graf
    *   
    *   @param null
    *   @return null
    */
    public function output();
    
    /** 
    *   Vykreslení titulku v grafu
    *   Funkce vykreslí titulek v grafu, umístěný v pravém horním rohu grafu. Funkce rozhodne o počtu řádek pro vykreslení podle mezer a délky řetězce. 
    *   
    *   @param string[ $title ] retezec titulku
    *   @param string[$color]   HTML kod barvy
    *   @return int[0/1]
    */
    public function title( $title, $color = NULL, $font = NULL);
    
    /** 
    *   Výpočet řádků pro titulek
    *   Funkce vypočítá počet potřebných řádků pro titulek grafu. Hodnoty řetězců vrací jako pole, kde jednotlivé hodnoty reprezentují řádky titulku
    *   
    *   @param  string[$title]    retezec titulku
    *   @param  int[$maxwidth]      maximalni sirka 
    *   @param  int[$letter_width]  sirka jednoho pismena
    *   @return array($title);
    */
    // privatefunction _title_return_array_of_string( & $title, & $maxwidth, & $letter_width );
    
    /**
    *   Zjištění barvy z jeho slovního vyjádření
    *   Funkce vrací HTML kód barvy z jejího slovního vyjádření
    *
    *   $param  string[$color] Slovní vyjádření barvy
    *   @return string[$alpha_c] HTML kód barvy
    */
    // privatefunction _return_color( $color );
    
    
    /** 
    *   Zadávání hodnot do garfu
    *   Funkce zpracovává hodnoty, zadávané do grafu pro jeho vykreslení. 
    *   
    *   @param array($first) hodnoty pro osu x
    *   @param array($second)   hodnoty pro osu y
    *   @param string[$color]   barva pro hodnoty
    *   @param string[$type]    nepovinny parametr pro typ bodu 
    *   @return int
    */
    public function set_values( $first, $second = null, $color = 'blue', $type = null );
    
    /**
    *   Nastavení hodnot pro koláčový graf 
    *   Funkce nastavuje hodnoty u koláčových grafů před jejich vykreslením. Je volána z funkce set_value
    *   
    *   @param array($first)    hodnota pro velikost dané výseče
    *   @param array($second)   speciální nastavení výseče
    *   @param string[$color]   barva výseče
    *   @param string[$type]    nepovinny parametr pro typ
    *   @return null    
    */
    function _set_pie_data( $first, $second, $color, $name );
    
    /**
    *   Výpočet křivky u typu SPLINE
    *   Funkce kontroluje zadaná data a volá funkci na výpočet křivky
    *   
    *   @param array[$x] pole vektrů na ose x
    *   @param array[$y] pole vektrů na ose y
    *   @param string[$color] barva pro vykreslení křivky
    *   @param string[$type] typ bodu vykreslený na křivce
    *   @return null 
    */
    // privatefunction _create_spline_data( $x, $y, $color, $type );
    
    /**
    *   Výpočet druhé derivace
    *   Funkce vypočítá druhou derivaci křivky pro vykreslení křivky
    *
    *   @param array[$spline_xdata] hodnoty vektorů na ose x
    *   @param array[$spline_ydata] hodnoty vektorů na ose y
    *   @return null
    */
    function Spline($spline_xdata,$spline_ydata);
    
    /**
    *   Určení bodů na křivce
    *   Funkce vypočítá body na křivce, využívá se interpolace
    *
    *   @param [$num] počet vypočítaných bodů mezi dvěmi body
    *   @return array[$xnew, $ynew ] nové pole hodnot pro vykreslení křivky
    */
    function Get( $num = 50 );
    
    /**
    *   Výpočet interpolace
    *   Funkce počítá interpolaci podle bodu na křivce
    *
    *   @param int[$xpoint]  bod na ose x   
    *   @return int[$n]
    */
    function Interpolate($xpoint);
    
    /** 
    *   Přepočet souřadnic
    *   Funkce přepočítá souřadnice a výchozí hodnoty důležité pro vykreslení grafu.
    *   
    *   @param null
    *   @return null
    */
    // privatefunction _calculate_lines();
    
    /** Přepočet souřadnic
    *   Funkce podobná funkci _calculate_lines. Počítá souřadnice pro vykreslení linek. 
    *   @param null
    *   @return null
    */
    // privatefunction _line_graph_calculate_lines();
    
    /** 
    *   Vykreslení os grafu
    *   Funkce vykeslí osy grafu podle vypočítaných souřadnic pro posunutí. 
    *   
    *   @param string[$color] barva os
    *   @param string[$x_title] popisek na ose x
    *   @param string[$y_title] popisek na ose y
    *   @param int[$border] ramecek kolem popisku os
    *   @param 
    *   @return
    */
    public function paint_axes( $color = 'black', $x_title = null, $y_title = null, $border = false, $area = false  );
    
    /** 
    *   Vykreslení grafu typu LINE
    *   Funkce vykresluje křivky u grafu typu LINE, SPLINE, apod. 
    *   
    *   @param null
    *   @return null
    */
    public function _paint_line_graph();
    
    /** 
    *   Body na osach
    *   Funkce vykresluje body na průsečícich vektorů u grafu typu LINE, SPLINE, apod. 
    *   Body mohou být typu: 
    *           fullcross - plný kříž
    *           cross - linkový kříž
    *           box - čtvereček
    *           wheel - kolečko
    *   
    *   @param int[$x] souradnice x pro soucasnou polohu
    *   @param int[$y] souradnice y pro soucasnou polohu
    *   @param string[$color]   barva pso aktualni bod
    *   @param string[$type] typ bodu na grafu
    *   @param int[$last] posledni souradnice
    *   @param int[$index] index v poradi vykreslovani kvuli rozliseni
    *   @return
    */
    // privatefunction _paint_line_graph_type( $x, $y, $color, $type, $last = true, $index );
    
    /** 
    *   Vykreslení linek v souřadném systému
    *   Funkce kreslí linky podle vypočtených souřadnic. 
    *   
    *   @param string[$color] barva linek
    *   @param string[$x] typ linek osy x
    *   @param string[$y] typ linek na ose y
    *   @return null
    */
    function paint_lines($color, $x = 'dashed', $y = 'dashed'  );
    
    /** 
    *   Body na osách X a Y
    *   Funkce přepočítá a vykreslí body na osách. Nejprve jsou podle parametrů dopočítány jednotlivé body a jejich souřadnice a poté vykresleny na osách. 
    *   
    *   @param string[$color] html kod barvy pro kresleni
    *   @param array[$x_titles] hodnoty na ose x
    *   @param array[$y_titles] hodnoty na ose y
    *   @return null
    */
    public function points_on_axes( $color = 'black', $x_titles = 'auto', $y_titles = 'auto' );
    
    /** 
    *   Vypočet hodnot pro popisky bodů na osách
    *   Funkce je volána z funkce points_on_axes a zjišťuje a přepočítává hodnoty popisků na osách. 
    *   
    *   pokud jsou bory moc blizko u sebe
    *   @param array[$x_titles] body na ose x
    *   @param array[$y_titles] body na ose y
    *   @return null
    */
    function _calculate_titles_values( & $x_titles, & $y_titles );
    
    /**
    *   Vykrelsení čáry s podporou antialisingu
    *   Funkce je volána vždy, když jepotřeba vykreslit čáru jako spojnici dvou bodů. Podle zapnuté nebo vypnuté podpory antialisingu vykreslí čáru. Funkce má identické parametry jako funkce ImageLine, kterou nahrazuje. 
    *   
    *   @param [$image] Obrázek do kterého je kresleno
    *   @param [$x1]    X1 souřadnice
    *   @param [$y1]    Y1 souřadnice
    *   @param [$x2]    X2 souřadnice
    *   @param [$y2]    Y2 souřadnice
    *   @param [$color] barva čáry
    *   @return null; 
    */
    // privatefunction paint_imageline( & $image , $x1 , $y1 , $x2 , $y2 , $color );
    
    /** 
    *   Vykreslení bodů na osách
    *   Funkce vykreslí body na osách X a Y. Funkce je volána s funkcí paint_points, která vykresluje popisky na osách.
    *   
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
    public function _paint_points( $move_up, $move_left, $section_x, $section_y, $size_x, $size_y, $color, $x_titles );
    
    /** 
    *   Šipky na konci os
    *   Funkce vykreslí šipku na pravé straně x-ové a horní straně y-ové osy
    *   
    *   @param int[$move_up] posun nahoru osy x
    *   @param int[$move_left] posun doprava, doleva osy y
    *   @param string[$color] html kod barvy pro kresleni           
    *   @return null
    */
    public function _paint_darts($move_up, $move_left, $color );
    
    /** 
    *   Legenda v grafu
    *   Funkce vykreslí legendu grafu dle zadaných parametrů. V závislosti na umístění legendy upravuje rozměry plochy pro graf
    *   
    *   @param  string[$position] pozice legendy
    *   @param  array[$legend] pole s hodnotami legendy
    *   @param  string[$bgcolor] kod barvy pro pozadi
    *   @param  string[$border] kod barvy pro ramecek
    *   @param  string[$text] kod barvy pro text legendy
    *   @return null
    */
    public function legend( $position = 'topright', $legend = array(), $bgcolor = 'white', $border = 'black', $text = 'black');
    
    /** 
    *   Přepočet souřadnic linek pro graf typu COLUMN
    *   Funkce přepočítá souřadnice pro linky grafu u grafu typu COLUMN. U tohoto typu se vykreslují pouze linky rovnoběžné s osou X. 
    *   
    *   @param null
    *   @return null
    */
    // privatefunction _calculate_lines_column();
    
    /**
    *   Přepočet hodnot
    *   Funkce přepočítá hodnoty pro graf před jeho vykreslením pro podstavu. 
    *   
    *   @param null
    *   @return null
    */
    // privatefunction _column_graph_calculate_lines();
    
    /**
    *   Popisky u grafu typu COLUMN
    *   Funkce vykreslí popisky u sloupcového grafu nad jednotlivými sloupci
    *   
    *   @param array[$x_titles] hodnoty pro popisky
    *   @return null
    */
    // privatefunction _column_titles_x( $x_titles );
    
    /**
    *   Vykreslení grafu typu 3DCOLUMN
    *   Funkce vykresluje graf typu 3dcolumn podle předem vypočítaných hodnot. 
    *   @param int[$max]   vypočítaná hodnota maximálního počtu sloupců v jedné řadě.
    *   @return null
    */
    // privatefunction _paint_column_3d( $max );
    
    /**
    *   Vykreslení grafu typu 3DSUMCOLUMN
    *   Funkce vykresluje graf typu 3D sum column podle předem vypočítaných hodnot. 
    *   @param int[$max]   vypočítaná hodnota maximálního počtu sloupců v jedné řadě.
    *   @return null
    */
    // privatefunction _paint_column_3dsum( $max );
    
    /**
    *   Vykreslení grafu typu COLUMN
    *   Funkce vykresluje graf typu column podle předem vypočítaných hodnot. Pokud je typ grafu 3dcolumn nebo 3dsumcolun, jsou volány jiné funkce. 
    *   
    *   @param null
    *   @return null
    */
    public function _paint_column_graph();
    
    /**
    *   Výpis chybových hlášení
    *   Funkce vykreslí obrázek s chybovým hlášením uvedeným jako parametr
    *   
    *   @param string[$input_string] text chybového hlášení
    *   @return null
    */
    function _error_handle( $input_string );
    
    /**
    *   Přepočet hodnot pro grafy typu PIE
    *   Funkce vypočítá velikosti úhlů a počáteční body u jednotlivých výřezů koláčových grafů. 
    *   
    *   @param null
    *   @return null
    */
    function _calculate_pie_graph();
    
    /**
    *   Vykrelsení popisků v grafu typu PIE
    *   Funkce vykresluje popisky přímo v jednotlivých výřezech grafu typu PIE. Legenda u grafu může být vykreslena funkcí paint_legend
    *
    *   @param string[$legend]  legenda u zpracovávaného výřezu
    *   @return null
    */      
    function _paint_pie_legned( $legend );
    
    /**
    *   Vykreslení koláčového grafu
    *   Funkce vykresluje posutpně jednotlivé části koláčového grafu. Vykresluje jak 2D tak 3D graf
    *   
    *   @param null
    *   @return null
    */
    // privatefunction _pie_graph();
    
    /**
    *   Vykreslení prázdného prostoru u typu PIEHOLE
    *   Funkce vykreslí pomocí funkce ImageFilledArc prázdný prostor uprostřed koláčového grafu. Funkce je volána pro jednotlivé části postupně, protože mohou být některé části vysunuté a tím pádem není kruh soustředný
    *   
    *   @param int[$i] číslo výřezu
    *   @return null
    */
    function _pie_hole( $i );
}
?>
