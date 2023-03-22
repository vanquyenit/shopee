@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper" style="min-height: 1604.62px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/category">Category</a></li>
              <li class="breadcrumb-item active">Category Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      {{ Form::open(['action' => ['Admin\CategoryController@update', $category->id], 'method' => 'POST','class' => 'form-horizontal']) }}
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit</h3>
              {{--  <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>  --}}
            </div>
            <div class="card-body">
              <div class="form-group">
                {!!  Form::label('title', 'Title') !!}
                <input id="title" type="text" name="title" value="{{ $category->title }}" class="form-control  @error('title') is-invalid @enderror">
                @error('title')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                {!!  Form::label('parent_id', 'Parent Category') !!}
                <select name="parent_id" id="parent_id" class="form-control custom-select">
                  <option value="">select</option>
                  @forelse ($categories as $element)
                  <option value="{{ $element->id }}" {{ $category->parent_id == $element->id ? 'selected="selected"' : '' }}>{{ $element->title }}</option>
                  @empty
                  @endforelse
                </select>
              </div>
              <div class="form-group">
                {!!  Form::label('sort', 'Sort') !!}                
                <input id="sort" type="text" name="sort" value="{{ $category->sort }}" class="form-control  @error('sort') is-invalid @enderror">
                @error('sort')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
              <div class="form-group">
                {!!  Form::label('icon', 'Icon') !!}
                {!! Form::text('icon', $category->icon, ['class' => 'form-control', 'placeholder' => 'icon']) !!}
              </div>
              <div class="form-group">
                <div class="form-check">
                  {{ Form::checkbox('active',null, $category->active ? 'checked="checked"' : '', ['class' => 'form-check-input']) }}
                  {!!  Form::label('active', 'Active', ['class' => 'form-check-label']) !!}
                </div>
                @error('active')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ action('Admin\CategoryController@index') }}" class="btn btn-secondary">Cancel</a>
          <button type="submit" class="btn btn-success float-right">Update category</button>
        </div>
      </div>
      {!! Form::close() !!}
    </section>
    <!-- /.content -->
  </div>
@endsection