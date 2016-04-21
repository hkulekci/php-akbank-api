<?php
/**
 * Akbank API Client
 * Fund Prices Service Class
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI\Endpoints;

use AkbankAPI\Requestable;

class FundPricesService implements Requestable
{
    const FUND_TYPE_A = 'A';
    const FUND_TYPE_B = 'B';
    const FUND_TYPE_T = 'T';

    protected $path = 'fundPrices';

    protected $fundType;

    public function __construct($fundType)
    {
        $this->fundType   = $fundType;
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
            'fundType' => $this->fundType,
        ];
    }

    public static function getAvailableFundTypes()
    {
        return [
            self::FUND_TYPE_A => 'Type A',
            self::FUND_TYPE_B => 'Type B',
            self::FUND_TYPE_T => 'ALL',
        ];
    }
}
