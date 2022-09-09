<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Installment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $validated = $this->validate($request,
            [
                "details" => "required|string",
                "cost" => "required|string",
                "categoryID" => "required|integer",
                "installmentID" => "required|integer",
            ]);

        Service::create([
            "category_ref_id" => $validated['categoryID'],
            "installment_ref_id" => $validated['installmentID'],
            "user_ref_id" => Auth::id(),
            "cost" => $validated['cost'],
            "details" => $validated['details']
        ]);

    }

    public function findService()
    {
        $categories = DB::select("SELECT * FROM categories");
        $finalCategories = [];
        $parents = [];

        foreach ($categories as $category) {
            if (!$category->parent_ref_id)
                $parents[] = $category;
        }

        foreach ($parents as $parent) {
            $i = true;
            foreach ($categories as $category) {
                if ($i) {
                    $finalCategories[$parent->parent_ref_id][] = $parent;
                    $i = false;
                } else if ($category->parent_ref_id == $parent->category_id) {
                    $finalCategories[$parent->parent_ref_id][] = $category;
                }
            }
        }

        return view('findService', compact('finalCategories'));

    }

    public function findServiceResult(Request $request)
    {
        $categories = DB::select("SELECT * FROM categories");
        $finalCategories = [];
        $parents = [];

        foreach ($categories as $category) {
            if (!$category->parent_ref_id)
                $parents[] = $category;
        }

        foreach ($parents as $parent) {
            $i = true;
            foreach ($categories as $category) {
                if ($i) {
                    $finalCategories[$parent->parent_ref_id][] = $parent;
                    $i = false;
                } else if ($category->parent_ref_id == $parent->category_id) {
                    $finalCategories[$parent->parent_ref_id][] = $category;
                }
            }
        }

        $services = Service::where("service_id", $request['serviceID'])->get();
        return view('defineService', compact('services', 'finalCategories'));
    }

}
