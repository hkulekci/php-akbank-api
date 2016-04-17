<?php
require_once '../vendor/autoload.php';
require_once 'config.php';

$apiClient = new \AkbankAPI\Client('https://apigate.akbank.com/api/mock/');
$apiClient->setApikey(API_KEY);

try {
    $response = $apiClient->getCreditInterestRate(\AkbankAPI\Endpoints\CreditInterestRates::CREDIT_TYPE_CONSUMER_LOAN);
} catch (\Exception $e) {
    echo ' - ERROR - ' . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL. PHP_EOL;

try {
    $response = $apiClient->getCreditPaymentPlan(
        '1',
        '21',
        '2',
        '2015-04-04',
        '2017-01-01',
        '100',
        '122',
        '24'
        );
} catch (\Exception $e) {
    echo ' - ERROR - ' . $e->getMessage() . PHP_EOL;
}
