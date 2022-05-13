<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    private $formItem = ["fullname", "gender" ,"email", "postcode", "address", "building_name", "opinion"];


    public function index()
    {
        return view('contact');
    }

    public function confirm(ContactRequest $request)
    {
        $contents = $request->all();


        return view('confirm', ['contents' => $contents]);
    }

    public function send(Request $request)
    {
        $inputs = $request->all();
        if($request->has('back')){
            return redirect()->action([ContactController::class, 'index'])->withInput($inputs);
        }
        Contact::create($inputs);
        return view('thanks');
    }
}
