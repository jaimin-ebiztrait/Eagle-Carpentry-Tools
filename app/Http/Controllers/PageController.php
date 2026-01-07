<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Make sure to include the Product model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\CmsPages;

class PageController extends Controller
{
public function home() {
        return view('frlayouts.pages.home');
    }

  public function products($slug = null)
{
    // All products with primary image
    $products = DB::table('products')
        ->leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                 ->where('product_images.is_primary', 1);
        })
        ->where('products.status', 'active')
        ->select(
            'products.*',
            'product_images.image as primary_image',
            'product_images.imageName as image_name'
        )
        ->get();

    $currentProduct = null;
    $productImages  = collect();

    if ($slug) {

        // Single product by slug
        $currentProduct = DB::table('products')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->first();

        if (!$currentProduct) {
            abort(404);
        }

        // All images of current product
        $productImages = DB::table('product_images')
            ->where('product_id', $currentProduct->id)
            ->orderByDesc('is_primary')
            ->get();
    }
    return view(
        'frlayouts.pages.products',
        compact('products', 'currentProduct', 'productImages')
    );
}


public function quoteSubmit(Request $request)
    {
        
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'comment' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'phone', 'comment');

        // Send Email
        Mail::raw(
            "Get a Quote Form Submitted at Swastik Tools and Engineering Works\n\n" .
            "Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\nComments: {$data['comment']}\n",
            function ($message) use ($data) {
                $message->to('info@eaglecarpentrytools.com')
                        ->subject('Get a Quote Form Submission')
                        ->from($data['email'], $data['name']);
            }
        );

        return redirect()->back()->with('success', 'Thank you! Your request has been submitted.');
    }

public function feedbackSubmit(Request $request)
    {
        // Validate the form
        $request->validate([
            'persontname' => 'required|string|max:255',
            'companyname' => 'nullable|string|max:255',
            'address'     => 'nullable|string|max:255',
            'city'        => 'nullable|string|max:255',
            'country'     => 'nullable|string|max:255',
            'pincode'     => 'nullable|string|max:20',
            'fax'         => 'nullable|string|max:20',
            'mobile'      => 'required|string|max:20',
            'telephone'   => 'nullable|string|max:20',
            'email'       => 'required|email|max:255',
            'views'       => 'nullable|string',
        ]);

        $data = $request->all();

        // Build the message
        $msg = "Feedback Form Submitted at Swastik Tools and Engineering Works \n\n";
        $msg .= "First Name:\t{$data['persontname']}\n";
        $msg .= "Last Name:\t{$data['companyname']}\n";
        $msg .= "Address:\t{$data['address']}\n";
        $msg .= "Town:\t{$data['city']}\n";
        $msg .= "Country:\t{$data['country']}\n";
        $msg .= "Postcode:\t{$data['pincode']}\n";
        $msg .= "Fax:\t{$data['fax']}\n";
        $msg .= "Mobile:\t{$data['mobile']}\n";
        $msg .= "Telephone:\t{$data['telephone']}\n";
        $msg .= "E-Mail:\t{$data['email']}\n";
        $msg .= "Views:\t{$data['views']}\n";

        // Send the email
        Mail::raw($msg, function ($message) use ($data) {
            $message->to('info@eaglecarpentrytools.com')
                    ->subject('Feedback Form Submission')
                    ->from($data['email'], $data['persontname']);
        });
        // dd($request->all());

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you! Your feedback has been submitted.');
    }



    public function feedback() {
        return view('frlayouts.pages.feedback');
    }

   public function about()
{
    $page = CmsPages::where('slug', 'about-us')->firstOrFail();

    return view('frlayouts.pages.about_us', compact('page'));
}


    public function brochure() {
        return view('frlayouts.pages.brochure');
    }

    public function contact() {
        return view('frlayouts.pages.contact');
    }

}
