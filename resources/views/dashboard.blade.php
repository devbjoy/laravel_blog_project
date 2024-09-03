@extends('admin.layouts.layout')

@section('title','Dashboard Page')



@section('content')

<!-- Content Header (Page header) -->
                <section class="content-header">                    
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Dashboard</h1>
                            </div>
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        @if ($categories->isNotEmpty())
                                            <h3>{{ count($categories) }}</h3>
                                            <p>Category</p>
                                        @else
                                            <h3>0</h3>
                                            <p>Category</p>
                                        @endif   
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('category.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        @if ($posts->isNotEmpty())
                                            <h3>{{ count($posts) }}</h3>
                                            <p>Total News</p>
                                        @else
                                            <h3>0</h3>
                                            <p>Total News</p>
                                        @endif                                         
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{ route('posts.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                            {{-- <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        @if ($posts->isNotEmpty())
                                            <h3>{{ count($posts) }}</h3>
                                            <p>Published</p>
                                        @else
                                            <h3>0</h3>
                                            <p>Published</p>
                                        @endif
                                        <h3>$1000</h3>
                                        <p>Published</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        <h3>$1000</h3>
                                        <p>Unpublished</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div> --}}
                            <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        @if ($home_sliders->isNotEmpty())
                                            <h3>{{ count($home_sliders) }}</h3>
                                            <p>Home Slider</p>
                                        @else
                                            <h3>0</h3>
                                            <p>Home Slider</p>
                                        @endif
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{ route('slider.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        @if ($featured_news->isNotEmpty())
                                            <h3>{{ count($featured_news) }}</h3>
                                            <p>Featured News</p>
                                        @else
                                            <h3>0</h3>
                                            <p>Featured News</p>
                                        @endif
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{ route('featuredNews.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        @if ($users->isNotEmpty())
                                            <h3>{{ count($users) }}</h3>
                                            <p>Editor</p>
                                        @else
                                            <h3>0</h3>
                                            <p>Editor</p>
                                        @endif
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{ route('user.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">                            
                                <div class="small-box card">
                                    <div class="inner">
                                        @if ($tags->isNotEmpty())
                                            <h3>{{ count($tags) }}</h3>
                                            <p>Tags</p>
                                        @else
                                            <h3>0</h3>
                                            <p>Tags</p>
                                        @endif
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{ route('tags.index') }}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <!-- /.card -->
                </section>
                <!-- /.content -->

@endsection