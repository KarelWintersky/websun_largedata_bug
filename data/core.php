<?php
/**
 * User: Arris
 * Date: 13.08.2018, time: 15:46
 */
 
$GLOBAL_DATA = [];

function pcre_jit_disable(){
    ini_set('pcre.jit', 0);
}

function pcre_jit_enable(){
    ini_set('pcre.jit', 1);
}

function preload_data($filename)
{
    $file_content = file_get_contents($filename);
    $file_data = json_decode($file_content, true);

    $result = [];

    foreach ($file_data as $item) {
        $result[ $item['id']] = $item;
    }

    return $result;
}

function Load_Data($limit)
{
    global $GLOBAL_DATA;

    $chunksize = ($limit == 0) ? count($GLOBAL_DATA) : $limit;

    $data = array_chunk($GLOBAL_DATA, $chunksize, true)[0];

    return $data;
}

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= pow(1024, $pow);

    return round($bytes, $precision) . ' ' . $units[$pow];
}
