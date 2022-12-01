<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;

use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function view_catagory(){

        if(Auth::id()){
            $data=catagory::all();
            return view('admin.catagory',compact('data'));
        }
        else{
            return redirect('login');
        }


    }


    public function add_catagory(Request $request)
    {
        if(Auth::id()){
            $data=new catagory;
            $data->catagory_name=$request->catagory;
            $data->save();
            return redirect()->back()->with('message','Catagory added Successfully');

        }
        else{
            return redirect('login');
        }

    }

   public function delete_catagory($id){
        if(Auth::id()){
            $data=catagory::findOrFail($id);
            $data->delete();
            return redirect()->back()->with('message','Catagory deleted successfully');
    }
        else{
            return redirect('login');
        }

   }

   public function view_product(){
        if(Auth::id()){
            $catagory=catagory::all();

            return view('admin.product',compact('catagory'));

        }

        else{
            return redirect('login');
        }



   }

   public function add_product(Request $request){
        if(Auth::id()){
            $request->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'catagory' => 'required',
        ]);

        $product=new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');

        }
        else{
            return redirect('login');
        }


   }

   public function show_product(){

        if(Auth::id()){

        $product=product::all();

        return view('admin.show_products',compact('product'));

   }
   else{
            return redirect('login');
        }
    }

   public function delete_product($id){

        if(Auth::id()){
            $product=product::find($id);
            $product->delete();

            return redirect()->back()->with('message','Delete product Successfully');
        }
        else{
            return redirect('login');
        }



   }

   public function update_product($id){

        if(Auth::id()){
            $product=product::find($id);
            $catagory=catagory::all();
            return view('admin.update_product',compact('product','catagory'));

        }
        else{
            return redirect('login');
        }



   }

    public function update_product_confirm(Request $request,$id){

         if(Auth::id()){
            $product=product::find($id);

            $product->title=$request->title;
            $product->description=$request->description;
            $product->quantity=$request->quantity;
            $product->price=$request->price;
            $product->discount_price=$request->dis_price;
            $product->catagory=$request->catagory;

            $image=$request->image;
            if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;

        }

            product->save();

            return redirect()->back()->with('message','Product Updated Successfully');

         }
         else{
            return redirect('login');
        }

    }

    public function order(){

        if(Auth::id()){
             $order=order::all();

            return view('admin.order',compact('order'));

        }
        else{
            return redirect('login');
        }



    }

    public function delivered($id){

        if(Auth::id()){
            $order=order::find($id);
            $order->delivery_status="Delivered";
            $order->payment_status="Paid";

            $order->save();

            return redirect()->back()->with('message','Order Delivered Successfully');

        }
        else{
            return redirect('login');
        }



    }

    public function print_pdf($id){
       if(Auth::id()){
            $order=order::find($id);

            $pdf=PDF::loadView('admin.pdf',compact('order'));

            return $pdf->download('Order_Details.pdf');

        }
        else{
            return redirect('login');
        }


    }

    public function send_email($id){
        if(Auth::id()){
            $order=order::find($id);

            return view('admin.send_email',compact('order'));

        }
        else{
            return redirect('login');
        }



    }


    public function send_user_email(Request $request,$id){

        if(Auth::id()){
            $order=order::find($id);

        $details=[

            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,


        ];

        Notification::send($order,new SendEmailNotification($details));

        return redirect()->back();

        }
        else{
            return redirect('login');
        }



    }

    public function searchdata(Request $request){

        if(Auth::id()){
            $searchText=$request->search;

            $order=order::where('name','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('address','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();

            return view('admin.order',compact('order'));

        }
        else{
            return redirect('login');
        }



    }
}
