<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handleCallBack(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $orderId = $notif->order_id;

        $order = Order::where('invoice_number', $orderId)->first();

        if (!$order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        }

        if ($transaction == 'capture') {

            if ($fraud == 'accept') {
                $this->updateOrderStatus($order, 'paid', $notif);
            }

        } elseif ($transaction == 'cancel') {

            $this->updateOrderStatus($order, 'canceled', $notif);

        } elseif ($transaction == 'deny') {

            $this->updateOrderStatus($order, 'failed', $notif);

        } elseif ($transaction == 'settlement') {

            $this->updateOrderStatus($order, 'paid', $notif);

        }

        return response()->json([
            'message' => 'Notification handled'
        ]);
    }

    protected function updateOrderStatus(Order $order, string $status, $notif)
    {
        $order->update([
            'status' => $status
        ]);

        Payment::updateOrCreate(
            [
                'order_id' => $order->id
            ],
            [
                'amount' => $notif->gross_amount,
                'status' => $status,
                'payment_date' => $status == 'paid' ? now() : null,
            ]
        );
    }
}