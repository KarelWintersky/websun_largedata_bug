<?php
/**
 * User: Arris
 * Date: 13.08.2018, time: 15:19
 */
require_once 'data/core.php';
$GLOBAL_DATA = preload_data('data/mock_data.json');

$get_limit = intval($_GET['limit'] ?? 0 );

$authors_list = Load_Data($get_limit);

echo '<pre>';

var_dump($authors_list);

printf("\r\n<hr>Total time: %s sec, Memory Used (current): %s , Memory Used (max): %s ", round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 4), formatBytes(memory_get_usage()), formatBytes(memory_get_peak_usage()));
