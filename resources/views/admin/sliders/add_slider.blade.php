@extends('admin.layouts.layout')

@section('title','Add Post Page')

@section('content')
<!-- Content Header (Page header) -->
                <section class="content-header">                    
                    <div class="container-fluid my-2">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Add Slider</h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('slider.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">                             
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Slider Title</label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
                                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>    
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="slider_img">Slider Image</label>
                                            <input type="file" name="slider_img" id="slider_img" class="form-control @error('slider_img') is-invalid @enderror" placeholder="slider_img" value="{{ old('slider_img') }}">
                                            <span class="text-danger">@error('slider_img') {{ $message }} @enderror</span>    
                                        </div>
                                        <div class="mb-3">
                                            <label for="slider_img">Slider Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>  
                                        </div>
                                        <div class="mb-3">
                                            <label for="publish" class="form-label">Publish</label>
                                            <select name="publish" id="" class="form-control @error('publish') is-invalid @enderror">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <span class="text-danger">@error('publish') {{ $message }} @enderror</span>
                                        </div>
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
                                        <div class="mb-3">
                                            <label for="show_home">Set Home Page</label>
                                            <select name="show_home" id="" class="form-control @error('show_home') is-invalid @enderror">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <span class="text-danger">@error('show_home') {{ $message }} @enderror</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="" disabled selected>Select One Category</option>
                                                @if($categories->isNotEmpty())
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                              @endforeach
                                               @endif 
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tags" class="form-label">Tag</label>
                                            <select name="tags[]" id="tags" class="form-control" multiple>
                                                @if ($tags->isNotEmpty())
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id}}">{{ $tag->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    </div>                                     
                                </div>
                            </div>                          
                        </div>
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route('slider.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
<script>
    $("#tags").select2({
        maximumSelectionLength: 10
    });
</script>
@endsection