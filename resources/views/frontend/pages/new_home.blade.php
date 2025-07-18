@extends('frontend.new_layout')

@section('title', 'Home | Happy Mango Tours')
@section('description', 'Unforgettable journeys, breathtaking destinations, and personalized experiences await you at Happy Mango Tours!')
@section('keywords', 'Happy Mango Tours, Sri Lanka tours, travel agency, adventure tours, beach tours, cultural tours')

@section('content')
    <section class="w-full h-[80vh] flex sm:gap-10 justify-center items-center flex-col" style="background-image: url({{ asset('new_frontend/Assets/mainbg.png') }}); background-size: cover; background-position: center;">
        <div class="text-3xl sm:text-6xl font-sec">Explore the World With</div>
        <div class="relative flex flex-col items-center gap-10 sm:gap-20">
            <div class="text-6xl text-center sm:text-9xl font-black font-pri">Happy Mango Tours!</div>
            <div class="w-1/3 top-28 sm:top-24 absolute mt-12"><img src="{{ asset('new_frontend/Assets/Search Bar Container.png') }}" class="w-full" alt=""></div>
            <div class="text-md sm:text-2xl w-4/5 sm:w-2/3 text-center">Unforgettable journeys, breathtaking destinations, and personalized experiences await you!</div>
        </div>
    </section>
    <div data-aos="fade-down" class="max-w-[2500px] w-full bg-slate-300 grow text-white">

        <!-- Header -->

        <section class="w-full bg-white text-black pb-40" id="1">
            <div class="w-full flex pt-28 pb-10 flex-col justify-center">
                <div data-aos="fade-down" class="text-xl sm:text-3xl flex justify-center font-sec">Enjoy with your love</div>
                <div data-aos="fade-down" class="text-3xl sm:text-5xl font-black flex justify-center font-pri ">Adventures Travels</div>
            </div>

            <div data-aos="fade-down" class="w-full flex-col sm:flex-row flex justify-center items-center gap-10">
                <div data-aos="fade-down" class="flex flex-col items-center justify-center sm:w-1/5 gap-3 sm:gap-10 group/item">
                    <div data-aos="fade-down" class="sm:p-10 px-10 py-5">
                        <div data-aos="fade-down" class="w-full rounded-full group-hover/item:border-[#FF9933] border-8 border-[#00000000] duration-300 group relative overflow-hidden">
                            <img src="{{ asset('new_frontend/Assets/av1.png') }}" class="transition-all duration-500 transform group-hover:scale-110" alt="">
                        </div>
                    </div>
                    <div data-aos="fade-down" class="w-fit text-2xl text-center duration-200 cursor-pointer group-hover/item:text-[#FF9933] font-bold">Beach & Island</div>
                    <div data-aos="fade-down" class="w-full text-center px-5 sm:px-0 ">Relax on Sri Lanka's golden beaches and explore breathtaking tropical islands.</div>
                </div>
                <div data-aos="fade-down" class="flex flex-col items-center justify-center sm:w-1/5 gap-3 sm:gap-10 group/item">
                    <div data-aos="fade-down" class="sm:p-10 px-10 py-5">
                        <div data-aos="fade-down" class="w-full rounded-full group-hover/item:border-[#FF9933] border-8 border-[#00000000] duration-300 group relative overflow-hidden">
                            <img src="{{ asset('new_frontend/Assets/img(3).png') }}" class="transition-all duration-500 transform group-hover:scale-110" alt="">
                        </div>
                    </div>
                    <div data-aos="fade-down" class="w-fit text-2xl text-center duration-200 cursor-pointer group-hover/item:text-[#FF9933] font-bold">Adventure & Wildlife</div>
                    <div data-aos="fade-down" class="w-full text-center px-5 sm:px-0 ">Experience thrilling safaris, jungle treks, and adrenaline-filled adventures.</div>
                </div>
                <div data-aos="fade-down" class="flex flex-col items-center justify-center sm:w-1/5 gap-3 sm:gap-10 group/item">
                    <div data-aos="fade-down" class="sm:p-10 px-10 py-5">
                        <div data-aos="fade-down" class="w-full rounded-full group-hover/item:border-[#FF9933] border-8 border-[#00000000] duration-300 group relative overflow-hidden">
                            <img src="{{ asset('new_frontend/Assets/img(4).png') }}" class="transition-all duration-500 transform group-hover:scale-110" alt="">
                        </div>
                    </div>
                    <div data-aos="fade-down" class="w-fit text-2xl text-center duration-200 cursor-pointer group-hover/item:text-[#FF9933] font-bold">Cultural & Heritage</div>
                    <div data-aos="fade-down" class="w-full text-center px-5 sm:px-0 ">Discover ancient temples, historic cities, and Sri Lanka's rich traditions.</div>
                </div>
                <div data-aos="fade-down" class="flex flex-col items-center justify-center sm:w-1/5 gap-3 sm:gap-10 group/item">
                    <div data-aos="fade-down" class="sm:p-10 px-10 py-5">
                        <div data-aos="fade-down" class="w-full rounded-full group-hover/item:border-[#FF9933] border-8 border-[#00000000] duration-300 group relative overflow-hidden">
                            <img src="{{ asset('new_frontend/Assets/img(5).png') }}" class="transition-all duration-500 transform group-hover:scale-110" alt="">
                        </div>
                    </div>
                    <div data-aos="fade-down" class="w-fit text-2xl text-center duration-200 cursor-pointer group-hover/item:text-[#FF9933] font-bold">Ayurvedic & Spa</div>
                    <div data-aos="fade-down" class="w-full text-center px-5 sm:px-0 ">Rejuvenate with traditional healing treatments and luxurious spa experiences.</div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="w-full bg-[#02515A] flex flex-col sm:flex-row" id="why-choose-us">
            <div class="w-full sm:w-1/2 text-white py-20 px-10 sm:px-20">
                <div class="w-full flex flex-col gap-2">
                    <div data-aos="fade-down" class="text-xl sm:text-3xl font-sec">Unforgettable Journeys</div>
                    <div data-aos="fade-down" class="text-4xl sm:text-6xl font-extrabold font-pri">Why Choose Us?</div>
                    <div data-aos="fade-down" class="my-5 sm:my-10 flex flex-col gap-5 sm:gap-10">
                        <div data-aos="fade-down" class="flex sm:flex-row flex-col gap-4 sm:gap-10 py-5 px-3 border border-white/0">
                            <div data-aos="fade-down">
                                <div data-aos="fade-down" class="w-[112px] h-[112px] bg-[#FF9933] rounded-full flex justify-center items-center group relative overflow-hidden">
                                    <img data-aos="fade-down" class="w-auto transition-all duration-500 transform group-hover:scale-110" src="{{ asset('new_frontend/Assets/guide.png') }}" alt="">
                                </div>
                            </div>
                            <div data-aos="fade-down" class="flex flex-col justify-center">
                                <div data-aos="fade-down" class="text-xl sm:text-3xl font-black">Local & Experienced Guides</div>
                                <div data-aos="fade-down" class="text-sm sm:text-md">Knowledgeable guides to ensure an immersive and hassle-free journey.</div>
                            </div>
                        </div>
                        <div data-aos="fade-down" class="flex sm:flex-row flex-col gap-4 sm:gap-10 py-5 px-3 border border-white/0">
                            <div data-aos="fade-down">
                                <div data-aos="fade-down" class="w-[112px] h-[112px] bg-[#FF9933] rounded-full flex justify-center items-center group relative overflow-hidden">
                                    <img data-aos="fade-down" class="w-auto transition-all duration-500 transform group-hover:scale-110" src="{{ asset('new_frontend/Assets/tags.png') }}" alt="">
                                </div>
                            </div>
                            <div data-aos="fade-down" class="flex flex-col justify-center">
                                <div data-aos="fade-down" class="text-xl sm:text-3xl font-black">Flexible & Affordable Pricing</div>
                                <div data-aos="fade-down" class="text-sm sm:text-md">Customizable packages to suit every budget and preference.</div>
                            </div>
                        </div>
                        <div data-aos="fade-down" class="flex sm:flex-row flex-col gap-4 sm:gap-10 py-5 px-3 border border-white/0">
                            <div data-aos="fade-down">
                                <div data-aos="fade-down" class="w-[112px] h-[112px] bg-[#FF9933] rounded-full flex justify-center items-center group relative overflow-hidden">
                                    <img data-aos="fade-down" class="w-auto transition-all duration-500 transform group-hover:scale-110" src="{{ asset('new_frontend/Assets/user-headset.png') }}" alt="">
                                </div>
                            </div>
                            <div data-aos="fade-down" class="flex flex-col justify-center">
                                <div data-aos="fade-down" class="text-xl sm:text-3xl font-black"> 24/7 Customer Support</div>
                                <div data-aos="fade-down" class="text-sm sm:text-md">Dedicated assistance whenever you need it, day or night.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2">
                <div class="w-full flex items-end h-[871px]" style="background-image: url('{{ asset('new_frontend/Assets/img(6).png') }}'); background-size: cover; background-position: center;">
                    <div class="bg-[#FF9933] hover:bg-[#FFBB55] cursor-pointer duration-300 py-9 px-12 text-xl sm:text-2xl tracking-wider">MORE DETAILS</div>
                </div>
            </div>
        </section>

        <!-- Your Dream Vacation Section -->
        <section class="w-full bg-[#02515A]" id="dream-vacation">
            <div class="py-20 flex sm:flex-row flex-col">
                <div class="w-[278px] h-[754px] hidden sm:flex group relative overflow-hidden">
                    <img src="{{ asset('new_frontend/Assets/2.png') }}" class="w-full h-full object-fill transition-all duration-500 transform group-hover:scale-110" alt="">
                </div>
                <div class="w-full sm:w-1/2 flex grow group relative overflow-hidden">
                    <div class="w-full">
                        <img src="{{ asset('new_frontend/Assets/1.png') }}" class="w-full" alt="">
                    </div>
                </div>
                <div class="w-full sm:w-1/2 py-10 sm:py-20 px-10 flex flex-col gap-5 sm:gap-10">
                    <div class="w-full text-4xl sm:text-6xl font-pri text-white">Your Dream Vacation, Perfectly Planned!</div>
                    <div class="text-sm sm:text-xl leading-10 text-white">
                        Happy Mango Tours, we specialize in crafting unforgettable travel experiences tailored just for you. Whether you're looking for a relaxing beach escape, an action-packed adventure, or a deep dive into rich cultural heritage, we have the perfect tour to match your desires. <br><br> With expertly curated packages, experienced local guides, and personalized services, we ensure every journey is seamless, exciting, and filled with incredible memories. Let us take you on an extraordinary adventure—wherever your heart desires!
                    </div>
                    <div data-aos="fade-down" class="">
                        <button class="border hover:scale-105 duration-300 py-2 px-5 cursor-pointer font-pri text-white">LEARN MORE ABOUT</button>
                    </div>
                </div>
            </div>
        </section>

    <!-- Tailor-Made Tours Section -->
       <section class="sm:block w-full bg-white text-black px-5 sm:px-20 pb-10 sm:pb-40" id="tailor-made-tours">
            <div class="w-full flex pt-28 pb-10 flex-col justify-center items-center gap-5">
                <div data-aos="fade-down" class="text-xl sm:text-3xl flex justify-center font-sec">Enjoy with your love</div>
                <div data-aos="fade-down" class="text-3xl sm:text-5xl font-black flex justify-center font-pri ">Tailor-Made Tours</div>
                <div data-aos="fade-down" class="sm:w-3/7 flex justify-center text-center font-pri ">Customize your dream vacation! Our tailor-made tours let you design your perfect itinerary, choosing destinations, activities, and experiences that match your interests and travel style.</div>
            </div>

            <div class="swiper-container tailor-made-tours-swiper">
                <div class="swiper-wrapper">
                    @forelse($tailorMadeTours as $tour)
                    <div class="swiper-slide">
                        <div data-aos="fade-down" class="sm:w-[578px] sm:h-[736px] h-[500px] bg-slate-300 flex flex-col justify-end relative group bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $tour->image) }}');">
                            <div class="absolute bg-[#ff9933] top-0 right-7 rounded-b-xl text-white text-xs font-bold px-3 py-2 z-10">TAILOR MADE TOURS</div>
                            <div class="crsl-cont flex flex-col justify-end absolute w-full h-[306px]"></div>
                            <div class="bg-black/50 z-[9] opacity-0 group-hover:opacity-100 duration-300 w-full grow flex justify-center items-center text-white">
                                <a href="{{ url('/tours/' . $tour->slug) }}" class="border-2 rounded-full p-5 duration-300 group-hover:rotate-[-30deg]">
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
                    <div class="swiper-slide">
                        <div data-aos="fade-down" class="sm:w-[578px] sm:h-[736px] h-[500px] bg-slate-300 flex flex-col justify-end relative group bg-cover bg-center" style="background-image: url('{{ asset('new_frontend/Assets/img(7).png') }}');">
                            <div class="absolute bg-[#ff9933] top-0 right-7 rounded-b-xl text-white text-xs font-bold px-3 py-2 z-10">TAILOR MADE TOURS</div>
                            <div class="crsl-cont flex flex-col justify-end absolute w-full h-[306px]"></div>
                            <div class="bg-black/50 z-[9] opacity-0 group-hover:opacity-100 duration-300 w-full grow flex justify-center items-center text-white">
                                <div class="border-2 rounded-full p-5 duration-300 group-hover:rotate-[-30deg]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="white" width="24" height="24" viewBox="0 0 12.86 8.045">
                                        <g id="Iconly_Light-Outline_Arrow---Down-3" data-name="Iconly/Light-Outline/Arrow---Down-3" transform="translate(-3 14.045) rotate(-90)">
                                            <g id="Arrow---Down-3" transform="translate(6 3)">
                                                <path id="Combined-Shape" d="M4.022,0a.525.525,0,0,1,.525.525V6.26H7.52a.524.524,0,0,1,.443.8l-3.5,5.551a.524.524,0,0,1-.888,0L.081,7.063a.524.524,0,0,1,.444-.8H3.5V.525A.525.525,0,0,1,4.022,0ZM6.569,7.309H1.475l2.547,4.042Z" transform="translate(0 0)" fill-rule="evenodd"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-10 font-[600] w-full text-white z-10 group-hover:bg-[#ff9933] duration-300">
                                <div>No tours available at the moment</div>
                                <div><span class="text-xl sm:text-3xl">Coming Soon</span></div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
              
                
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
            <!-- Explore More Tours Button -->
            <div class="w-full flex justify-center mt-10">
                <a href="/tours" class="py-3 px-6 rounded-full text-white font-[600] bg-[#02515A] hover:bg-[#03616B] duration-300 cursor-pointer block text-center">EXPLORE MORE TOURS</a>
            </div>
        </section>

        <!-- Round Tours Section -->
        <section class="sm:block w-full bg-white text-black px-5 sm:px-20 pb-10 sm:pb-40" id="round-tours">
            <div class="w-full flex sm:pt-28 pb-10 flex-col justify-center items-center gap-5">
                <div data-aos="fade-down" class="text-xl sm:text-3xl flex justify-center font-sec">Enjoy with your love</div>
                <div data-aos="fade-down" class="text-3xl sm:text-5xl text-center font-black flex justify-center font-pri ">Round Tours - Explore Sri Lanka in a seamless journey! </div>
                <div data-aos="fade-down" class="sm:w-3/7 flex justify-center text-center font-pri text-sm sm:text-md">Discover Sri Lanka's most breathtaking destinations with our expertly curated round tours cover the island's top attractions, offering a perfect blend of adventure, culture, and relaxation.</div>
            </div>

            <div class="swiper-container round-tours-swiper">
                <div class="swiper-wrapper">
                    @forelse($roundTours as $tour)
                    <div class="swiper-slide">
                        <div data-aos="fade-down" class="sm:w-[578px] sm:h-[736px] h-[500px] bg-slate-300 flex flex-col justify-end relative group bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $tour->image) }}');">
                            <div class="absolute bg-[#ff9933] top-0 right-7 rounded-b-xl text-white text-xs font-bold px-3 py-2 z-10">ROUND TOURS</div>
                            <div class="crsl-cont flex flex-col justify-end absolute w-full h-[306px]"></div>
                            <div class="bg-black/50 z-[9] opacity-0 group-hover:opacity-100 duration-300 w-full grow flex justify-center items-center text-white">
                                <a href="{{ url('/tours/' . $tour->slug) }}" class="border-2 rounded-full p-5 duration-300 group-hover:rotate-[-30deg]">
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
                    <div class="swiper-slide">
                        <div data-aos="fade-down" class="sm:w-[578px] sm:h-[736px] h-[500px] bg-slate-300 flex flex-col justify-end relative group bg-cover bg-center" style="background-image: url('{{ asset('new_frontend/Assets/img(7).png') }}');">
                            <div class="absolute bg-[#ff9933] top-0 right-7 rounded-b-xl text-white text-xs font-bold px-3 py-2 z-10">ROUND TOURS</div>
                            <div class="crsl-cont flex flex-col justify-end absolute w-full h-[306px]"></div>
                            <div class="bg-black/50 z-[9] opacity-0 group-hover:opacity-100 duration-300 w-full grow flex justify-center items-center text-white">
                                <div class="border-2 rounded-full p-5 duration-300 group-hover:rotate-[-30deg]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" fill="white" width="24" height="24" viewBox="0 0 12.86 8.045">
                                        <g id="Iconly_Light-Outline_Arrow---Down-3" data-name="Iconly/Light-Outline/Arrow---Down-3" transform="translate(-3 14.045) rotate(-90)">
                                            <g id="Arrow---Down-3" transform="translate(6 3)">
                                                <path id="Combined-Shape" d="M4.022,0a.525.525,0,0,1,.525.525V6.26H7.52a.524.524,0,0,1,.443.8l-3.5,5.551a.524.524,0,0,1-.888,0L.081,7.063a.524.524,0,0,1,.444-.8H3.5V.525A.525.525,0,0,1,4.022,0ZM6.569,7.309H1.475l2.547,4.042Z" transform="translate(0 0)" fill-rule="evenodd"/>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-10 font-[600] w-full text-white z-10 group-hover:bg-[#ff9933] duration-300">
                                <div>No tours available at the moment</div>
                                <div><span class="text-xl sm:text-3xl">Coming Soon</span></div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
              
                
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
            <!-- Explore More Tours Button -->
            <div class="w-full flex justify-center mt-10">
                <a href="/tours/round-tour" class="py-3 px-6 rounded-full text-white font-[600] bg-[#FF9933] hover:bg-[#FFAB57]  duration-300 cursor-pointer block text-center">EXPLORE MORE TOURS</a>
            </div>
            
        </section>

        <!-- Testimonials Section -->
        @include('frontend.components.testimonials')

        <!-- FAQ Section -->
        <section class="w-full flex flex-col sm:flex-row bg-white" id="faq">
            <div class="flex w-full sm:w-1/2 p-10 sm:p-20">
                <div class="flex flex-col gap-10 ">
                    <div class="text-black flex gap-3 sm:gap-8 flex-col">
                        <div data-aos="fade-down" class="font-sec text-xl sm:text-3xl">Enjoy with your love</div>
                        <div data-aos="fade-down" class="font-pri text-4xl sm:text-6xl font-[1000]">FAQ</div>
                    </div>
                    <div data-aos="fade-down" class="text-black">
                        Got questions? We've got answers! Here are some common queries to help you plan your perfect trip with Happy Mango Tours.
                    </div>
                    <div class="w-full">
                        <div data-aos="fade-down" class="space-y-4">
                            <div data-aos="fade-down" class="border border-gray-200 rounded-lg">
                                <button data-aos="fade-down" class="flex justify-between w-full p-4 text-left font-medium text-gray-900 focus:outline-none">
                                    <span>What types of tours do you offer?</span>
                                    <svg data-aos="fade-down" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div data-aos="fade-down" class="p-4 border-t border-gray-200 hidden">
                                    <p data-aos="fade-down" class="text-gray-700">We offer a variety of tour types including tailor-made private tours, round tours covering multiple destinations, adventure tours, cultural & heritage tours, wildlife safaris, beach getaways, and special interest tours such as photography, culinary, or Ayurvedic experiences.</p>
                                </div>
                            </div>

                            <div data-aos="fade-down" class="border border-gray-200 rounded-lg">
                                <button data-aos="fade-down" class="flex justify-between w-full p-4 text-left font-medium text-gray-900 focus:outline-none">
                                    <span>Can I customize my travel itinerary?</span>
                                    <svg data-aos="fade-down" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div data-aos="fade-down" class="p-4 border-t border-gray-200 hidden">
                                    <p data-aos="fade-down" class="text-gray-700">Absolutely! Our tailor-made tours are specifically designed to be customized according to your preferences, interests, timeframe, and budget. Just let us know what you're looking for, and our travel experts will create the perfect itinerary for you.</p>
                                </div>
                            </div>

                            <div data-aos="fade-down" class="border border-gray-200 rounded-lg">
                                <button data-aos="fade-down" class="flex justify-between w-full p-4 text-left font-medium text-gray-900 focus:outline-none">
                                    <span>Do you provide transportation and accommodation?</span>
                                    <svg data-aos="fade-down" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div data-aos="fade-down" class="p-4 border-t border-gray-200 hidden">
                                    <p data-aos="fade-down" class="text-gray-700">Yes, our tour packages include private transportation with experienced drivers and carefully selected accommodations ranging from boutique hotels to luxury resorts based on your preferences and budget. We handle all the logistics so you can simply enjoy your journey.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2">
                <img data-aos="fade-down" src="{{ asset('new_frontend/Assets/img(8).png') }}" class="w-full h-full object-cover" alt="">
            </div>
        </section>

        <!-- Get in Touch Section -->
        <section class="bg-white flex sm:flex-row flex-col w-full" id="get-in-touch">
            <div class="w-full sm:w-3/8 bg-black flex gap-20 flex-col py-20 px-10 sm:px-20">
                <div data-aos="fade-down" class="text-3xl sm:text-5xl font-pri font-black text-wrap text-white">Get in Touch With Us</div>
                <div class="flex flex-col gap-10 text-sm sm:text-md text-white">
                    <div class="flex gap-10 items-center">
                        <img src="{{ asset('new_frontend/Assets/Icon Container.png') }}" class="w-[50px] h-[50px]" alt="">
                        <div>No 38/4 Moragolla Imbulgasdeniya KegalleSri Lanka P.O. Box 71000</div>
                    </div>
                    <div class="flex gap-10 items-center">
                        <img src="{{ asset('new_frontend/Assets/Icon Container2.png') }}" class="w-[50px] h-[50px]" alt="">
                        <div>0094777007707</div>
                    </div>
                    <div class="flex gap-10 items-center">
                        <img src="{{ asset('new_frontend/Assets/Icon Container3.png') }}" class="w-[50px] h-[auto]" alt="">
                        <div>info@happymangotours.com</div>
                    </div>
                    <div class="flex gap-10 items-center">
                        <img class="hover:scale-105 duration-300" src="{{ asset('new_frontend/Assets/Icon Container(1).png') }}" class="w-[50px] h-[50px]" alt="">
                        <img class="hover:scale-105 duration-300" src="{{ asset('new_frontend/Assets/Icon Container(2).png') }}" class="w-[50px] h-[50px]" alt="">
                        <img class="hover:scale-105 duration-300" src="{{ asset('new_frontend/Assets/Icon Container(3).png') }}" class="w-[50px] h-[50px]" alt="">
                        <img class="hover:scale-105 duration-300" src="{{ asset('new_frontend/Assets/Icon Container(4).png') }}" class="w-[50px] h-[50px]" alt="">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-5/8 text-black px-10 py-20 sm:px-20 flex gap-5 flex-col">
                <div class="text-xl sm:text-3xl font-sec">Submit Enquiry</div>
                <div class="text-3xl sm:text-5xl font-black font-pri">How did you hear about us?</div>
                <form action="#" method="POST" class="flex flex-wrap">
                    <div class="relative z-0 w-full md: w-1/2 sm:w-1/2 p-5">
                        <input type="text" id="inquiry_type" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="inquiry_type" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Inquiry types*</label>
                    </div>
                    <div class="relative z-0 w-full md: w-1/2 sm:w-1/2 p-5">
                        <input type="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Email*</label>
                    </div>
                    <div class="relative z-0 w-full md: w-1/2 sm:w-1/2 p-5">
                        <input type="text" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="name" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Name*</label>
                    </div>
                    <div class="relative z-0 w-full md: w-1/2 sm:w-1/2 p-5">
                        <input type="text" id="country" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="country" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country*</label>
                    </div>
                    <div class="relative z-0 w-full p-5">
                        <textarea id="message" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " rows="4"></textarea>
                        <label for="message" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Message*</label>
                    </div>
                    <div class="w-full sm:py-10 flex justify-center">
                        <button type="submit" class="bg-[#ff9933] py-2 rounded-full px-8 cursor-pointer hover:bg-[#ffab57] text-white text-sm">SUBMIT</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Gallery Section -->
        @include('frontend.components.gallery')
    </div>

@endsection

@section('additional_css')
<style>
    /* Swiper navigation styling */
    .swiper-button-next,
    .swiper-button-prev {
        color: #ff9933;
        background: rgba(255, 255, 255, 0.7);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        --swiper-navigation-size: 20px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: rgba(255, 255, 255, 0.9);
    }

    .swiper-pagination-bullet-active {
        background: #ff9933;
    }

    /* Fixes for swiper container */
    .swiper-container {
        padding-bottom: 50px;
        position: relative;
        overflow: hidden;
    }

    .tailor-made-tours-swiper .swiper-button-next,
    .round-tours-swiper .swiper-button-next {
        right: 20px;
    }

    .tailor-made-tours-swiper .swiper-button-prev,
    .round-tours-swiper .swiper-button-prev {
        left: 20px;
    }

    /* Ensure navigation stays within sections */
    #tailor-made-tours .swiper-container,
    #round-tours .swiper-container {
        position: relative;
    }
</style>
@endsection

@section('additional_js')
<script>
    // Swiper initialization
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Tailor-Made Tours Swiper
        const tailorMadeTourSwiper = new Swiper('.tailor-made-tours-swiper', {
            loop: true,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".tailor-made-tours-swiper .swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".tailor-made-tours-swiper .swiper-button-next",
                prevEl: ".tailor-made-tours-swiper .swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });

        // Initialize Round Tours Swiper
        const roundToursSwiper = new Swiper('.round-tours-swiper', {
            loop: true,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".round-tours-swiper .swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".round-tours-swiper .swiper-button-next",
                prevEl: ".round-tours-swiper .swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });

        // Initialize Testimonials Swiper
        const testimonialsSwiper = new Swiper('.testimonials-swiper', {
            loop: true,
            spaceBetween: 20,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".testimonials-swiper .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });

        // FAQ Toggles
        const faqButtons = document.querySelectorAll('#faq button');
        faqButtons.forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.classList.toggle('hidden');

                // Toggle the icon (rotate the SVG for open/close state)
                const icon = button.querySelector('svg');
                if (content.classList.contains('hidden')) {
                    icon.classList.remove('rotate-180');
                } else {
                    icon.classList.add('rotate-180');
                }
            });
        });
    });
</script>
@endsection