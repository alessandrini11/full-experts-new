<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Integrerequipe;
use App\Models\Prospect;
use App\Models\Contact;
use App\Models\Approuve;
use Illuminate\Support\Facades\Storage;

class ViewController extends Controller
{
    public function expert()
    {

   $view = Expert::all();

        return view('site.dashboard.view_expert_demand', compact('view'));
    }


    public function equipe()
    {

   $view = Integrerequipe::all();

        return view('site.dashboard.view_integrer_notre_equipe', compact('view'));
    }

    public function prospect()
    {

   $view = Prospect::all();

        return view('site.dashboard.view_service', compact('view'));
    }

    public function contact()
    {

   $view = Contact::all();

        return view('site.dashboard.view_contactez_nous', compact('view'));
    }

    public function approuve()
    {

   $view = Approuve::all();

        return view('site.dashboard.gestion_sinistres', compact('view'));
    }

    public function delete_equipe($id)
    {

  $data= Integrerequipe::find($id);
  $data->delete();

  return redirect()->back();
    }

    public function delete_expert($id)
    {

  $data= Expert::find($id);
  $data->delete();

  return redirect()->back();
    }

    public function delete_service($id)
    {

  $data= Prospect::find($id);
  $data->delete();

  return redirect()->back();
    }

    public function delete_contact($id)
    {

  $data= Contact::find($id);
  $data->delete();

  return redirect()->back();
    }

    public function delete_approuve($id)
    {

  $data= Approuve::find($id);
  $data->delete();

  return redirect()->back();
    }


    public function downloadPDF(Request $request, $cv)
    {
        // Fetch the data you need
return response()->download(public_path('image/'.$cv));
    }


}
