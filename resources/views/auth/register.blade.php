<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/plugins/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e466ec6b27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="shortcut icon" href="/img/home-banner-lary.ico" type="image/x-icon">
    <title>TecShop | Register</title>
</head>

<body>

    <div class="container d-flex  justify-content-center flex-wrap align-content-center pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Register Employee</h3>
                    <div class="tile-body">

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Name</label>
                                        <div class="col-md-8">

                                            <input id="name" class="form-control" type="text" placeholder="Enter names"
                                                name="name" required>


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Lastname</label>
                                        <div class="col-md-8">

                                            <input class="form-control" type="text" placeholder="Enter lastnames"
                                                name="lastname" required>



                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Document Type</label>
                                        <div class="form-group col-md-8">

                                            <select class="form-control" name="document_type_id" required>



                                                @foreach ($document_type as $element)
                                                <option value="{{$element->id}}">{{$element->document}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Number document</label>
                                        <div class="col-md-8">

                                            <input id="number_document" class="form-control" type="text"
                                                placeholder="Enter number document" name="number_document" required>



                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Date birth</label>
                                        <div class="col-md-8">

                                            <input class="form-control" id="demoDate" type="text"
                                                placeholder="Select Date" name="date_birth" required>



                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Email</label>
                                        <div class="col-md-8">

                                            <input class="form-control" type="email" placeholder="Enter email address"
                                                name="email" required>



                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Number telephone</label>
                                        <div class="col-md-8">

                                            <input class="form-control" type="text" placeholder="Enter number telephone"
                                                name="telephone" required>



                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Address</label>
                                        <div class="col-md-8">

                                            <textarea class="form-control" rows="3" placeholder="Enter your address"
                                                name="address" required></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Workstation</label>
                                        <div class="form-group col-md-8">

                                            <select class="form-control" name="workstation_id" required>
                                                @foreach ($workstation as $element)
                                                <option value="{{$element->id}}">{{$element->work}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="toggle lg px-4 pb-2">
                                    <label>
                                        <input type="checkbox" onchange='handleChange(this);'><span
                                            class="button-indecator"></span>
                                    </label>
                                    <label>Generate user automatically</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Username</label>
                                                <div class="col-md-8">
                                                    <input id="username" class="form-control" type="text"
                                                        placeholder="Enter Usermane" name="username" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Password</label>
                                                <div class="col-md-8">
                                                    <input id="password" class="form-control" type="text"
                                                        placeholder="Enter password" name="password" required>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-3">

                                        <button class="btn btn-success" type="submit"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a
                                            class="btn btn-danger" href="/"><i
                                                class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                        <!--
                                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                  -->

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- Essential javascripts for application to work-->
    <script type="text/javascript" src="/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">


        function handleChange(checkbox) {
            if (checkbox.checked == true) {
                $('#username').val($('#name').val());
                $('#password').val($('#number_document').val());
                $('#username').attr('readonly', true);
                $('#password').attr('readonly', true);
            } else {
                $('#username').attr('readonly', false);
                $('#password').attr('readonly', false);
                $('#username').val("");
                $('#password').val("");
            }
        }


        $('#demoDate').datepicker({
            format: "yyyy/mm/dd",
            autoclose: true,
            todayHighlight: true
        });

    </script>


</body>

</html>