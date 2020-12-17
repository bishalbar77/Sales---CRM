<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Stock;
use App\StockLogs;
use App\DoorType;
use App\Size;
use App\Item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Stock::all();
        return view('pages.stock.index')->with([
            'users' => $users
        ]);
    }

    public function logs()
    {
        $users = StockLogs::all();
        return view('pages.stock.logs')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        $item = Item::all();
        $size = Size::all();
        return view('pages.stock.create')->with([
            'item' => $item,
            'size' => $size
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'item_id' => 'required',
            'size_id' => 'required',
            'qty' => 'required',
        ]);

        $checkStock = DB::table('stocks')
            ->where('item_id', '=', $request->item_id)
            ->orderBy('id', 'DESC')
            ->get();

        $checkStocklogs = DB::table('stock_logs')
            ->where('item_id', '=', $request->item_id)
            ->orderBy('id', 'DESC')
            ->get();
        $available = 0;

        foreach($checkStocklogs as $check) 
        {
            if($request->size_id==$check->size_id)
            {
                $available = $check->available;
                break;
            }
        };
        $available_stock=0;
        foreach($checkStock as $check) 
        {
            if($request->size_id==$check->size_id)
            {
                $available_stock = $check->available;
                $id = $check->id;
                break;
            }
        };

        if(isset($id))
        {
            DB::table('stocks')
            ->where('id', $id)
            ->update([
                'available' => ($available_stock + $request->qty),
                'inward' => $request->qty
                ]);
        }
        else
        {
            $user = new Stock;
            $user->item_id = $request->item_id;
            $user->size_id = $request->size_id;
            $user->inward = $request->qty;
            $user->available = $request->qty;
            $user->user = Auth::user()->id;
            $user->save();
        }
        $user = new StockLogs;
        $user->item_id = $request->item_id;
        $user->size_id = $request->size_id;
        $user->inward = $request->qty;
        $user->available = ($available + $request->qty);
        $user->user = Auth::user()->id;
        $user->save();

        return redirect()->route('stock.index');

    }

    public function item(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $user = new Item;
        $user->name = $request->name;
        $user->user = Auth::user()->id;
        $user->save();

        return redirect()->back();

    }

    public function doorType(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $user = new DoorType;
        $user->name = $request->name;
        $user->user = Auth::user()->id;
        $user->save();

        return redirect()->back();

    }

    public function size(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $user = new Size;
        $user->name = $request->name;
        $user->user = Auth::user()->id;
        $user->save();

        return redirect()->back();

    }

    public function delete($id)
    {
       StockLogs::where('id',$id)->delete();
       return back();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Stock::where('id',$id)->delete();
        return back();
    }
}