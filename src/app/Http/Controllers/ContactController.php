<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('index',compact('contacts','categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->all();

        return view('confirm',compact('contact'));
    }
}
