<?php
/**
 * Akbank API Client
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI;

interface Requestable
{
    /**
     * @return string
     */
    public function getPath();
    
    /**
     * @return array
     */
    public function getQueryParameters();

    /**
     * @return string
     */
    public function getRawData();
}
