<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Auth;
use App\Models\Employee;
use App\Models\User;
use App\Models\ProductCategory;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
       * Create a new controller instance.
       *
       * @return void
    */
    public function __construct()
    {
      $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Product";
        $page_subpage = "All";
        $page_icon ="fa fa-boxes";
        $auth = Auth::user();
        $employees = Employee::all();
        foreach ($employees as $key) {
            if ($key->id == $auth->employee_id) {
                $user = $key;

            }
        }
        $products = Product::all();
        //return User::find(1)->employee->name;
        //return Employee::find(1)->user->name;
        return view('product.index',compact("user","products","page_name","page_subpage", "page_icon"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_name = "Product";
        $page_subpage = "All";
        $page_icon ="fa fa-boxes";
        $auth = Auth::user();
        $employees = Employee::all();
        foreach ($employees as $key) {
            if ($key->id == $auth->employee_id) {
                $user = $key;

            }
        }

       
        $categories = ProductCategory::all();
        $brands = Brand::all();

        return view('product.create',compact("user","categories","brands","page_name","page_subpage", "page_icon"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Product::create($request->all());
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $page_name = "Product";
        $page_subpage = "update";
        $page_icon ="fa fa-boxes";
        $auth = Auth::user();
        $employees = Employee::all();
        foreach ($employees as $key) {
            if ($key->id == $auth->employee_id) {
                $user = $key;

            }
        }

       
        $categories = ProductCategory::all();
        $brands = Brand::all();

        return view('product.edit',compact("user", "product","categories","brands","page_name","page_subpage", "page_icon"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

        Product::find($product->id)->update($request->all());
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
                //
                Product::find($product->id)->delete();
                return redirect()->route('product');
    }
}
