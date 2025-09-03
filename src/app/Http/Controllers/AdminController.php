<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $contacts = Contact::simplePaginate(7);
        $categories = Category::all();

        return view('admin',compact('contacts','categories'));
    }

    public function search(Request $request)
    {
        $contact = Contact::with('category')->KeywordSearch($request->$keyword)->get();

        return view('admin',compact('contact'));
    }
}
