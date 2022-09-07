<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        try {
            $this->authorize('isAdmin');
        } catch (AuthorizationException $e) {
            return response("You're not an administrator therefore have not access to this page.<br>");
        }

    }

    public function defineCategories()
    {
        $categories = Category::all();
        return view('defineCategories', compact('categories'));
    }

    public function storeCategories(Request $request)
    {
        $validated = $this->validate($request, [
            "name" => "required|string",
            "parentID" => "nullable|number",
        ]);

        Category::create([
            "name" => $validated['name'],
            "parent_ref_id" => $validated['parentID']
        ]);

    }
}
