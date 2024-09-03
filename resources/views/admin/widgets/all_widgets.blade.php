@extends('admin.layouts.layout')

@section('title','All Widgets')

@section('content')
    <section class="content-header">                    
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Widgets</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
    <section class="toggle-container">
            <div class="tab-trigger">
                <ul>
                    <li><a>Footer Widgets</a></li>
                    <li><a>Follow Us</a></li>
                    <li><a>Recent & Popular Post</a></li>
                    <li><a>Featured News</a></li>
                    <li><a>Advertise</a></li>
                </ul>
            </div>
    </section>
    <section class="tab-container">
        {{-- footer Widgets section --}}
        <div class="tab-content-box">
           <form action="">
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">About Title</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">About Site</label></div>
               <div class="col-md-9"><textarea name="" id="" class="form-control w-full"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Social Title</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Social Media Embed</label></div>
               <div class="col-md-9"><textarea name="" id="" class="form-control w-full"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Contact Title</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Address</label></div>
               <div class="col-md-9"><textarea name="" id="" class="form-control w-full"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Phone</label></div>
               <div class="col-md-9"><input type="number" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Email</label></div>
               <div class="col-md-9"><input type="email" class="form-control w-full"></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Change"></div>
            </div>
           </form>
        </div>
        {{-- footer Widgets section end --}}

        {{-- Follow us section --}}
        <div class="tab-content-box">
           <form action="">
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Facebook URL</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Twitter URL</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Linkedin URL</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Dribbble URL</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Youtube URL</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Behance URL</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- Follow us section end --}}

        {{-- Recent & Popular Post section --}}
        <div class="tab-content-box">
           <form action="">
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Recent Posts Title</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Recent Post Limit</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Popular Posts Title</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Popular Post Limit</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></textarea></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- Recent & Popular Post section end --}}

        {{-- Featured News section --}}
        <div class="tab-content-box">
           <form action="">
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Featured Title</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Post Limit</label></div>
               <div class="col-md-9"><input type="text" class="form-control w-full"></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- Featured News section end --}}

        {{-- Advertise section --}}
        <div class="tab-content-box">
           <form action="">
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Header Advertise</label></div>
               <div class="col-md-9"><textarea name="" id="" class="form-control w-full"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Sidebar Advertise</label></div>
               <div class="col-md-9"><textarea name="" id="" class="form-control w-full"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Single Post Content Top Advertise</label></div>
               <div class="col-md-9"><textarea name="" id="" class="form-control w-full"></textarea></div>
           </div>
           <div class="row mb-4">
               <div class="col-md-3"><label for="" class="form-label">Single Post Content Bottom Advertise</label></div>
               <div class="col-md-9"><textarea name="" id="" class="form-control w-full"></textarea></div>
           </div>
            <div class="row mb-4">
               <div class="col-md-3"></div>
               <div class="col-md-9"><input type="submit" class="btn btn-primary" value="Save Changes"></div>
            </div>
           </form>
        </div>
        {{-- Advertise section end --}}



    </section>
@endsection

@section('customJs')
    <script>
        $('.tab-trigger ul li').on('click',function(){
            let index = $(this).index();

            $('.tab-trigger ul li').removeClass('active');
            $(this).addClass('active');

            $('.tab-content-box').hide();
            $('.tab-content-box').eq(index).show();

            localStorage.setItem('widgetsCount',index);
        });
            var getWidgetsCount = localStorage.getItem('widgetsCount');
            $('.tab-trigger ul li').eq(getWidgetsCount).addClass('active');
            $('.tab-content-box').eq(getWidgetsCount).show();
    </script>
@endsection
