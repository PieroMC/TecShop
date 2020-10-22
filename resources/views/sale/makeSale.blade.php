@extends('layout.template')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            {{-- <h3 class="mb-3">{{__('Sale')}}</h3> --}}
            <div class="tile-body">
                <form action="{{route('sale.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="d-flex flex-wrap align-content-center"
                                    for="voucher"><strong>{{__('Voucher Type')}}</strong></label>
                                <select class="form-control" name="voucher" id="voucher">
                                    @foreach ($vouchers as $voucher)
                                    <option value="{{$voucher->id}}">{{$voucher->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="d-flex flex-wrap align-content-center"
                                    for="clients"><strong>{{__('Clients')}}</strong></label>
                                <select class="form-control" name="client" id="client">
                                    @foreach ($clients as $client)
                                    <option value="{{$client->id}}">
                                        {{$client->name.' '.  $client->lastname.'  --  '.$client->number_document}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="d-flex flex-wrap align-content-center"
                                    for="exampleSelect1"><strong>{{__('Prodcuts')}}</strong></label>
                                <select class="form-control" id="products">
                                    @foreach ($categories as $category)
                                    <optgroup label="{{$category->category}}">
                                        @foreach ($products as $product)
                                        @if ($product->product_categories->id == $category->id)
                                        <option
                                            value="{{$product->id}}_{{$product->name}}_{{$product->unit_price}}_{{$product->stock}}">
                                            {{$product->name}}</option>
                                        @endif
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="d-flex flex-wrap align-content-center"
                                    for="quantiy">{{__('Quantiy')}}</label>
                                <input class="form-control" type="text" id="quantity" value="0" placeholder="number">
                                <p id="error" class="text-danger font-weight-bold d-none">required</p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-1 pt-1 d-flex flex-wrap align-content-center">
                            <button class="btn btn-primary btn-block" id="add"> <i class="fas fa-plus"></i><span
                                    class="pl-2">{{__('add')}}</span></button>
                        </div>
                        <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-exists"><strong>This
                                product is already added</strong></div>
                        <div class="col-md-12">
                            <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-stock">
                                <strong>Insufficient stock</strong></div>
                            <div class="col-md-12">

                                <table id="detalle" class="table table-striped">

                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>SubTotal</th>
                                        <th>Remove</th>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2">
                                        <h5 class=" d-inline font-weight-bold">Total: </h5>
                                        <h5 class=" ml-2 d-inline" id="total"></h5>
                                    </div>
                                    <div class="col-2"></div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <input id="save" class="btn btn-success" type="submit" value="save">
                                <a href="{{route('home')}}" class="btn btn-danger">Volver</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="/js/plugins/select2.min.js"></script>
<script type="text/javascript">

    $('#products').select2();
    $('#client').select2();
    let index = 0;
    let i = 1;
    let total = 0;
    let list_Product = [];
    $('#total').html(total);

    $('#add').click(function (e) {
        e.preventDefault();
        let product = $('#products').val().split('_');
        let quantity = $('#quantity').val();

        if (validate(quantity, product[0], product[3])) {
            let row = '<tr id="row' + index + '"><td><input type="hidden" name="list_products[]" value="' + product[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity + '">' + i++ + '</td><td>' + product[1] + '</td><td>' + quantity + '</td><td>' + product[2] + '</td><td>' + (product[2] * quantity) + '</td><td><button onclick="remove(' + index + ' , ' + (product[2] * quantity) + ' )" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
            $('#error').removeClass('d-block');
            $('#detalle').append(row);
            total += (product[2] * quantity);
            list_Product[index] = [product[0]];
            $('#total').html(total);
            index++;
            $('#quantity').val(0);
            $('#error-exists').removeClass('d-block');
            $('#error-stock').removeClass('d-block');
        }

    });

    function remove(row, price) {
        $('#row' + row).remove();
        total -= price;
        list_Product.splice(row);
        $('#total').html(total);
        index--;
        i--;
    }

    function validate(units, id, stock) {
        console.log(units + ' ' + stock);
        if (parseInt(units) <= parseInt(stock)) {
            if (parseInt(units) != 0) {
                for (let count = 0; count < list_Product.length; count++) {
                    const element = list_Product[count];
                    if (element == id) {
                        $('#error-exists').addClass('d-block');
                        return false;
                    }
                }
                return true;
            } else {
                $('#error').addClass('d-block');
                return false;
            }
        } else {
            $('#error-stock').addClass('d-block');
            return false;
        }
    }
</script>
@endsection