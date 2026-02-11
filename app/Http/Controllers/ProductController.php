<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage; // Make sure to include the Product model
use Illuminate\Support\Str;

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
 public function create()
    {
        return view('admin.products.edit');
    }

 public function edit($id)
{
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
            'product_images.is_primary',
            'products.seo_title',
            'products.meta_description',
            'products.seo_description',
        )
        ->where('products.id', $id)
        ->get();

    if ($product->isEmpty()) {
        abort(404, 'Product not found');
    }

    $edit = (object) [
        'id' => $product[0]->product_id,
        'name' => $product[0]->name,
        'slug' => $product[0]->slug,
        'description' => $product[0]->description,
        'status' => $product[0]->status,
        'seo_title' => $product[0]->seo_title,
        'meta_description' => $product[0]->meta_description,
        'seo_description' => $product[0]->seo_description,
        'images' => $product
            ->whereNotNull('image_id') // important
            ->map(function ($img) {
                return (object) [
                    'id' => $img->image_id,
                    'image' => $img->image,
                    'imageName' => $img->imageName,
                    'is_primary' => $img->is_primary,
                ];
            }),
    ];

    return view('admin.products.edit', compact('edit'));
}
// public function update(Request $request, $id)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'status' => 'required|in:active,inactive',

//         'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
//         'image_names.*' => 'nullable|string|max:255',

//         'replace_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
//         'existing_image_names.*' => 'nullable|string|max:255',
//     ]);

//     /* ---------------- PRODUCT UPDATE ---------------- */
//     DB::table('products')->where('id', $id)->update([
//         'name' => $request->name,
//         'status' => $request->status,
//         'updated_at' => now(),
//     ]);

//     /* -------- RESET PRIMARY IMAGE (ONLY ONE) -------- */
//     DB::table('product_images')
//         ->where('product_id', $id)
//         ->update(['is_primary' => 0]);

//     /* -------------- UPDATE EXISTING IMAGES ---------- */
//     if ($request->existing_image_names) {

//         foreach ($request->existing_image_names as $imgId => $imageName) {

//             $updateData = [
//                 'imageName' => $imageName,
//                 'updated_at' => now(),
//             ];

//             // Replace image
//             if ($request->hasFile("replace_images.$imgId")) {

//                 $old = DB::table('product_images')->where('id', $imgId)->first();
//                 if ($old && file_exists(public_path($old->image))) {
//                     unlink(public_path($old->image));
//                 }

//                 $file = $request->file("replace_images.$imgId");
//                 $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
//                 $file->move(public_path('uploads/products'), $filename);

//                 $updateData['image'] = 'uploads/products/' . $filename;
//             }

//             if ($request->primary_image === "existing_$imgId") {
//                 $updateData['is_primary'] = 1;
//             }

//             DB::table('product_images')->where('id', $imgId)->update($updateData);
//         }
//     }

//     /* ---------------- ADD NEW IMAGES ---------------- */
//     if ($request->hasFile('images')) {

//         foreach ($request->file('images') as $index => $image) {

//             if (!$image) continue;

//             $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
//             $image->move(public_path('uploads/products'), $filename);

//             DB::table('product_images')->insert([
//                 'product_id' => $id,
//                 'image' => 'uploads/products/' . $filename,
//                 'imageName' => $request->image_names[$index] ?? null,
//                 'is_primary' => ($request->primary_image === "new_$index") ? 1 : 0,
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//         }
//     }

//     /* ---- FALLBACK: ENSURE AT LEAST ONE PRIMARY ---- */
//     $hasPrimary = DB::table('product_images')
//         ->where('product_id', $id)
//         ->where('is_primary', 1)
//         ->exists();

//     if (!$hasPrimary) {
//         DB::table('product_images')
//             ->where('product_id', $id)
//             ->limit(1)
//             ->update(['is_primary' => 1]);
//     }

//     return redirect()
//         ->route('admin.list_product')
//         ->with('success', 'Product updated successfully');
// }

