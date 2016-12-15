<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB; 
use P4\Hospital; 
use \Session;

class HospitalController extends Controller
{

    public function showHospitalList() {
		$user = Auth::user();
	    if($user) {
		$hospitals = Hospital::all();

		# Make sure we have results before trying to print them...
		if(!$hospitals->isEmpty()) {
			$title = 'List of All Hospitals';
			return view('showHospitalList')->with('title', $title)->with('hospitals', $hospitals);
			}
		else {
			Session::flash('flash_message','No hospitals found');
			return redirect('/home');
			}
		}
		else {
			Session::flash('flash_message','Please login');
			return redirect('/login');
			}
		}


	public function hospitalRequirement($hospitalID) {
		$user = Auth::user();
	    if($user) {
		$hospitals = Hospital::where('id', '=', $hospitalID)->first();
		if($hospitals) {
			$hospitalName = $hospitals->facility_name;
			$title =  "List of ".$hospitalName." Requirements";
			return view('hospitalRequirement')->with('title', $title)->with('hospitals', $hospitals);
			}
		else {
			Session::flash('flash_message','Hospital not found');
			return redirect('/hospitals');
			}
		}
		else {
			Session::flash('flash_message','Please login');
			return redirect('/login');
			}
		}
	}
