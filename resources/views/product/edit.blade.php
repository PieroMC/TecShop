@extends('layout.template')

@section('content')

<div class="app-title" style="margin-top:0.5px">
    <div>
        <h1><i class="fa fa-home"></i>Home</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ul>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-8">
        <div class="tile">
            <h3 class="tile-title">Edit Product</h3>
            <div class="tile-body">
                <form class="form-horizontal" method="POST" action="{{ route('product.update', $product) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label col-md-3">{{__('Name')}}</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" placeholder="names" name="name" required value="{{$product->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">{{__('Description')}}</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="2" placeholder="Enter the description"
                                        name="description" required>{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3" for="exampleSelect1">{{__('Category')}}</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="exampleSelect1" name="product_categories_id"
                                        required>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}"@if($product->product_categories_id == $category->id)
                                            selected ="selected"
                                            @endif
                                            >{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">{{__('Unit Price')}}</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" placeholder="0.00" name="unit_price"
                                        required value="{{$product->unit_price}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3" for="exampleSelect1">{{__('Brand')}}</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="exampleSelect1" name="brand_id" required>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}"@if($product->brand_id == $brand->id)
                                            selected ="selected"
                                            @endif
                                            >{{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="from-group row">
                                <label class="control-label col-md-3" for="">{{__('Stock')}}</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" placeholder="stock: 1" name="stock"
                                required value="{{$product->stock}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>{{__('Update')}}</button>&nbsp;&nbsp;&nbsp;<a
                                    class="btn btn-danger" href="/products"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>{{__('Cancel')}}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection