<section class="w-full flex justify-center flex-col items-center">
  <div class="w-full flex sm:flex-row flex-col">
    <!-- Left Content -->
    <div class="w-full sm:w-1/2 sm:px-44 px-10 py-10 sm:py-44 flex justify-center items-center bg-[#02515A] text-white">
      <div class="w-full min-h-[300px] min-h-[340px]" id="testimonialContent"><!-- min-h added to prevent jump -->
        <div class="text-3xl font-bold" id="testimonialName">Naduni Pramodya</div>
        <div class="text-xl" id="testimonialTitle">Amazing Traveller</div>
        <div class="text-orange-400 mt-2 text-lg" id="testimonialStars">★★★★★</div>
        <div class="text-md mt-10" id="testimonialQuote">
          Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum.
        </div>
        
      </div>
    </div>

    <!-- Right Swiper Section -->
    <div class="sm:w-1/2 sm:px-40 px-10 py-10 sm:py-0 bg-white flex flex-col items-center justify-center text-black">
      <div class="font-sec text-xl sm:text-4xl">Enjoy with your love</div>
      <div class="text-4xl sm:text-6xl font-black my-5 sm:my-10">Testimonials</div>
      <div class="text-lg text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>

      <div class="swiper mySwipertest mt-12 relative w-full px-4">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide flex flex-col items-center justify-center" data-name="Naduni Pramodya" data-title="Amazing Traveller" data-quote="Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of 'de Finibus Bonorum et Malorum.'">
            <div class="flex flex-col items-center justify-center w-full">
              <img src="https://randomuser.me/api/portraits/women/1.jpg" class="testimonial-img rounded-full object-cover" />
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="swiper-slide flex flex-col items-center justify-center" data-name="John Doe" data-title="Adventure Seeker" data-quote="Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature.">
            <div class="flex flex-col items-center justify-center w-full">
              <img src="https://randomuser.me/api/portraits/men/2.jpg" class="testimonial-img rounded-full object-cover" />
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="swiper-slide flex flex-col items-center justify-center" data-name="Sarah Lee" data-title="Nature Lover" data-quote="Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage.">
            <div class="flex flex-col items-center justify-center w-full">
              <img src="https://randomuser.me/api/portraits/women/3.jpg" class="testimonial-img rounded-full object-cover" />
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="swiper-slide flex flex-col items-center justify-center" data-name="Mike Ross" data-title="Explorer" data-quote="Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.">
            <div class="flex flex-col items-center justify-center w-full">
              <img src="https://randomuser.me/api/portraits/men/4.jpg" class="testimonial-img rounded-full object-cover" />
            </div>
          </div>

          <!-- Slide 5 -->
          <div class="swiper-slide flex flex-col items-center justify-center" data-name="Emily Clark" data-title="Beach Lover" data-quote="Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words.">
            <div class="flex flex-col items-center justify-center w-full">
              <img src="https://randomuser.me/api/portraits/women/5.jpg" class="testimonial-img rounded-full object-cover" />
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>

      <!-- Separate text area below slider -->
      <div class="mt-5 text-center" id="sliderText">
        <h4 class="text-[40px] font-bold text-center" id="sliderName">Naduni Pramodya</h4>
        <p class="text-gray-500 text-center text-[20px]" id="sliderTitle">Amazing Traveller</p>
        <div class="text-orange-400 mt-2 text-lg">★★★★★</div>
      </div>

    </div>
  </div>
</section>

<!-- Swiper Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const testimonialName = document.getElementById("testimonialName");
  const testimonialTitle = document.getElementById("testimonialTitle");
  const testimonialQuote = document.getElementById("testimonialQuote");
  const sliderName = document.getElementById("sliderName");
  const sliderTitle = document.getElementById("sliderTitle");

  const swiper = new Swiper(".mySwipertest", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    centeredSlides: true,
    spaceBetween: 0,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1.2,
      },
      640: {
        slidesPerView: 1.5,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
    on: {
      init: function () {
        updateTestimonialContent(this.slides[this.activeIndex]);
        updateSliderText(this.slides[this.activeIndex]);
      },
      slideChange: function () {
        updateTestimonialContent(this.slides[this.activeIndex]);
        updateSliderText(this.slides[this.activeIndex]);
      },
    },
  });

  function updateTestimonialContent(slide) {
    const name = slide.dataset.name;
    const title = slide.dataset.title;
    const quote = slide.dataset.quote;
    testimonialName.textContent = name;
    testimonialTitle.textContent = title;
    testimonialQuote.textContent = quote;
  }

  function updateSliderText(slide) {
    const name = slide.dataset.name;
    const title = slide.dataset.title;
    sliderName.textContent = name;
    sliderTitle.textContent = title;
  }
</script>

<style>
  .mySwipertest .swiper-slide {
    transition: transform 0.3s, opacity 0.3s;
    opacity: 0.5;
    /* Smaller by default */
    margin-right: 0 !important;
    margin-left: 0 !important;
    display: flex;
    align-items: center;
    justify-content: center;
    /* Fixed height to prevent layout shifts */
    min-height: 200px;
  }
  .mySwipertest .swiper-slide .testimonial-img {
    width: 134px;
    height: 134px;
    transition: width 0.3s, height 0.3s, box-shadow 0.3s, border 0.3s;
    box-shadow: none;
    border: none;
  }
  .mySwipertest .swiper-slide-active {
    opacity: 1;
    z-index: 2;
    /* Bring to front */
  }
  .mySwipertest .swiper-slide-active .testimonial-img {
    width: 170px;
    height: 170px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    border: 4px solid #fb923c; /* orange-400 */
  }
</style>
<style>
  .mySwipertest .swiper-button-next,
  .mySwipertest .swiper-button-prev {
    width: 44px;
    height: 44px;
    border: 2px solid #000;
    border-radius: 50%;
    background: none !important;
    color: #000 !important;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: none;
    box-shadow: none;
    opacity: 1;
  }
  .mySwipertest .swiper-button-next:after,
  .mySwipertest .swiper-button-prev:after {
    font-size: 20px;
    color: #000 !important;
  }
  .mySwipertest .swiper-button-next:hover,
  .mySwipertest .swiper-button-prev:hover,
  .mySwipertest .swiper-button-next:focus,
  .mySwipertest .swiper-button-prev:focus,
  .mySwipertest .swiper-button-next:active,
  .mySwipertest .swiper-button-prev:active {
    background: none !important;
    color: #000 !important;
    border-color: #000 !important;
    box-shadow: none !important;
    opacity: 1;
  }
</style>