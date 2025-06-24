@extends('frontend.new_layout')

@section('title', 'Blog | Happy Mango Tours')
@section('description', 'Explore our travel blog with insights, tips, and stories about Sri Lanka destinations, culture, wildlife, and experiences.')
@section('keywords', 'Happy Mango Tours blog, travel blog, Sri Lanka travel tips, travel insights, Sri Lankan destinations')

@section('content')
    <div class="w-full py-20 flex flex-col justify-center items-center gap-5 bg-[#000000aa]">
        <div class="text-7xl font-black font-pri">Blog</div>
        <div class="text-2xl font-black font-pri"><a href="{{ route('home') }}" class="hover:text-[#FF9933] duration-200">HOME</a> - BLOG</div>
    </div>
    <div class="max-w-[2500px] w-full bg-slate-300 grow text-white">
        <div class="py-20 w-full px-5 sm:px-10 flex flex-col bg-white text-black items-center justify-center gap-5">
            <div class="w-full text-4xl sm:text-6xl font-pri font-black text-center">Daily Updates & News</div>
            <div class="sm:w-3/7 flex justify-center text-center font-pri">Our Blog </div>
            <div class="w-full sm:px-20 flex flex-wrap">
                @foreach($posts as $post)
                <div class="sm:w-1/3 p-5 flex flex-col group">
                    <div class="relative">
                        <img src="{{ asset('uploads/post/'.$post->image) }}" class="w-full" alt="{{ $post->title }}">
                        <div class="absolute top-0 text-white group-hover:bg-[#FF9933] bg-black duration-300 py-3 px-7 font-bold">
                            <div>{{ $post->category->name ?? 'Travel' }}</div>
                        </div>
                    </div>
                    <div class="py-3 pt-5 sm:pt-10 uppercase">{{ $post->created_at->format('M d, Y') }}</div>
                    <div class="text-xl font-bold border-b py-1 sm:w-4/5">{{ $post->title }}</div>
                    <div class="w-4/5 py-5">{{ Str::limit($post->short_content, 150) }}</div>
                    <div class="w-full sm:justify-start justify-end flex">
                        <a href="{{ url('blog/'.$post->slug) }}" class="text-white text-sm group-hover:bg-[#FF9933] bg-black duration-300 py-2 px-6 rounded-full">READ MORE</a>
                    </div>
                </div>
                @endforeach
            </div>

            @if(count($allPosts) > count($posts))
            <div class="w-full flex justify-center mt-10">
                <button id="load-more" class="text-white text-sm bg-[#FF9933] hover:bg-black duration-300 py-2 px-6 rounded-full cursor-pointer">Load more</button>
            </div>
            @endif
        </div>
    </div>
            <!-- Gallery Section -->
        <section class="pb-4 bg-white" id="gallery">
            {{-- <div class="w-full flex pt-10 pb-5 flex-col justify-center items-center gap-5">
                <div class="text-xl sm:text-3xl flex justify-center font-sec">Capture the Memories</div>
                <div class="text-3xl sm:text-5xl font-black flex justify-center font-pri">Gallery</div>
                <div class="sm:w-3/7 flex justify-center text-center font-pri text-sm sm:text-md">Explore the beauty of Sri Lanka through our travelers' experiences</div>
            </div> --}}

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
@endsection

@section('additional_js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreButton = document.getElementById('load-more');
        if (loadMoreButton) {
            let skip = {{ count($posts) }};
            loadMoreButton.addEventListener('click', function() {
                fetch('{{ url("/blog/loadMore") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        skip: skip,
                        type: '{{ request()->input("type") }}'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.html) {
                        document.querySelector('.w-full.sm\\:px-20.flex.flex-wrap').insertAdjacentHTML('beforeend', data.html);
                        skip += data.count;
                        if (data.remaining <= 0) {
                            loadMoreButton.style.display = 'none';
                        }
                    }
                });
            });
        }
    });
</script>
@endsection
