@extends('frontend.new_layout')

@section('title', 'Round Tours | Happy Mango Tours')
@section('description', 'Explore our comprehensive Round Tours of Sri Lanka covering the best attractions and experiences in a single journey.')
@section('keywords', 'Happy Mango Tours, Sri Lanka round tours, complete Sri Lanka tour, island tour package, Sri Lanka travel')

@section('content')
    <div class="w-full py-20 flex flex-col justify-center items-center gap-5 bg-[#000000aa]">
        <div class="text-5xl sm:text-7xl font-black font-pri">Round Tours</div>
        <div class="text-xl sm:text-2xl font-black font-pri">HOME - TOURS - ROUND TOURS</div>
    </div>

    <div class="max-w-[2500px] w-full bg-white grow">
        <div class="py-20 w-full px-5 sm:px-10 flex flex-col bg-white text-black items-center justify-center gap-5">
            <div class="w-full justify-center flex gap-5 text-xs sm:text-md">
                <a href="{{ route('service') }}" class="hover:bg-[#FF9933] hover:text-white py-2 px-8 rounded-full font-bold duration-300 text-center">TAILOR MADE TOURS</a>
                <span class="w-1 h-auto bg-black"></span>
                <a href="{{ route('tours.round-tour') }}" class="bg-[#02515A] text-white py-2 px-8 rounded-full font-bold duration-300 text-center">ROUND TOURS</a>
            </div>

            <div class="w-full text-4xl sm:text-6xl font-pri font-black text-center">Round Tours – Complete Sri Lankan Experience</div>
            <div class="sm:w-3/4 mx-auto flex justify-center text-center font-pri text-sm sm:text-md">
                Our carefully designed Round Tours offer comprehensive journeys covering Sri Lanka's highlights in a single trip. These ready-made itineraries combine the best destinations, attractions, and experiences at great value.
            </div>
        </div>

        <!-- Round Tours Grid -->
        <div class="w-full bg-white sm:px-20">
            <div class="flex justify-center gap-5 flex-wrap">
                @forelse($tours as $tour)
                    <div class="">
                        <div class="sm:w-[578px] sm:h-[736px] h-[500px] bg-slate-300 flex flex-col justify-end relative group bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $tour->image) }}');">
                            <div class="absolute bg-[#02515A] top-0 right-7 rounded-b-xl text-white text-xs font-bold px-3 py-2 z-10">ROUND TOUR</div>
                            <div class="crsl-cont flex flex-col justify-end absolute w-full h-[306px]"></div>
                            <div class="bg-black/50 z-[9] opacity-0 group-hover:opacity-100 duration-300 w-full grow flex justify-center items-center text-white">
                                <a href="{{ route('tours.detail', $tour->slug) }}" class="border-2 rounded-full p-5 duration-300 group-hover:rotate-[-30deg]">
                                    <!-- Arrow Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="white" width="24" height="24" viewBox="0 0 12.86 8.045">
                                    <g id="Iconly_Light-Outline_Arrow---Down-3" data-name="Iconly/Light-Outline/Arrow---Down-3" transform="translate(-3 14.045) rotate(-90)">
                                        <g id="Arrow---Down-3" transform="translate(6 3)">
                                        <path id="Combined-Shape" d="M4.022,0a.525.525,0,0,1,.525.525V6.26H7.52a.524.524,0,0,1,.443.8l-3.5,5.551a.524.524,0,0,1-.888,0L.081,7.063a.524.524,0,0,1,.444-.8H3.5V.525A.525.525,0,0,1,4.022,0ZM6.569,7.309H1.475l2.547,4.042Z" transform="translate(0 0)" fill-rule="evenodd"/>
                                        </g>
                                    </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="p-10 font-[600] w-full text-white z-10 group-hover:bg-[#02515A] duration-300">
                                <div>{{ $tour->name }}</div>
                                <div><span class="text-xl sm:text-3xl">PRICE ${{ number_format($tour->price) }}/ </span> <span class="text-xs sm:text-md">{{ $tour->duration }} DAYS</span></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 w-full">
                        <p>No round tours available at the moment. Please check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Features Section -->
        <div class="w-full bg-white text-black py-20">
            <div class="w-full flex pt-10 px-5 sm:px-0 sm:pt-20 pb-10 flex-col justify-center items-center gap-5">
                <div class="text-xl sm:text-3xl flex justify-center font-sec">Explore with Confidence</div>
                <div class="text-3xl sm:text-5xl font-black flex justify-center font-pri text-center">Why Choose Our Round Tours?</div>
                <div class="sm:w-3/4 mx-auto flex justify-center sm:text-center font-pri">
                    Round Tours are perfect for first-time visitors to Sri Lanka who want to experience the island's diversity in a single journey. With expert planning and comprehensive itineraries, you'll see all the must-visit destinations without the hassle of planning everything yourself.
                </div>
            </div>

            <div class="w-full flex flex-wrap px-5 sm:px-20 pb-20">
                <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                    <img src="{{ asset('new_frontend/Assets/landmark.png') }}" alt="Cultural & Heritage Tour" class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0">
                    <div class="flex flex-col grow gap-5">
                        <div class="text-xl font-bold">Cultural & Heritage Tour</div>
                        <div>Explore ancient cities, temples, and UNESCO heritage sites.</div>
                    </div>
                </div>
                <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                    <img src="{{ asset('new_frontend/Assets/leaf.png') }}" alt="Wildlife & Nature Tour" class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0">
                    <div class="flex flex-col grow gap-5">
                        <div class="text-xl font-bold">Wildlife & Nature Tour</div>
                        <div>Discover national parks, safaris, and breathtaking landscapes.</div>
                    </div>
                </div>
                <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                    <img src="{{ asset('new_frontend/Assets/umbrella.png') }}" alt="Coastal & Beach Tour" class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0">
                    <div class="flex flex-col grow gap-5">
                        <div class="text-xl font-bold">Coastal & Beach Tour</div>
                        <div>Relax on pristine beaches and visit picturesque seaside towns.</div>
                    </div>
                </div>
            </div>
        </div>
