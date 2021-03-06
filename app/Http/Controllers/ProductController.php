<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sent_data = $request->all();
        if($request->file('img')) {
            $img_name = $request->file('img')->hashName();
            $upload = $request->file('img')->move('img/products', $img_name);
            if ($upload) {
                $data = [
                    'name' => $sent_data['name'],
                    'cost_price' => $sent_data['cost_price'],
                    'price' => $sent_data['price'],
                    'qnt' => $sent_data['qnt'],
                    'img' => $img_name
                ];
                Product::create($data);
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
         $product =  Product::FindOrFail($id);
         return view('product.edit', compact('product'));
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
        $product_data = Product::find($id);
        $product_img = $product_data['img'];
        $file = Storage::disk('public')->exists($product_img);

        if ($request->hasFile('img')){
            if($file){
                File::delete(public_path('img/products/' . $product_img));
            }
            $name = $request->file('img')->hashName();
            $move = $request->file('img')->move('img/products',$name);
            if($move){
                $product_img = $name;
            } else {
                return back()->withInput();
            }
        } else {
            $product_img = $product_data['img'];
        }
        $sent_data = $request->all();

        $data = [
            'name' => $sent_data['name'],
            'cost_price' => $sent_data['cost_price'],
            'price' => $sent_data['price'],
            'qnt' => $sent_data['qnt'],
            'img' => $product_img
        ];

        $update = Product::find($id)->update($data);

        if ($update) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(public_path('img/products/' . $product['img']));
        $delete = $product->delete();
        if ($delete) {
            return back();
        }
    }
}
