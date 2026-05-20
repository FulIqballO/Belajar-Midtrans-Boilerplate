<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        $payment = $order->payments->last();
        $snap_token = '';

        if ($payment == null || $payment->status != 'paid') {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
        
        // dd($order);
        $transaction_details = array(
            'order_id' => $order->invoice_number,
            'gross_amount' => $order->gross_amount,
        );

        $customer_details = array(
            'first_name' => $order->user->name,
            'last_name' => "",
            'email' => $order->user->email,
            'phone' => "",
         
         );

         $item_details = [];
            foreach ($order->orderDetails as $detail) {
                $item_details[] = [
                    'id' => $detail->product_id,
                    'price' => $detail->price,
                    'quantity' => $detail->quantity,
                    'name' => $detail->product->name,   
                ];
            }

            $transaction = array(
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
            );
                 
            try {
                $snap_token = \Midtrans\Snap::getSnapToken($transaction);
                Payment::updateOrCreate(
                    ['order_id' => $order->id], 
                    [
                        'amount' => $order->gross_amount,
                        'status' => 'pending',
                        'snap_token' => $snap_token,
                     ]
                    );
            }
            catch (\Exception $e) {
                echo $e->getMessage();
            }

            echo "snapToken = ".$snap_token;
        }
    
        return view('orders.show', compact('order', 'snap_token'));
    }

}

