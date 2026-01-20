@extends('frlayouts.app')
@section('title', $page->seo_title ?? 'Default Title | Brand Name')
@section('meta_description', $page->meta_description ?? 'Default meta description')
@section('seo_description', $page->seo_description ?? 'Optional SEO description')

@section('content')
<!-- <div class="flexslider">
    <ul class="slides">
        <li>
            <img src="{{ asset('frontend/images/slider1.png') }}" />
            <div class="slider_text">
                <h3>COLLECTION<br>OF TOOLS</h3>
            </div>
        </li>
        <li>
            <img src="{{ asset('frontend/images/slider2.png') }}" />
            <div class="slider_text">
                <h3>COLLECTION<br>OF TOOLS</h3>
            </div>
        </li>
        <li>
            <img src="{{ asset('frontend/images/slider3.png') }}" />
            <div class="slider_text">
                <h3>COLLECTION<br>OF TOOLS</h3>
            </div>
        </li>
        <li>
            <img src="{{ asset('frontend/images/slider4.png') }}" />
            <div class="slider_text">
                <h3>COLLECTION<br>OF TOOLS</h3>
            </div>
        </li>
        <li>
            <img src="{{ asset('frontend/images/slider5.png') }}" />
            <div class="slider_text">
                <h3>COLLECTION<br>OF TOOLS</h3>
            </div>
        </li>
        <li>
            <img src="{{ asset('frontend/images/slider6.png') }}" />
            <div class="slider_text">
                <h3>COLLECTION<br>OF TOOLS</h3>
            </div>
        </li>
    </ul>
</div> -->
  <!-- {!!  $page->content  !!} -->
  <div class="brand_logo">
    <div class="wrapper">
        <div class="brand_logo_img">
            {!!  $page->section_one  !!}
            <!-- <ul>
                <li><img src="{{ asset('frontend/images/brand-logo1.jpg') }}"></li>
                <li><img src="{{ asset('frontend/images/brand-logo2.jpg') }}"></li>
                <li><img src="{{ asset('frontend/images/brand-logo3.jpg') }}"></li>
            </ul> -->
        </div>
    </div>
</div>

<div class="get_quote">
    <div class="wrapper">
        <div class="recent_product_img">

            {!!  $page->section_two  !!}
            </ul>
        </div>
        <div class="get_quote_form">
            <h2>Get a Quote!</h2>
            <!-- Success message -->
            @if(session('success'))
            <div id="success-message" class="text-green-600 mt-2">
                {{ session('success') }}
            </div>

            <script>
            // Remove success message after 5 seconds
            setTimeout(function() {
                const msg = document.getElementById('success-message');
                if (msg) {
                    msg.style.display = 'none';
                }
            }, 5000); // 5000ms = 5 seconds
            </script>
            @endif

            <form name="signupform" id="form1" method="POST" action="{{ route('quote.submit') }}" class="signupform">
                @csrf
                <ul>
                    <li>
                        <input type="text" placeholder="Name*" name="name" required value="{{ old('name') }}"
                            class="text_box required">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </li>
                    <li>
                        <input type="email" placeholder="Email*" name="email" required value="{{ old('email') }}"
                            class="text_box required">
                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                    </li>
                    <li>
                        <input type="text" placeholder="Contact Phone*" name="phone" required value="{{ old('phone') }}"
                            class="text_box required">
                        @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                    </li>
                    <li>
                        <textarea placeholder="Comment*" name="comment" rows="4" cols="35" required
                            class="text_box required">{{ old('comment') }}</textarea>
                        @error('comment') <span class="text-red-500">{{ $message }}</span> @enderror
                    </li>
                </ul>
                <div class="submit">
                    <input type="submit" name="submit" value="submit" class="submit_btn">
                </div>
            </form>

        </div>
    </div>
</div>
<!--<div class="recent_product">
	<div class="wrapper">
    	   
    </div>
</div>-->

<div class="futured_product">
    <div class="wrapper">
        <div class="futured_product_img">
            <div class="pro_head">
                <h3>Our product</h3>
            </div>
            <ul>
                  {!!  $page->section_three  !!}
            </ul>
        </div>
    </div>
</div>

@endsection