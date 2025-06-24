@extends('frontend.new_layout')

@section('title', 'Gallery | Happy Mango Tours')
@section('description', 'Explore beautiful images from our Sri Lanka tours showcasing landscapes, wildlife, and cultural experiences across the island.')
@section('keywords', 'Happy Mango Tours gallery, Sri Lanka photos, travel photography, tourist attractions, Sri Lanka landscapes')

@section('content')
    <div class="w-full py-20 flex flex-col justify-center items-center gap-5 bg-[#000000aa]">
        <div class="text-7xl font-black font-pri">Gallery</div>
        <div class="text-2xl font-black font-pri">HOME - GALLERY</div>
    </div>
    <div class="max-w-[2500px] w-full bg-slate-300 grow text-white">
        <div class="py-20 w-full px-10 flex flex-col bg-white text-black items-center justify-center gap-5">
            <div class="w-full text-4xl sm:text-6xl font-pri font-black text-center">Discover the Beauty of Sri Lanka</div>
            <div class="sm:w-3/7 flex justify-center text-center font-pri">Step into our world of unforgettable journeys! Our gallery showcases the breathtaking landscapes, vibrant cultures, and heartwarming moments experienced by travelers with Happy Mango Tours.</div>
            <div class="mt-10 w-full">
                @if($galleries->isEmpty())
                    <div class="text-center text-gray-500">
                        <p>No images in the gallery yet. Check back soon!</p>
                    </div>
                @else
                    <div id="imageContainer">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($galleries as $gallery)
                                <div class="relative group">
                                    @if($gallery->caption || $gallery->description)
                                    <div class="absolute opacity-0 duration-300 group-hover:opacity-100 bg-[#00000077] w-full h-full flex justify-center text-white items-center font-medium flex-col gap-1 p-4">
                                        @if($gallery->caption)
                                        <div class="text-lg sm:text-xl text-center font-semibold">{{ $gallery->caption }}</div>
                                        @endif
                                        @if($gallery->description)
                                        <div class="text-sm sm:text-base text-center mt-1">{{ $gallery->description }}</div>
                                        @endif
                                    </div>
                                    @endif
                                    <img src="{{ asset('uploads/album/'.$gallery->image) }}" alt="{{ $gallery->caption ?? 'Gallery Image' }}" class="w-full h-64 object-cover rounded-lg shadow-md">
                                </div>
                            @endforeach
                        </div>
                        @if(isset($hasMore) && $hasMore)
                        <div class="flex justify-center mt-8">
                            <button class="btn primary-btn" onclick="loadMoreImages();">Load More</button>
                        </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Gallery Section -->
    @include('frontend.components.gallery')
@endsection
