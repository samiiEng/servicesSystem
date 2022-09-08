<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function order(Request $request)
    {
        //Take a look if there was a custom service set for this service between the server and the client.

        Order::create([
            "" => $request[''],
            "" => $request[''],
            "" => $request[''],
            "" => $request[''],
            "" => $request[''],
        ]);

    }
}
