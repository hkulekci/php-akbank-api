<?php
/**
 * Akbank API Client
 * Stock Values Class
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI\Endpoints;

use AkbankAPI\Requestable;

class StockValues implements Requestable
{
    protected $path = 'stockValues';

    protected $symbol;

    public function __construct($symbol)
    {
        $this->symbol   = $symbol;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getRawData()
    {
        return '';
    }

    public function getQueryParameters()
    {
        return [
            'symbol' => $this->symbol,
        ];
    }
}
