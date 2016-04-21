<?php
/**
 * Akbank API Client
 * Find Branch Service Class
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI\Endpoints;

use AkbankAPI\Requestable;

class FindBranchService implements Requestable
{
    protected $path = 'findBranch';

    protected $latitude;
    protected $longitude;
    protected $radius;
    protected $city;
    protected $district;
    protected $searchText;

    public function __construct(
        $latitude,
        $longitude,
        $radius,
        $city = null,
        $district = null,
        $searchText = null
    ) {
        $this->latitude   = $latitude;
        $this->longitude  = $longitude;
        $this->radius     = $radius;
        $this->city       = $city;
        $this->district   = $district;
        $this->searchText = $searchText;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getRawData()
    {
        $params = [];

        $params['latitude']   = $this->latitude;
        $params['longitude']  = $this->longitude;
        $params['radius']     = $this->radius;
        $params['city']       = $this->city;
        $params['district']   = $this->district;
        $params['searchText'] = $this->searchText;

        return json_encode($params);
    }

    public function getQueryParameters()
    {
        return [];
    }
}
