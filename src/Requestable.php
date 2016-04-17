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
    public function getPath();
    public function getQueryParameters();
    public function getPostData();
}
