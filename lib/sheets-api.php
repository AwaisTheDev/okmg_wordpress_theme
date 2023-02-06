<?php
require dirname(__FILE__, 2) . '/vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName("Google Sheets API");
$scope = [
    'https://spreadsheets.google.com/feeds',
    'https://www.googleapis.com/auth/drive',
];
$client->setScopes($scope);

$client->setAccessType('offline');
$client->setPrompt('select_account consent');

$path_to_JSON = dirname(__FILE__, 2) . '/lib/credentials.json';
$client->setAuthConfig($path_to_JSON);

$service = new Google_Service_Sheets($client);
$spreadsheetId = '1OtveZz_gFxLvSFVUtgewliHkchE8hMxidnWwbAe6rcQ';
$range = 'Sheet1';

$final_data = array();

//var_dump($_POST);

foreach ($_POST['formData'] as $data) {
    array_push($final_data, $data['value']);
}

$values = [
    $final_data,
];

$body = new Google_Service_Sheets_ValueRange([
    'values' => $values,
]);
$params = [
    'valueInputOption' => 'RAW',
];

$insert = [
    'insertDataOption' => 'INSERT_ROWS',
];
$result = $service->spreadsheets_values->append(
    $spreadsheetId,
    $range,
    $body,
    $params
);
