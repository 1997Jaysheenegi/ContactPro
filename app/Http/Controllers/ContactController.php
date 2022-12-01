<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function getFormData(Request $req)
	{
		$req->validate([
			'name'=>'required',
			'email'=>'required | email',
			'subject'=>'required',
			'message'=>'required'
		]);
		
		$name = $req->name;
		$email = $req->email;
		$subject = $req->subject;
		$message = $req->message;
		
		$con = new Contact;
		$con->name=$name;
		$con->email=$email;
		$con->subject=$subject;
		$con->message=$message;
		
		$con->save();
		return redirect('index');
	}
}
