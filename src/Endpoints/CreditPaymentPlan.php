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

class CreditPaymentPlan implements Requestable
{
    protected $path = 'creditPaymentPlan';

    protected $bsmv;
    protected $interest;
    protected $kkdf;
    protected $loanStartDate;
    protected $loanUsingDate;
    protected $loanAmount;
    protected $expenseAmount;
    protected $term;

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

    public function getRawData()
    {
        return json_encode([
            'bsmv'          => $this->bsmv,
            'interest'      => $this->interest,
            'kkdf'          => $this->kkdf,
            'loanStartDate' => $this->loanStartDate,
            'loanUsingDate' => $this->loanUsingDate,
            'loanAmount'    => $this->loanAmount,
            'expenseAmount' => $this->expenseAmount,
            'term'          => $this->term,
        ]);
    }

    public function getQueryParameters()
    {
        return [];
    }
}
