<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;


class UserController extends Controller
{
    //
    public function index(){

        $data = [
            'name' => 'Iyonu',
            'email' => 'Iyonu@scofield.com',
            'password' => 'password',
        ];

        // User::create($data);

        $user = User::all();
        return $user;

        return view('home');
    }

    public function uploadAvatar(Request $request){
        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
            // $request->session()->flash('message', 'Image Uploaded');// Display flash message using flash session
            return redirect()->back()->with('message', 'Image Uploaded');// Display flash message uing with() method
        }

        // $request->session()->flash('error', 'Image not Uploaded');// Display flash message using flash session
        return redirect()->back()->with('error', 'Image not Uploaded');

}
}