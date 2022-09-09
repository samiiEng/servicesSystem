<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Installment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstallmentController extends Controller
{
    public function defineInstallment()
    {
        return view('defineInstallment');
    }

    public function storeInstallment(Request $request)
    {
        $validated = $this->validate($request, [
            "installmentName" => "required|string",
            "details" => "required|string",
        ]);

        Installment::create([
            "name" => $validated['installmentName'],
            "user_ref_id" => Auth::id(),
            "details" => $validated['details']
        ]);
    }
}
