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
        if (is_string($rawData)) {
            $rawData = json_decode($rawData, true);
        }

        // For Message
        if (isset($rawData['returnMsg'])) {
            $this->returnMsg = $rawData['returnMsg'];
        }
        if (isset($rawData['resultMessage'])) {
            $this->returnMsg = $rawData['resultMessage'];
        }

        // For Code
        if (isset($rawData['returnCode'])) {
            $this->returnCode = $rawData['returnCode'];
        }
        if (isset($rawData['resultCode'])) {
            $this->returnCode = $rawData['resultCode'];
        }

        // For Data
        if (isset($rawData['data'])) {
            $this->data = $rawData['data'];
        }
    }

    /**
     * @return bool
     */
    public function isOk()
    {
        return $this->returnCode == 'API-00000' || $this->returnCode == '00' || $this->returnCode == '';
    }

    /**
     * @return string
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @return string
     */
    public function getReturnMessage()
    {
        return $this->returnMsg;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
