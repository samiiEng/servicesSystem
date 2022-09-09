<?php

namespace App\Http\Controllers;

use App\Models\CustomService;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function order(Request $request)
    {

        Order::create([
            "service_ref_id" => $request['service'],
            "is_cash" => $request['paymentType'],
        ]);

    }
}
