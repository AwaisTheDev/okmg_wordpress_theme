<?php

require dirname(__FILE__, 2) . '/vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName("Google Sheets API");
$scope = [
    'https://spreadsheets.google.com/feeds',
    'https://www.googleapis.com/auth/drive',
];
$spreadsheetId = '1OtveZz_gFxLvSFVUtgewliHkchE8hMxidnWwbAe6rcQ';
$range = 'Sheet1';

$client->setScopes($scope);
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

$path_to_credentials = dirname(__FILE__, 2) . '/lib/credentials.json';
$client->setAuthConfig($path_to_credentials);

$service = new Google_Service_Sheets($client);

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

$result = false;
try {
    $result = $service->spreadsheets_values->append(
        $spreadsheetId,
        $range,
        $body,
        $params
    );
    if ($result) {
        echo 'success';
    }
} catch (Exception $e) {
    echo 'failed';
}
