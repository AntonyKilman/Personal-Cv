<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\contact;

class NavigationController extends Controller
{
    public function index()
    {

        return view('layouts.navigation');
    }

    public function SendMail(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|regex:/(.*)\./i|',
        //     'phone' => 'required|min:10|max:10',
        //     'message' => 'max:255',
        // ]);

        $content_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];
        $content_data = json_decode(json_encode($content_data));
        Mail::to('kilmanantony@gmail.com')->send(new contact($content_data));
        return back()->with('message', 'Submitted Successfully!');
    }
}
