<?php
ini_set('display_errors', 1);
require dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;
use GuzzleHttp\Client;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$devMode = false;
$dataDir = getenv('SEARCH_DATA_DIR_URL');

$client = new Client([
    'base_uri' => $dataDir
]);

function getJsonToArray($requestPath) {
    global $client;
    $response = $client->request('GET', $requestPath);
    $content = $response->getBody()->getContents();
    return json_decode($content, true);
}

function getTextToString($requestPath) {
    global $client;
    $response = $client->request('GET', $requestPath);
    $content = (string)$response->getBody()->getContents();
    return trim($content) . PHP_EOL;
}

// Get config.json
$config = getJsonToArray('config.json');
$jsonList = $config['json'];
$textList = $config['text'];

// Get JSON files
$allJsonItems = [];
foreach ($jsonList as $jsonFilePath) {
    $array = getJsonToArray($jsonFilePath);
    $allJsonItems += $array['items'];
}
$outputJsonPath = 'data/all.json';
file_put_contents($outputJsonPath, json_encode(['items' => $allJsonItems], JSON_UNESCAPED_UNICODE));

if ($devMode) {
    print_r($allJsonItems);
}
// Destroy a big variable for freeing memory, just in case.
unset($allJsonItems);

// Get text files
$allText = '';
foreach ($textList as $textFilePath) {
    print_r($textFilePath);
    $allText .= getTextToString($textFilePath);
    print_r($allText);
}
$outputTextPath = 'data/all.txt';
file_put_contents($outputTextPath, $allText);

if ($devMode) {
    print_r($allText);
}
exit();