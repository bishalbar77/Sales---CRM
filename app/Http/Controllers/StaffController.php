<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
class StaffController extends Controller
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
        $users = User::all();
        return view('pages.staffs.index')->with([
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
        return view('pages.staffs.create');
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
            'email' => ['required', 'unique:users', 'max:255'],
            'phone' => ['required', 'unique:users', 'max:13'],
            'address' => 'required',
            'pincode' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        $user->district = $request->district;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->user_type = 'Sales Manager';
        $user->password = Hash::make('admin');
        $user->user = Auth::user()->id;
        $user->save();

        return redirect()->route('staff.index');

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
        if($id==1)
        {
            return redirect(route('staff.index'));
        }
        $user = User::find($id);
        $user->is_active=!$user->is_active;
        if($user->save())
        {
  
            return redirect()->back()->with('disabled', 'User status have been changed');
        }
        else {
           
            return redirect(route('staff.changestatus'))->with('disabled', 'User have status have been changed');
            
        }
    }
}
