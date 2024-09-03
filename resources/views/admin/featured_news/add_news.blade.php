@extends('admin.layouts.layout')

@section('title','Add Post Page')

@section('content')
<!-- Content Header (Page header) -->
                <section class="content-header">                    
                    <div class="container-fluid my-2">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Add Feature News</h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('featuredNews.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <form action="{{ route('featuredNews.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">                             
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                        <div class="mb-3">

                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
                                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>    
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Feature News Image</label>
                                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="image" value="{{ old('slider_img') }}">
                                            <span class="text-danger">@error('image') {{ $message }} @enderror</span>    
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="label">Description</label>
                                            <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="publish" class="form-label">Publish</label>
                                            <select name="publish" id="publish" class="form-control @error('publish') is-invalid @enderror">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <span class="text-danger">@error('publish') {{ $message }} @enderror</span>
                                        </div>
                                         <div class="mb-3">
                                            <label for="unset_featured" class="form-label">Unset as Featured</label>
                                            <select name="unset_featured" id="unset_featured" class="form-control @error('unset_featured') is-invalid @enderror">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <span class="text-danger">@error('unset_featured') {{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="show_home" class="form-label">Set Home Page</label>
                                            <select name="show_home" id="show_home" class="form-control @error('show_home') is-invalid @enderror">
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
                                            <label for="tags" class="label">Tag</label>
                                            <select name="tags[]" id="tags" class="form-control" multiple>
                                                @if ($tags->isNotEmpty())
                                                    @foreach ($tags as $tag)
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
                            <a href="{{ route('featuredNews.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                    </div>
                    </form>
                    <!-- /.card -->
                </section>
                <!-- /.content -->
                {{-- </div> --}}
            <!-- /.content-wrapper -->
@endsection

@section('customJs')
<script>
    $("#tags").select2({
        maximumSelectionLength: 10
    });
</script>
@endsection