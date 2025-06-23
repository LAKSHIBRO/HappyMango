@extends('frontend.app')
@section('title', 'Gallery | X-GUARD - Visual Showcase of Security Solutions')
@section('description', 'Browse X-GUARD’s gallery to see a visual showcase of our innovative security solutions in
    action.')
@section('keywords', 'X-GUARD gallery, security images, protection showcase, innovative solutions, visual gallery,
    safeguarding visuals')

@section('styles')
<style>
    .gallery-section .card {
        position: relative;
        overflow: hidden;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-section .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
    }

    .gallery-section .card-body {
        padding: 0; /* Remove padding if image fills the card */
    }

    .gallery-section .card img {
        display: block;
        width: 100%;
        height: 250px; /* Fixed height for uniform look */
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-section .card:hover img {
        transform: scale(1.05);
    }

    .gallery-item-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.75); /* Darker overlay for better text visibility */
        color: #fff;
        padding: 1rem; /* Increased padding */
        opacity: 0;
        transform: translateY(100%);
        transition: opacity 0.3s ease, transform 0.3s ease;
        text-align: left;
    }

    .gallery-section .card:hover .gallery-item-overlay {
        opacity: 1;
        transform: translateY(0);
    }

    .gallery-item-overlay .title {
        font-size: 1.1rem; /* Slightly larger title */
        font-weight: bold;
        margin-bottom: 0.3rem; /* Adjusted margin */
        color: #FFD700; /* Gold color for title */
    }

    .gallery-item-overlay .caption {
        font-size: 0.85rem; /* Slightly smaller caption */
        line-height: 1.4;
    }

    /* Fancybox caption styling (optional, if you want to style it) */
    .fancybox-caption {
        text-align: center;
        padding: 10px;
        background: rgba(0,0,0,0.8);
        color: #fff;
    }
    .fancybox-caption__body {
        font-size: 1rem;
    }
</style>
@endsection

@section('content')
    <section class="hero-section-2">
        <div class="container">
            <div class="col-xl-8 mx-auto row">
                <div class="col-12 text-center">
                    <h1 class="hero-title">Our Gallery</h1>
                    <p class="hero-text">Comprehensive Security Solutions for Every Need</p>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-section py-5">
        <div class="container">
            <div class="row mx-auto" id="imageContainer">
                @forelse ($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <a href="{{ asset('uploads/album/' . $gallery->image) }}"
                               data-fancybox="images"
                               data-caption="{{ $gallery->title ? $gallery->title : '' }}{{ $gallery->caption ? ' - ' . $gallery->caption : '' }}"
                               data-title="{{ $gallery->title }}">
                                <img src="{{ asset('uploads/album/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
                                <div class="gallery-item-overlay">
                                    @if($gallery->title)
                                        <h5 class="title">{{ $gallery->title }}</h5>
                                    @endif
                                    @if($gallery->caption)
                                        <p class="caption">{{ Str::limit($gallery->caption, 100) }}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No images found in the gallery yet.</p>
                    </div>
                @endforelse

                @if ($galleries instanceof \Illuminate\Pagination\LengthAwarePaginator && $galleries->hasMorePages())
                    <div class="col-12 d-flex justify-content-center mt-4 mt-lg-5">
                        {{ $galleries->links() }}  {{-- Assuming standard Laravel pagination links --}}
                    </div>
                @elseif (isset($allGalleries) && count($galleries) < count($allGalleries))
                {{-- Fallback for potential old load more logic, assuming $galleries is not paginated but $allGalleries exists --}}
                    <div class="col-12 d-flex justify-content-center mt-4 mt-lg-5">
                        <button class="btn primary-btn" onclick="loadMoreImages();">Load More</button>
                    </div>
                @endif

                <div class="col-lg-4 d-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="79.22" height="63.374"
                                    viewBox="0 0 79.22 63.374">
                                    <g id="picture" transform="translate(0 -0.119)">
                                        <path id="Shape"
                                            d="M72.618,63.374H6.6a6.39,6.39,0,0,1-4.663-1.939A6.387,6.387,0,0,1,0,56.773V6.6A6.388,6.388,0,0,1,1.939,1.939,6.39,6.39,0,0,1,6.6,0H72.617a6.384,6.384,0,0,1,4.662,1.939A6.386,6.386,0,0,1,79.22,6.6V56.773a6.62,6.62,0,0,1-6.6,6.6ZM6.6,5.281A1.339,1.339,0,0,0,5.281,6.6V56.773A1.337,1.337,0,0,0,6.6,58.092H72.617a1.335,1.335,0,0,0,1.32-1.319V6.6a1.337,1.337,0,0,0-1.319-1.319Z"
                                            transform="translate(0 0.119)" fill="#fdb016" />
                                        <path id="Path"
                                            d="M7.921,15.843a7.639,7.639,0,0,0,5.612-2.31,7.64,7.64,0,0,0,2.31-5.611,7.643,7.643,0,0,0-2.31-5.612A7.642,7.642,0,0,0,7.921,0,7.641,7.641,0,0,0,2.31,2.31,7.641,7.641,0,0,0,0,7.922a7.638,7.638,0,0,0,2.31,5.611A7.64,7.64,0,0,0,7.921,15.843Z"
                                            transform="translate(10.563 10.681)" fill="#fdb016" />
                                        <path id="Path-2" data-name="Path"
                                            d="M19.8,21.125l-6.6-6.6L0,27.727v7.922H58.094V17.165L40.93,0Z"
                                            transform="translate(10.563 17.282)" fill="#fdb016" />
                                    </g>
                                </svg>
                            </div>
                            <img src="{{ asset('img/frontend/gallery/default.jpg') }}" alt="Default Image">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
