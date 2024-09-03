
@extends('front.layouts.app')

@section('title')
    Home Page
@endsection

@section('style')

@endsection

@section('slider')
<!-- slider section -->
    <section class="max-w-screen-xl mx-auto md:w-10/12 sm:w-11/12 border-2 mt-8">
        <div class="swiper myswiper-slide">
            <div class="swiper-wrapper">
                @if ($sliders->isNotEmpty())
                    @foreach ($sliders as $slider)
                    <div class="swiper-slide relative h-[350px] w-full">
                        <img src="{{ asset('storage/'.$slider->slider_image) }}" alt="" class="w-full h-full object-cover">
                        <span class="absolute top-5 left-5 py-1 px-2 rounded-sm bg-white text-sm text-black uppercase">{{ $slider->getCategory->name }}</span>
                        <div class="absolute bottom-5 left-5 text-white">
                            <p class="text-[20px] py-2 font-bold text-start hover:underline hover:underline-offset-4"><a href="{{ route('single.slider', $slider->slug) }}">{{ $slider->title }}</a></p>
                            <h4 class="text-sm tracking-widest text-gray-400 capitalize text-start font-bold">by {{ $slider->user->name}}</h4>
                        </div>
                      </div>
                    @endforeach
                @else
                    <p class="text-red-500 text-center">No Record Found</p>
                @endif
            </div>
            <div class="swiper-pagination text-white"></div>
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-button-next text-white"></div>
          </div>
    </section>
@endsection

