@extends('frontend.new_layout')

@section('title', $tourPackage->name . ' | Happy Mango Tours')
@section('description', $tourPackage->short_description)
@section('keywords', 'Happy Mango Tours, Sri Lanka tours, ' . $tourPackage->name . ', ' . $tourPackage->locations)

@section('styles')
<style>
    /* Tour Gallery Swiper Styles */
    .tour-gallery-swiper {
        width: 100%;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .tour-gallery-swiper .swiper-slide {
        position: relative;
        text-align: center;
        background: #f8f8f8;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .tour-gallery-swiper .swiper-slide:hover {
        transform: scale(1.02);
    }

    .tour-gallery-swiper .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    /* Navigation buttons customization - Smaller size */
    .swiper-button-next,
    .swiper-button-prev {
        color: white !important;
        background: #FF9933 !important;
        width: 36px !important;
        height: 36px !important;
        border-radius: 50% !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        transition: all 0.3s ease !important;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
        border: 2px solid white !important;
        z-index: 10 !important;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: #e68a2e !important;
        transform: scale(1.1) !important;
        box-shadow: 0 6px 20px rgba(0,0,0,0.3) !important;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 14px !important;
        font-weight: bold !important;
        color: white !important;
    }

    /* Pagination customization */
    .tour-gallery-swiper .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 1;
        transition: all 0.3s ease;
    }

    .tour-gallery-swiper .swiper-pagination-bullet-active {
        background: #FF9933;
        transform: scale(1.2);
        box-shadow: 0 2px 8px rgba(255, 153, 51, 0.4);
    }

    /* Make gallery responsive */
    @media (max-width: 768px) {
        .tour-gallery-swiper .swiper-slide img {
            height: 300px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            width: 28px !important;
            height: 28px !important;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 11px !important;
        }
    }

    /* Lightbox styling */
    .lightbox-overlay {
        animation: fadeIn 0.3s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Improve single image display when no gallery */
    .sm\:w-2\/3 > img.w-full { /* Escaped colon */
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .sm\:w-2\/3 > img.w-full:hover { /* Escaped colon */
        transform: scale(1.01);
    }
</style>
@endsection

@section('content')
    <!-- Hero Section with Package Name -->
    <div class="w-full py-24 flex flex-col justify-center items-center gap-5 bg-[#000000aa] bg-blend-multiply bg-cover bg-center">
        <div class="text-5xl sm:text-7xl font-black font-pri text-center text-white drop-shadow-lg">{{ $tourPackage->name }}</div>
        <div class="text-xl sm:text-2xl font-bold font-pri text-white flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-[#FF9933] transition">HOME</a>
            <span>-</span>
            <a href="{{ route('tours') }}" class="hover:text-[#FF9933] transition">TOURS</a>
        </div>
    </div>

    <div class="max-w-[2500px] w-full bg-white grow">
        <!-- Tour Navigation and Hero Image Section -->
        <div class="w-full p-10 bg-white">
            <div class="flex flex-col sm:flex-row gap-5 sm:gap-0">
                <!-- Left Navigation Menu -->
                <div class="w-full sm:w-1/3 sm:p-20">
                    <div class="flex flex-col bg-[#FF9933]">
                        <a href="#about" class="py-10 border-b flex px-15 gap-10 items-center text-xl font-bold hover:bg-[#02515A] duration-300 text-white">
                            <div>
                                <img src="{{ asset('new_frontend/Assets/about.png') }}" alt="About">
                            </div>
                            <div class="text-lg">ABOUT</div>
                        </a>
                        <a href="#included-excluded" class="py-10 border-b flex px-15 gap-10 items-center text-xl font-bold hover:bg-[#02515A] duration-300 text-white">
                            <div>
                                <img src="{{ asset('new_frontend/Assets/incexc.png') }}" alt="Include Exclude">
                            </div>
                            <div class="text-lg">INCLUDE AND EXCLUDE</div>
                        </a>
                        <a href="#itinerary" class="py-10 border-b flex px-15 gap-10 items-center text-xl font-bold hover:bg-[#02515A] duration-300 text-white">
                            <div>
                                <img src="{{ asset('new_frontend/Assets/iti.png') }}" alt="Itinerary">
                            </div>
                            <div class="text-lg">ITINERARY</div>
                        </a>
                        <a href="#location" class="py-10 border-b flex px-15 gap-10 items-center text-xl font-bold hover:bg-[#02515A] duration-300 text-white">
                            <div>
                                <img src="{{ asset('new_frontend/Assets/marker (4).png') }}" alt="Location">
                            </div>
                            <div class="text-lg">LOCATION</div>
                        </a>
                    </div>
                </div>

                <!-- Right Main Image with Gallery Slider -->
                <div class="sm:w-2/3 sm:p-20">
                    <!-- Main Gallery Slider -->
                    <div class="relative">
                        <div class="swiper tour-gallery-swiper">
                            <div class="swiper-wrapper">
                                <!-- Feature image as first slide -->
                                <div class="swiper-slide">
                                    <img class="w-full h-[400px] sm:h-[500px] object-cover rounded-lg" src="{{ asset('storage/' . $tourPackage->image) }}" alt="{{ $tourPackage->name }}">
                                </div>

                                <!-- Gallery images (if available) -->
                                @if(is_array($tourPackage->gallery_images) && count($tourPackage->gallery_images) > 0)
                                    @foreach($tourPackage->gallery_images as $imagePathString)
                                        <div class="swiper-slide">
                                            <img class="w-full h-[400px] sm:h-[500px] object-cover rounded-lg" src="{{ asset('storage/' . $imagePathString) }}" alt="{{ $tourPackage->name }} - Gallery Image">
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>

                        <!-- Navigation arrows outside the image -->
                        <div class="swiper-button-next !absolute !-right-4 !top-1/2 !-translate-y-1/2 !w-12 !h-12 !bg-[#FF9933] !text-white !rounded-full !border-2 !border-white !shadow-lg hover:!bg-[#e68a2e] transition-colors duration-200"></div>
                        <div class="swiper-button-prev !absolute !-left-4 !top-1/2 !-translate-y-1/2 !w-12 !h-12 !bg-[#FF9933] !text-white !rounded-full !border-2 !border-white !shadow-lg hover:!bg-[#e68a2e] transition-colors duration-200"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full bg-white flex flex-col sm:flex-row text-black sm:p-20 pt-0">
            <div class="w-full sm:w-2/3 p-10 flex flex-col gap-8">
                <!-- Tour Title and Price -->
                <div id="about" class="scroll-mt-24">
                    <div class="w-full text-4xl sm:text-6xl font-black font-pri mb-8">
                        {{ $tourPackage->name }}
                    </div>

                    <!-- Price Badge -->
                   <div class="py-4">
                     <div class="text-xl sm:text-3xl"><span class="font-bold">PRICE ${{ number_format($tourPackage->price) }} /</span> {{ $tourPackage->duration }} Days Trip</div>
                   </div>

                     <hr class="my-2 border-[#8A8A8A] border-dashed"/>


                    <!-- Tour Features -->
                    <div class="flex flex-col sm:flex-row w-full gap-8 sm:gap-16">
                        <div class="flex text-lg sm:text-2xl gap-6 items-center">
                            <div class="p-3 rounded-full">
                                <img src="{{ asset('new_frontend/Assets/days.png') }}" alt="Duration" class="w-8 h-8 object-contain">
                            </div>
                            <div class="text-nowrap text-gray-800">{{ $tourPackage->duration }}</div>
                        </div>
                        @if($tourPackage->category)
                        <div class="flex text-lg sm:text-2xl gap-6 items-center">
                            <div class="p-3 rounded-full">
                                <img src="{{ asset('new_frontend/Assets/type.png') }}" alt="Category" class="w-8 h-8 object-contain"> {{-- Using type.png as placeholder --}}
                            </div>
                            <div class="text-nowrap text-gray-800">{{ $tourPackage->category->name }}</div>
                        </div>
                        @endif
                        <div class="flex text-lg sm:text-2xl gap-6 items-center">
                            <div class="p-3 rounded-full">
                                <img src="{{ asset('new_frontend/Assets/numb.png') }}" alt="Group Size" class="w-8 h-8 object-contain">
                            </div>
                            <div class="text-nowrap text-gray-800">
                                @if ($tourPackage->people_count > 0)
                                    {{ $tourPackage->people_count }} People
                                @else
                                    Group size varies
                                @endif
                            </div>
                        </div>
                        
                    </div>

                    <hr class="my-2 border-[#8A8A8A] border-dashed"/>

                    <!-- Short Description -->
                    <div class="my-8 text-base leading-relaxed text-gray-700">
                        {{ $tourPackage->short_description }}
                    </div>

                     <hr class="my-2 border-[#8A8A8A] border-dashed"/>

                    <!-- About This Tour -->
                    <div class="text-4xl sm:text-5xl font-black font-pri mb-8">About this tour</div>
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! $tourPackage->description !!}
                    </div>
                </div>
                   <span class="w-3/5 h-[1px] border-dashed border-t border-[#8A8A8A]"></span>
                <!-- Included/Excluded Section -->
                <div id="included-excluded" class="scroll-mt-24 mb-8">

                    <div class="text-3xl sm:text-5xl font-black font-pri mb-8">Included/Excluded</div>

                    <div class="sm:w-4/5 flex flex-col sm:flex-row gap-8">
                        <!-- Included Items -->
                        <div class="w-full sm:w-1/2">
                            <ul class="space-y-3">
                                @foreach($tourPackage->included as $item)
                                    <li class="flex items-start gap-2 text-base">
                                        <img src="{{ asset('new_frontend/Assets/inc.png') }}" alt="Included" class="w-4 h-4 mt-1 object-contain">
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Excluded Items -->
                        <div class="w-full sm:w-1/2">
                            <ul class="space-y-3">
                                @foreach($tourPackage->excluded as $item)
                                    <li class="flex items-start gap-2 text-base">
                                        <img src="{{ asset('new_frontend/Assets/exc.png') }}" alt="Excluded" class="w-6 h-6  object-contain">
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                   <span class="w-3/5 h-[1px] border-dashed border-t border-[#8A8A8A]"></span>
                <!-- Itinerary Section -->
                <div id="itinerary" class="scroll-mt-24 mt-12">
                      <span class="w-3/5 h-[1px] border-dashed border-t border-[#8A8A8A]"></span>
                    <div class="text-3xl sm:text-5xl font-black font-pri my-6">Itinerary</div>

                    <div class="flex flex-col gap-5">
                        @foreach($tourPackage->itinerary as $day)
                            <div class="collapse collapse-arrow bg-[#F6F6F6] border border-[#CECECE] text-black rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                                <input type="radio" name="my-accordion-2" {{ $loop->first ? 'checked="checked"' : '' }} />
                                <div class="collapse-title">
                                    <div class="flex gap-6 p-4 items-center">
                                        <div class="text-white bg-[#02515A] rounded-full py-2 px-4 font-semibold shadow-sm">DAY {{ sprintf('%02d', $day->day) }}</div>
                                        <div class="text-xl font-medium">{{ $day->location }}</div>
                                    </div>
                                </div>
                                <div class="collapse-content text-base text-wrap">
                                    <div class="w-full p-5 flex flex-col sm:flex-row gap-6 border-t border-[#CECECE]">
                                        @if($day->image)
                                            <div class="w-full sm:w-1/3 mb-4 sm:mb-0">
                                                <img src="{{ asset('storage/' . $day->image) }}" alt="{{ $day->title }}" class="w-full h-auto object-cover rounded-lg shadow-md">
                                            </div>
                                        @endif
                                        <div class="w-full {{ $day->image ? 'sm:w-2/3' : '' }}">
                                            <h4 class="font-bold text-2xl mb-4 text-[#02515A]">{{ $day->title }}</h4>
                                            <div class="prose prose-lg max-w-none text-gray-700">
                                                {!! $day->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Location Section -->
                <div id="location" class="mb-10 scroll-mt-24 mt-12">
                      <span class="w-3/5 h-[1px] border-dashed border-t border-[#8A8A8A]"></span>
                    <div class="mb-6 mt-6">
                        <div class="text-3xl sm:text-5xl font-black font-pri mb-2">Tour's Location</div>
                        <div class="text-base sm:text-lg text-gray-700 font-medium">{{ $tourPackage->locations }}</div>
                    </div>
                    <div id="google-map" class="w-full h-96 rounded-lg shadow-md"></div>
                </div>
            </div>

            <div class="w-full sm:w-1/3">
                <div class="bg-[#02515A] w-full flex flex-col p-10 sm:p-16 text-white sticky top-24 rounded-lg shadow-lg">
                    <div class="text-4xl sm:text-5xl font-pri font-black mb-2">Inquiry Now</div>
                    <div class="text-lg mb-6">It's time to plan just the perfect vacation!</div>

                    @if(session('success'))
                        <div class="bg-green-600 text-white px-4 py-3 rounded-lg mb-4 flex items-center shadow-md">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-600 text-white px-4 py-3 rounded-lg mb-4 shadow-md">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tour.inquire') }}" method="POST" class="flex flex-col gap-5">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tourPackage->id }}">
                        <input type="text" name="name" placeholder="Name" class="bg-transparent border-0 border-b border-slate-400 py-3 text-white placeholder-gray-300 focus:border-[#FF9933] focus:ring-0 transition-colors" value="{{ old('name') }}" required>
                        <input type="email" name="email" placeholder="Email" class="bg-transparent border-0 border-b border-slate-400 py-3 text-white placeholder-gray-300 focus:border-[#FF9933] focus:ring-0 transition-colors" value="{{ old('email') }}" required>
                        <input type="tel" name="phone" placeholder="Phone" class="bg-transparent border-0 border-b border-slate-400 py-3 text-white placeholder-gray-300 focus:border-[#FF9933] focus:ring-0 transition-colors" value="{{ old('phone') }}" required>
                        <input type="date" name="date" placeholder="Date" class="bg-transparent border-0 border-b border-slate-400 py-3 text-white placeholder-gray-300 focus:border-[#FF9933] focus:ring-0 transition-colors" value="{{ old('date') }}" required>
                        <input type="number" name="adults" placeholder="Number of adults" class="bg-transparent border-0 border-b border-slate-400 py-3 text-white placeholder-gray-300 focus:border-[#FF9933] focus:ring-0 transition-colors" value="{{ old('adults') }}" required>
                        <input type="number" name="children" placeholder="Number of children (optional)" class="bg-transparent border-0 border-b border-slate-400 py-3 text-white placeholder-gray-300 focus:border-[#FF9933] focus:ring-0 transition-colors" value="{{ old('children') }}">
                        <textarea name="message" placeholder="Message" class="bg-transparent border-0 border-b border-slate-400 py-3 text-white placeholder-gray-300 focus:border-[#FF9933] focus:ring-0 transition-colors resize-y">{{ old('message') }}</textarea>
                        <div class="w-full flex justify-center pt-10">
                            <button type="submit" class="w-full bg-[#FF9933] py-4 rounded-full text-lg font-bold hover:bg-[#e68a2e] transition-colors shadow-md">SEND NOW</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Smooth Scroll, Notifications, and Map -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Tour Package Gallery Slider
            initializeTourGallery();
            
            // Initialize other functionality
            initializeSmoothScroll();
            initializeNotifications();
        });

        function initializeTourGallery() {
            const gallerySlider = document.querySelector(".tour-gallery-swiper");

            if (!gallerySlider) return;

            // Initialize main gallery slider
            const galleryConfig = {
                spaceBetween: 0,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                effect: "slide",
                speed: 600,
                loop: false,
                grabCursor: true,
            };

            const gallerySwiper = new Swiper(".tour-gallery-swiper", galleryConfig);

            // Add click to zoom functionality
            const galleryImages = document.querySelectorAll('.tour-gallery-swiper .swiper-slide img');
            galleryImages.forEach(function(img) {
                img.addEventListener('click', function() {
                    openLightbox(this.src, this.alt);
                });
            });
        }

        function initializeSmoothScroll() {
            // Smooth scroll for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        }

        function initializeNotifications() {
            // Auto-hide success notification after 5 seconds
            const successAlert = document.querySelector('.bg-green-600');
            if (successAlert) {
                // Scroll to the notification
                successAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });

                // Add click handler to dismiss
                successAlert.addEventListener('click', function() {
                    fadeOut(successAlert);
                });

                // Auto hide after 5 seconds
                setTimeout(() => {
                    fadeOut(successAlert);
                }, 5000);
            }
        }

        function openLightbox(imgSrc, imgAlt) {
            // Create lightbox element
            const lightbox = document.createElement('div');
            lightbox.className = 'fixed inset-0 bg-black bg-opacity-95 z-50 flex items-center justify-center p-4';
            lightbox.innerHTML = `
                <div class="relative max-w-5xl w-full">
                    <button class="absolute top-4 right-4 text-white text-4xl hover:text-yellow-500 z-10 transition-colors duration-200">&times;</button>
                    <img src="${imgSrc}" alt="${imgAlt}" class="max-w-full max-h-[90vh] mx-auto rounded-lg shadow-2xl">
                </div>
            `;

            // Add click event to close lightbox
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox || e.target.tagName === 'BUTTON') {
                    this.remove();
                }
            });

            // Add escape key to close lightbox
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    lightbox.remove();
                }
            });

            // Add lightbox to body
            document.body.appendChild(lightbox);
        }

        function fadeOut(element) {
            element.style.transition = 'opacity 0.5s ease';
            element.style.opacity = '0';
            setTimeout(() => {
                element.style.display = 'none';
            }, 500);
        }
    </script>

    <!-- Google Maps Script -->
    @php
        $apiKey = config('services.google.maps_api_key');
    @endphp

    @if($apiKey)
        <script src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&callback=initMap&libraries=places&v=weekly" defer></script>
        <script>
            // Initialize the Google Map
            function initMap() {
                // Get location from tourPackage
                const locationName = "{{ $tourPackage->locations }}, Sri Lanka";
                const mapDiv = document.getElementById("google-map");

                // Create a new map instance
                const map = new google.maps.Map(mapDiv, {
                    zoom: 10,
                    center: { lat: 7.8731, lng: 80.7718 }, // Default to Sri Lanka center
                });

                // Create a geocoder to convert the location name to coordinates
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({ address: locationName }, (results, status) => {
                    if (status === "OK") {
                        // Center map on the found location
                        map.setCenter(results[0].geometry.location);

                        // Add a marker for the location
                        new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            title: "{{ $tourPackage->name }}"
                        });
                    } else {
                        console.error(`Geocode failed: ${status}`);
                    }
                });
            }
        </script>
    @else
        <!-- Fallback when no API key is available -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mapDiv = document.getElementById("google-map");
                mapDiv.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-full bg-gray-100 rounded-lg p-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h3 class="text-lg font-semibold mb-2">Location: {{ $tourPackage->locations }}</h3>
                        <p class="text-gray-600">Google Maps preview is currently unavailable.</p>
                    </div>
                `;
            });
        </script>
    @endif
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Tour Package Gallery Slider
        initializeTourGallery();
        
        // Initialize other functionality
        initializeSmoothScroll();
        initializeNotifications();
    });

    function initializeTourGallery() {
        const gallerySlider = document.querySelector(".tour-gallery-swiper");

        if (!gallerySlider) return;

        // Initialize main gallery slider
        const galleryConfig = {
            spaceBetween: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            effect: "slide",
            speed: 600,
            loop: false,
            grabCursor: true,
        };

        const gallerySwiper = new Swiper(".tour-gallery-swiper", galleryConfig);

        // Add click to zoom functionality
        const galleryImages = document.querySelectorAll('.tour-gallery-swiper .swiper-slide img');
        galleryImages.forEach(function(img) {
            img.addEventListener('click', function() {
                openLightbox(this.src, this.alt);
            });
        });
    }

    function initializeSmoothScroll() {
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    function initializeNotifications() {
        // Auto-hide success notification after 5 seconds
        const successAlert = document.querySelector('.bg-green-600');
        if (successAlert) {
            // Scroll to the notification
            successAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Add click handler to dismiss
            successAlert.addEventListener('click', function() {
                fadeOut(successAlert);
            });

            // Auto hide after 5 seconds
            setTimeout(() => {
                fadeOut(successAlert);
            }, 5000);
        }
    }

    function openLightbox(imgSrc, imgAlt) {
        // Create lightbox element
        const lightbox = document.createElement('div');
        lightbox.className = 'fixed inset-0 bg-black bg-opacity-95 z-50 flex items-center justify-center p-4';
        lightbox.innerHTML = `
            <div class="relative max-w-5xl w-full">
                <button class="absolute top-4 right-4 text-white text-4xl hover:text-yellow-500 z-10 transition-colors duration-200">&times;</button>
                <img src="${imgSrc}" alt="${imgAlt}" class="max-w-full max-h-[90vh] mx-auto rounded-lg shadow-2xl">
            </div>
        `;

        // Add click event to close lightbox
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox || e.target.tagName === 'BUTTON') {
                this.remove();
            }
        });

        // Add escape key to close lightbox
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                lightbox.remove();
            }
        });

        // Add lightbox to body
        document.body.appendChild(lightbox);
    }

    function fadeOut(element) {
        element.style.transition = 'opacity 0.5s ease';
        element.style.opacity = '0';
        setTimeout(() => {
            element.style.display = 'none';
        }, 500);
    }
</script>
@endsection