<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Installment;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function defineService()
    {
        $categories = Category::all();
        $installments = Installment::all();
        return view('defineServices', compact('categories', 'installments'));
    }

    public function storeService(Request $request)
    {
        $validated = $this->validate($request->only(['details', 'cost', 'categoryID', 'installmentID']),
        [
            "details" => "required|string",
            "cost" => "required|string",
            "category_ref_id" => "required|integer",
            "installment_ref_id" => "required|integer",
        ]);

        Service::create([
            "category_id" => $validated['categoryID'],
            "installment_id" => $validated['installmentID'],
            "cost" => $validated['cost'],
            "details" => $validated['details']
        ]);

    }

    public function filterServices()
    {

    }

}
