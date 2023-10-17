<?php

namespace App\Interfaces;

interface OrderRepositoryInterface
{
    public function orderItems($orderDetails);
}