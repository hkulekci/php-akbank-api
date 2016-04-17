<?php
/**
 * Akbank API Client
 * Credit Payment Plan Class
 *
 * @since     Apr 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace AkbankAPI\Endpoints;

use AkbankAPI\Requestable;
use GuzzleHttp\Client;

class CreditPaymentPlan implements Requestable
{
    protected $path       = 'creditPaymentPlan';

    protected $bsmv          = null;
    protected $interest      = null;
    protected $kkdf          = null;
    protected $loanStartDate = null;
    protected $loanUsingDate = null;
    protected $loanAmount    = null;
    protected $expenseAmount = null;
    protected $term          = null;

    public function __construct(
        $bsmv,
        $interest,
        $kkdf,
        $loanStartDate,
        $loanUsingDate,
        $loanAmount,
        $expenseAmount,
        $term
    ) {
        $this->bsmv          = $bsmv;
        $this->interest      = $interest;
        $this->kkdf          = $kkdf;
        $this->loanStartDate = $loanStartDate;
        $this->loanUsingDate = $loanUsingDate;
        $this->loanAmount    = $loanAmount;
        $this->expenseAmount = $expenseAmount;
        $this->term          = $term;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getPostData()
    {
        return [
            'bsmv'          => $this->bsmv,
            'interest'      => $this->interest,
            'kkdf'          => $this->kkdf,
            'loanStartDate' => $this->loanStartDate,
            'loanUsingDate' => $this->loanUsingDate,
            'loanAmount'    => $this->loanAmount,
            'expenseAmount' => $this->expenseAmount,
            'term'          => $this->term,
        ];
    }

    public function getQueryParameters()
    {
        return [];
    }
}
