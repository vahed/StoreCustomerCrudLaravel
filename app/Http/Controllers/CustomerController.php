<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use App\Store;
use App\Customer;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;

class CustomerController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    /**
     * Display customers record in each store.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$customerRecords = DB::table('Customers')->where('StoreId', $id)->paginate(15);

		return View::make('storeViews.customerInEachStore')->with('customerRecords',$customerRecords);
    }
	//return store id and number of customers in each store
    public function customerCounter(){
	 $customers = DB::table('customers')
		->select('StoreId' , DB::raw('COUNT(StoreId) as Counter'))
		->groupBy('StoreId')
		->get();
    
	    return View::make('storeViews.customerStoreCounter')->with('customerStoreCounter',$customers);
	}

}
