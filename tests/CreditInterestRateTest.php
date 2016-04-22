<?php
namespace tests;

class CreditInterestRateTest extends \PHPUnit_Framework_TestCase
{
    protected $apiClient;
    
    protected function setUp()
    {
        if (!isset($_ENV['apikey'])) {
            $this->fail('ApiKey is required at $_ENV');
        }
        $this->apiClient = new \AkbankAPI\Client('https://apigate.akbank.com/api/mock/');
        $this->apiClient->setApikey($_ENV['apikey']);
    }

    public function testResponse()
    {
        $response = $this->apiClient->getCreditInterestRate(
            \AkbankAPI\Endpoints\CreditInterestRates::CREDIT_TYPE_CONSUMER_LOAN
        );
        $this->assertTrue($response->isOk());
        $this->assertArrayHasKey('applicationStartDate', $response->getData());
    }
}
