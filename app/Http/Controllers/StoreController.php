<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use App\Store;
use App\Customer;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Session;

class StoreController extends Controller
{
	//check if the user is authenticated to enter the control panel area
	public function __construct()
	{
		$this->middleware('auth');
	}
    /**
     * Retrieving list of Stores
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$stores = DB::table('stores')->paginate(15); //get all the stores
		
		return View::make('storeViews.index')->with('stores',$stores);
		
    }

	public function storeSearchForm(){
		return View::make('storeViews.storeSearchForm');
    }
    public function storeFinder(Request $request){
	    
		// process the validation
		$storeValues = $request->input('storeName');
		//find all all the name which starts with the input search wherther partial or full name
		$searchResult = DB::table('stores')->where('Name','LIKE',"$storeValues%")->limit(5)->get();
		
        $validator = Validator::make($request->all(), [
            'storeName' => 'required|alpha',
        ]);

        if($validator->fails()){
            return redirect::to('storeSearchForm')
                        ->withErrors($validator)
                        ->withInput();
        }
		else if($searchResult->isEmpty() ){
			return back()->with('searchError','No result for this search');
		}
		else{
			return View::make('storeViews.storeSearchForm')->with('searchResult',$searchResult);
		}		
			
	}
    /**
     * Display the specified store.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($storeid)
    {
	    //get the store by id
        $storeById = Store::find($storeid);
		// show the view and pass the storeById to it
		return View::make('storeViews.showStoreById')->with('storeById',$storeById); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
        $editFormRecord = Store::find($id);
        
        // show the edit form and pass the nerd
        return View::make('storeViews.editForm')->with('editFormRecord', $editFormRecord);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  
        // validate the form input
        $rules = array(
            'StoreId'  => 'required',
            'Phone'  => 'required',
            'Name' => 'required',
			'Domain' => 'required',
			'Status' => 'required',
			'Street' => 'required',
			'State' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
   
        // process the update
        if ($validator->fails()) {
            return Redirect::to('stores/' . $id . '/edit')
                ->withErrors($validator)
				->withInput();
        } else {
            // store
			
            $stores = Store::find($id);
			$stores->exists = true;
            $stores->StoreId = $request->input('StoreId');
            $stores->Phone  = $request->input('Phone');
            $stores->Name = $request->input('Name');
			$stores->Domain = $request->input('Domain');
			$stores->Status = $request->input('Status');
			$stores->Street = $request->input('Street');
			$stores->State = $request->input('State');

			$update = array('StoreId' => $stores->StoreId,
			                'Phone' => $request->Phone,
			                'Name' => $stores->Name,
							'Domain' => $request->Domain,
						    'Status' => $stores->Status,
							'Street' => $request->Street,
						    'State' => $request->State
							);
            DB::table('Stores')->where('StoreId', $id)->update($update);
            // redirect
            Session::flash('message', 'Successfully updated store!');
            return Redirect::to('stores');
        }
    }
	//display a form to add new customer to store
	public function newCustomerForm(Request $request, $storeId){
	    //get the $storeId from request and pass it to the form to add new user
		$storeId = Store::find($storeId);
		return View::make('storeViews.newCustomerForm')->with('StoreId',$storeId);
	}
	//Add new customer to a store based on StoreId
    public function addNewCustomer(Request $request,$storeId){
	    $customer = new Customer;
		$customer->StoreId = $storeId;
		$customer->Firstname  = $request->input('Firstname');
		$customer->Lastname = $request->input('Lastname');
		$customer->Phone = $request->input('Phone');
		$customer->Email = $request->input('Email');
		
		// validate the form input
        $rules = array(
            'Firstname'  => 'required',
            'Lastname'  => 'required',
			'Phone' => 'required|numeric',
			'Email' => 'required|email'
        );
        $validator = Validator::make(Input::all(), $rules);
        
        // process add new customer  
        if ($validator->fails()) {
            return Redirect::to('stores/' . $storeId . '/newCustomerForm')
                ->withErrors($validator)
				->withInput();
        }
		//check if email is duplicate
		else if($this->is_duplicate($customer->Email) == false){
			   return back()->with('duplicateError','This customer already exists with this email.');
		}
		else{
            // Add customer	
            $customer->save();
			
            // redirect
            Session::flash('message', 'New customer added to the store!');
            return Redirect::to('stores');
        }
	}
	/* check if duplicate email exists*/
	public function is_duplicate($email){
	    $customer = new Customer;
	    $result = $customer::where(['Email'=>$email])->get();
		
		if($result->count()>0)
			return false;
		else
			return true;
	}
}
