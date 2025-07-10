@extends('frontend.new_layout')

@section('title', 'Tour Packages | Happy Mango Tours')
@section('description', 'Explore our customized Sri Lanka tour packages including tailor-made tours and round tours designed to showcase the best of the island.')
@section('keywords', 'Happy Mango Tours packages, Sri Lanka tours, tailor made tours, round tours, travel packages')

@section('content')
    <div class="w-full py-20 flex flex-col justify-center items-center gap-5 bg-[#000000aa]">
        <div class="text-5xl sm:text-7xl font-black font-pri">Tour Packages</div>
        <div class="text-2xl font-black font-pri">HOME - TOURS</div>
    </div>
    <div class="max-w-[2500px] w-full bg-white grow">
        <div class="py-20 w-full px-5 sm:px-10 flex flex-col bg-white text-black items-center justify-center gap-5">
            <div class="w-full justify-center flex gap-5 text-xs sm:text-md">
                <a href="{{ route('tours.tailor-made') }}" class="bg-[#FF9933] text-white py-2 px-8 rounded-full font-bold duration-300 text-center">TAILOR MADE TOURS</a>
                <span class="w-1 h-auto bg-black"></span>
                <a href="{{ route('tours.round-tour') }}" class="hover:bg-[#FF9933] hover:text-white py-2 px-8 rounded-full font-bold duration-300 text-center">ROUND TOURS</a>
            </div>
            <div class="w-full text-4xl sm:text-6xl font-pri font-black text-center">Tailor-Made Tours – Your Journey, Your Way!</div>
            <div class="sm:w-3/4 mx-auto flex justify-center text-center font-pri text-sm sm:text-md">
                At Happy Mango Tours, we believe every traveler is unique. Our Tailor-Made Tours allow you to design a fully customized itinerary based on your interests, budget, and travel style. Whether you seek cultural discoveries, wildlife adventures, scenic getaways, or relaxing beach stays, we'll craft the perfect journey just for you.
            </div>

        </div>

        <div class="w-full bg-white sm:px-20">
            <div class="flex justify-center gap-5 flex-wrap">
                @forelse($tailorMadeTours as $tour)
                    <div class="">
                        <div class="sm:w-[578px] sm:h-[736px] h-[500px] bg-slate-300 flex flex-col justify-end relative group bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $tour->image) }}');">
                            <div class="absolute bg-[#ff9933] top-0 right-7 rounded-b-xl text-white text-xs font-bold px-3 py-2 z-10">TAILOR MADE TOURS</div>
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
                            <div class="p-10 font-[600] w-full text-white z-10 group-hover:bg-[#ff9933] duration-300">
                                <div>{{ $tour->name }}</div>
                                <div><span class="text-xl sm:text-3xl">PRICE ${{ number_format($tour->price) }}/ </span> <span class="text-xs sm:text-md">{{ $tour->duration }}</span></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 w-full">
                        <p>No tailor-made tours available at the moment. Please check back later.</p>
                    </div>
                @endforelse
            </div>


        </div>

        <div class="w-full bg-white text-black">
            <div class="w-full flex pt-10 px-5 sm:px-0 sm:pt-28 pb-10 flex-col justify-center items-center gap-5">
            <div class="text-xl sm:text-3xl flex justify-center font-sec">Enjoy with your love</div>
            <div class="text-3xl sm:text-5xl font-black flex justify-center font-pri ">Why Choose a Tailor-Made Tour?</div>
            <div class="sm:w-3/4 mx-auto flex justify-center sm:text-center font-pri">
                A tailor-made tour gives you the freedom to travel on your terms. Whether you prefer a relaxed itinerary or an action-packed adventure, we design a journey that suits your interests, pace, and budget. With handpicked accommodations, personalized experiences, and expert local guides, you get a seamless and hassle-free travel experience. From hidden gems to iconic landmarks, explore Sri Lanka exactly the way you want, with the flexibility to adjust your plans along the way.
            </div>
            </div>

            <div class="w-full flex flex-wrap px-5 sm:px-20 pb-20">
            <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                <img class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0" src="{{ asset('new_frontend/Assets/Group 23364.png') }}" alt="">
                <div class="flex flex-col grow gap-5">
                <div class="text-xl font-bold">Personalized Itineraries</div>
                <div>Travel at your own pace with destinations you love.</div>
                </div>
            </div>
            <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                <img class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0" src="{{ asset('new_frontend/Assets/hand.png') }}" alt="">
                <div class="flex flex-col grow gap-5">
                <div class="text-xl font-bold">Handpicked Experiences</div>
                <div>Enjoy top-rated accommodations and unique activities.</div>
                </div>
            </div>
            <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                <img class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0" src="{{ asset('new_frontend/Assets/pri.png') }}" alt="">
                <div class="flex flex-col grow gap-5">
                <div class="text-xl font-bold">Private Transport & Local Guides</div>
                <div>Hassle-free travel with expert assistance.</div>
                </div>
            </div>
            <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                <img class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0" src="{{ asset('new_frontend/Assets/flex.png') }}" alt="">
                <div class="flex flex-col grow gap-5">
                <div class="text-xl font-bold">Flexible Budget Options</div>
                <div>Tours designed to match your budget and preferences.</div>
                </div>
            </div>
            <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                <img class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0" src="{{ asset('new_frontend/Assets/seam.png') }}" alt="">
                <div class="flex flex-col grow gap-5">
                <div class="text-xl font-bold">Seamless Free Planning</div>
                <div>We handle all the details, so you can enjoy a hassle-free and perfectly organized trip.</div>
                </div>
            </div>
            <div class="sm:w-1/3 w-full flex gap-10 sm:px-10 py-10 sm:py-20">
                <img class="w-12 h-12 sm:w-16 sm:h-16 object-contain flex-shrink-0" src="{{ asset('new_frontend/Assets/uniq.png') }}" alt="">
                <div class="flex flex-col grow gap-5">
                <div class="text-xl font-bold">Unique Experiences</div>
                <div>Discover hidden gems, local traditions, and off-the-beaten-path adventures curated just for you.</div>
                </div>
            </div>
            </div>
        </div>

        <!-- Gallery Section -->
        @include('frontend.components.gallery')

        <!-- Call to Action Section -->
        {{-- <div class="w-full py-16 bg-[#f8f9fa] text-black">
            <div class="max-w-6xl mx-auto px-5 sm:px-20">
                <div class="flex flex-col sm:flex-row gap-10 items-center">
                    <div class="sm:w-1/2">
                        <h2 class="text-3xl sm:text-4xl font-black font-pri mb-6">Ready to Book Your Perfect Sri Lankan Adventure?</h2>
                        <p class="text-gray-700 mb-8">
                            Whether you prefer a tailor-made journey or a comprehensive round tour, our team is ready to help you plan the perfect Sri Lankan adventure. Contact us today to start planning your dream vacation!
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('contact') }}" class="bg-[#FF9933] hover:bg-[#ffab58] text-white font-bold py-3 px-8 rounded-full">CONTACT US</a>
                            <a href="#" class="border-2 border-[#02515A] hover:bg-[#02515A] hover:text-white text-[#02515A] font-bold py-3 px-8 rounded-full transition-colors">REQUEST A QUOTE</a>
                        </div>
                    </div>
                    <div class="sm:w-1/2">
                        <img src="{{ asset('new_frontend/Assets/cta-image.jpg') }}" alt="Sri Lanka Tours" class="rounded-lg shadow-lg w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