<!-- Gallery Section -->
        <section class="pb-4 bg-white" id="gallery">
            <div class="w-full flex-wrap sm:flex-nowrap flex">
                <div class="h-auto max-w-1/2 sm:max-w-1/7 sm:w-1/7 grow p-[1px] sm:p-1 group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('new_frontend/Assets/img(10).png') }}" class="w-full h-auto transition-all duration-500 transform group-hover:scale-110" alt="Beach view">
                        <div class="w-full opacity-0 group-hover:opacity-100 duration-300 h-full top-0 absolute flex justify-center items-center p-5">
                            <div class="w-full h-full absolute flex justify-center items-center bg-black/50">
                                <img src="{{ asset('new_frontend/Assets/Group 23469.png') }}" alt="View image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto max-w-1/2 sm:max-w-1/7 sm:w-1/7 grow p-[1px] sm:p-1 group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('new_frontend/Assets/img(11).png') }}" class="w-full h-auto transition-all duration-500 transform group-hover:scale-110" alt="Mountain view">
                        <div class="w-full opacity-0 group-hover:opacity-100 duration-300 h-full top-0 absolute flex justify-center items-center p-5">
                            <div class="w-full h-full absolute flex justify-center items-center bg-black/50">
                                <img src="{{ asset('new_frontend/Assets/Group 23469.png') }}" alt="View image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto max-w-1/2 sm:max-w-1/7 sm:w-1/7 grow p-[1px] sm:p-1 group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('new_frontend/Assets/img(12).png') }}" class="w-full h-auto transition-all duration-500 transform group-hover:scale-110" alt="Temple view">
                        <div class="w-full opacity-0 group-hover:opacity-100 duration-300 h-full top-0 absolute flex justify-center items-center p-5">
                            <div class="w-full h-full absolute flex justify-center items-center bg-black/50">
                                <img src="{{ asset('new_frontend/Assets/Group 23469.png') }}" alt="View image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto max-w-1/2 sm:max-w-1/7 sm:w-1/7 grow p-[1px] sm:p-1 group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('new_frontend/Assets/img(13).png') }}" class="w-full h-auto transition-all duration-500 transform group-hover:scale-110" alt="Wildlife view">
                        <div class="w-full opacity-0 group-hover:opacity-100 duration-300 h-full top-0 absolute flex justify-center items-center p-5">
                            <div class="w-full h-full absolute flex justify-center items-center bg-black/50">
                                <img src="{{ asset('new_frontend/Assets/Group 23469.png') }}" alt="View image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto max-w-1/2 sm:max-w-1/7 sm:w-1/7 grow p-[1px] sm:p-1 group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('new_frontend/Assets/img(14).png') }}" class="w-full h-auto transition-all duration-500 transform group-hover:scale-110" alt="Cultural view">
                        <div class="w-full opacity-0 group-hover:opacity-100 duration-300 h-full top-0 absolute flex justify-center items-center p-5">
                            <div class="w-full h-full absolute flex justify-center items-center bg-black/50">
                                <img src="{{ asset('new_frontend/Assets/Group 23469.png') }}" alt="View image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto max-w-1/2 sm:max-w-1/7 sm:w-1/7 grow p-[1px] sm:p-1 group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('new_frontend/Assets/img(15).png') }}" class="w-full h-auto transition-all duration-500 transform group-hover:scale-110" alt="Resort view">
                        <div class="w-full opacity-0 group-hover:opacity-100 duration-300 h-full top-0 absolute flex justify-center items-center p-5">
                            <div class="w-full h-full absolute flex justify-center items-center bg-black/50">
                                <img src="{{ asset('new_frontend/Assets/Group 23469.png') }}" alt="View image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-auto max-w-1/2 sm:max-w-1/7 sm:w-1/7 grow p-[1px] sm:p-1 group cursor-pointer">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('new_frontend/Assets/img(15).png') }}" class="w-full h-auto transition-all duration-500 transform group-hover:scale-110" alt="Resort view">
                        <div class="w-full opacity-0 group-hover:opacity-100 duration-300 h-full top-0 absolute flex justify-center items-center p-5">
                            <div class="w-full h-full absolute flex justify-center items-center bg-black/50">
                                <img src="{{ asset('new_frontend/Assets/Group 23469.png') }}" alt="View image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
@endsection
