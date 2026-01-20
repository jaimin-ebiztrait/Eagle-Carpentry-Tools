@extends('frlayouts.app')




@section('title', $currentProduct->seo_title ?? 'Default Title | Brand Name')
@section('meta_description', $currentProduct->meta_description ?? 'Default meta description')
@section('seo_description', $currentProduct->seo_description ?? 'Optional SEO description')

@section('content')

<div class="wrapper">
    <div class="prod_page_cont">
        <!-- Left Panel: List of Products -->
        <div class="left_panel">
            <div class="pro_head_title">
                <h2>Category</h2>
            </div>
            <div class="toggle"></div>
            <ul id="menu2">
                @foreach($products as $item)
                <!-- Highlight the currently selected product -->
                <li class="{{ isset($currentProduct) && $currentProduct->slug === $item->slug ? 'act' : '' }}">
                    <a href="{{ url('products/' . $item->slug) }}">
                        {{ $item->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Right Panel: Static Product Details -->
        <div class="right_panel">
            <div class="pro_head_title">
                <!-- Display the selected product name, or a default if none is selected -->
                <h2>{{ isset($currentProduct) ? $currentProduct->name : 'Products' }}</h2>
            </div>

            <div class="pro_page_right_cont">
                <!-- Static Content for Different Products -->
                <?php if ($currentProduct) {
                    $productImages = DB::table("product_images")
                        ->where("product_id", $currentProduct->id)
                        ->orderByDesc("is_primary")
                        ->get();
                        
                } else {
                    $productImages = collect(); // empty collection if no product
                }
             ?>



                <ul>
                     @foreach($productImages as $image)
            <li>
                <div class="product">
                    <div class="product_child">
                        <!-- Display each image from the collection -->
                        <img src="{{ asset($image->image) }}" alt="{{ $image->imageName }}">
                    </div>
                </div>

                @if(!empty($image->imageName))
    <div class="pro_title">
        <h3>{{ $image->imageName }}</h3>
    </div>
@endif

            </li>
        @endforeach

                </ul>
@if($currentProduct)
    {!! $currentProduct->description !!}
@else

<ul>
                    <img src="{{ asset('frontend/images/product2.jpg') }}">
                </ul>
@endif
                <!-- <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999">
                                            <tr align="center">
                                                <td width="199" height="20" class="title">BRANDS</td>
                                                <td height="20" colspan="7" class="title">AVAILABLE SIZE IN MM </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="17%" class="style3"></td>
                                                            <td width="83%" class="style3"><strong>SCISSORS SUPER - 77
                                                                </strong></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="35" height="20" class="style3">32</td>
                                                <td width="35" height="20" class="style3">40</td>
                                                <td width="35" height="20" class="style3">45</td>
                                                <td width="35" height="20" class="style3">50</td>
                                                <td width="35" height="20" class="style3">57</td>
                                                <td width="35" height="20" class="style3">60</td>
                                                <td width="35" height="20" class="style3">65</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="17%" class="style3">&nbsp;</td>
                                                            <td width="83%" class="style3"><strong>SCISSORS -
                                                                    77</strong> </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="35" height="20" class="style3">32</td>
                                                <td width="35" height="20" class="style3">40</td>
                                                <td width="35" height="20" class="style3">45</td>
                                                <td width="35" height="20" class="style3">50</td>
                                                <td width="35" height="20" class="style3">57</td>
                                                <td width="35" height="20" class="style3">60</td>
                                                <td width="35" height="20" class="style3">65</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="17%" class="style3">&nbsp;</td>
                                                            <td width="83%" class="style3"><strong>SWASTIK -
                                                                    777</strong></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="35" height="20" class="style3">32</td>
                                                <td width="35" height="20" class="style3">40</td>
                                                <td width="35" height="20" class="style3">45</td>
                                                <td width="35" height="20" class="style3">50</td>
                                                <td width="35" height="20" class="style3">57</td>
                                                <td width="35" height="20" class="style3">60</td>
                                                <td width="35" height="20" class="style3">65</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="17%" class="style3">&nbsp;</td>
                                                            <td width="83%" class="style3"><strong>EAGLE - 501</strong>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="35" height="20" class="style3">32</td>
                                                <td width="35" height="20" class="style3">40</td>
                                                <td width="35" height="20" class="style3">45</td>
                                                <td width="35" height="20" class="style3">50</td>
                                                <td width="35" height="20" class="style3">57</td>
                                                <td width="35" height="20" class="style3">60</td>
                                                <td width="35" height="20" class="style3">65</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="17%" class="style3">&nbsp;</td>
                                                            <td width="83%" class="style3"><strong>PATTA SUPER - 501
                                                                    (6&quot;) </strong></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">40</td>
                                                <td width="35" height="20" class="style3">45</td>
                                                <td width="35" height="20" class="style3">50</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="17%" class="style3">&nbsp;</td>
                                                            <td width="83%" class="style3"><strong>RANDHI BLADE
                                                                    (4&quot;)</strong> </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="35" height="20" class="style3">32</td>
                                                <td width="35" height="20" class="style3">40</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="17%" class="style3">&nbsp;</td>
                                                            <td width="83%" class="style3"><strong>WITH CARBIDE TIP (
                                                                    WITH/ WITHOUT HOLE)</strong></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">40</td>
                                                <td width="35" height="20" class="style3">45</td>
                                                <td width="35" height="20" class="style3">50</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                                <td width="35" height="20" class="style3">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pro_note">
                    <p>- One box contains 10 Pcs. </p>
                    <p>- Scissors super-77, Scissors-77, Swastik-777 : One Case contains 35 Boxes </p>
                    <p>- Patta super-501(6") : One Case contains 30 Boxes </p>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Always use sharp blades. A dull blade requires more force and is more likely to slip than a
                            sharp one. Change the blade whenever it starts to tear instead of cut.</li>
                        <li>Protect your eyes - wear safety goggles when working with blades or any other tools.</li>
                        <li>Always keep your free hand away from the line of cut.</li>
                        <li>Don't bend or apply side loads to blades by using them to open cans or pry loose objects.
                            Blades are brittle and can snap easily.</li>
                    </ul>
                </div> -->

                <!-- @if(isset($currentProduct))
              
                @else
                <ul>
                    <img src="{{ asset('frontend/images/product2.jpg') }}">
                </ul>
                @endif -->

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$( document ).ready(function() {
		$(".left_panel .toggle").click(function(){
			$("#menu2").toggle("slow");
		}); 
	});
</script>
@endsection