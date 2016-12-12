<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserCredentialController extends Controller
{
    /** Home Page     */
    public function index() {
        $message = 'Home Page';
		return view('showCredentialList')->with('message', $message);
		}

	public function userCredentialList($userid) {
		$message = "list of ".$userid." hospitals";
		return view('showCredentialList')->with('message', $message);
		}

	public function addNewCredentialForm($userid) {
		$message = "add to ".$userid." credential list";
		return view('addNewCredentialForm')->with('message', $message);
		}

	public function addNewCredential($userid, Request $request) {
		$hospitalName = $request->input('hospitalName');
		return 'Process adding new hospital to '.$userid.' credential list : '.$hospitalName;
		}
		
	public function editUserCredentialForm($userid) {
		$message = "edit ".$userid." status";
		return view('editUserCredentialForm')->with('message', $message);
		}
		
	public function updateCredentialStatus($userid, Request $request) {
		$hospitalName = $request->input('hospitalName');
		return 'Process editing '.$userid.' status at : '.$hospitalName;		
		}
	
	public function deleteUserCredential($userid) {
		$message = "remove ".$userid." status";
		return view('deleteUserCredential')->with('message', $message);
		}

		
}
