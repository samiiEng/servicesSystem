<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Installment;
use App\Models\Service;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function defineInstallment()
    {
        $services = [];
        $ids = Service::all('service_id');
        foreach ($ids as $id) {
            $name = Category::where("category_id", $id)->get('name');
            $services[$id] = $name;
        }
        return view('defineInstallment', $services);
    }

    public function storeInstallment(Request $request)
    {
        $validated = $this->validate($request, [
            "name" => $request['name'],
            "serviceID" => $request['serviceID'],
            "details" => $request['details'],
        ]);

        Installment::create([
            "name" => $validated['name'],
            "service_ref_id" => $validated['serviceID'],
            "details" => $validated['details']
        ]);
    }
}
