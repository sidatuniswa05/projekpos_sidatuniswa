<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\View\View;
use App\Models\Order_detail;

class CetakController extends Controller
{
    //
public function receipt():View
{
   $id=session()->get('id');
   
   $order=Order::find($id);
   //dd($order)
   $orderDetail=Order_detail::where('order_id',$id)->get();
   return view('penjualan.receipt')->with([
    'dataOrder'=>$order,
    'dataOrderDetail'=>$orderDetail
   ]);
}
}

