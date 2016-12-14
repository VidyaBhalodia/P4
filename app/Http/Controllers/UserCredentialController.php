<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB; 
use P4\Credential; # <--- NEW

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
        $message = 'Home Page';
		return view('home')->with('message', $message);
		}

	public function userCredentialList() {
		$userid = Auth::user()->name;
		$message = "List of ".$userid."'s Hospitals";

		# Match userid to database
		$credentials = Credential::where('user_name', 'LIKE', $userid)->get();

		# Make sure we have results before trying to print them...
		if(!$credentials->isEmpty()) {
			# Output the credentials
			foreach($credentials as $credential) {
				echo $credential->facility_name.'<br>';
			}
		}
		else {
			echo 'No Hospitals in Your List';
		}
		
		return view('showCredentialList')->with('message', $message);
		}

	public function addNewCredentialForm() {
		$userid = Auth::user()->name;
		$message = "add to ".$userid." credential list";
		return view('addNewCredentialForm');	
		}

	public function addNewCredential(Request $request) {
		$userid = Auth::user()->name;
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

			echo 'Added: '.$credential->facility_name.'<br>';

			# Make sure we have results before trying to print them...
			$credentialList = Credential::where('user_name', 'LIKE', $userid)->get();
			if(!$credentialList->isEmpty()) {
				# Output the credentials
				foreach($credentialList as $credential) {
					echo $credential->facility_name.'<br>';
					}
				}
			else {
				echo 'No Hospitals in Your List';
				}			
			$message =  'Process adding new hospital to '.$userid.' credential list : '.$hospitalName;
			}
			
		else {
			$message = 'This Hospital Already Exists in Your List';
			}

		return view('showCredentialList')->with('message', $message);	
	}
		
	public function editUserCredentialForm() {
		$userid = Auth::user()->name;
		$message = "edit ".$userid."'s credential list";
		return view('editUserCredentialForm');	
		}
		
	public function editUserCredential(Request $request) {
		$userid = Auth::user()->name;
		$this->validate($request, ['hospitalName' => 'required','status' => 'required',]);
		$hospitalName = $request->input('hospitalName');
		$status = $request->input('status');
		$expirationDate = $request->input('expirationDate');
		$followupDate = $request->input('followupDate');
	
		$credential = Credential::where('user_name', '=', $userid)->where('facility_name', '=', $hospitalName)->first();

		# if that combination of userID and facilityName don't exist, then create a new one
		if($credential) {
			# Set the parameters
			# Note how each parameter corresponds to a field in the table
			$credential->status = $status;	
			#only enter those fields if they're dates - if they're empty, leave them alone
			if ($expirationDate != "") {$credential->expiration_date = $expirationDate;}
			if ($followupDate != "") {$credential->followup_date = $followupDate;}
			
			# Invoke the Eloquent save() method
			# This will generate a new row in the `books` table, with the above data
			$credential->save();

			echo 'Updated: '.$credential->facility_name.'<br>';

			# Show list of all hospitals
			$credentialList = Credential::where('user_name', 'LIKE', $userid)->get();
			# Make sure we have results before trying to print them...
			if(!$credentialList->isEmpty()) {
				# Output the credentials
				foreach($credentialList as $credential) {
					echo $credential->facility_name.'<br>';
					}
				}
			else {
				echo 'No Hospitals in Your List';
				}			
			$message =  'Editting hospital in '.$userid.' credential list : '.$hospitalName;
			}
			
		else {
			$message = 'This Hospital Is not Part of Your List';
			}

		return view('showCredentialList')->with('message', $message);
		}

	public function deleteUserCredentialForm() {
		$userid = Auth::user()->name;
		$message = "delete hospital from ".$userid."'s credential list";
		return view('deleteUserCredentialForm')->with('message', $message);;	
		}

		
	public function deleteUserCredential(Request $request) {
		$userid = Auth::user()->name;
		$hospitalName = $request->input('hospitalName');
		$credential = Credential::where('user_name', '=', $userid)->where('facility_name', '=', $hospitalName)->first();
		if($credential) {
			$credential->delete();
			echo $hospitalName." Deleted <br>";
			}
		else {
			echo "Can't delete - Hospital not found <br>";
			}
		$message = "remove ".$userid." status";
			# Show list of all hospitals
			$credentialList = Credential::where('user_name', 'LIKE', $userid)->get();
			# Make sure we have results before trying to print them...
			if(!$credentialList->isEmpty()) {
				# Output the credentials
				foreach($credentialList as $credential) {
					echo $credential->facility_name.'<br>';
					}
				}
			else {
				echo 'No Hospitals in Your List';
				}			
				
	
			$message =  'Editting hospital in '.$userid.' credential list : '.$hospitalName;
		return view('showCredentialList')->with('message', $message);
		}
	}
