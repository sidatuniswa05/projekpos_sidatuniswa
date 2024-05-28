<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Order_detail;
use App\Models\Product;
use Exception;

class Penjualan extends Component
{
    public $customer_id;
    public function render()
    {
        return view('livewire.penjualan',[
            'data' =>Customer::orderBy('id','desc')->get()
        ]);
       
     }
     public function store()
     {
        $this->validate([
            'customer_id'=>'required'
        ]);
        Order::create([
            'invoice'=>$this->invoice(),
            'customer_id'=>$this->customer_id,
            'user_id'=>Auth::user()->id,
            'total'=>'0'
        ]);
        $this->customer_id=NULL;
        return redirect()->to('order');
        
     }

     public function invoice()
     {
        $order=Order::orderBy('created_at','DESC');
        if($order->count()>0){
            $order=$order->first();
            $explode=explode('-',$order->invoice);
            return 'INV-'.$explode[1]+1;

        }
        return 'INV-1';
     }
       
}
