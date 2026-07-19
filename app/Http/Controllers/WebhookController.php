<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $notification = new Notification();

        $status = $notification->transaction_status;
        $orderId = $notification->order_id;

        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json([
                'message' => 'Transaction not found'
            ],404);
        }

        switch ($status) {

            case 'settlement':
            case 'capture':

                if($transaction->status != 'Success'){

                    $transaction->status = 'Success';
                    $transaction->save();

                    if($transaction->event->stock > 0){
                        $transaction->event->decrement('stock');
                    }

                }

                break;

            case 'pending':

                $transaction->status = 'Pending';
                $transaction->save();

                break;

            case 'expire':

                $transaction->status = 'Expired';
                $transaction->save();

                break;

            case 'cancel':
            case 'deny':

                $transaction->status = 'Failed';
                $transaction->save();

                break;
        }

        return response()->json([
            'message'=>'Webhook received'
        ]);
    }
}