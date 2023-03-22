@extends('admin.layouts.layout')
@section('footerscript')
    @parent
    {{ Html::script('js/admin/delete.js') }}
    <script type="text/javascript">
        var deletes = new Delete('Sending.....', 'Done !', 'Accept');
        deletes.onClick();
    </script>
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 1604.62px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content" data-select2-id="17">
      <div class="container-fluid" data-select2-id="16">
            {{ Form::open(['action' => ['Admin\UserController@index'], 'method' => 'get','class' => 'form-horizontal']) }}
              <div class="row" data-select2-id="14">
                  <div class="col-md-10 offset-md-1" data-select2-id="13">
                      <div class="form-group">
                          <div class="input-group input-group-lg">
                              <input type="search" name="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="{{ isset($dataSearch['search']) ? $dataSearch['search'] : ''  }}">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-lg btn-default">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            {!! Form::close() !!}
      </div>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <a href="{{ action('Admin\UserController@create') }}">
                <button type="button" class="btn btn-info btn-sm" data-card-widget="add user" title="add User">
                    <i class="fa fa-plus" aria-hidden="true"></i> Create
                </button>
            </a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 2%">
                          #
                      </th>
                      <th style="width: 10%">
                        username
                      </th>
                      <th style="width: 20%">
                        full name
                      </th style="width: 10%">
                      <th>
                        email
                      </th>
                      <th>
                        avatar
                      </th>
                      <th>
                        birthday
                      </th>
                      <th>
                        gender
                      </th>
                      <th style="width: 10%">
                        address
                      </th>
                      <th style="width: 10%">
                        phone
                      </th>
                      <th style="width: 8%" class="text-center">
                        active
                      </th>
                      <th style="width: 20%" class="text-center">
                        action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($users as $key => $user)
                <tr id="{{ $user->id }}">
                    <td class="action-field hidden-xs">
                        <span class="sort-additional-row">{{ $user->id }}</span>
                    </td>
                    <td class="field-title">
                        {{ $user->username }}
                    </td>
                    <td>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <img alt="Avatar" class="table-avatar" src="{{ config('path.avatar') . $user->avatar }}">
                    </td>
                    <td>
                        {{ $user->birthday }}
                    </td>
                    <td>
                        {{ $user->gender }}
                    </td>
                    <td>
                        {{ $user->address }}
                    </td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    <td class="project-state">
                      @if ($user->active === config('setting.active'))
                        <span class="badge badge-success">active</span>
                      @else
                        <span class="badge badge-danger">no active</span>
                      @endif
                    </td>
                    <td class="project-actions text-right getData" data-id={{ $user->id }}>
                        <a class="btn btn-info btn-sm" href="{{ action('Admin\UserController@edit', $user->id)  }}">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-action="{{ action('Admin\AjaxController@userDelete') }}" data-toggle="modal" data-target="#modal-sm">
                          <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                @empty
                @endforelse
              </tbody>
          </table>
          <div class="text-center mt-10">
            {{ $users->links() }}
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  @include('admin.include.modal-delete')
  @endsection