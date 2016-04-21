<?php
/**
 * Akbank API Client
 * Exchange Rates Service Class
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI\Endpoints;

use AkbankAPI\Requestable;

class ExchangeRatesService implements Requestable
{
    protected $path = 'exchangeRatesApi';

    protected $date;
    protected $currencyCode;

    public function __construct(
        $date,
        $currencyCode = null
    ) {
        $this->date          = $date;
        $this->currencyCode  = $currencyCode;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getRawData()
    {
        return "";
    }

    public function getQueryParameters()
    {
        $params = [];

        if (!empty($this->currencyCode)) {
            $params['currencyCode'] = $this->currencyCode;
        }
        if (!empty($this->date)) {
            $params['date'] = $this->date;
        }

        return $params;
    }
}
