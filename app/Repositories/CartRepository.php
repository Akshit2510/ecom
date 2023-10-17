<?php

namespace App\Repositories;

use App\Interfaces\CartRepositoryInterface;
use App\Models\Cart;

class CartRepository implements CartRepositoryInterface
{
    public function saveCartItems($cartDetails)
    {        
        $item = new Cart();
        $item->quantity = $cartDetails->quantity;
        $item->productId = $cartDetails->id;
        $item->customerId = session()->get('id');
        $item->save();
        return $item;
    }

    public function getCartItems()
    {
        return Cart::with('product')->where('customerId',session()->get('id'))->get();
    }
    
    public function updateCartItems($cartDetails)
    {
        return Cart::where([['id',$cartDetails->id],['customerId',session()->get('id')]])->update([
            'quantity' => $cartDetails->quantity
        ]);
    }
    
    public function deleteCartItem($cartId)
    {
        $cartItem = Cart::where([['id',$cartId],['customerId',session()->get('id')]])->first();
        return $cartItem->delete();
    }
}
