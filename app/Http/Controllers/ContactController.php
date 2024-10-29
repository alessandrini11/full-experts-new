<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.contact.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = new Contact;

        $data ->name = $request ->name;
        $data ->phone = $request ->phone;
        $data ->email = $request ->email;
        $data ->message = $request ->message;
        $data ->more_message = $request ->more_message;

        $data ->save();

       return  redirect() -> back();
    }
}
