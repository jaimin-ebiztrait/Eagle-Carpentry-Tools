@extends('frlayouts.app')

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
                <h2>{{ isset($currentProduct) ? $currentProduct->name : 'Product' }}</h2>
            </div>

            <div class="pro_page_right_cont">
                <!-- Static Content for Different Products -->
                <?php
if($currentProduct) {
    $productImages = DB::table('product_images')
        ->where('product_id', $currentProduct->id)
        ->orderByDesc('is_primary')
        ->get();
} else {
    $productImages = collect(); // empty collection if no product
}
?>


                @if(isset($currentProduct))
                @switch($currentProduct->slug)
                @case('cut-plane-irons-randha-pana')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                    </li>
                    @endforeach

                </ul>
                <div class="prod_table example box"
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
                </div>
                @break

                @case('iron-tops-swastik-brand')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                    </li>
                    @endforeach

                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td colspan="2"><br>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">

                                                <td colspan="4" height="25"><span class="style27"><strong>AVAILABLE SIZE
                                                            IN MM </strong></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="39%" class="style3" height="25">&nbsp;</td>
                                                            <td width="61%" class="style8" height="25"><strong>WITH
                                                                    NUT/BOLT </strong></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="101" class="style8" height="25">40</td>
                                                <td width="93" class="style8" height="25">45</td>
                                                <td width="87" class="style8" height="25">50</td>
                                            </tr>
                                            <tr align="center">
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="39%" class="style3" height="25">&nbsp;</td>
                                                            <td width="61%" class="style3" height="25"><strong>Pcs. per
                                                                    box </strong></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="style8" height="25">10</td>
                                                <td class="style8" height="25">10</td>
                                                <td class="style8" height="25">10</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">

                                                <td colspan="4" height="25"><span class="style27"><strong>AVAILABLE SIZE
                                                            IN MM </strong></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="39%" class="style3" height="25">&nbsp;</td>
                                                            <td width="61%" class="style8" height="25"><strong>WITHOUT
                                                                    NUT/BOLT</strong> </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="101" class="style8" height="25">40</td>
                                                <td width="93" class="style8" height="25">45</td>
                                                <td width="93" class="style8" height="25">50</td>
                                            </tr>
                                            <tr align="center">
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="39%" class="style3" height="25">&nbsp;</td>
                                                            <td width="61%" class="style3" height="25"><strong>Pcs. per
                                                                    box</strong> </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="style8" height="25">10</td>
                                                <td class="style8" height="25">10</td>
                                                <td class="style8" height="25">10</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @break

                @case('firmer-chisel')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table class="pink_bold">
                                <tr>
                                    <td colspan="2">
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999">
                                            <tr align="center" height="25">
                                                <td colspan="15" class="style24"><strong>EAGLE BRAND FIRMER
                                                        CHISEL</strong></td>
                                            </tr>
                                            <tr align="center" height="25">
                                                <td width="102" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="30" height="25"><span class="style8">3</span></td>
                                                <td width="30" height="25" class="style8">5</td>
                                                <td width="30" height="25"><span class="style8">6</span></td>
                                                <td width="30" height="25" class="style8">8</td>
                                                <td width="30" height="25" class="style8">10</td>
                                                <td width="30" height="25" class="style8">12</td>
                                                <td width="30" height="25" class="style8">16</td>
                                                <td width="30" height="25" class="style8">20</td>
                                                <td width="30" height="25" class="style8">25</td>
                                                <td width="30" height="25" class="style8">32</td>
                                                <td width="30" height="25" class="style8">40</td>
                                                <td width="30" height="25" class="style8">45</td>
                                                <td width="30" height="25" class="style8">50</td>
                                                <td width="30" height="25" class="style8">&nbsp;65</td>
                                            </tr>
                                            <tr align="center" height="25">
                                                <td height="25"><span class="style3"><strong>Pcs. per
                                                            Box</strong></span></td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">5</td>
                                                <td width="30" height="25" class="style3">5</td>
                                                <td width="30" height="25" class="style3">10</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Box per
                                                            Carton</strong></span></td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">24</td>
                                                <td width="30" height="25" class="style3">24</td>
                                                <td width="30" height="25" class="style3">15</td>
                                                <td width="30" height="25" class="style3">15</td>
                                                <td width="30" height="25" class="style3">18</td>
                                                <td width="30" height="25" class="style3">18</td>
                                                <td width="30" height="25" class="style3">--</td>
                                            </tr>
                                            <tr align="center" height="25">
                                                <td height="25" class="style3"><strong>Pcs. per Carton</strong></td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">240</td>
                                                <td height="25" class="style3">240</td>
                                                <td height="25" class="style3">150</td>
                                                <td height="25" class="style3">150</td>
                                                <td height="25" class="style3">90</td>
                                                <td height="25" class="style3">90</td>
                                                <td height="25" class="style3">--</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" colspan="2"></td>
                                </tr>
                                <tr height="25">
                                    <td colspan="2">
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center" height="25">
                                                <td colspan="14" class="style24"><strong>FISH BRAND</strong></td>
                                            </tr>
                                            <tr align="center" height="25">
                                                <td width="102" height="25"><span class="style8"><strong>SIZE IN
                                                            MM</strong> </span></td>
                                                <td width="30" height="25"><span class="style8">3</span></td>
                                                <td width="30" height="25" class="style8">5</td>
                                                <td width="30" height="25"><span class="style8">6</span></td>
                                                <td width="30" height="25" class="style8">8</td>
                                                <td width="30" height="25" class="style8">10</td>
                                                <td width="30" height="25" class="style8">12</td>
                                                <td width="30" height="25" class="style8">16</td>
                                                <td width="30" height="25" class="style8">20</td>
                                                <td width="30" height="25" class="style8">25</td>
                                                <td width="30" height="25" class="style8">32</td>
                                                <td width="30" height="25" class="style8">40</td>
                                                <td width="30" height="25" class="style8">45</td>
                                                <td width="30" height="25" class="style8">50</td>
                                            </tr>
                                            <tr align="center" height="25">
                                                <td height="25"><span class="style3"><strong>Pcs. per
                                                            box</strong></span></td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">12</td>
                                                <td width="30" height="25" class="style3">6</td>
                                                <td width="30" height="25" class="style3">6</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Box per
                                                            Case</strong></span></td>
                                                <td width="30" height="25" class="style3">50</td>
                                                <td width="30" height="25" class="style3">50</td>
                                                <td width="30" height="25" class="style3">50</td>
                                                <td width="30" height="25" class="style3">50</td>
                                                <td width="30" height="25" class="style3">50</td>
                                                <td width="30" height="25" class="style3">50</td>
                                                <td width="30" height="25" class="style3">50</td>
                                                <td width="30" height="25" class="style3">36</td>
                                                <td width="30" height="25" class="style3">36</td>
                                                <td width="30" height="25" class="style3">26</td>
                                                <td width="30" height="25" class="style3">26</td>
                                                <td width="30" height="25" class="style3">26</td>
                                                <td width="30" height="25" class="style3">26</td>
                                            </tr>
                                            <tr align="center" height="25">
                                                <td height="25" class="style3"><strong>Pcs. per Case</strong></td>
                                                <td width="30" height="25" class="style3">600</td>
                                                <td width="30" height="25" class="style3">600</td>
                                                <td width="30" height="25" class="style3">600</td>
                                                <td width="30" height="25" class="style3">600</td>
                                                <td width="30" height="25" class="style3">600</td>
                                                <td width="30" height="25" class="style3">600</td>
                                                <td width="30" height="25" class="style3">600</td>
                                                <td width="30" height="25" class="style3">432</td>
                                                <td width="30" height="25" class="style3">432</td>
                                                <td width="30" height="25" class="style3">312</td>
                                                <td width="30" height="25" class="style3">312</td>
                                                <td width="30" height="25" class="style3">156</td>
                                                <td width="30" height="25" class="style3">156</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Keep both hands back of the cutting edge at all times when using chisels.</li>
                        <li>Always shield the cutting edge when not using.</li>
                        <li>Always wear safety goggles when using a wood chisel.</li>
                        <li>Never place a wood chisel in your pocket.</li>
                        <li>Use the appropriate tool for prying and screwing, not a chisel</li>
                    </ul>
                </div>
                @break

                @case('bevel-edge-chisel')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="15" class="style24" height="25"><strong>EAGLE BRAND BEVEL
                                                        EDGE CHISEL</strong></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="102" height="25"><span class="style8"><strong>SIZE IN
                                                            MM</strong> </span></td>
                                                <td width="30" height="25"><span class="style8">3</span></td>
                                                <td width="30" height="25" class="style8">5</td>
                                                <td width="30" height="25"><span class="style8">6</span></td>
                                                <td width="30" height="25" class="style8">8</td>
                                                <td width="30" height="25" class="style8">10</td>
                                                <td width="30" height="25" class="style8">12</td>
                                                <td width="30" height="25" class="style8">16</td>
                                                <td width="30" height="25" class="style8">20</td>
                                                <td width="30" height="25" class="style8">25</td>
                                                <td width="30" height="25" class="style8">32</td>
                                                <td width="30" height="25" class="style8">40</td>
                                                <td width="30" height="25" class="style8">45</td>
                                                <td width="30" height="25" class="style8">50</td>
                                                <td width="30" height="25" class="style8">65</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box
                                                        </strong></span></td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">5</td>
                                                <td width="30" height="25" class="style3">5</td>
                                                <td width="30" height="25" class="style3">10</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Box per
                                                            carton</strong></span></td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">24</td>
                                                <td width="30" height="25" class="style3">24</td>
                                                <td width="30" height="25" class="style3">15</td>
                                                <td width="30" height="25" class="style3">15</td>
                                                <td width="30" height="25" class="style3">18</td>
                                                <td width="30" height="25" class="style3">18</td>
                                                <td width="30" height="25" class="style3"></td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Pcs. per carton </strong></td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">240</td>
                                                <td height="25" class="style3">240</td>
                                                <td height="25" class="style3">150</td>
                                                <td height="25" class="style3">150</td>
                                                <td height="25" class="style3">90</td>
                                                <td height="25" class="style3">90</td>
                                                <td height="25" class="style3"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Keep both hands back of the cutting edge at all times when using chisels.</li>
                        <li>Always shield the cutting edge when not using.</li>
                        <li>Always wear safety goggles when using a wood chisel.</li>
                        <li>Never place a wood chisel in your pocket.</li>
                        <li>Use the appropriate tool for prying and screwing, not a chisel</li>
                    </ul>
                </div>
                @break

                @case('firmer-gauge')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach

                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table class="pink_bold">
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999">
                                            <tr align="center" height="25">
                                                <td colspan="14" class="style24"><strong>EAGLE BRAND FIRMER GAUGE
                                                    </strong></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="102" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="30" height="25"><span class="style8">3</span></td>
                                                <td width="30" height="25" class="style8">5</td>
                                                <td width="30" height="25"><span class="style8">6</span></td>
                                                <td width="30" height="25" class="style8">8</td>
                                                <td width="30" height="25" class="style8">10</td>
                                                <td width="30" height="25" class="style8">12</td>
                                                <td width="30" height="25" class="style8">16</td>
                                                <td width="30" height="25" class="style8">20</td>
                                                <td width="30" height="25" class="style8">25</td>
                                                <td width="30" height="25" class="style8">32</td>
                                                <td width="30" height="25" class="style8">40</td>
                                                <td width="30" height="25" class="style3">45</td>
                                                <td width="30" height="25" class="style3">50</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box
                                                        </strong></span></td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3"></td>
                                                <td width="30" height="25" class="style3"></td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Box per case</strong>
                                                    </span></td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">35</td>
                                                <td width="30" height="25" class="style3">24</td>
                                                <td width="30" height="25" class="style3">24</td>
                                                <td width="30" height="25" class="style3">15</td>
                                                <td width="30" height="25" class="style3">15</td>
                                                <td width="30" height="25" class="style3">18</td>
                                                <td width="30" height="25" class="style3">18</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Pcs. per case</strong> </td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">350</td>
                                                <td height="25" class="style3">240</td>
                                                <td height="25" class="style3">240</td>
                                                <td height="25" class="style3">150</td>
                                                <td height="25" class="style3">150</td>
                                                <td height="25" class="style3">90</td>
                                                <td height="25" class="style3">90</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @break

                @case('mortise-chisel')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="11" class="style24"><strong>EAGLE BRAND MORTICE CHISEL
                                                    </strong></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="102" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="30" height="25"><span class="style8">3</span></td>
                                                <td width="30" height="25" class="style8">5</td>
                                                <td width="30" height="25"><span class="style8">6</span></td>
                                                <td width="30" height="25" class="style8">8</td>
                                                <td width="30" height="25" class="style8">10</td>
                                                <td width="30" height="25" class="style8">11</td>
                                                <td width="30" height="25" class="style8">12</td>
                                                <td width="30" height="25" class="style8">16</td>
                                                <td width="30" height="25" class="style8">20</td>
                                                <td width="30" height="25" class="style8">25</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box</strong>
                                                    </span></td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                                <td width="30" height="25" class="style3">10</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Box per case </strong></td>
                                                <td height="25" class="style3">40</td>
                                                <td height="25" class="style3">40</td>
                                                <td height="25" class="style3">40</td>
                                                <td height="25" class="style3">40</td>
                                                <td height="25" class="style3">27</td>
                                                <td height="25" class="style3">27</td>
                                                <td height="25" class="style3">27</td>
                                                <td height="25" class="style3">18</td>
                                                <td height="25" class="style3">18</td>
                                                <td height="25" class="style3">18</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Pcs. per case </strong></td>
                                                <td height="25" class="style3">400</td>
                                                <td height="25" class="style3">400</td>
                                                <td height="25" class="style3">400</td>
                                                <td height="25" class="style3">400</td>
                                                <td height="25" class="style3">270</td>
                                                <td height="25" class="style3">270</td>
                                                <td height="25" class="style3">270</td>
                                                <td height="25" class="style3">180</td>
                                                <td height="25" class="style3">180</td>
                                                <td height="25" class="style3">180</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="10" class="style24"><strong>FISH BRAND MORTICE
                                                        CHISEL</strong> </td>
                                            </tr>
                                            <tr align="center">
                                                <td width="102" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="35" height="25"><span class="style8">3</span></td>
                                                <td width="35" height="25" class="style8">5</td>
                                                <td width="35" height="25"><span class="style8">6</span></td>
                                                <td width="35" height="25" class="style8">8</td>
                                                <td width="35" height="25" class="style8">10</td>
                                                <td width="35" height="25" class="style8">12</td>
                                                <td width="35" height="25" class="style8">16</td>
                                                <td width="35" height="25" class="style8">20</td>
                                                <td width="35" height="25" class="style8">25</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box</strong>
                                                    </span></td>
                                                <td width="35" height="25" class="style3">12</td>
                                                <td width="35" height="25" class="style3">12</td>
                                                <td width="35" height="25" class="style3">12</td>
                                                <td width="35" height="25" class="style3">12</td>
                                                <td width="35" height="25" class="style3">12</td>
                                                <td width="35" height="25" class="style3">6</td>
                                                <td width="35" height="25" class="style3">6</td>
                                                <td width="35" height="25" class="style3">6</td>
                                                <td width="35" height="25" class="style3">6</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Box per case </strong></td>
                                                <td width="35" height="25" class="style3">40</td>
                                                <td width="35" height="25" class="style3">40</td>
                                                <td width="35" height="25" class="style3">40</td>
                                                <td width="35" height="25" class="style3">40</td>
                                                <td width="35" height="25" class="style3">30</td>
                                                <td width="35" height="25" class="style3">40</td>
                                                <td width="35" height="25" class="style3">40</td>
                                                <td width="35" height="25" class="style3">30</td>
                                                <td width="35" height="25" class="style3">30</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Pcs. per case</strong> </td>
                                                <td width="35" height="25" class="style3">480</td>
                                                <td width="35" height="25" class="style3">480</td>
                                                <td width="35" height="25" class="style3">480</td>
                                                <td width="35" height="25" class="style3">480</td>
                                                <td width="35" height="25" class="style3">360</td>
                                                <td width="35" height="25" class="style3">240</td>
                                                <td width="35" height="25" class="style3">240</td>
                                                <td width="35" height="25" class="style3">180</td>
                                                <td width="35" height="25" class="style3">120</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Keep both hands back of the cutting edge at all times when using chisels.</li>
                        <li>Always shield the cutting edge when not using.</li>
                        <li>Always wear safety goggles when using a wood chisel.</li>
                        <li>Never place a wood chisel in your pocket.</li>
                        <li>Use the appropriate tool for prying and screwing, not a chisel</li>
                    </ul>
                </div>
                @break

                @case('plough-plane-bits')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="7" class="style24"><strong>EAGLE BRAND</strong> <span
                                                        class="style18"> <span class="style20"></span> <span
                                                            class="style22"><strong>PLOUGH PLANE BITS
                                                            </strong></span></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="151" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style25 style26">
                                                        <div align="center">3</div>
                                                    </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        5</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        6</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        8</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        10</div>
                                                </td>
                                                <td width="61" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        12</div>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box</strong>
                                                    </span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        10</div>
                                                </td>
                                                <td width="61" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        10</div>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Box per case </strong></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        40</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        40</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        40</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        40</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        40</div>
                                                </td>
                                                <td width="61" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        40</div>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Pcs. per case </strong></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        400</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        400</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        400</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        400</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        400</div>
                                                </td>
                                                <td width="61" height="25" class="style3">
                                                    <div align="center" class="style27">
                                                        400</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @break

                @case('rabit-plane-bits')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach


                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="4" class="style24"><strong>EAGLE BRAND </strong><span
                                                        class="style18"> <span class="style20"></span> <span
                                                            class="style22"><strong>RABIT PLANE
                                                                BITS</strong></span></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="151" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style25 style26">
                                                        <div align="center">12</div>
                                                    </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">20 </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">25</div>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box
                                                        </strong></span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @break

                @case('heavy-chisel')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="4" class="style24"><strong>EAGLE BRAND </strong><span
                                                        class="style18"> <span class="style20"></span> <span
                                                            class="style22"><strong>HEAVY CHISEL</strong></span></span>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td width="151" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style25 style26">
                                                        <div align="center">12</div>
                                                    </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">20 </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">25</div>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box
                                                        </strong></span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Box per case </strong></td>
                                                <td height="25" class="style3">40</td>
                                                <td height="25" class="style3">27</td>
                                                <td height="25" class="style3">27</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Pcs. per case</strong> </td>
                                                <td height="25" class="style3">400</td>
                                                <td height="25" class="style3">270</td>
                                                <td height="25" class="style3">270</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="4" class="style24"><strong>FISH BRAND </strong><span
                                                        class="style18"> <span class="style20"></span> <span
                                                            class="style22"><strong>HEAVY CHISEL</strong></span></span>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td width="151" height="25"><span class="style8"><strong>SIZE IN MM
                                                        </strong></span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style25 style26">
                                                        <div align="center">12</div>
                                                    </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">20 </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">25</div>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box</strong>
                                                    </span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center">12</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">12</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">12</div>
                                                </td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Box per case </strong></td>
                                                <td height="25" class="style3">40</td>
                                                <td height="25" class="style3">30</td>
                                                <td height="25" class="style3">20</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Pcs. per case</strong> </td>
                                                <td height="25" class="style3">480</td>
                                                <td height="25" class="style3">360</td>
                                                <td height="25" class="style3">240</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Keep both hands back of the cutting edge at all times when using chisels.</li>
                        <li>Always shield the cutting edge when not using.</li>
                        <li>Always wear safety goggles when using a wood chisel.</li>
                        <li>Never place a wood chisel in your pocket.</li>
                        <li>Use the appropriate tool for prying and screwing, not a chisel</li>
                    </ul>
                </div>
                @break

                @case('malbar-round-chisel-eagle')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="7" class="style24"><strong>EAGLE BRAND </strong><span
                                                        class="style18"> <span class="style20"></span> <span
                                                            class="style22"><strong>MALBAR ROUND
                                                                CHISEL</strong></span></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="151" height="25"><span
                                                        class="style8"><strong>&nbsp;&nbsp;SIZE IN MM</strong> </span>
                                                </td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center" class="style25 style26">
                                                        <div align="center">50</div>
                                                    </div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">65</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">75</div>
                                                </td>
                                                <td width="58" class="style3">
                                                    <div align="center">100</div>
                                                </td>
                                                <td width="58" class="style3">
                                                    <div align="center">125</div>
                                                </td>
                                                <td width="58" class="style3">
                                                    <div align="center">150</div>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong>Pcs. per box
                                                        </strong></span></td>
                                                <td width="71" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="58" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="58" class="style3">
                                                    <div align="center">5</div>
                                                </td>
                                                <td width="58" class="style3">
                                                    <div align="center">5</div>
                                                </td>
                                                <td width="58" class="style3">
                                                    <div align="center">5</div>
                                                </td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Box per case</strong> </td>
                                                <td height="25" class="style3">
                                                    <div align="center">18</div>
                                                </td>
                                                <td height="25" class="style3">
                                                    <div align="center">16</div>
                                                </td>
                                                <td height="25" class="style3">
                                                    <div align="center">16</div>
                                                </td>
                                                <td class="style3">
                                                    <div align="center">16</div>
                                                </td>
                                                <td class="style3">
                                                    <div align="center">-</div>
                                                </td>
                                                <td class="style3">
                                                    <div align="center">-</div>
                                                </td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Pcs. per case </strong></td>
                                                <td height="25" class="style3">
                                                    <div align="center">180</div>
                                                </td>
                                                <td height="25" class="style3">
                                                    <div align="center">160</div>
                                                </td>
                                                <td height="25" class="style3">
                                                    <div align="center">160</div>
                                                </td>
                                                <td class="style3">
                                                    <div align="center">80</div>
                                                </td>
                                                <td class="style3">
                                                    <div align="center">-</div>
                                                </td>
                                                <td class="style3">
                                                    <div align="center">-</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Keep both hands back of the cutting edge at all times when using chisels.</li>
                        <li>Always shield the cutting edge when not using.</li>
                        <li>Always wear safety goggles when using a wood chisel.</li>
                        <li>Never place a wood chisel in your pocket.</li>
                        <li>Use the appropriate tool for prying and screwing, not a chisel</li>
                    </ul>
                </div>
                @break

                @case('planer-blades-randha-patta')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" height="183" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="planer_blade">
                                            <tr align="center">
                                                <td height="23" colspan="11" class="style24"><span class="style18">
                                                        <span class="style20"></span> <span
                                                            class="style22"><strong>PLANER BLADES(RANDHA PATTA)</strong>
                                                        </span></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25">&nbsp;</td>
                                                <td height="25" colspan="10" class="style18"><strong>Length 150 mm (6')
                                                        / 175 mm (7')</strong> </td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25">&nbsp;</td>
                                                <td height="25" colspan="5" class="style18"><strong>BLACK</strong></td>
                                                <td height="25" colspan="5" class="style18"><strong>ORANGE</strong></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="157" height="25" class="style3"><strong>&nbsp;&nbsp;SIZE IN
                                                        MM</strong></td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">25</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">32</div>
                                                </td>

                                                <td width="30" height="25" class="style3">
                                                    <div align="center">40</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">45</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">50</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">25</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">32</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">40</div>
                                                </td>
                                                <td width="30" class="style3">45</td>
                                                <td width="30" class="style3">50</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"> <strong>Pcs. per box
                                                        </strong></span></td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">10</div>
                                                </td>
                                                <td width="30" class="style3">10</td>
                                                <td width="30" class="style3">10</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Box per case </strong></td>
                                                <td width="30" height="25">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">30</div>
                                                </td>
                                                <td width="30" class="style3">30</td>
                                                <td width="30" class="style3">30</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Pcs. per case </strong></td>
                                                <td width="30" height="25">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" height="25" class="style3">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" class="style3">
                                                    <div align="center">300</div>
                                                </td>
                                                <td width="30" class="style3">300</td>
                                                <td width="30" class="style3">300</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </div>
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
                </div>
                @break

                @case('wood-turning-tool-set')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table"> </div>
                <div class="pro_note">
                    <p>- One set contains 8 Pcs. </p>
                </div>
                @break

                @case('wood-carving-tool-set')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table"> </div>
                <div class="pro_note">
                    <p>- One set contains 6 Pcs. </p>
                </div>
                @break

                @case('plastic-handle')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach

                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" height="131" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td height="23" colspan="3" class="style24"><span class="style18"> <span
                                                            class="style20"></span> <span
                                                            class="style22"><strong>PLASTIC HANDLE (WHITE)</strong>
                                                        </span></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="157" height="25">&nbsp;</td>
                                                <td width="193" height="25" class="style18"><strong>WITH RING </strong>
                                                </td>
                                                <td width="185" height="25" class="style18"><strong>WITH OUT RING
                                                    </strong></td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"> <strong>Pcs. per box
                                                        </strong></span></td>
                                                <td height="25" class="style3">10</td>
                                                <td class="style3">10</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Box per carton</strong></td>
                                                <td height="25" class="style3">24</td>
                                                <td class="style3">24</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Pcs. per case</strong> </td>
                                                <td height="25" class="style3">240</td>
                                                <td class="style3">240</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pro_note">
                    <p>- Light Weight</p>
                    <p>- Smooth Grip </p>
                    <p>- Durable</p>
                </div>
                <div class="safty_tips">
                    <h3>TIPS</h3>
                    <ul>
                        <li>please give proper heat to upper pointed part of the chisel before fitting plastic handle
                            for proper fitting and long lasting.</li>
                        <li>both white handle is being packed in carton and orange handle is being packed in bag. which
                            contains 50 pkts of 6 pcs plastic bag total 300 pcs per bag</li>
                    </ul>
                </div>
                @break

                @case('kayusi')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td class="style18">
                                        <table width="100%" height="131" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td height="23" colspan="3" class="style24"><span
                                                        class="style22"><strong>KAYUSI (without handle)</strong></span>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td width="157" height="25">&nbsp;</td>
                                                <td width="193" height="25" class="style18"><strong>EAGLE</strong></td>
                                                <td width="185" height="25" class="style18"><strong>FISH</strong></td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25"><span class="style3"><strong> Pcs. per box</strong>
                                                    </span></td>
                                                <td height="25" class="style3">10</td>
                                                <td class="style3">12</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Box per carton</strong></td>
                                                <td height="25" class="style3">30</td>
                                                <td class="style3">30</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Pcs. per case</strong> </td>
                                                <td height="25" class="style3">300</td>
                                                <td class="style3">360</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pro_note">

                </div>
                @break

                @case('marking-gauge')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table"> </div>
                <div class="pro_note">
                    <p>- One box contains 10 Pcs.</p>
                </div>
                @break

                @case('wooden-handle')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="pro_note">
                    <p>- 6 PCS. PER PACKET. </p>
                    <p>- 300 PCS PER BAG. </p>
                    <p>- Size of screwdriver wooden handle: Small, Medium, Big</p>
                </div>
                @break

                @case('cabinet-screw-driver')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td height="22" colspan="8"><span class="style18"><strong>EAGLE BRAND
                                                            CABINET SCREW DRIVER</strong></span> <span
                                                        class="style3">(with handle) </span></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="272" height="22"> <span class="style8">SIZE IN INCH</span>
                                                </td>
                                                <td width="92"><span class="style8">8&quot;</span></td>
                                                <td width="88"><span class="style8">10&quot;</span></td>
                                                <td width="78"><span class="style8">12&quot;</span></td>
                                                <td width="78" class="style8">14&quot;</td>
                                                <td width="78" class="style8">16&quot;</td>
                                                <td width="78" class="style8">18&quot;</td>
                                                <td width="78" class="style8">21&quot;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Never use a screwdriver as a chisel, or for prying, punching, chiseling, scoring or
                            scraping.</li>
                        <li>Make sure the tip fits the slot of the screw; not too loose or tight.</li>
                        <li>Never expose a screwdriver to excessive heat or cold.</li>
                        <li>Always discard a screwdriver with a worn or broken handle.</li>
                        <li>Never use a screwdriver on a workpiece held in your hand. A slip could cause serious injury.
                        </li>
                        <li>Never depend on a screwdrivers' handle or covered blade to insulate you from electricity.
                        </li>
                    </ul>
                </div>
                @break

                @case('best-steel-hammer-without-handle')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" height="105" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td height="23" colspan="7" class="style32"><span class="style31"><span
                                                            class="style22"><span class="style33"><strong>BEST STEEL
                                                                    HAMMER</strong></span> <span
                                                                class="style34">(without handle)</span></span></span>
                                                </td>
                                            </tr>
                                            <tr align="center">
                                                <td width="157" height="25">&nbsp;</td>
                                                <td height="25" colspan="6" class="style18"><strong>CARPENTER TYPE /
                                                        BLACK SMITH TYPE</strong></td>
                                            </tr>
                                            <tr align="center">
                                                <td height="25" class="style3"><strong>Size No.</strong> </td>
                                                <td width="40" class="style3">101</td>
                                                <td width="40" class="style3">151</td>
                                                <td width="40" class="style3">201</td>
                                                <td width="40" class="style3">251</td>
                                                <td width="40" class="style3">301</td>
                                                <td width="40" class="style3">401</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="25"><strong>Pcs. per box </strong></td>
                                                <td width="40" class="style3">10</td>
                                                <td width="40" class="style3">10</td>
                                                <td width="40" class="style3">10</td>
                                                <td width="40" class="style3">10</td>
                                                <td width="40" class="style3">10</td>
                                                <td width="40" class="style3">10</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="safty_tips">
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Strike squarely with the hammer striking face parallel with the surface being struck. Always
                            avoid glancing blows and over and under strikes.</li>
                        <li>When striking another tool (chisel, punch, wedge, etc.), the striking face of the proper
                            hammer should have a diameter approximately 10 MM larger than the struck face of the tool.
                        </li>
                        <li>Always use a hammer of suitable size and weight for the job.</li>
                        <li>Never use a striking or struck tool with loose or damaged handle</li>
                        <li>Discard any striking or struck tool if tool shows dents, cracks, chips.</li>
                        <li>Never regrind, weld or reheat-treat a hammer.</li>
                    </ul>
                </div>
                @break

                @case('firmer-chisel-swastik-surface-grinded-quality')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="5" class="style22"><span class="style26"><strong> FIRMER
                                                            CHISEL &quot;SWASTIK&quot; </strong></span><span
                                                        class="style3">(surface grinded quality) </span></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="272" height="20"><span class="style8"><strong>SIZE IN
                                                            MM</strong> </span></td>
                                                <td width="92" height="20"><span class="style8">20</span></td>
                                                <td width="88" height="20"><span class="style8">25</span></td>
                                                <td width="78" height="20"><span class="style8">32</span></td>
                                                <td width="78" height="20" class="style8">40</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20" class="style3"><strong>Pcs. per box </strong></td>
                                                <td height="20" class="style3">10</td>
                                                <td height="20" class="style3">10</td>
                                                <td height="20" class="style3">10</td>
                                                <td height="20" class="style3">10</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20" class="style3"><strong>Box per carton </strong></td>
                                                <td height="20" class="style3">39</td>
                                                <td height="20" class="style3">39</td>
                                                <td height="20" class="style3">24</td>
                                                <td height="20" class="style3">24</td>
                                            </tr>
                                            <tr align="center">
                                                <td height="20" class="style3"><strong>Pcs. per carton</strong></td>
                                                <td height="20" class="style3">390</td>
                                                <td height="20" class="style3">390</td>
                                                <td height="20" class="style3">240</td>
                                                <td height="20" class="style3">240</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @break

                @case('wall-scrapper')
                <ul>
                    @foreach($productImages as $img)
                    <li>
                        <div class="product">
                            <div class="product_child">
                                <img src="{{ asset($img->image) }}" alt="{{ $img->imageName }}">
                            </div>
                        </div>

                        @if(!empty($img->imageName))
                        <div class="pro_title">
                            <h3>{{ $img->imageName }}</h3>
                        </div>
                        @endif

                    </li>
                    @endforeach
                </ul>
                <div class="prod_table example box"
                    data-options='{"direction": "horizontal", "contentSelector": ">", "containerSelector": ">"}'>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <table width="100%" border="1" cellpadding="1" cellspacing="1"
                                            bordercolor="#999999" class="pink_bold">
                                            <tr align="center">
                                                <td colspan="2"><span class="style18"> <span
                                                            class="style22"><strong>WALL SCRAPPER</strong>
                                                        </span></span></td>
                                            </tr>
                                            <tr align="center">
                                                <td width="269" height="20"><span class="style8">SIZE IN MM </span></td>
                                                <td width="271" height="20"><span class="style8">75 MM </span></td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="20"><strong>Pcs. per box</strong> </td>
                                                <td height="20" class="style3">20</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="20"><strong>Box per carton</strong> </td>
                                                <td height="20" class="style3">10</td>
                                            </tr>
                                            <tr align="center" class="style3">
                                                <td height="20"><strong>Pcs. per carton </strong></td>
                                                <td height="20" class="style3">200</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @break

                @default
                <ul>
                    <img src="{{ asset('frontend/images/product2.jpg') }}">
                </ul>
                @endswitch
                @else
                <ul>
                    <img src="{{ asset('frontend/images/product2.jpg') }}">
                </ul>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection