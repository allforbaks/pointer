@extends('layouts.admin.base')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href={{ route('admin.posts.index') }}>Home</a></li>
                        <li class="breadcrumb-item active">Create category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action={{ route('admin.category.store') }}>
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Category</label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Enter cateogry" value={{ old('title') }}>
                                @error('title')
                                <div class="text-dange">This filed is required</div>
                                @enderror

                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"></input>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @endsection