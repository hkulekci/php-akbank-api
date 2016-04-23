<?php
/**
 * Akbank API Client
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI;

use AkbankAPI\Endpoints\CreditInterestRates;
use AkbankAPI\Endpoints\CreditPaymentPlan;
use AkbankAPI\Endpoints\ExchangeRatesService;
use AkbankAPI\Endpoints\FindATMService;
use AkbankAPI\Endpoints\FindBranchService;
use AkbankAPI\Endpoints\FundPricesService;
use AkbankAPI\Endpoints\StockValues;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected $client  = null;
    protected $headers = [];

    public function __construct($url = 'https://apigate.akbank.com.tr/api')
    {
        $this->client = new GuzzleClient([
            'base_uri'     => $url,
            'timeout'      => 10.0,
            'curl.options' => array(
                'CURLOPT_SSLVERSION' => 1,
            )
        ]);
        $this->headers['Content-Type'] = 'application/json';
    }

    public function setApiKey($apiKey)
    {
        $this->headers['apikey'] = $apiKey;
    }

    /**
     * @param  Requestable  $endpoint
     * @return array
     */
    public function makeRequest($method, Requestable $endpoint)
    {
        $options         = [];
        $queryParameters = $endpoint->getQueryParameters();
        if (!empty($queryParameters)) {
            $options['query'] = $queryParameters;
        }

        $postData = $endpoint->getRawData();
        if (!empty($postData)) {
            $options['body'] = $postData;
        }

        if (!empty($this->headers)) {
            $options['headers'] = $this->headers;
        }

        $response = $this->client->request(
            $method,
            $endpoint->getPath(),
            $options
        );
        $res = json_decode((string) $response->getBody(), true);

        return new \AkbankAPI\Response($res);
    }

    /**
     * @param  string  $creditType
     * @return array
     */
    public function getCreditInterestRate($creditType)
    {
        $endpoint = new CreditInterestRates($creditType);

        return $this->makeRequest('GET', $endpoint);
    }

    /**
     * @return array
     */
    public function getCreditPaymentPlan(
        $bsmv,
        $interest,
        $kkdf,
        $loanStartDate,
        $loanUsingDate,
        $loanAmount,
        $expenseAmount,
        $term
    ) {
        $endpoint = new CreditPaymentPlan(
            $bsmv,
            $interest,
            $kkdf,
            $loanStartDate,
            $loanUsingDate,
            $loanAmount,
            $expenseAmount,
            $term
        );

        return $this->makeRequest('POST', $endpoint);
    }

    public function getExchangeRatesService($date = null, $currencyCode = null)
    {
        $endpoint = new ExchangeRatesService($date, $currencyCode);

        return $this->makeRequest('GET', $endpoint);
    }

    public function getFindATMService(
        $latitude,
        $longitude,
        $radius,
        $city = null,
        $district = null,
        $searchText = null
    ) {
        $endpoint = new FindATMService($latitude, $longitude, $radius, $city, $district, $searchText);

        return $this->makeRequest('POST', $endpoint);
    }

    public function getFindBranchService(
        $latitude,
        $longitude,
        $radius,
        $city = null,
        $district = null,
        $searchText = null
    ) {
        $endpoint = new FindBranchService($latitude, $longitude, $radius, $city, $district, $searchText);

        return $this->makeRequest('POST', $endpoint);
    }

    public function getFundPricesService($fundType)
    {
        $endpoint = new FundPricesService($fundType);

        return $this->makeRequest('GET', $endpoint);
    }

    public function getStockValues($symbol)
    {
        $endpoint = new StockValues($symbol);

        return $this->makeRequest('GET', $endpoint);
    }
}
