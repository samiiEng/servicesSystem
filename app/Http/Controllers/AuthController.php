<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('registerForm');
    }

    public function loginForm()
    {
        return view('loginForm');
    }

    public function register(Request $request)
    {
        $validated = $this->validate($request, [
            "firstName" => "required|string",
            "lastName" => "required|string",
            "username" => "required|string",
            "password" => "required|string",
            "imagePath" => "required",
            "idCardPath" => "required",
            "email" => "required|string"
        ]);

        $imagePath = "http://localhost/servicesSystem/public/uploads/" . basename($_FILES["imagePath"]["name"]);
        $idCardPath= "http://localhost/servicesSystem/public/uploads/" . basename($_FILES["idCardPath"]["name"]);


        $image = $request->file('imagePath');
        $idCard = $request->file('idCardPath');
        $fileImage = $image->getClientOriginalName();
        $fileIdCard = $idCard->getClientOriginalName();

        Storage::disk('YourDiskName')->put($fileImage, file_get_contents($image));
        Storage::disk('YourDiskName')->put($fileIdCard, file_get_contents($idCard));

        User::create([
            "first_name" => $validated['firstName'],
            "last_name" => $validated['lastName'],
            "username" => $validated['username'],
            "password" => Hash::make($validated['password']),
            "image_path" => $imagePath,
            "id_card_path" => $idCardPath,
            "email" => $validated['email']
        ]);

    }

    public function login(Request $request)
    {
        $validated = $this->validate($request, [
            "username" => "required|string",
            "password" => "required|string"
        ]);

        $ifAuthenticated = Auth::attempt([
            "username" => $validated['username'],
            "password" => $validated['password']
        ]);

        if ($ifAuthenticated) {
            return redirect('dashboard');
        } else {
            return response("Your credentials are incorrect!<br>");
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


}
