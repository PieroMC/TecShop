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
<div class="row">
    <div class="col-12">
        <div class="tile">
            <h3 class="tile-title">Update Employee</h3>
            <div class="tile-body">
                <form class="form-horizontal" method="POST" action="{{ route('employee.update', $employee) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" placeholder="names" name="name" value="{{$employee->name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Lastnames</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="type" placeholder="lastnames" name="lastname" value="{{$employee->lastname}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3" for="exampleSelect1">Document Type</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="exampleSelect1" name="document_type_id" required>
                                        <option value="0">Select document type</option>
                                        @foreach($documentType as $document)
                                        <option value="{{$document->id}}" @if($employee->document_type->id == $document->id)
                                            selected ="selected"
                                            @endif
                                            >{{$document->document}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Number document</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="type" placeholder="Number document" name="number_document" value="{{$employee->number_document}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Date of birth</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="demoDate" type="text" placeholder="Select Date" name="date_birth" value="{{$employee->date_birth}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-3">E-mail</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" placeholder="Exemple@exemple.com" name="email" value="{{$employee->email}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Telephone</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="type" placeholder="telephone" name="telephone" value="{{$employee->telephone}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3" for="exampleSelect1">Workstation</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="exampleSelect1" name="workstation_id" required>
                                        @foreach($workstation as $work)
                                        <option value="{{$work->id}}" @if($employee->workstation->id == $work->id)
                                            selected="selected"
                                            @endif
                                            >{{$work->work}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Address</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="1" placeholder="Enter your address" name="address"required>{{$employee->address}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="/employee"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
