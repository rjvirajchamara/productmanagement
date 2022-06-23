<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::paginate(3);;
        $emptyArray = array();
        if ($product) {
            return view('dashboard', ['products' => $product]);
        } else if (!$product) {
            return view('dashboard', ['products' => $emptyArray]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(StoreproductRequest $request){
         //  dd($request);
        $img=$request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $img);

        $product = new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->img_url =$img;
        $product->status=0;
        $product->save();
        return redirect('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }


    public function updateproduct($id){

        $product = DB::select('select * from products where id = ?',[$id]);
        return view('product.updateviwe',['product'=> $product]);

    }

    public function active($id){

        $product= product::find($id);
        $product->status = 1;
        $product->save();
        return redirect()->back();
    }

    public function deactive($id)
    {
        $product = product::find($id);
        $product->status = 0;
        $product->save();
        return redirect()->back();
    }


    public function update (UpdateproductRequest $request){

        $img=$request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $img);
        $id=$request->id;
        $product = product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->img_url =$img;
        $product->save();
        return redirect('dashboard');

    }


    public function deleteProduct($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
