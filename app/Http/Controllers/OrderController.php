<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Stock;
use App\StockLogs;
use App\Size;
use App\Order;
use App\OrderItem;
use App\DoorType;
use App\Item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = OrderItem::all();
        return view('pages.order.index')->with([
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
        $customer = Customer::all();
        $item = Item::all();
        $size = Size::all();
        $door = DoorType::all();
        return view('pages.order.create')->with([
            'item' => $item,
            'size' => $size,
            'door' => $door,
            'customer' => $customer
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'customer_id' => 'required',
            'date' => 'required',
            'door_type_id' => 'required',
            'item_id' => 'required',
            'size_id' => 'required',
            'qty' => 'required',
            'design_number' => 'required',
            'color' => 'required'
        ]);

        $order_number = 'ORD'. rand(10,1000);
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->customer_id = $request->customer_id;
        $order->order_number = $order_number;
        $order->status = 'Order Booked';
        $order->added_on = $request->date;
        $order->save();

        $user = new OrderItem;
        $user->order_id = $order->id;
        $user->size_id = $request->size_id;
        $user->item_id = $request->item_id;
        $user->door_type_id = $request->door_type_id;
        $user->qty = $request->qty;
        $user->design_number = $request->design_number;
        $user->color = $request->color;
        $user->remark = $request->remark ?? "none";
        $user->status = 'Items Blocked';
        $user->added_on = $request->date;
        $user->save();

        return redirect()->route('order.index');

    }

    public function door(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $user = new DoorType;
        $user->name = $request->name;
        $user->user = Auth::user()->id;
        $user->save();

        return redirect()->route('order.create');

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

        return redirect()->route('stock.create');

    }

    public function delete($id)
    {
       $order = OrderItem::find($id);
       OrderItem::where('id',$order->id)->delete();
       return back();
    }

}
