<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ManagementController extends Controller
{
    public function find()
    {
        $test = Contact::where('gender', '1')->count();
        if($test >= 3) {
            $tests = Contact::where('gender', '1')->get();
        }
        $param = [
            'items' => '',
            'items2' => '',
            'fullname' => '',
            'from_date' => '',
            'until_date' => '',
            'email' => '',
            'gender' => '',
        ];
        return view('manage', $param);
    }

    public function search(Request $request)
    {


        if($request->from_date == '' && $request->until_date == ''){
            $search = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->where('email', 'LIKE', "%{$request->email}%")->count();
        } elseif($request->from_date !== '' && $request->until_date == '') {
            $search = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '>=', $request->from_date)->where('email', 'LIKE', "%{$request->email}%")->count();
        } elseif($request->from_date == '' && $request->until_date !== '') {
            $search = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '<=', $request->until_date)->where('email', 'LIKE', "%{$request->email}%")->count();
        } else {
            $search = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '>=', $request->from_date)->whereDate('created_at', '<=', $request->until_date)->where('email', 'LIKE', "%{$request->email}%")->where('email', 'LIKE', "%{$request->email}%")->count();
        }

        if ($request->from_date == '' && $request->until_date == '' && $search > 5) {
            $items = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->where('email', 'LIKE', "%{$request->email}%")->paginate(5);
        } elseif ($request->from_date !== '' && $request->until_date == '' && $search > 5) {
            $items = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '>=', $request->from_date)->where('email', 'LIKE', "%{$request->email}%")->paginate(5);
        } elseif ($request->from_date == '' && $request->until_date !== '' && $search > 5) {
            $items = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '<=', $request->until_date)->where('email', 'LIKE', "%{$request->email}%")->paginate(5);
        } elseif($request->from_date !== '' && $request->until_date !== '' && $search > 5) {
            $items = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '>=', $request->from_date)->whereDate('created_at', '<=', $request->until_date)->where('email', 'LIKE', "%{$request->email}%")->where('email', 'LIKE', "%{$request->email}%")->paginate(5);
        } else {
            $items = '';
        }

        if ($request->from_date == '' && $request->until_date == '' && $search <= 5) {
            $items2 = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->where('email', 'LIKE', "%{$request->email}%")->get();
        } elseif ($request->from_date !== '' && $request->until_date == '' && $search <= 5) {
            $items2 = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '>=', $request->from_date)->where('email', 'LIKE', "%{$request->email}%")->get();
        } elseif ($request->from_date == '' && $request->until_date !== '' && $search <= 5) {
            $items2 = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '<=', $request->until_date)->where('email', 'LIKE', "%{$request->email}%")->get();
        } elseif ($request->from_date !== '' && $request->until_date !== '' && $search <= 5) {
            $items2 = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->where('gender', 'LIKE', "%{$request->gender}%")->whereDate('created_at', '>=', $request->from_date)->whereDate('created_at', '<=', $request->until_date)->where('email', 'LIKE', "%{$request->email}%")->where('email', 'LIKE', "%{$request->email}%")->get();
        } else {
            $items2 = '';
        }




        $param = [
            'items' => $items,
            'items2' => $items2,
            'fullname' => $request->fullname,
            'from_date' => $request->from_date,
            'until_date' => $request->until_date,
            'email' => $request->email,
            'gender' => $request->gender,
        ];

        return view('manage', $param);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return back();
    }
}
