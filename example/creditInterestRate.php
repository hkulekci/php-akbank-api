<?php
require_once '../vendor/autoload.php';
require_once 'config.php';

$apiClient = new \AkbankAPI\Client('https://apigate.akbank.com/api/mock/');
$apiClient->setApikey(API_KEY);

// TEST 1
// $response = $apiClient->getCreditInterestRate(
//      \AkbankAPI\Endpoints\CreditInterestRates::CREDIT_TYPE_CONSUMER_LOAN
// );
// var_dump($response->isOk());
// var_dump($response->getReturnCode());
// var_dump($response->getReturnMessage());
// var_dump($response->getData());

// TEST 2
// $response = $apiClient->getCreditPaymentPlan(
//     '1',
//     '21',
//     '2',
//     '2015-04-04',
//     '2017-01-01',
//     '100',
//     '122',
//     '24'
// );
// var_dump($response->isOk());
// var_dump($response->getReturnCode());
// var_dump($response->getReturnMessage());
// var_dump($response->getData());


// TEST 3
// $response = $apiClient->getExchangeRatesService(
//     '1',
//     '2017-01-01'
// );
// var_dump($response->isOk());
// var_dump($response->getReturnCode());
// var_dump($response->getReturnMessage());
// var_dump($response->getData());


// TEST 4
// $response = $apiClient->getFindATMService(
//     41.008238,
//     28.978359,
//     1000
// );
// var_dump($response->isOk());
// var_dump($response->getReturnCode());
// var_dump($response->getReturnMessage());
// var_dump($response->getData());


// // TEST 5
// $response = $apiClient->getFindBranchService(
//     41.008238,
//     28.978359,
//     1000
// );
// var_dump($response->isOk());
// var_dump($response->getReturnCode());
// var_dump($response->getReturnMessage());
// var_dump($response->getData());


// TEST 6
// $response = $apiClient->getFundPricesService(\AkbankAPI\Endpoints\FundPricesService::FUND_TYPE_A);
// var_dump($response->isOk());
// var_dump($response->getReturnCode());
// var_dump($response->getReturnMessage());
// var_dump($response->getData());


// TEST 7
// $response = $apiClient->getStockValues('AKBNK');
// var_dump($response->isOk());
// var_dump($response->getReturnCode());
// var_dump($response->getReturnMessage());
// var_dump($response->getData());

