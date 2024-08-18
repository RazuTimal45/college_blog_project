<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\backend\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = Contact::all();
        $contact_count = Contact::count();
        return view('backend.home', compact('contacts', 'contact_count'));
    }
}
