@extends('frlayouts.app')

@section('content')
<div class="wrapper">
        <div class="contact_us_form">
            <div class="pro_head_title">
                <h2>E-Brochure</h2>
            </div>
                <div class="contact_us brochure">
                	<div class="ebrochure_link">
                    	<a href="http://eaglecarpentrytools.com/pdf/brochures.pdf" target="_blank" download>Download E-Brochure</a>
                    </div>
	                <a href="http://eaglecarpentrytools.com/pdf/brochures.pdf" target="_blank" download><img src="{{ asset('frontend/images/brochure.jpg') }}" alt="Brochure Image"></a>                       
                    <div class="ebrochure_link bottom">
                    	<a href="http://eaglecarpentrytools.com/pdf/brochures.pdf" target="_blank" download>Download E-Brochure</a>
                    </div>
                </div>                
        </div>   
    </div>
@endsection
