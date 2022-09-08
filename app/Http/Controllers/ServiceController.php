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

    public function findService()
    {
        $categories = Category::all();
        $parents = [];
        foreach ($categories as $category) {
            if (!$category['parent_ref_id'])
                $parents[] = $category;
        }

        foreach ($parents as $parent) {
            $i = true;
            foreach ($categories as $category) {
                if ($i) {
                    $categories[$parent['parent_ref_id']][] = $parent;
                    $i = false;
                }
                if ($category['parent_ref_id'] == $parent['parent_ref_id'])
                    $categories[$parent['parent_ref_id']][] = $category;
            }
        }
        return view('findService', compact('categories'));

    }

    public function findServiceResult(Request $request)
    {
        $services = Service::where("service_id", $request['serviceID'])->get();
        return view('defineService', compact('services'));
    }

}
