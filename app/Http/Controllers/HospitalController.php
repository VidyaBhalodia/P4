<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HospitalController extends Controller
{

    public function hospitalIndex() {
        $message = 'List of All Hospitals';
		return view('showHospitalList')->with('message', $message);
		}

	public function hospitalRequirement($hospital) {
		$message =  "list of ".$hospital." requirements";
		return view('hospitalRequirement')->with('message', $message);

		}

	public function addNewHospital(Request $request) {
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

	}
