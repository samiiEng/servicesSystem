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
        //Take a look if there was a custom service set for this service between the server and the client.

        $customService = CustomService::where("service_ref_id", $request['service'])->where("is_used", 1)->where("customer_ref_id", Auth::id())->get();

        Order::create([
            "service_ref_id" => $request['service'],
            "custom_service_ref_id" => $customService,
            "is_cash" => $request['radio'],
        ]);

    }
}
