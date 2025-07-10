@extends('frontend.new_layout')

@section('title', 'Contact Us | Happy Mango Tours')
@section('description', 'Get in touch with Happy Mango Tours to plan your perfect Sri Lanka trip. We\'re here to answer your questions and help create your dream vacation.')
@section('keywords', 'Happy Mango Tours contact, Sri Lanka tour contact, travel agency contact, book a tour, travel inquiry')

@section('content')
    <div data-aos="fade-down" class="w-full py-20 flex flex-col justify-center items-center gap-5 bg-[#000000aa]">
        <div class="text-7xl font-black font-pri">CONTACT</div>
        <div class="text-2xl font-black font-pri">HOME - CONTACT</div>
    </div>
    <div data-aos="fade-down" class="max-w-[2500px] w-full bg-white grow text-white">
        
        <div class="w-full sm:p-20 bg-white flex flex-col items-center justify-center">
            <div class="w-full max-w-[1000px] text-xl sm:text-3xl px-5 sm:px-0 py-15  text-black font-black">Have a question or comment? <br> Use the form below to send us a message. </div>
            <div class="bg-[#F9F9F9] gap-20 sm:gap-0 w-full max-w-[1000px] py-15 px-10 flex flex-col sm:flex-row pb-28">
                <div class="w-full sm:w-1/2 flex flex-col gap-10">
                    <form action="{{ url('/contactFormSubmit') }}" method="POST">
                        @csrf
                        <input class="bg-[#F3F3F3] w-full p-5 border-0 text-[#535446]" type="text" name="name" placeholder="Your Name" required>
                        <input class="bg-[#F3F3F3] w-full p-5 border-0 text-[#535446] mt-10" type="text" name="phone" placeholder="Your Phone Number" required>
                        <input class="bg-[#F3F3F3] w-full p-5 border-0 text-[#535446] mt-10" type="email" name="email" placeholder="Your Email" required>
                        <textarea name="message" class="bg-[#F3F3F3] w-full p-5 border-0 text-[#535446] mt-10" placeholder="Message Here" id="" rows="5" required></textarea>
                        <button type="submit" class="bg-[#FF9933] text-white py-3 px-8 mt-10 hover:bg-[#e88929] transition">Send Message</button>
                    </form>
                </div>
                <div class="w-full sm:w-1/2 flex flex-col gap-5 sm:gap-20 p-5 sm:p-10 text-black">
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-5 items-center">
                            <img class="w-5 h-fit" src="/new_frontend/Assets/add.png" alt="Address">
                            <div>
                                <div class="font-bold">Address</div>
                                <div>8500, Negombo Road, Colombo, Sri Lanka</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-5">
                        <div class="flex gap-5 items-center">
                            <img class="w-5 h-fit" src="/new_frontend/Assets/mail.png" alt="Email">
                            <div>
                                <div class="font-bold">info@mangotours.com</div>
                                <div>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-5">
                        <div class="flex gap-5 items-center">
                            <img class="w-5 h-fit" src="/new_frontend/Assets/phone.png" alt="Phone">
                            <div>
                                <div class="font-bold">+94 77 700 7707</div>
                                <div>09:00am - 07:00pm</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-5">
                        <div class="flex gap-5 items-center">
                            <img class="w-5 h-fit" src="/new_frontend/Assets/cal.png" alt="Hours">
                            <div>
                                <div class="font-bold">Hours</div>
                                <div>MONDAY - THURSDAY  :  11AM - 5PM <br> FRIDAY - SUNDAY  :  10AM - 5PM <br> LAST POUR  :  4:30PM </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full h-[500px]">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8599026831743!2d80.35615!3d7.033359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae30872c88fb6cb%3A0xda2a366134eb5de4!2sKegalle%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1718028789529!5m2!1sen!2sus"
            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
               <!-- Gallery Section -->
        
    </div>
    @include('frontend.components.gallery')
 @endsection