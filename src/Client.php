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
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected $client  = null;
    protected $headers = [];

    public function __construct($url = 'https://apigate.akbank.com.tr/api')
    {
        $this->client = new GuzzleClient([
            'base_uri' => $url,
            'timeout'  => 2.0,
        ]);
        $this->headers[] = ['Content-Type' => 'application/json'];
    }

    public function setApiKey($apiKey)
    {
        $this->headers[] = ['apikey' => $apiKey];
    }

    /**
     * @param  Requestable  $endpoint
     * @return array
     */
    public function makeRequest($method, Requestable $endpoint)
    {
        $options         = [];
        $queryParameters = $endpoint->getQueryParameters();
        if ($queryParameters) {
            $options['query'] = $queryParameters;
        }

        $postData = $endpoint->getPostData();
        if ($postData) {
            $options['form_params'] = $postData;
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
     * @param  string  $creditType
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
}
