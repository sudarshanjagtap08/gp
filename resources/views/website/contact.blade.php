@extends('website.header')
@section('metatitle', "Contact Us | Genuine Plot")
@section('metadescription', "For more information feel free to contact us on 7507151321 and email us as per your requirements on support@genuineplots.com. We will get back to you soon!")
@section('metakeyword', "")
@section('content')

<section class="inner_page_banner_contact inner_page_mt">
    <div class="background_overlay"></div>
    <div class="section_title text-center">
        <h2 class="h2 fw-normal mb-0">
        Contact Us
        </h2>
    </div>
    <!-- <h2 class="mb-0">Contact Us</h2> -->
</section>
<section class="py-5 bg_light">
    <div class="container my-md-5">
        <div class="row g-4">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <div class="col-md-8">
                <div class="bg-white p-3 p-md-5 shadow">
                    <div class="section_title text-center mb-5">
                        <h2 class="h2 fw-normal">
                            Get in touch with us
                        </h2>
                    </div>
                    <form action="{{ url('conatct/save')}}" method="post" class="row contact_us_form" >
                        @csrf
                        <input type="hidden" name="url" value="{{ url()->current() }}">
                        <input type="hidden" name="utm_source" class="contact_us_input" id="utm_source" value="Website" required>
                        <input type="hidden" name="subsource" class="contact_us_input" id="subsource" value="Conatct Us Page" required>
                        <div class="col-md-6 mb-md-3">
                            <label class="form-label">Full Name <span class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="nan" class="contact_us_input"  required>
                        </div>
                        <div class="col-md-6 mb-md-3">
                            <label class="form-label">Mobile Number <span class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="mom" pattern="[0-9]{10}" class="contact_us_input"  required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Email <span class="text-danger"><sup>*</sup></span></label>
                            <input type="text" name="eoe" class="contact_us_input" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="mmm" rows="4" class="contact_us_input" ></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn_submit" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 ps-md-5 ">
                <div class="bg-white p-3 mb-3 mb-md-5 shadow">
                    <h6 class="">For inquiries contact:</h6>
                    <p>
                        <b>Genuine Plots</b> <br>
                        Balewadi, Pune, Maharashtra 411045
                    </p>
                </div>
                <div class="bg-white p-3 mb-3 mb-md-5 shadow">
                    <p class="">
                        <i class="bi bi-telephone-fill fs-5 text_primary_light"></i> : 
                        <a href="tel:+917507151321" class="link_default "> +91 7507151321</a>
                    </p>
                    <p class="">
                        <i class="bi bi-envelope-at-fill fs-5 text_primary_light"></i> : 
                        <a href="mailto:support@genuineplots.com" class="link_default ">support@genuineplots.com</a><br>
                        <b>To Sell -</b> 
                        <a href="mailto:sell@genuineplots.com" class="link_default ">sell@genuineplots.com</a><br>
                        <b>To Buy -</b>
                        <a href="mailto:sell@genuineplots.com" class="link_default ">buy@genuineplots.com</a><br>
                        <b>For Advertising -</b>
                        <a href="mailto:sell@genuineplots.com" class="link_default ">advertise@genuineplots.com</a><br>
                        <b>For Legal Support-</b>
                        <a href="mailto:sell@genuineplots.com" class="link_default ">legal@genuineplots.com</a>
                    </p>
                </div>
                    <div class="social_links d-flex justify-content ">
                        <div class="social_box social_box_fb d-flex justify-content-center align-items-center p-2">
                            <a href="https://www.facebook.com/GenuinePlotsTM" class="facebook" target="_blank" style="color:#fff;" ><i class="fa-brands fa-facebook fs-4"></i></i></a>
                        </div>
                        <div class="social_box social_box_twitter d-flex justify-content-center align-items-center p-2">
                            <a href="https://twitter.com/GenuinePlotsTM" class="twitter"  style="color:#fff;" target="_blank"><i class="fa-brands fa-twitter fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_yt d-flex justify-content-center align-items-center p-2">
                            <a href="#" class="youtube" target="_blank"  style="color:#fff;" ><i class="fa-brands fa-youtube fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_linkedin d-flex justify-content-center align-items-center p-2">
                            <a href="https://www.linkedin.com/company/96464047/admin/feed/posts/" class="linkedin" target="_blank"  style="color:#fff;" ><i class="fa-brands fa-linkedin fs-4"></i></a>
                        </div>
                        <div class="social_box social_box_instagram d-flex justify-content-center align-items-center p-2">
                            <a href="https://www.instagram.com/genuineplotstm/" class="instagram" target="_blank"  style="color:#fff;" ><i class="fa-brands fa-instagram fs-4"></i></a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="mt-5 shadow">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15127.916538689224!2d73.7742236!3d18.5749794!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b9a88007aa23%3A0xd915e6403d2358e4!2sGenuinePlots.com%20(R)!5e0!3m2!1sen!2sin!4v1709644289028!5m2!1sen!2sin" width="100%" height="300" style="border:0; margin-bottom: -7px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="p-4 bg-white">
                    <p class="mb-0">
                    <strong class="fw-bold">Address :</strong>Sai Silicon Valley, opposite CM International School, Balewadi, Pune, Maharashtra 411045<a href="https://maps.app.goo.gl/8CEbMUAqhZ8HCedE7" target="_blank" class="link_default text_primary_light">Get Directions</a>
                    </p>
                </div>
        </div>
    </div>
</section>
@endsection