@section('content')
<section class="main max-w-screen-xl mx-auto mt-7 md:w-10/12 sm:w-full  mb-9">
    <div class="gap-5 grid md:grid-cols-1 lg:grid-cols-3 sm:grid-cols-1">
        <div class="box  col-span-2 sm:grid-span-1">
           @if (!empty($category_name))
             <h2 class="bg-red-600 w-[200px] text-white py-3 text-lg text-center uppercase font-bold italic tracking-widest"">{{ $category_name }}</h2>       
           @else
                <h2 class="bg-red-600 w-[200px] text-white py-3 text-lg text-center uppercase font-bold italic tracking-widest"">latest news</h2>     
           @endif
            <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-5 container mt-5 mx-auto">
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $post)
                    <div class="p-1 shadow-lg rounded-lg">
                        <div class="w-full h-[250px] rounded-sm relative overflow-hidden">
                            <a href="{{ route('single.blog',$post->slug) }}"><img src="{{ asset('storage/'.$post->post_image) }}" alt="" class="w-full object-cover h-full rounded-lg hover:scale-110 duration-1000"></a>
                            <span class="uppercase text-[13px] p-2 bg-white absolute bottom-5 left-5  tracking-widest font-semibold">{{ $post->getCategory->name }}</span>
                        </div>
                        <div class="flex justify-between my-4">
                            <div>
                                <i class="fa-solid fa-calendar-days text-gray-400 text-sm"></i>
                                <span class="text-gray-400 text-sm">{{ date('d/m/Y',strtotime($post->created_at))}}</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-eye text-gray-400 text-sm"></i>
                                <span class="text-gray-400 text-sm">{{ $post->views }}</span>
                            </div>
                        </div>
                        <a href="{{ route('single.blog',$post->slug) }}" class="text-lg text-balck font-semibold hover:text-red-400">{{ Str::limit($post->description,80) }}</a>
                        <div class="flex justify-between mt-7">
                            <div class="">
                                <img src="{{ asset('storage/'.$post->user->user_image) }}" alt="" class="w-12 h-12 object-cover rounded-full inline-flex">
                                <span class="ml-2 text-lg text-gray-400">{{ $post->user->name}}</span>
                            </div>
                            <a href="{{ route('single.blog',$post->slug) }}" class="text-sm uppercase font-semibold  text-gray-400 hover:text-red-400 mt-2">Read More</a>
                        </div>
                    </div>
                    @endforeach
                @else
                <h2 class="text-red-500 text-xl mt-5">Blog  is Empty</h2>
                @endif  
            </div>
            {{-- paginate section --}}
                <div class="flex  border-gray-200 bg-white px-4 py-3 sm:px-6 mt-5 w-full">
                   <ul>
                    @if ($posts->isNotEmpty())
                        {{ $posts->links() }}   
                     @endif
                    </ul>
                </div>
               
            {{-- paginate section end --}}
        </div>
        <div class="box  col-span-1 sm:grid-span-1 mx-auto">
            <!-- sidebar section -->
            <aside>
                <div class="w-32 mb-5">
                    <h2 class="bg-red-600 text-white py-3 text-lg text-center font-bold italic tracking-widest">SEARCH</h2>
                </div>
                <div>
                    <input type="text" placeholder="Search..." class="w-full -2 border border-gray-600 py-3 p-4 rounded mb-4 focus:border-red-600">
                    <button type="submit" class="w-full border border-red-500 text-lg tracking-widest bg-black text-center text-red-500 py-2.5 rounded hover:bg-red-500 hover:text-white">Search</button>
                </div>
                <div class="mt-10">
                    <h2 class="bg-red-600 w-52 text-white py-3 text-lg text-center font-bold italic tracking-widest">FOLLOW US</h2>
                    <div class="mt-6 pl-2 gap-2 link">
                        <a href="#" class="bg-blue-600 hover:bg-black"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="bg-red-400 hover:bg-black"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="bg-blue-200 hover:bg-black"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="bg-orange-700 hover:bg-black"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                {{-- resent post section --}}
                <div class="mt-7">
                    <a href=""><h2 class="bg-red-600 w-52 text-white py-3 text-lg text-center font-semibold tracking-widest rounded-t-lg">Recent Posts</h2></a>
                    <span class="w-full border-b-2"></span>
                    <div>
                        @if ($resentPosts->isNotEmpty())
                            @foreach ($resentPosts as $resentPost)
                            <div class="flex items-center justify-center gap-5 my-5">
                                <img src="{{ asset('storage/'.$resentPost->post_image) }}" alt="images" class="w-28 h-20 rounded border">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <div>
                                            <i class="fa-solid fa-calendar-days text-base text-gray-400"></i>
                                            <span class="text-gray-400 text-base">{{ $resentPost->date }}</span>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-eye text-sm text-gray-400"></i>
                                            <span class="text-base text-gray-400">{{ $resentPost->views }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('single.blog',$resentPost->slug) }}" class="mt-1 text-base font-semibold text-black hover:text-red-500">{{ Str::limit($resentPost->description,50) }}</a>
                                </div>
                            </div> 
                            @endforeach
                        @endif
                        
                    </div>
                </div>
                {{-- popular posts section --}}
                <div class="mt-7">
                    <a href=""><h2 class="bg-red-600 w-52 text-white py-3 text-lg text-center font-semibold tracking-widest rounded-t-lg">Popular Posts</h2></a>
                    <span class="w-full border-b-2"></span>
                    <div>
                        @if ($popular_posts->isNotEmpty())
                            @foreach ($popular_posts as $popular_post)
                            <div class="flex items-center justify-center gap-5 my-5">
                                <img src="{{ asset('storage/'.$popular_post->post_image) }}" alt="images" class="w-28 h-20 rounded border">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <div>
                                            <i class="fa-solid fa-calendar-days text-base text-gray-400"></i>
                                            <span class="text-gray-400 text-base">{{ $popular_post->date }}</span>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-eye text-sm text-gray-400"></i>
                                            <span class="text-base text-gray-400">{{ $popular_post->views }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('single.blog',$popular_post->slug) }}" class="mt-1 text-base font-semibold text-black hover:text-red-500">{{ Str::limit($popular_post->description,50) }}</a>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                {{-- feature new section --}}
                <div class="mt-10 w-full mx-auto">
                    <h2 class="bg-red-600 w-52 text-white py-3 text-lg text-center font-bold italic tracking-widest">FEATURE NEWS</h2>
                    <div class="max-w-[400px]  h-[250px] p-1 rounded mt-4 mx-auto z-auto">
                        <div class="swiper mySwiper max-w-full">
                            <div class="swiper-wrapper">
                                @if ($featuredNews->isNotEmpty())
                                    @foreach ($featuredNews as $featuredNew)
                                    <div class="swiper-slide relative w-full h-full">
                                        <img src="{{ asset('storage/'.$featuredNew->image) }}" alt="">
                                        <div class="absolute left-4 bottom-3 px-3">
                                            <p class="text-start"><a href="{{ route('featured.news', $featuredNew->slug) }}" class="text-white text-[18px] font-semibold hover:underline hover:text-red-400">{{ Str::limit($featuredNew->title, 70) }}</a></p>
                                            <div class="flex justify-between mt-2 w-full">
                                                <div class="">
                                                     <i class="fa-solid fa-calendar-days text-white font-sm text-sm"></i>
                                                    <span class="text-white font-sm text-sm">{{ $featuredNew->date }}</span>
                                                </div>
                                                <div>
                                                     <i class="fa-solid fa-eye text-white text-sm"></i>
                                                     <span class="text-white text-sm">900</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="absolute top-4 left-4 px-4 py-2 bg-white text-black text-[10px] tracking-wide uppercase">{{ $featuredNew->getCategory->name}}</h3>
                                      </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="swiper-button-prev text-white"></div>
                            <div class="swiper-button-next text-white"></div>
                          </div>
                    </div>
                </div>
            </aside>
            <!-- sidebar section end -->
        </div>
    </div>
    {{-- paginate section --}}
</section>
@endsection


@section('customJs')

@endsection