public function store(Request $request)
{
    // Validate incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'image_names.*' => 'nullable|string|max:255',
    ]);

    // Auto-generate the slug from the name
    $slug = Str::slug($request->name);

    // Insert new product
    $product = DB::table('products')->insertGetId([
        'name' => $request->name,
        'slug' => $slug,  // Automatically generated slug
        'status' => 'active',
        'description' => $request->page_content,
         'seo_title' => $request->seo_title,
        'meta_description' => $request->meta_description,
        'seo_description' => $request->seo_description,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Add images if uploaded
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $image) {
            if (!$image) continue;

            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $filename);

            DB::table('product_images')->insert([
                'product_id' => $product,
                'image' => 'uploads/products/' . $filename,
                'imageName' => $request->image_names[$index] ?? null,
                'is_primary' => ($request->primary_image === "new_$index") ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    return redirect()
        ->route('admin.list_product')
        ->with('success', 'Product added successfully');
}

public function update(Request $request, $id)
{
    // Validate incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'image_names.*' => 'nullable|string|max:255',
        'replace_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'existing_image_names.*' => 'nullable|string|max:255',
    ]);

    // Generate slug if it's not provided
    $slug = $request->slug ?? Str::slug($request->name);

    // Update the product record, including the description field
    DB::table('products')->where('id', $id)->update([
        'name' => $request->name,
        'slug' => $slug,  // Use auto-generated or provided slug
        'status' => 'active',
         'seo_title' => $request->seo_title,
        'meta_description' => $request->meta_description,
        'seo_description' => $request->seo_description,
        'description' => $request->page_content, // Update description
        'updated_at' => now(),
    ]);

    // Reset primary image (ensure only one primary image exists)
    DB::table('product_images')
        ->where('product_id', $id)
        ->update(['is_primary' => 0]);

    // Update existing images if necessary
    if ($request->existing_image_names) {
        foreach ($request->existing_image_names as $imgId => $imageName) {
            $updateData = [
                'imageName' => $imageName,
                'updated_at' => now(),
            ];

            // Replace existing image if file is uploaded
            if ($request->hasFile("replace_images.$imgId")) {
                // Delete the old image from the storage
                $oldImage = DB::table('product_images')->where('id', $imgId)->first();
                if ($oldImage && file_exists(public_path($oldImage->image))) {
                    unlink(public_path($oldImage->image)); // Delete the old image
                }

                // Handle new file upload
                $file = $request->file("replace_images.$imgId");
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products'), $filename);

                $updateData['image'] = 'uploads/products/' . $filename;
            }

            // Set primary image if selected
            if ($request->primary_image === "existing_$imgId") {
                $updateData['is_primary'] = 1;
            }

            // Update the image data in the database
            DB::table('product_images')->where('id', $imgId)->update($updateData);
        }
    }

    // Add new images if uploaded
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $image) {
            if (!$image) continue;

            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $filename);

            // Insert new image into the database
            DB::table('product_images')->insert([
                'product_id' => $id,
                'image' => 'uploads/products/' . $filename,
                'imageName' => $request->image_names[$index] ?? null,
                'is_primary' => ($request->primary_image === "new_$index") ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    // Ensure at least one image is marked as primary
    $hasPrimary = DB::table('product_images')
        ->where('product_id', $id)
        ->where('is_primary', 1)
        ->exists();

    if (!$hasPrimary) {
        DB::table('product_images')
            ->where('product_id', $id)
            ->limit(1)
            ->update(['is_primary' => 1]);
    }

    return redirect()
        ->route('admin.list_product')
        ->with('success', 'Product updated successfully');
}



public function destroy($id)
{
    // Start a database transaction to ensure atomic operations
    DB::beginTransaction();

    try {
        // Fetch the product with its images
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->route('admin.list_product')->with('error', 'Product not found');
        }

        // Delete all associated product images
        $images = DB::table('product_images')->where('product_id', $id)->get();
        foreach ($images as $image) {
            if (file_exists(public_path($image->image))) {
                unlink(public_path($image->image));  // Delete the image file
            }
        }

        // Delete the product images from the database
        DB::table('product_images')->where('product_id', $id)->delete();

        // Delete the product itself
        DB::table('products')->where('id', $id)->delete();

        // Commit the transaction
        DB::commit();

        return redirect()->route('admin.list_product')->with('success', 'Product deleted successfully');
    } catch (\Exception $e) {
        // Rollback in case of an error
        DB::rollback();
        return redirect()->route('admin.list_product')->with('error', 'An error occurred while deleting the product');
    }
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
