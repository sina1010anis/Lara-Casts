<?php


namespace App\Buy\Order;


use App\Buy\Billing\Buy;
use App\Buy\Billing\Paypal;
use App\Buy\Billing\ZarinPal;

class order
{
    protected $data;
    public function __construct(Buy $paypal)
    {
        $this->data = $paypal;
    }
    public function setDiscount($number)
    {
        $this->data->discount($number);
    }
}
