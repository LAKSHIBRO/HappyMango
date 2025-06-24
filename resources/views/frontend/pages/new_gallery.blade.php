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
                @if(count($galleries) == 1)
                    <div class="w-full flex justify-center">
                        <div class="relative group w-full max-w-4xl">
                            @if($galleries[0]->caption)
                            <div class="absolute opacity-0 duration-300 group-hover:opacity-100 bg-[#00000077] w-full h-full flex justify-center text-white items-center font-medium flex-col gap-2 p-4">
                                <div class="text-xl sm:text-2xl text-center">{{ $galleries[0]->caption }}</div>
                            </div>
                            @endif
                            <img src="{{ asset('uploads/album/'.$galleries[0]->image) }}" alt="{{ $galleries[0]->caption ?? ($galleries[0]->title ?? 'Gallery Image') }}" class="w-full h-[400px] object-cover">
                        </div>
                    </div>
                @else
                    <div class="flex flex-wrap gap-2">
                        @foreach($galleries->chunk(2) as $row)
                            <div class="w-full flex gap-2 mb-2">
                                @foreach($row as $index => $gallery)
                                    <div class="relative group {{ $index == 0 ? 'w-1/4' : 'w-3/4' }}">
                                        @if($gallery->caption)
                                        <div class="absolute opacity-0 duration-300 group-hover:opacity-100 bg-[#00000077] w-full h-full flex justify-center text-white items-center font-medium flex-col gap-2 p-4">
                                            <div class="text-lg sm:text-xl text-center">{{ $gallery->caption }}</div>
                                        </div>
                                        @endif
                                        <img src="{{ asset('uploads/album/'.$gallery->image) }}" alt="{{ $gallery->caption ?? ($gallery->title ?? 'Gallery Image') }}" class="w-full h-[300px] object-cover">
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
            <!-- Gallery Section -->
        @include('frontend.components.gallery_section')
@endsection
