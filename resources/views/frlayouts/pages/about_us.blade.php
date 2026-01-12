@extends('frlayouts.app')

@section('content')
	<div class="wrapper">
        <div class="contact_us_form">
            <div class="pro_head_title">
                <h2>  {{$page->page_title }}</h2>
            </div>


         
                <div class="contact_us">
                       {!!  $page->content  !!}
                	<!-- <div class="about_us_cont">
                    	<div class="work_space">                        	
                        	<img src="{{ asset('frontend/images/office.png') }}">
                        </div>
                        <div class="about_us_cont_left">                        
                        	<p>We are one of the  leading manufacturers of  Carpentry Tools and Hand Tools since 1958, having  three very popular brands EAGLE , SWASTIK , SCISSOR. We have wide range of products in Carpentry Tools and hand tools  like FIRMER CHISEL , MORTISE CHISEL, BEVEL CHISEL, HEAVY CHISEL, CUT PLANE IRON, MALBAR CHISEL, CHISEL WOODEN HANDLE ,CHISEL PLASTIC HANDLE , SCREW DRIVER, WALL SCRAPPER , HAMMER ETC.
                         </p>
                        </div>                            
                        <p>Our products are known for features like good strength, rust resistance, dimensional accuracy, durability and fine finish. We have a manufacturing unit with modern technology, a well-developed and high-tech infrastructural facility that enables us to offer our clients with an optimum quality range of products. This facility is equipped with advanced machines and technologies, which are regularly updated as per the market development. Our infrastructure comprises production, quality, packaging, warehousing and other departments that facilitate us to provide high quality products to our valued clients. We have employed highly experienced professionals in our organization, who are experts in their respective field of work.. All products pass through various quality checks before the final dispatch in the market. Our quality experts check the complete product array on various quality parameters, Utmost care is being taken to maintain the quality standards which makes certain to deliver the finest quality products to the clients.
                        </p>
                        <p>In order to achieve the set goals of company, our team of experts works round the clock and efficiently. To enhance the performance and knowledge of our professionals we have developed an ultra-modern quality testing facility.We have our corporate office with fully computerized and skilled high-tech staff. We have wide market network in major states of India and abroad. </p>
                        <p></p>
                    </div>     -->
                </div>
                
        </div>   
    </div>
@endsection
