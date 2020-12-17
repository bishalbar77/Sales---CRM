<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Customer::all();
        return view('pages.customer.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'unique:customers', 'max:255'],
            'phone' => ['required', 'unique:customers', 'max:13'],
            'address' => 'required',
            'pincode' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        $user = new Customer;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        $user->district = $request->district;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->gst = $request->gst;
        $user->gst_type = $request->gst_type;
        $user->user = Auth::user()->id;
        $user->save();

        return redirect()->route('customer.index');

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changestatus($id)
    {
        $user = Customer::find($id);
        $user->is_active=!$user->is_active;
        if($user->save())
        {
            return redirect()->back()->with('disabled', 'User status have been changed');
        }
        else {
           
            return redirect(route('customer.changestatus'))->with('disabled', 'User have status have been changed');
            
        }
    }
}
