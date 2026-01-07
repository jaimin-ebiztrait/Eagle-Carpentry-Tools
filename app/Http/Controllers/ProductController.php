<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage; // Make sure to include the Product model

class ProductController extends Controller
{
    //

     public function index()
{
    $products = DB::table('products')
        ->leftJoin('product_images as pi', function ($join) {
            $join->on('products.id', '=', 'pi.product_id')
                 ->where('pi.is_primary', 1);
        })
        ->select(
            'products.*',
            'pi.image as primary_image'
        )
        ->orderBy('products.id', 'desc')
        ->get();

    return view('admin.products.index', compact('products'));
}


   public function edit($id)
{
    // Fetch product with its images using join
    $product = DB::table('products')
        ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
        ->select(
            'products.id as product_id',
            'products.name',
            'products.slug',
            'products.description',
            'products.status',
        'product_images.id as image_id',
            'product_images.image',
            'product_images.imageName',
            'product_images.is_primary'
        )
        ->where('products.id', $id)
        ->get();
    if ($product->isEmpty()) {
        abort(404, 'Product not found');
    }

    // Format data to pass to the Blade
    $edit = [
        'id' => $product[0]->product_id,
        'name' => $product[0]->name,
        'slug' => $product[0]->slug,
        'description' => $product[0]->description,
        'status' => $product[0]->status,
        'images' => $product->map(function($img) {
            return (object)[
                'id' => $img->image_id,
                'image' => $img->image,
                'imageName' => $img->imageName,
                'is_primary' => $img->is_primary
            ];
        })
    ];

    return view('admin.products.edit', ['edit' => (object)$edit]);
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|in:active,inactive',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'image_names.*' => 'nullable|string|max:255',
        'replace_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'existing_image_names.*' => 'nullable|string|max:255',
    ]);

    // Update product
    DB::table('products')->where('id', $id)->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'status' => $request->status,
        'updated_at' => now(),
    ]);

    // Reset all primary flags
    DB::table('product_images')->where('product_id', $id)->update(['is_primary' => 0]);

    // Handle existing images
    if ($request->has('existing_image_names')) {
        foreach ($request->existing_image_names as $imgId => $imageName) {

            $updateData = ['imageName' => $imageName];

            // If a replacement file is uploaded
            if ($request->hasFile("replace_images.$imgId")) {
                $file = $request->file("replace_images.$imgId");
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products'), $filename);

                $updateData['image'] = 'uploads/products/' . $filename;
            }

            // Check if this existing image is primary
            if ($request->primary_image == "existing_$imgId") {
                $updateData['is_primary'] = 1;
            }

            DB::table('product_images')->where('id', $imgId)->update($updateData);
        }
    }

    // Handle new images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $image) {
            if (!$image) continue;

            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $filename);

            DB::table('product_images')->insert([
                'product_id' => $id,
                'image' => 'uploads/products/' . $filename,
                'imageName' => $request->image_names[$index] ?? null,
                'is_primary' => ($request->primary_image == "new_$index") ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    return redirect()
        ->route('admin.list_product')
        ->with('success', 'Product updated successfully');
}



public function deleteImage($id)
{
    $image = ProductImage::findOrFail($id);

    // Delete the file from storage
    if (file_exists(storage_path('app/public/' . $image->image))) {
        unlink(storage_path('app/public/' . $image->image));
    }

    $image->delete();

    return back()->with('success', 'Image deleted successfully!');
}

}
