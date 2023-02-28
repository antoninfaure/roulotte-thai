<?php

require __DIR__ . '/vendor/autoload.php';

$spreadsheetId = "1iRECJLE8_US56uhss6-hGuBP5q86USOH6e0YPs_YtBs";

function getClient()
{
  $client = new Google_Client();
  $client->setApplicationName('roulotte-thai');
  $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
  $client->setAuthConfig(__DIR__ . '/credentials.json');
  $client->setAccessType('offline');
  $service = new Google_Service_Sheets($client);
  return $service;
}

function insertData($range = 'ORDERS', array $data = [])
{
  // Get the API client and construct the service object.
  $service = getClient();
  $spreadsheetId = "1iRECJLE8_US56uhss6-hGuBP5q86USOH6e0YPs_YtBs";

  $valueRange = new Google_Service_Sheets_ValueRange();
  $valueRange->setValues([$data]);
  $options = ['valueInputOption' => 'RAW'];
  $service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $options);
}

date_default_timezone_set('Europe/Zurich');

$name = htmlspecialchars($_POST["name"],ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"],ENT_QUOTES, "UTF-8");
$phone = htmlspecialchars($_POST["phone"],ENT_QUOTES, "UTF-8");
$message = htmlspecialchars($_POST["message"],ENT_QUOTES, "UTF-8");
$order = htmlspecialchars($_POST["order"],ENT_QUOTES, "UTF-8");

$data = [date("j/m/Y G:i", time()),$name, $email, $phone, $message, $order];
insertData('ORDERS', $data);