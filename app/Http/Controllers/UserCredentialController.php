<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB; 
use P4\Credential; 
use P4\Hospital; 
use \Session;


class UserCredentialController extends Controller
{

/*    public function example() {
        # Use the QueryBuilder to get all the credentials
        $credentials = DB::table('credentials')->get();

        # Output the results
        foreach ($credentials as $credential) {
            echo $credential->facility_name;
        }
    }

    /** Home Page     */
    public function home() {
        $title = 'Home Page';
		return view('home')->with('title', $title);
		}

	public function userCredentialList() {
	    $user = Auth::user();
	    if($user) {
		$userid = $user->name;
		$title = "List of ".$userid."'s Hospitals";

		# Match userid to database
		$credentials = Credential::where('user_name', '=', $userid)->get();

		# Make sure we have results before trying to print them...
		if(!$credentials->isEmpty()) {
			# Output the credentials
			return view('showCredentialList')->with('title', $title)->with('credentials', $credentials);
		}
		else {
			Session::flash('flash_message','No Hospitals Found - Add one from our list');
			return redirect('/hospitals');
		}
		
		return view('showCredentialList')->with('message', $message);}
		else {
			Session::flash('flash_message','Please Login');
			return redirect('/home');
			}
		}

	public function addNewCredentialForm() {
	    $user = Auth::user();
		$hospitalList = Hospital::all();

	    if($user) {
			$userid = $user->name;
			$title = "Add to ".$userid."'s Credential List";
			return view('addNewCredentialForm')->with(['title' => $title, 'hospitalList' => $hospitalList]);	
			}
		else {
			Session::flash('flash_message','Please login');
			return redirect('/login');
			}
		
		}

	public function addNewCredential(Request $request) {
    $user = Auth::user();
    if($user) {
		$userid = $user->name;
		$this->validate($request, ['hospitalName' => 'required','status' => 'required',]);
		$hospitalName = $request->input('hospitalName');
		$status = $request->input('status');
		$expirationDate = $request->input('expirationDate');
		$followupDate = $request->input('followupDate');
	
		$credentials = Credential::where('user_name', '=', $userid)->where('facility_name', '=', $hospitalName)->get();
		
		# if that combination of userID and facilityName don't exist, then create a new one
		if($credentials->isEmpty()) {
			# Instantiate a new Credential Model object
			$credential = new Credential();
			# Set the parameters
			# Note how each parameter corresponds to a field in the table
			$credential->user_name = $userid;
			$credential->facility_name = $hospitalName;
			$credential->status = $status;
			
			#only enter those fields if they're dates - if they're empty, leave them alone
			if ($expirationDate != "") {$credential->expiration_date = $expirationDate;}
			if ($followupDate != "") {$credential->followup_date = $followupDate;}
			
			# Invoke the Eloquent save() method
			# This will generate a new row in the `books` table, with the above data
			$credential->save();
			$title = "List of ".$userid."'s Hospitals";


			# Make sure we have results before trying to print them...
			$credentialList = Credential::where('user_name', 'LIKE', $userid)->get();
			if(!$credentialList->isEmpty()) {
				Session::flash('flash_message',$hospitalName.' Added to '.$userid."'s List");
				return view('showCredentialList')->with('title', $title)->with('credentials', $credentialList);
				}
			else {
				Session::flash('flash_message','No Hospitals Found');
				return redirect('/hospitals');
				}			
			}
		else {
			Session::flash('flash_message','Hospital Already Exists in User List');
			return redirect('/user-credentials');
			}
		}
	else {
		Session::flash('flash_message','Please Login');
		return redirect('/home');
		}
	}
		
	public function editUserCredentialForm() {
    $user = Auth::user();
    if($user) {
		$userid = $user->name;
		$hospitalList = Credential::where('user_name', '=', $userid)->get();
		$title = "Edit ".$userid."'s Credential List";
		return view('editUserCredentialForm')->with(['title' => $title, 'hospitalList' => $hospitalList]);	
		}
	else {
		Session::flash('flash_message','Please login');
		return redirect('/login');
		}
	}
		
	public function editUserCredential(Request $request) {
    $user = Auth::user();
    if($user) {
		$userid = $user->name;
		$this->validate($request, ['hospitalName' => 'required','status' => 'required',]);
		$hospitalName = $request->input('hospitalName');
		$status = $request->input('status');
		$expirationDate = $request->input('expirationDate');
		$followupDate = $request->input('followupDate');
	
		$credential = Credential::where('user_name', '=', $userid)->where('facility_name', '=', $hospitalName)->first();

		# only do if that combination of userID and facilityName don't exist, then create a new one
		if($credential) {
			# Set the parameters
			# Note how each parameter corresponds to a field in the table
			$credential->status = $status;	
			#only enter those fields if they're dates - if they're empty, leave them alone
			if ($expirationDate != "") {$credential->expiration_date = $expirationDate;}
			if ($followupDate != "") {$credential->followup_date = $followupDate;}
			
			# Invoke the Eloquent save() method
			# This will generate a new row in the `credentials` table, with the above data
			$credential->save();
			$title = "List of ".$userid."'s Hospitals";

			# Show list of all hospitals
			$credentialList = Credential::where('user_name', '=', $userid)->get();
			# Make sure we have results before trying to print them...
			if(!$credentialList->isEmpty()) {
				Session::flash('flash_message',$hospitalName.' Status Editted');
				return view('showCredentialList')->with('title', $title)->with('credentials', $credentialList);
				}
			else {
				Session::flash('flash_message','No Hospitals Found');
				return redirect('/hospitals');
				}			
			}
		else {
			Session::flash('flash_message','Hospital Already Exists in User List');
			return redirect('/user-credentials');
			}
		}
	else {
		Session::flash('flash_message','Please Login');
		return redirect('/home');
		}
	}

	public function deleteUserCredentialForm() {
    $user = Auth::user();

    if($user) {
		$userid = $user->name;
		$hospitalList = Credential::where('user_name', '=', $userid)->get();
		$title = "Delete Hospital From ".$userid."'s Credential List";
		return view('deleteUserCredentialForm')->with(['title' => $title, 'hospitalList' => $hospitalList]);	
		}
	else {
		Session::flash('flash_message','Please login');
		return redirect('/login');
		}
	}

	public function deleteUserCredential(Request $request) {
    $user = Auth::user();
    if($user) {
		$userid = $user->name;
		$hospitalName = $request->input('hospitalName');
		$credential = Credential::where('user_name', '=', $userid)->where('facility_name', '=', $hospitalName)->first();
		if($credential) {
			$credential->delete();
			}
		else {
			Session::flash('flash_message','Hospital Not Found');
			return redirect('/user-credentials');
			}
			$title = "List of ".$userid."'s Hospitals";

			# Show list of all hospitals
			$credentialList = Credential::where('user_name', 'LIKE', $userid)->get();
			# Make sure we have results before trying to print them...
			if(!$credentialList->isEmpty()) {
				Session::flash('flash_message',$hospitalName.' Removed');
				return view('showCredentialList')->with('title', $title)->with('credentials', $credentialList);
				}
			else {
				Session::flash('flash_message','No Hospitals Found');
				return redirect('/user-credentials');
				}			
			}
	else {
		Session::flash('flash_message','Please Login');
		return redirect('/home');
		}
	}
}
