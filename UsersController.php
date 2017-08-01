<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use App\Classes\passwordGenerator;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailPasswordRecovery;


class UsersController extends Controller
{
	/*
	| DEFAULT INVOKE userLogin METHOD
	| 
	| 1. Check if exists session
	|
	|
	*/
	public function index()	{

		if (!Session::has('login')) {
			return $this->userLogin();
		} else {
			return view('/application');
		}

		
	}

	/*
	| VIEW FORM LOGIN
	| 
	|
	|
	|
	*/
	public function userLogin() {
		return view('index');
	}

	/*
	| VERIFY LOGIN
	| 
	| 1. Verify that the data was filled out correctly (Validation);
	| 2. Searching for the user in the BD (Eloquent ORM);
	| 3. Verify that user and password correspond to the user and password entered in the form (Hashing);
	| 4. Check for invalid data;
	| 5. After all phases have passed, create user session (Sessions);
	|
	|
	*/
	public function executeLogin(Request $request) {
		$this->validate($request, [
			'text_email' => 'required|email',
			'text_password' => 'required'
		]);

		$user = User::where('user_email', $request->text_email)->first();
		if (count($user) == 0) {
			$errors_bd = ['User account not exists!'];
			return view('/index', compact('errors_bd'));
		}

		if (!Hash::check($request->text_password, $user->user_password)) {
			$errors_bd = ['Incorrect Password!'];
			return view('/index', compact('errors_bd'));
		}

		return $this->activeSession($user);
	}

	/*
	| VIEW FORM NEW ACCOUNT
	|
	|
	|
	|
	*/
	public function createNewAccount() {
		return view('/newaccount');
	}

	/*
	| VERIFY NEW ACCOUNT CREATION
	|
	| 1. Validation
	| 2. Check if a registered email already exists
	|
	|
	*/
	public function executeCreateNewAccount(Request $request) {
		$this->validate($request, [
			'text_first_name' => 'required|between:3,20|alpha_num',
			'text_last_name' => 'required|between:3,20|alpha_num',
			'text_email' => 'required|email',
			'text_password' => 'required|between:6,15',
			'text_repeat_password' => 'required|same:text_password',
			'check_terms_and_conditions' => 'accepted'
		]);

		$dados = User::where('user_email', "=", $request->text_email)->get();

		if ($dados->count() != 0) {
			$errors_bd = ['Já existe um usuário cadastrado com este e-mail.'];
			return view('/newaccount', compact('errors_bd'));
		}

		return $this->saveNewUser($request);
	}

	/*
	| SAVE NEW USER
	|
	|
	|
	*/
	public function saveNewUser(Request $request) {
		$user = new User;
		$user->user_first_name = $request->text_first_name;
		$user->user_last_name  = $request->text_last_name;
		$user->user_email      = $request->text_email;
		$user->user_password   = Hash::make($request->text_password);
		$user->save();

		return redirect('/');
	}

	/*
	| CREATE OR OPEN USER SESSION
	|
	|
	|
	*/
	public function activeSession(User $user) {
		Session::put('login', 'Yes');
		Session::put('user_first_name', $user->user_first_name);

		return redirect('/application');
	}

	/*
	| VIEW FORM PASSWORD RECOVERY
	|
	|
	|
	*/
	public function passwordRecovery() {
		return view('/passrecovery');
	}

	/*
	| EXECUTE PASSWORD RECOVERY
	|
	| 1. USER: must be registered in the database;
	| 2. CHECK: if the email entered corresponds to the user;
	| 3. SECURITY: The system creates random password;
	| 4. E-MAIL: with the new password for the user's e-mail;
	| 5. VIEW: inform the user that a new password has been sent to his or her email;
	|
	|
	*/
	public function executePasswordRecovery(Request $request) {
		$this->validate($request, [
			'text_email' => 'required|email'
		]);

		$user = User::where('user_email', $request->text_email)->get();
		if ($user->count() == 0) {
			$errors_bd = ['O e-mail não está associado a nenhuma conta de usuário.'];
			return view('/passrecovery', compact('errors_bd'));
		}

		$user = $user->first();

		$new_password = passwordGenerator::createPassword();
		$user->user_password = Hash::make($new_password);
		$user->save();

		Mail::to($user->user_email)->send(new emailPasswordRecovery($new_password));

		return redirect('/application_email');
	}

	/*
	| LOGOUT
	|
	| 1. Destroy to the session
	| 2. Redirect to login form
	|
	|
	*/
	public function userLogout() {
		Session::flush();
		return redirect('/');
	}

	public function emailSent() {
		return view('/email_sent');
	}
}
