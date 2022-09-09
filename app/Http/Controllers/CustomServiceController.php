<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CustomService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomServiceController extends Controller
{
    public function defineCustomServiceForm()
    {

        //Getting the name and description of all defined services by this user
        $services = Service::all();
        $categories = Category::all();
        foreach ($services as $service) {
            foreach ($categories as $category) {
                if ($service['category_ref_id'] == $category['category_id']
                    && $service['user_ref_id'] == Auth::id()) {
                    $finalServices[] = [$category['name'], $service];
                }
            }
        }

        return view('defineCustomService', compact('finalServices'));
    }

    public function defineCustomService(Request $request)
    {
        $validated = $this->validate($request, [
           "serviceID" => "required|integer",
            "serverID" => "required|integer",
            "customerID" => "required|integer",
            "details" => "required|string",
            "cost" => "required|string",
            "installment" => "required|string"
        ]);

        CustomService::create([
           "service_ref_id" => $validated['serviceID'],
           "server_ref_id" => $validated['serverID'],
           "customer_ref_id" => $validated['customerID'],
           "details" => $validated['details'],
           "cost" => $validated['cost'],
           "installment_details" => $validated['instalment']
        ]);

    }
}
