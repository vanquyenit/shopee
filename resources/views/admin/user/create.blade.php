@extends('admin.layouts.layout')
@section('footerscript')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{ Html::script('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
      $(document).ready(function(){
        //Date picker
        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'L'
        });

      });
    </script>
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 1604.62px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Create</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ action('Admin\UserController@index') }}">Users</a></li>
              <li class="breadcrumb-item active">User Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      {{ Form::open(['action' => ['Admin\UserController@save'], 'method' => 'POST','class' => 'form-horizontal', 'enctype' => "multipart/form-data"]) }}
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>
            </div>
            <div class="card-body row">
              <div class="form-group col-md-6">
                {!!  Form::label('username', 'Username') !!}
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="User Name">
                @error('username')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                {!!  Form::label('first_name', 'First Name') !!}
                <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                @error('first_name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                {!!  Form::label('last_name', 'Last Name') !!}
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                @error('last_name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                {!!  Form::label('email', 'Email') !!}
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                @error('email')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                {!!  Form::label('password', 'Password') !!}
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                @error('password')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                {!!  Form::label('confirmed', 'Password Confirm') !!}
                <input type="password" name="password_confirmation" id="confirmed" class="form-control @error('confirmed') is-invalid @enderror" placeholder="Password confirmed">
                @error('confirmed')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="customFile">Avatar</label>
                  <input type="file" name="avatar"  id="customFile" class="form-control">
              </div>
              <!-- Date -->
              <div class="form-group col-md-6">
                {!!  Form::label('birthday', 'Birthday') !!}
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="birthday" id="birthday" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                @error('birthday')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                {!!  Form::label('address', 'Address') !!}
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="address">
                @error('address')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                {!!  Form::label('phone', 'Phone') !!}
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="phone">
                @error('phone')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group clearfix col-md-6">
                <div class="icheck-primary d-inline">
                  <input type="radio" id="radioPrimary1" value="1" name="gender" checked="">
                  <label for="radioPrimary1">
                    male
                  </label>
                </div>
                <div class="icheck-primary d-inline">
                  <input type="radio" id="radioPrimary2" value="0" name="gender">
                  <label for="radioPrimary2">
                    female
                  </label>
                </div>
              </div>
              <div class="form-group clearfix col-md-6">
                <div class="icheck-primary d-inline">
                  <input type="checkbox" id="active" name="active" checked="">
                  <label for="active">
                    Active
                  </label>
                  @error('active')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ action('Admin\UserController@index') }}" class="btn btn-secondary">Cancel</a>
          <button type="submit" class="btn btn-success float-right">Create new user</button>
        </div>
      </div>
      {!! Form::close() !!}
    </section>
    <!-- /.content -->
  </div>
@endsection