<?php


namespace App\Buy\Billing;


class ZarinPal implements Buy
{
    private $type;
    protected $discount = 0;
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function discount($number)
    {
        $this->discount = $number;
    }
    public function price($price)
    {
        return [
            'Type' => $this->type,
            'Price' => $price,
            'Discount' => $this->discount,
            'Next discount' => $price - $this->discount,
        ];
    }
}
