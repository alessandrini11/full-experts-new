<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Integrerequipe;
class IntegrerequipeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = new Integrerequipe;

        $data ->name = $request ->name;
        $data ->phone = $request ->phone;
        $data ->email = $request ->email;
        $data ->expert_domain = $request ->expert_domain;



        if ($request->hasFile('cv')) {
            $image = $request->file('cv');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $data->cv = $imageName;
        }

        $data ->save();

       return  redirect() -> back();
    }
}
