
@extends('front.layouts.app')

@section('title')
    Single Blog Page
@endsection

@section('style')

@endsection



@section('content')
<section class="main max-w-screen-xl mx-auto mt-7 md:w-10/12 sm:w-full  mb-9">
        <div class="gap-5 grid md:grid-cols-1 lg:grid-cols-3 sm:grid-cols-1">
            <!-- first box -->
            <div class="box  col-span-2 sm:grid-span-1">
                <h2 class="bg-slate-400 w-[200px] text-white py-3 text-lg text-center uppercase font-bold italic tracking-widest hover:bg-red-600"><a href="">{{ $post->getCategory->name }}</a></h2>
                <div class="mt-5">
                    @if(!empty($post->slider_image))
                        <img src="@if(!empty($post->slider_image)){{ asset('storage/'.$post->slider_image) }} @endif" alt="" class="w-full h-[500px] object-cover rounded-md">
                    @endif
                    @if(!empty($post->post_image))
                        <img src="@if(!empty($post->post_image)){{ asset('storage/'.$post->post_image) }} @endif" alt="" class="w-full h-[500px] object-cover rounded-md">
                    @endif
                    @if(!empty($post->image))
                    <img src="{{ asset('storage/'.$post->image) }}" alt="" class="w-full h-[500px] object-cover rounded-md">
                    @endif

                    <div class="flex justify-between p-4">
                        <div class="text-base text-gray-400">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>{{ $post->date }}</span>
                        </div>
                        <div class="text-base text-gray-400">
                            <i class="fa-solid fa-eye"></i>
                            <span>{{ $post->views }}</span>
                        </div>
                    </div>
                    <p class="px-4 text-lg text-black font-semibold">@if (!empty($post->title)){{ $post->title }}@endif</p>
                    <div class="p-4">                       
                        <img src="{{ asset('storage/'.$post->user->user_image) }}" alt=""class="w-[40px] h-[40px] rounded-full object-cover inline-block">                        
                        <span class="ml-2 text-base text-gray-400 capitalize">@if (!empty($post->user->name)) {{ $post->user->name }}@endif</span>
                    </div>
                </div>
                <div class="mt-10 mb-4">
                    <p class="text-lg text-black py-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black py-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black py-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black py-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <!-- <div class="my-3">
                        <img src="../images/istockphoto-1488944909-170667a.webp" alt="" class="w-full h-[500px] object-cover rounded-md">
                    </div> -->
                    <p class="text-lg text-black pb-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black pb-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <div class="px-4 py-5 border rounded-md">
                        <i class="fa-solid fa-quote-left"></i>
                        <p class="text-black font-bold italic text-lg">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat</p>
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <p class="text-lg text-black pb-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black pb-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black pb-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black pb-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                    <p class="text-lg text-black pb-2">@if (!empty($post->description)){{ $post->description }} @endif</p>
                </div>
                <hr>
                <div class="mt-7">
                    <div class="my-2">
                        <a class="p-2 bg-red-500 uppercase text-white text-[12px] font-semibold tracking-wider">vie</a>
                        <a class="p-2 bg-gray-300 hover:bg-red-500 uppercase text-white text-[12px] font-semibold tracking-wider">@if (!empty($post->user->name))
                            {{ $post->user->name }}
                        @endif</a>
                    </div>
                    <div class="my-6">
                        <a class="p-2 bg-red-500 text-white text-[12px] font-semibold tracking-wider uppercase">Tags</a>
                        @if ($post->tags->isNotEmpty())
                            @foreach ($post->tags as $tag)
                                 <a href="{{ route('single.tag',$tag->name) }}" class="p-2 bg-gray-300 hover:bg-red-500 text-white text-[12px] font-semibold tracking-wider uppercase">{{ $tag->name }}</a>    
                            @endforeach
                        @else
                         <p href="#" class="p-2 text-red-500 uppercase">Tag Not Found</p>
                        @endif
                    </div>
                    <hr>
                </div>
                <!-- related product div -->
                <div>
                    <h2 class="bg-red-600 w-[200px] text-white py-3 text-lg text-center uppercase font-bold italic tracking-widest mt-5">related news</h2>
                    <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-5 container mt-5 mx-auto">
                        @if($related_posts->isNotEmpty())
                            @foreach ($related_posts as $related_post)
                            <div class="p-1 shadow-lg rounded-lg">
                                <div class="w-full h-[250px] rounded-sm relative overflow-hidden">
                                    <a href="{{ route('single.blog',$related_post->slug) }}"><img src="{{ asset('storage/'.$related_post->post_image) }}" alt="" class="w-full h-full rounded-lg hover:scale-110 duration-1000"></a>
                                    <span class="uppercase text-[13px] p-2 bg-white absolute bottom-5 left-5  tracking-widest font-semibold">{{ $related_post->getCategory->name}}</span>
                                </div>
                                <div class="flex justify-between my-4">
                                    <div>
                                        <i class="fa-solid fa-calendar-days text-gray-400 text-sm"></i>
                                        <span class="text-gray-400 text-sm">{{ $related_post->date }}</span>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-eye text-gray-400 text-sm"></i>
                                        <span class="text-gray-400 text-sm">{{ $related_post->views }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('single.blog', $related_post->slug) }}" class="text-lg text-balck font-semibold hover:text-red-400">{{ $related_post->title }}</a>
                                <div class="flex justify-between mt-7">
                                    <div class="">
                                        <img src="{{ asset('storage/'.$related_post->user->user_image) }}" alt="" class="w-12 h-12 rounded-full inline-flex">
                                        <span class="ml-2 text-lg text-gray-400">{{ $related_post->user->name }}</span>
                                    </div>
                                    <a href="{{ route('single.blog', $related_post->slug )}}" class="text-sm uppercase font-semibold  text-gray-400 hover:text-red-400 mt-2">Read More</a>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p class="text-red-500 text-center">No Related Posts Found</p>
                        @endif
                       
                    </div>
                </div>
                <!-- related product div end -->
                <!-- comment section -->
                @if (!empty($comment_allow))
                    
                
                <div class="mt-9">
                    <h2 class="bg-red-600 w-[250px] text-white py-3 text-lg text-center uppercase font-bold italic tracking-widest"">leave a comment</h2>
                    <div class="mt-6">
                        <h4 class="text-xl text-center text-black font-bold">What do you think ?</h4>
                        <span class="text-gray-400 text-center block tex-sm mt-2">20 Responses</span>
                        <div class="flex  flex-wrap justify-center gap-2 mt-5">
                            <div class="flex flex-col text-center border px-6 py-1 rounded-md hover:bg-red-400 hover:after:text-white">
                                <a href="" class="hover:text-gray-400">
                                <i class="fa-solid fa-thumbs-up text-[40px] text-yellow-400"></i>
                                <p class="text-black font-bold hob">5</p>
                                <span class="text-gray-400 text-sm">Upvote</span>
                                </a>
                            </div>
                            <div class="flex flex-col text-center border px-6 py-1 rounded-md hover:bg-red-400 hover:after:text-white">
                                <a href="" class="hover:text-gray-400">
                                <i class="fa-solid fa-heart text-[40px] text-yellow-400"></i>
                                <p class="text-black font-bold hob">5</p>
                                <span class="text-gray-400 text-sm">Heart</span>
                                </a>
                            </div>
                            <div class="flex flex-col text-center border px-6 py-1 rounded-md hover:bg-red-400 hover:after:text-white">
                                <a href="" class="hover:text-gray-400">
                                <i class="fa-regular fa-face-laugh-squint text-[40px] text-yellow-400"></i>
                                <p class="text-black font-bold hob">5</p>
                                <span class="text-gray-400 text-sm">Funny</span>
                                </a>
                            </div>
                            <div class="flex flex-col text-center border px-6 py-1 rounded-md hover:bg-red-400 hover:after:text-white">
                                <a href="" class="hover:text-gray-400">
                                <i class="fa-regular fa-face-surprise text-[40px] text-yellow-400"></i>
                                <p class="text-black font-bold hob">5</p>
                                <span class="text-gray-400 text-sm ">Surprice</span>
                                </a>
                            </div>
                            <div class="flex flex-col text-center border px-6 py-1 rounded-md hover:bg-red-400 hover:after:text-white">
                                <a href="" class="hover:text-gray-400">
                                <i class="fa-regular fa-face-angry text-[40px] text-yellow-400"></i>
                                <p class="text-black font-bold hob">5</p>
                                <span class="text-gray-400 text-sm ">Angry</span>
                                </a>
                            </div>
                            <div class="flex flex-col text-center border px-6 py-1 rounded-md hover:bg-red-400 hover:after:text-white">
                                <a href="" class="hover:text-gray-400">
                                <i class="fa-solid fa-face-sad-tear text-[40px] text-yellow-400"></i>
                                <p class="text-black font-bold hob">5</p>
                                <span class="text-gray-400 text-sm ">Sad</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- comment section end -->
                 <div class="mt-9 flex justify-between px-4 mb-4">
                    <span class="text-black text-base font-bold">@if ($comments->isNotEmpty())
                        {{ (count($comments) ? count($comments) : '0') }} Comment
                        @else
                        0 Comments
                        @endif </span>
                    <div>
                        <select name="" id="select" class="cursor-pointer focus:border-2 border-gray-600 rounded">
                            <option value="" disabled selected class="font-bold text-black">Login</option>
                            <option value="">Gmail</option>
                            <option value="">Twiter</option>
                            <option value="">Microsoft</option>
                        </select>
                    </div>
                 </div>
                 <hr class="border-2 bg-black mx-4 m-auto">
                 <div class="mt-5 flex px-4 gap-2">
                    <span class="w-[50px] h-[45px] text-center leading-[45px] text-[30px] font-bold text-black bg-gray-400 rounded-lg">G</span>
                    <form action="{{ route('post.comment',$post->id) }}" class="w-full" method="post">
                        @csrf
                        <input type="hidden" value="{{ $post->id }}" name="post">
                        <div>
                            <textarea name="comment" placeholder="Enter Your Comments" id="" class="w-full h-[150px] border-2 rounded-lg resize-none focus:border-2 focus:border-gray-300 p-5 focus:outline-none"></textarea>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="px-3 p-2 bg-gray-400 text-white font-bold text-base rounded-full hover:bg-gray-600">Comment</button>
                        </div>
                    </form>
                 </div>
                 <!-- login section -->
                 <div class="flex flex-wrap mt-3 px-4 gap-3">
                    <div>
                        <h2 class="uppercase text-sm text-bold">Login in With</h2>
                        <div class="link mt-2">
                           <a href="" class="bg-blue-500"><i class="fa-brands fa-facebook"></i></a>
                           <a href="" class="bg-pink-600"><i class="fa-brands fa-google"></i></a>
                           <a href="" class="bg-black"><i class="fa-brands fa-twitter"></i></a>
                           <a href="" class="bg-lime-500"><i class="fa-brands fa-apple"></i></a>
                           <a href="" class="bg-orange-300"><i class="fa-brands fa-microsoft"></i></a>
                        </div>
                    </div>
                    <div class="grow">
                        <h2 class="uppercase text-sm text-bold text-black">or sign up with DISQUS ?</h2>
                        <form action="" class="w-full mt-2">
                            <div class="mb-2">
                                <input type="text" placeholder="Name" class="w-[100%] block py-1 px-3 border-2 outline-none focus:border-red-500 placeholder:text-sm rounded">
                            </div>
                            <div class="mb-2">
                                <input type="email" placeholder="Email" class="w-[100%] block py-1 px-3 border-2 outline-none focus:border-red-500 placeholder:text-sm rounded">
                            </div>
                            <div class="mb-2">
                                <input type="password" placeholder="Password" class="w-[100%] block py-1 px-3 border-2 outline-none focus:border-red-500 placeholder:text-sm rounded">
                            </div>
                            <div class="float-right">
                                <button type="submit" class="px-3 p-2 bg-gray-400 text-white font-bold text-[10px] rounded-full hover:bg-gray-600">Sign Up</button>
                            </div>
                        </form>
                    </div>
                 </div>
                 <div class="mt-4 flex justify-between flex-wrap">
                    <div class="flex align-middle">
                        <span class="text-base text-gray-600 hover:text-gray-400 font-bold mt-2 cursor-pointer share-button">.Share</span>
                        <div class="link ml-3 share-option share-link">
                           <a href="" class="bg-blue-500"><i class="fa-brands fa-facebook"></i></a>
                           <a href="" class="bg-pink-600"><i class="fa-brands fa-facebook-messenger"></i></a>
                           <a href="" class="bg-black"><i class="fa-brands fa-twitter"></i></a>
                           <a href="" class="bg-lime-400"><i class="fa-solid fa-link"></i></a>
                        </div>
                    </div>
                    <div class="px-4 filter-comment">
                        <a class="text-sm text-black font-bold ml-2 " data="first">Best</a>
                        <a class="text-sm text-black font-bold ml-2" data="second">Newset</a>
                        <a class="text-sm text-black font-bold ml-2" data="third">Oldest</a>
                    </div>
                 </div>
                 <div class="mt-10">
                    <div class="tab-comment pb-2">
                        {{-- show all comment --}}
                        @if ($comments->isNotEmpty())
                            @foreach ($comments as $comment)
                            <article class="p-6 text-base bg-white mb-2 rounded-lg dark:bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                                class="mr-2 w-2 h-2 rounded-full" style="width: 50px; height: 50px; object-fit: cover;"
                                                src="{{ asset('storage/'.$comment->user->user_image) }}"
                                                alt="Michael Gough">{{ $comment->user->name }}</p>
                                        <p class="text-sm block text-gray-600 dark:text-gray-400"> | <time datetime="2022-02-08" 
                                            title="February 8th, 2022">{{ date('d m Y',strtotime($comment->created_at))}}</time></p>  |  
                                         <form action="{{ route('comment.delete') }}" class="float-right ml-5" method="post">
                                             @csrf   
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                            <button type="submit" class="text-red-500 p-2 ml-5"><i class="fa-solid fa-trash"></i></button>
                                        </form>  
                                    </div>
                                    
                                </footer>
                                <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
                                {{-- display comment reply --}}
                                <div class="ml-3 mt-2">
                                    @if ($comment->commentReplies->isNotEmpty())
                                    @foreach ($comment->commentReplies as $reply)
                                                                               
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                                    class="mr-2 w-2 h-2 rounded-full" style="width: 50px; height: 50px; object-fit: cover;"
                                                    src="{{ asset('storage/'.$reply->user->user_image) }}"
                                                    alt="Michael Gough">{{ $reply->user->name }}</p>
                                                    
                                            <p class="text-sm block text-gray-600 dark:text-gray-400"> | <time datetime="2022-02-08" title="February 8th, 
                                                2022">{{ date('d m Y',strtotime($reply->created_at))}}</time></p>  |  
                                            <form action="{{route('comment.reply.delete')}}" class="float-right ml-5" method="post">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <input type="hidden" name="comment_reply_id" value="{{ $reply->id }}">
                                                <button type="submit" class="text-red-500 p-2 ml-5"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>     
                                    </footer>
                                    <p class="text-gray-500 dark:text-gray-400">{{ $reply->comment_reply }}</p>
                                    @endforeach
                                    @endif
                                </div>
                                {{-- display comment reply end --}}
                                <div class="items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="flex items-center text-sm font-bold text-gray-500 hover:underline dark:text-gray-400  reply-button">
                                        Reply
                                    </button>
                                    <div class="mt-2 open-replay-from">
                                        <form action="{{ route('comment.reply') }}" method="POST">
                                            @csrf
                                            <div>
                                                <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                                <textarea name="comment" placeholder="Enter Your Reply Comment" id="" class="w-full h-[100px] border-2 rounded-lg resize-none focus:border-2 focus:border-gray-300 p-5 focus:outline-none"></textarea>
                                            </div>
                                            <div class="">
                                                <button  type="submit" class="float-right p-1 px-3 rounded-full bg-gray-400 text-white font-bold text-[10px] hover:bg-gray-600">Reply</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </article>
                            @endforeach
                        @endif
                        
                    </div>
                    <p class="text-center tab-comment  pb-2 text-lg text-gray-400">Be the Newset to comment.</p>
                    <p class="text-center tab-comment pb-2 text-lg text-gray-400">Be the oldest to comment.</p>
                    <hr class="border-1 border-gray-700 block mt-4">
                 </div>
                 
                 <!-- facebook convention -->
                <div class="mt-7">
                    <h2 class="text-2xl text-black"> Facebook Conversations</h2>
                    <div class="flex justify-between px-3 mt-3 mb-4">
                        <span class="text-base text-black">0 Comments</span>
                        <form action="">
                            <label for="sort" class="text-sm">Sort By</label>
                            <select name="" id="sort" class="border border-gray-400 text-sm">
                                <option value="">Newest</option>
                                <option value="">Oldest</option>
                            </select>
                        </form>
                    </div>
                    <hr>
                    <div class="mt-7 flex flex-wrap gap-4">
                        <div>
                            <img src="{{ asset('/front-asset/images/download.jpg') }}" alt="" class="w-[50px] h-[50px] rounded-2xl object-cover">
                        </div>
                        <div class="flex-grow">
                            <form action="" class="w-full">
                                <div>
                                    <input type="text" placeholder="Add a Comment ..." class="w-full py-3 px-3 border-2 outline-none border-gray-400 focus:border-red-500">
                                </div>
                                <div class="float-right mt-3">
                                    <button type="submit" class="px-3 tracking-widest p-2 bg-gray-400 text-white font-bold text-[10px] rounded-full hover:bg-gray-600">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                        <div>
                            <img src="{{ asset('/front-asset/images/download.jpg') }}" alt="" class="w-[50px] h-[50px] rounded-2xl object-cover">
                        </div>
                        <div class="ml-2">
                            <a href="" class="text-base text-blue-500 hover:underline cursor-pointer font-semibold block">Name</a>
                            <span class="text-black text-sm py-2">Comment</span>
                        </div>
                    </div>
                    <div class="mt-7">
                        <i class="fa-brands fa-facebook-f p-1 rounded-full bg-blue-400"></i>
                        <a href="" class="text-xs text-blue-500 hover:underline">Facebook Comments Plugin</a>
                    </div>
                </div>
                @endif
            </div> 
            <!-- first box end -->
            <!-- second box -->
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
                    {{-- resent posts section --}}
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
                    {{-- popular post section --}}
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
                    {{-- feature news section --}}
                    <div class="mt-10 w-full mx-auto">
                        <h2 class="bg-red-600 w-52 text-white py-3 text-lg text-center font-bold italic tracking-widest">FEATURE NEWS</h2>
                        <div class="max-w-[400px]  h-[250px] p-1 rounded mt-4 mx-auto z-50" style="z-index: -1;">
                            <div class="swiper mySwiper max-w-full">
                                <div class="swiper-wrapper">
                                    @if ($featuredNews->isNotEmpty())
                                    @foreach ($featuredNews as $featuredNew)
                                    <div class="swiper-slide relative w-full h-full">
                                        <img src="{{ asset('storage/'.$featuredNew->image) }}" alt="">
                                        <div class="absolute left-4 bottom-3 px-3">
                                            <p class="text-start"><a href="{{ route('featured.news',$featuredNew->slug) }}" class="text-white text-[18px] font-semibold hover:underline hover:text-red-400">{{ Str::limit($featuredNew->title, 70) }}</a></p>
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
            <!-- second box end -->
        </div>
    </section>
    {{-- <section>
        @if (!empty($comment_allow))
            {{ $comment_allow }}
        @endif
    </section> --}}
@endsection


@section('customJs')
<script>
    $(document).ready(function(){
        $(".open-replay-from").hide();

        $(".reply-button").on('click',function(){
            $(this).siblings('.open-replay-from').toggle();
        })
    })
</script>
@endsection
