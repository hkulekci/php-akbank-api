# PHP Client For Akbank API 

You can easily connect to Akbank API Client with PHP. Example:

```php
<?php
require_once '../vendor/autoload.php';

define('API_KEY', '....');

$apiClient = new \AkbankAPI\Client('https://apigate.akbank.com/api/mock/');
$apiClient->setApikey(API_KEY);

// TEST 1
$response = $apiClient->getCreditInterestRate(
     \AkbankAPI\Endpoints\CreditInterestRates::CREDIT_TYPE_CONSUMER_LOAN
);
var_dump($response->isOk());
var_dump($response->getReturnCode());
var_dump($response->getReturnMessage());
var_dump($response->getData());
```

For more example you can check the tests.

API Documentation : https://apiportal.akbank.com/documentation
Client Documentation : Soon!