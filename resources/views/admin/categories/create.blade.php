@extends('admin.layouts.layout')

@section('title','Add Category Page')
@section('content')

    <!-- Content Header (Page header) -->
                <section class="content-header">                    
                    <div class="container-fluid my-2">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Create Category</h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">                             
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name">Category Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>
                                        </div>
                                    </div>                                     
                                </div>
                            </div>                          
                        </div>
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route('category.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                    </div>
                    </form>
                    <!-- /.card -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

@endsection

@section('customJs')


@endsection


