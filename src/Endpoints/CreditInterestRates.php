<?php
/**
 * Akbank API Client
 * Credit Interest Rates Class
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI\Endpoints;

use AkbankAPI\Requestable;
use GuzzleHttp\Client;

class CreditInterestRates implements Requestable
{
    const CREDIT_TYPE_CONSUMER_LOAN = 'I';
    const CREDIT_TYPE_MORTGAGE_LOAN = 'K';
    const CREDIT_TYPE_CAR_LOAN      = 'T';

    protected $path       = 'creditInterestRates';
    protected $creditType = null;

    public function __construct($creditType)
    {
        $creditTypes = self::getAvailableCreditTypes();
        if (!isset($creditTypes[$creditType])) {
            throw new \Exception("Invalid credit type", 406);
        }
        $this->creditType = $creditType;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getQueryParameters()
    {
        return [
            'creditType' => $this->creditType,
        ];
    }

    public function getPostData()
    {
        return [];
    }

    public static function getAvailableCreditTypes()
    {
        return [
            self::CREDIT_TYPE_CONSUMER_LOAN => 'Consumer Loan',
            self::CREDIT_TYPE_MORTGAGE_LOAN => 'Mortgage Loan',
            self::CREDIT_TYPE_CAR_LOAN      => 'Car Loan',
        ];
    }
}
