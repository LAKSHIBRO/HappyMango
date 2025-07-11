@extends('frontend.new_layout')

@section('title', 'Gallery | Happy Mango Tours')
@section('description', 'Explore beautiful images from our Sri Lanka tours showcasing landscapes, wildlife, and cultural experiences across the island.')
@section('keywords', 'Happy Mango Tours gallery, Sri Lanka photos, travel photography, tourist attractions, Sri Lanka landscapes')

@section('content')
    <div data-aos="fade-down" class="w-full py-20 flex flex-col justify-center items-center gap-5 bg-[#000000aa]">
        <div class="text-7xl font-black font-pri">Gallery</div>
        <div class="text-2xl font-black font-pri">HOME - GALLERY</div>
    </div>
    <div data-aos="fade-down" class="max-w-[2500px] w-full bg-slate-300 grow text-white">
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
                        <div class="flex flex-col gap-4">
                            @for($i = 0; $i < $galleries->count(); $i += 2)
                                <div class="flex w-full gap-4">
                                    @php $isOddRow = (int)($i / 2) % 2 === 0; @endphp
                                    @if(isset($galleries[$i]))
                                        <div class="relative group {{ $isOddRow ? 'w-1/4' : 'w-3/4' }}">
                                            @if($galleries[$i]->caption || $galleries[$i]->description)
                                            <div class="absolute opacity-0 duration-300 group-hover:opacity-100 bg-[#00000077] w-full h-full flex justify-center text-white items-center font-medium flex-col gap-1 p-4">
                                                @if($galleries[$i]->caption)
                                                <div class="text-lg sm:text-xl text-center font-semibold">{{ $galleries[$i]->caption }}</div>
                                                @endif
                                                @if($galleries[$i]->description)
                                                <div class="text-sm sm:text-base text-center mt-1">{{ $galleries[$i]->description }}</div>
                                                @endif
                                            </div>
                                            @endif
                                            <img src="{{ asset('uploads/album/'.$galleries[$i]->image) }}" alt="{{ $galleries[$i]->caption ?? 'Gallery Image' }}" class="w-full" style="height: 550px; object-fit: cover; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                        </div>
                                    @endif
                                    @if(isset($galleries[$i+1]))
                                        <div class="relative group {{ $isOddRow ? 'w-3/4' : 'w-1/4' }}">
                                            @if($galleries[$i+1]->caption || $galleries[$i+1]->description)
                                            <div class="absolute opacity-0 duration-300 group-hover:opacity-100 bg-[#00000077] w-full h-full flex justify-center text-white items-center font-medium flex-col gap-1 p-4">
                                                @if($galleries[$i+1]->caption)
                                                <div class="text-lg sm:text-xl text-center font-semibold">{{ $galleries[$i+1]->caption }}</div>
                                                @endif
                                                @if($galleries[$i+1]->description)
                                                <div class="text-sm sm:text-base text-center mt-1">{{ $galleries[$i+1]->description }}</div>
                                                @endif
                                            </div>
                                            @endif
                                            <img src="{{ asset('uploads/album/'.$galleries[$i+1]->image) }}" alt="{{ $galleries[$i+1]->caption ?? 'Gallery Image' }}" class="w-full" style="height: 550px; object-fit: cover; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                        </div>
                                    @endif
                                </div>
                            @endfor
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
