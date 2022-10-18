<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        $data = [
            'title' => 'Products',
            'products' => $products,
        ];
        return view('product.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
             'image' => 'image|required',
            'description' => "required",
        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        if ($request->hasFile('image')) {
            $imageNameWithExtintion = $request->file('image');
            $imageName = pathinfo($imageNameWithExtintion->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtintion = $imageNameWithExtintion->getClientOriginalExtension();
            $fileNameToSave = $imageName . Time() . '.' . $imageExtintion;
            $product->image = $fileNameToSave;
            $request->file('image')->storeAs('public/images', $fileNameToSave);
        }

        $product->save();
        $view = view('product.card', ['products' => Product::orderBy('id', 'desc')->get()]) ;
        return $view->render();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $data = [
            'title'=>$product->name,
            'product'=>$product,
        ];
        return view("product.show")->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); 
        
        return view('product.edit')->with("product",$product);
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
            'description' => "required",
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        if ($request->hasFile('image')) {
            $imageNameWithExtintion = $request->file('image');
            $imageName = pathinfo($imageNameWithExtintion->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtintion = $imageNameWithExtintion->getClientOriginalExtension();
            $fileNameToSave = $imageName . Time() . '.' . $imageExtintion;
            $product->image = $fileNameToSave;
            $request->file('image')->storeAs('public/images', $fileNameToSave);
        }

        $product->save();
        $view = view('product.card', ['products' => Product::orderBy('id', 'desc')->get()]) ;
        return $view->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        $view = view('product.card', ['products' => Product::orderBy('id', 'desc')->get()]) ;
        return $view->render();
    }
}
