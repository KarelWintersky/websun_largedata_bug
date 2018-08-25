<?php
/**
 * User: Arris
 * Date: 13.08.2018, time: 15:23
 */
require_once 'data/core.php';
require_once 'data/websun.php';
$GLOBAL_DATA = preload_data('data/mock_data.json');

$get_limit = intval($_GET['limit'] ?? 0 );

$authors_list = Load_Data($get_limit);
$authors_count = count($authors_list);

if (count($authors_list) < $get_limit) {

    for ($i=0; $i<$get_limit-$authors_count; $i++) {
        $authors_list[] = $authors_list[ rand(1, $authors_count) ];
    }

}

$template_dir = "templates/";
$template_file_name = "no_if.html";
$inner_html_data = [
    'all_authors_count'     => count($authors_list),
    'all_authors_list'      => $authors_list
];

$return = websun_parse_template_path($inner_html_data, $template_file_name, $template_dir);

echo "Elements count : {$get_limit}, used template `{$template_file_name}` <hr>" . PHP_EOL;

echo $return;



printf("\r\n<hr>Total time: %s sec, Memory Used (current): %s , Memory Used (max): %s ", round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 4), formatBytes(memory_get_usage()), formatBytes(memory_get_peak_usage()));
