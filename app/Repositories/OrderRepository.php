<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class OrderRepository implements OrderRepositoryInterface
{
    public function orderItems($orderDetails)
    {
        DB::beginTransaction();
        try{
            $order = new Order();
            $order->status = "pending";        
            $order->customerId = session()->get('id');
            $order->fullname = $orderDetails->fullname;
            $order->bill = $orderDetails->bill;
            $order->address = $orderDetails->address;
            $order->phone = $orderDetails->phone;
            if($order->save()){
                $carts = new CartRepository();
                $cartData = $carts->getCartItems();
                foreach($cartData as $item){
                    $orderItem = new OrderItem();
                    $orderItem->productId = $item->productId;
                    $orderItem->quantity = $item->quantity;
                    $orderItem->price = $item->product->price;
                    $orderItem->orderId = $order->id;
                    $orderItem->save();
                    $item->delete();
                }
            }          
            DB::commit(); // Save into database
            return $order;
        }
        catch (\Exception $e) {
            DB::rollback(); // Rollback the transaction if an exception occurs
            return $e->getMessage();
        }

        
    }
}
