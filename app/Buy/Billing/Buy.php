<?php

namespace App\Buy\Billing;

interface Buy
{
    public function discount($number);

    public function price($price);
}
