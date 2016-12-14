<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB; 
use P4\Hospital; 

class HospitalController extends Controller
{

    public function showHospitalList() {
		$user = Auth::user();
	    if($user) {
        $message = 'List of All Hospitals';

		$hospitals = Hospital::all();

		# Make sure we have results before trying to print them...
		if(!$hospitals->isEmpty()) {
			# Output the credentials
			foreach($hospitals as $hospital) {
				echo $hospital->facility_name.'<br>';
			}
		}
		else {
			echo 'No Hospitals Available';
		}
		return view('showHospitalList')->with('message', $message);
		}
		else {
			return view('home')->with('message', "Please Login");
			}
		}


	public function hospitalRequirement($hospitalID) {
		$user = Auth::user();
	    if($user) {
		$hospitals = Hospital::where('id', '=', $hospitalID)->first();
		$hospitalName = $hospitals->facility_name;
  		$message =  "list of ".$hospitalName." requirements";
		return view('hospitalRequirement')->with('message', $hospitals);
		}
		else {
			return view('home')->with('message', "Please Login");
			}
		}

/*	public function addNewHospital(Request $request) {
		$hospitalName = $request->input('hospitalName');
		return 'Process adding new hospital: '.$hospitalName;
		}

	public function addNewHospitalForm() {
		$message =  "add new hospital requirements";
		return view('addNewHospitalForm')->with('message', $message);
		}

	public function editHospital(Request $request) {
		$hospitalName = $request->input('hospitalName');
		return 'Process editing : '.$hospitalName;		
		}

	public function editHospitalForm($hospital) {
		$message =  "edit " .$hospital. "requirements";
		return view('editHospitalForm')->with('message', $message);
		}

	public function deleteHospital($hospital) {
		$message =  "remove ".$hospital;
		return view('deleteHospital')->with('message', $message);
		}
*/
	}
