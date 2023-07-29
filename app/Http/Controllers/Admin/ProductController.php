<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $now = Carbon::now();
        $filename = strtotime($now).".".$image->getClientOriginalExtension();
        $upload = public_path().'\images\produk';
	    $image->move($upload, $filename);

        $product = new Product();
        $product->product_name = $request->name;
        $product->product_photo = $filename;
        $product->product_price = $request->price;
        $product->product_description = $request->description;

        if ($product->save()) {
            return redirect(route('product.index'))->with(['message' => 'Berhasil Tambah Produk', 'type' => 'success']);
        }else {
            return redirect(route('product.index'))->with(['message' => 'Gagal Tambah Produk', 'type' => 'error']);
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
        $product = Product::find($id);
        return view('admin.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $now = Carbon::now();
            $filename = strtotime($now).".".$image->getClientOriginalExtension();
            $upload = public_path().'\images\produk';
            $image->move($upload, $filename);
            $product->product_photo = $filename;
        }

        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_description = $request->description;

        if ($product->save()) {
            return redirect(route('product.index'))->with(['message' => 'Berhasil Edit Produk', 'type' => 'success']);
        }else {
            return redirect(route('product.index'))->with(['message' => 'Gagal Edit Produk', 'type' => 'error']);
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
        $product->delete();

        return redirect(route('product.index'))->with(['message' => 'Berhasil Hapus Produk', 'type' => 'error']);
    }
}
