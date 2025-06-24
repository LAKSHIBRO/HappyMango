@extends('frontend.new_layout')

@section('title', 'Blog | Happy Mango Tours')
@section('description', 'Explore our travel blog with insights, tips, and stories about Sri Lanka destinations, culture, wildlife, and experiences.')
@section('keywords', 'Happy Mango Tours blog, travel blog, Sri Lanka travel tips, travel insights, Sri Lankan destinations')

@section('content')
    <div class="w-full py-20 flex flex-col justify-center items-center gap-5 bg-[#000000aa]">
        <div class="text-7xl font-black font-pri">Blog</div>
        <div class="text-2xl font-black font-pri">HOME - BLOG</div>
    </div>
    <div class="max-w-[2500px] w-full bg-slate-300 grow text-white">
        <div class="py-20 w-full px-5 sm:px-10 flex flex-col bg-white text-black items-center justify-center gap-5">
        <div class="w-full font-sec text-xl text-center">Daily Updates & News</div>
        <div class="sm:w-3/7 flex text-4xl sm:text-6xl font-pri font-black justify-center text-center font-pri">Our Blog </div>
            <div class="w-full sm:px-20 flex flex-wrap">
                @foreach($posts as $post)
                <div class="sm:w-1/3 p-5 flex flex-col group">
                    <div class="relative" style="height: 603px;">
                        <img src="{{ asset('uploads/post/'.$post->image) }}" class="w-full h-full object-cover" alt="{{ $post->title }}">
                        <div class="absolute top-0 text-white group-hover:bg-[#FF9933] bg-black duration-300 py-3 px-7 font-bold">
                            <div>{{ $post->category->name ?? 'Travel' }}</div>
                        </div>
                    </div>
                    <div class="py-3 pt-5 sm:pt-10 uppercase">{{ $post->slug }}</div>
                    <div class="text-xl font-bold border-b py-1 sm:w-4/5">{{ $post->title }}</div>
                    <div class="w-4/5 py-5">{{ Str::limit($post->short_content, 150) }}</div>
                    <div class="w-full sm:justify-start justify-end flex mt-auto">
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
    @include('frontend.components.gallery')
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
