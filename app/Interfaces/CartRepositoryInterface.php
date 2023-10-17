<?php

namespace App\Interfaces;

interface CartRepositoryInterface
{
    public function saveCartItems($cartDetails);
    public function getCartItems();
    public function updateCartItems($cartDetails);
    public function deleteCartItem($cartId);
}