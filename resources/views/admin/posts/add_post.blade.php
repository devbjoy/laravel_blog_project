@extends('admin.layouts.layout')

@section('title','Add Post Page')

@section('content')
<!-- Content Header (Page header) -->
                <section class="content-header">                    
                    <div class="container-fluid my-2">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Add Post</h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">                             
                                <div class="row">
                                	<div class="col-md-8">
                                		<div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Post Title</label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
                                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>    
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title" value="{{ old('meta_title') }}">
                                            <span class="text-danger">@error('meta_title') {{ $message }} @enderror</span>    
                                        </div>
                                        <div class="mb-3">
                                            <label for="post_img">Post Image</label>
                                            <input type="file" name="post_img" id="post_img" class="form-control @error('post_img') is-invalid @enderror" placeholder="post_img" value="{{ old('post_img') }}">
                                            <span class="text-danger">@error('post_img') {{ $message }} @enderror</span>    
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control"></textarea placeholder="Description">
                                            <span class="text-danger">@error('description') {{ $message }} @enderror</span>    
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea name="meta_description" id="meta_description" class="form-control"></textarea placeholder="Meta Description">
                                        </div>
                                    </div>
                                	</div>
                                	<div class="col-md-4">
                                		<div class="col-md-12">
                                				{{-- <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <select name="Slug" id="Slug" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                           	</select>
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="keyword">Product Keyword</label>
                                            <input type="text" name="keyword" id="keyword" class="form-control @error('keyword') is-invalid @enderror" placeholder="Product keyword" value="{{ old('keyword') }}">
                                            @error('keyword')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                           	</select>
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
                                            <label for="tags" class="form-label">Tags</label>
                                            <select name="tags[]" id="tags" class="form-control" multiple>
                                                @if($tags->isNotEmpty())
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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