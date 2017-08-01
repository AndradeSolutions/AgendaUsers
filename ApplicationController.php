<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ApplicationController extends Controller
{
	/*
	| VIEW INITIAL PAGE
	|
	| 1. Check if a section is active
	| 2. Show or not the application
	|
	|
	*/
    public function viewInitialPage() {
    	if (!Session::has('login')) { return redirect('/'); }

    	return view('/application');
    }

    public function contactBook() {
    	return view('/agenda_index');
    }
}
