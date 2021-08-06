<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  

    }



    public function viewOrder(User $user){

        $order = Order::where('user_id', $user->id)->get();
    
        
        return view('order.view-order', compact('order'));

    }




    
    public function viewOrderNotification(User $user){

        $orderNotif = Order::where('user_post_id', $user->id)->get();

      
        
        return view('order.view-order-notification', compact('orderNotif'));

    }


    public function order(\App\Models\Post $post){
        
        return view('order.order',compact('post'));


    }


    public function store(\App\Models\Post $post)
    {
     
        $data = request()->validate([
            'user_post_id' => 'required',

            'fname' => 'required',
            'address' => 'required',
            'contact' => 'required|string|min:8|max:11',
            'price' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);
    
        auth()->user()->order()->create([
            'post_id' => $post->id,
            'user_post_id' => $data['user_post_id'],
          
            'fname' => $data['fname'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'price' => $data['price'],
            'qty' => $data['qty'],
            'status' => "1"

        ]);
        
        return back()->with('success','Ordered successfully!');

        

    }
    public function destroy($id){

    $order = Order::find($id);

    $order->delete();
    
    return back()->with('success','Deleted successfully!');
    }


    public function updateOrder(Request $request, Order $order){

        
        $data = $request->validate([
            'status' => 'required'         
        ]);
       
       $order->update([
            'status' => $request->status
        ]);
        
        return back()->with('success','Updated successfully!');
    }

}
