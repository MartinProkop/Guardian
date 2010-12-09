<?php
function format_size($size, $round = 0) {
    //Size must be bytes!
    $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    for ($i=0; $size > 1024 && $i < count($sizes) - 1; $i++) $size /= 1024;
    return round($size,$round)." ".$sizes[$i];
}



function nova_slozka($cesta, $nazev) {
    mkdir ("./".$cesta.$nazev."/", 0777);

}

function create_zip($files = array(),$local_files = array(),$destination = '') {
    $zip = new ZipArchive();
    if(!$zip->open($destination,ZipArchive::CREATE)) {
        return false;
        echo "chyba";
    }   $i = 0;
        for($i;$i<count($files);$i++) {
            $zip->addFile($files[$i],$local_files[$i]);
        }
        $zip->close();
        echo "Y";
        if(file_exists($destination)) echo "X";

        return file_exists($destination);
    }
?>