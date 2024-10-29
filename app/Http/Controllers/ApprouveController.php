<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approuve;

class ApprouveController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = new Approuve;

        $data ->name = $request ->name;
        $data ->phone = $request ->phone;
        $data ->email = $request ->email;
        $data ->message = $request ->message;
        $data ->type = $request ->type;
        $data ->status = $request ->status;

        $data ->save();

       return  redirect() -> back();
    }
}