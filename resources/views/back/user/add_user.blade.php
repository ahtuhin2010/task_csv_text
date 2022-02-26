@extends('layouts.back.master')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Add User
                        <small>Task Name: Create Read Update Delete Operation</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Add User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-header">
            <h5>Add User</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.store') }}" id="myForm">
                @csrf

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">

                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-3"><span style="color:red">*</span> Name</label>
                            <input id="name" class="form-control col-xl-8 col-md-8" id="validationCustom0" type="text" name="name" value="{{ old('name') }}">
                            <font class="ml-1" style="color: red">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>
                        </div>

                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-3"><span style="color:red">*</span> Email</label>
                            <input id="email" class="form-control col-xl-8 col-md-8" id="validationCustom0" type="email" name="email" value="{{ old('email') }}">
                            <font class="ml-1" style="color: red">{{ ($errors->has('email'))?($errors->first('email')):'' }}</font>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-3"><span style="color:red">*</span> Password</label>
                            <input id="password" class="form-control col-xl-8 col-md-8" id="validationCustom0" type="password" name="password" value="{{ old('password') }}">
                            <font class="ml-1" style="color: red">{{ ($errors->has('password'))?($errors->first('password')):'' }}</font>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="validationCustom0" class="col-xl-3 col-md-3"><span></span></label>
                            <button type="sumbit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


{{-- Jquery Validation --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection
