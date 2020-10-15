@extends('layout.template')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="options-buttons">
            <a class="btn btn-primary" href="{{route('product.create')}}">
                <i class="fas fa-plus"></i> New Register
            </a>
        </div>

    </div>
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Unit Price</th>
                                <th>Stock</th>
                                <th>Options</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            
                            <tr>
                                <td>{{ $product->name}}</td>
                                <td>{{ $product->brand->brand}}</td>
                                <td>{{ $product->product_categories->category}}</td>
                                <td>{{ $product->unit_price}}</td>
                                <td>{{ $product->stock}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('product.edit', $product)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form style="display: inline;" action="{{route('product.destroy', $product)}}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" value="" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
