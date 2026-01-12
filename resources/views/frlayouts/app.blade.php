<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <!-- Link to CSS Files -->
 <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/flexslider.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/asScrollable.css') }}" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">

<!-- jQuery (CDN) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript">
    function frm_valid() {
        var flag = 1;
        $(".required").each(function(e) {
            if ($(this).val() == '') {
                flag = 0;
                return false;
            }
        });

        if (flag == 1) {
            alert("Thank you for your inquiry, we will revert back to you with in 24 hours.");
            return true;
        }
    }
    </script>

<script src="{{ asset('frontend/js/jquery.flexslider.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
    $(function() {
        // SyntaxHighlighter.all();
    });
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
    </script>
<script src="{{ asset('frontend/js/jquery.mousewheel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.asScrollbar.js') }}"></script>
<script src="{{ asset('frontend/js/holder.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.asScrollable.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        Holder.run();
        $('.box').asScrollable();
        $('.example').on('asScrollable::scrolltop', function(e, api, direction) {
            console.info('top:' + direction);
        });
    });
</script>

</head>

<body>
    <!-- Header -->
    <header>
        <div class="wrapper">
            <div class="header_top">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"
                            title="logo"></a>
                </div>
                <div class="social_icon">
                    <h2>Follow Us:</h2>
                    <ul>
                        <li class="facebook"><a href="https://www.facebook.com/carpentrytools"></a></li>
                        <li class="twitter"><a href="https://mobile.twitter.com/CarpentryTool"></a></li>
                        <li class="linkedin"><a href="https://in.linkedin.com/in/carpentrytools"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <div class="wrapper">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="{{ route('feedback') }}">Feedback</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('brochure') }}">E-Brochure</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>

        </div>
    </nav>

    <!-- Content Section -->
    <div class="container">
        @yield('content')
        <!-- This will be replaced by specific page content -->
    </div>

    <!-- Footer -->
    <footer>
        <div class="wrapper">
            <div class="foot_left">
                <p>10, Lati Plot, (Sadgurunagar), Rajkot - 360 003. (Gujarat - INDIA).</p>
                <p>Ph.+91-281-2457387, Fax.+91-281-2458479, Email: <a
                        href="mailto:info@eaglecarpentrytools.com">info@eaglecarpentrytools.com</a></p>
                <ul class="footer_menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="{{ route('feedback') }}">Feedback</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('brochure') }}">E-Brochure</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>


            </div>
            <div class="foot_right">
                <p>{{ date('Y') }} © eBizTrait. ALL Rights Reserved.</p>
                <p>Made by eBizTrait Themes.</p>
            </div>
        </div>
    </footer>
</body>

</html>