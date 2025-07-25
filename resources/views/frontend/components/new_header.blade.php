<div class="w-full bg-[#02515A] flex justify-between items-center px-6 py-3 text-xs sm:text-md">
    <div class="sm:flex grow gap-10 hidden">
        <div class="flex gap-2">
            <img src="{{ asset('new_frontend/Assets/Group 7004.png') }}" alt="">
            <div class="text-nowrap">
                +94 77 700 7707
            </div>
        </div>
        <div class="flex gap-2">
            <img src="{{ asset('new_frontend/Assets/Group 7002.png') }}" alt="">
            <div>
                info@happymangotours.com
            </div>
        </div>
    </div>
    <div class="flex grow gap-7 justify-end items-center">
        <div>Daily Updates</div>
        <img src="{{ asset('new_frontend/Assets/Path 107424.png') }}" alt="">
        <img src="{{ asset('new_frontend/Assets/Path 107423.png') }}" alt="">
        <img src="{{ asset('new_frontend/Assets/Group 22923.png') }}" alt="">
        <img src="{{ asset('new_frontend/Assets/Group 22924.png') }}" alt="">
        <div>
            <button class="px-3 py-2 bg-[#FF9933] text-white text-xs">WHATSAPP</button>
        </div>
    </div>
</div>

<div class="w-full flex justify-between px-5 sm:px-0 sm:justify-center bg-white text-black font-semibold font-pri items-center py-5 relative" style="font-size:14px;">
    <div class="hidden sm:flex order-2 sm:order-1">
        <a href="{{ route('home') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">HOME</a>
        <a href="{{ route('about') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">ABOUT</a>
        <a href="{{ route('service') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">TOUR PACKAGES</a>
    </div>
    <a href="{{ route('home') }}" class="sm:px-42 sm:order-2 flex justify-center items-center">
        <img class="h-full w-full" src="{{ asset('new_frontend/Assets/logo.png') }}" alt="">
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden sm:flex order-3">
        <a href="{{ route('gallery') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">GALLERY</a>
        <a href="{{ route('blog') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">BLOG</a>
        <a href="{{ route('contact') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">CONTACT</a>
    </div>
</div>
<div class="relative w-full z-1 hidden" id="navbar-default">
    <div class="absolute top-0 flex flex-col p-5 right-0 gap-10 bg-white text-black w-full font-semibold font-pri" style="font-size:14px;">
        <a href="{{ route('home') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">HOME</a>
        <a href="{{ route('about') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">ABOUT</a>
        <a href="{{ route('service') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">TOUR PACKAGES</a>
        <a href="{{ route('gallery') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">GALLERY</a>
        <a href="{{ route('blog') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">BLOG</a>
        <a href="{{ route('contact') }}" class="sm:px-10 font-semibold font-pri" style="font-size:14px;">CONTACT</a>
    </div>
</div>
