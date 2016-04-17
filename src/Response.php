<?php
/**
 * Akbank API Client
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI;

class Response
{
    protected $returnCode = null;
    protected $returnMsg  = null;
    protected $data       = null;

    /**
     * @param  array|string  $rawData
     */
    public function __construct($rawData)
    {
        if (is_string()) {
            $rawData = json_decode($rawData, true);
        }

        if (isset($rawData['returnMsg'])) {
            $this->returnMsg = $rawData['returnMsg'];
        }
        if (isset($rawData['returnCode'])) {
            $this->returnCode = $rawData['returnCode'];
        }
        if (isset($rawData['data'])) {
            $this->data = $rawData['data'];
        }
    }

    /**
     * @return bool
     */
    public function isOk()
    {
        return $this->returnCode == 'API-00000';
    }

    /**
     * @return string
     */
    public function getReturnCode()
    {
        $this->returnCode;
    }

    /**
     * @return string
     */
    public function getReturnMessage()
    {
        $this->returnMsg;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
