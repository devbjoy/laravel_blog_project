@extends('admin.layouts.layout')

@section('title','Add Post Page')

@section('content')
<!-- Content Header (Page header) -->
                <section class="content-header">                    
                    <div class="container-fluid my-2">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Update Tag</h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('tags.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <form action="{{ route('tags.update',$tags->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">                             
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="tags" class="form-label">Tags</label>
                                        <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" placeholder="Enter Tag Name" value="{{ $tags->name }}">
                                        <span class="text-danger">@error('tag'){{ $message }} @enderror</span>
                                    </div>
                                 </div>                                     
                                </div>
                            </div>                          
                        </div>
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('tags.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                    </div>
                    </form>
                    <!-- /.card -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
@endsection


