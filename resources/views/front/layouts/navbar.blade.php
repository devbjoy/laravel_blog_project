<section class="max-w-screen-xl mx-auto md:w-10/12 sm:w-11/12">
    <div class="mb-5 mt-3">
        <p>Mon Jul 01 2024</p>
    </div>
    <div>
        <a href="{{ route('home') }}"><img src="{{ asset('/front-asset/images/logo.png') }}" alt="ilogo image" class="logo w-52 md:w-72 lg:max-w-80 my-4 "></a>
    </div>
</section> 
<!-- menu section -->
<section class="navber rounded-md max-w-screen-xl md:w-10/12 sm:w-11/12 mx-auto bg-gray-800 flex justify-between align-center text-white px-8 py-3 relative">
    <div class="cursor-pointer lg:hidden md:block bg-gray-800 toggle-mune">
        <i class="fa-solid fa-bars text-sm text-white font-bold p-2 border-2 border-white"></i>
    </div>
    <nav class="mobile-mune bg-gray-800 duration-1000">
        <ul class="inline-flex py-1 ">
           <li class="mx-[15px] text-[15px] hover:text-rose-500  font-semibold uppercase">
                <a href="{{ route('home') }}"  class="tracking-widest">Home</a>
                <i class="fa-solid fa-angle-down hover:text-rose-500  text-white text-[14px] font-bold"></i>
            </li>
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                <li class="mx-[15px] text-[15px] hover:text-rose-500  font-semibold uppercase">
                    <a href="{{ route('filter.category', $category->slug) }}"  class="tracking-widest">{{ $category->name }}</a>
                    <i class="fa-solid fa-angle-down hover:text-rose-500  text-white text-[14px] font-bold"></i>
                </li>
                @endforeach
            @endif
        </ul>
    </nav>
</section>