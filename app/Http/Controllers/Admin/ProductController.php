<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PurchaseDetail;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Foundation\Application;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $words = preg_split("/[\s,_-]+/", $request->name);
        $sku = "";
        foreach($words as $word) {
            $sku .=ucwords(mb_substr($word, 0, 1));
        }
        $sku .= "-" . strtoupper(mb_substr($request->color, 0, 3));
        $sku .= "-" . $request->size;

        $request->merge(['id'=>$sku]);

        $product = new Product();

        $request->validate([
            'id' => 'required|max:255|unique:products,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'size' => 'required',
            'color' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'instock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'front_image' => 'required|image',
            'back_image' => 'required|image',
        ]);

        $product->id = $request->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->gender = $request->gender;
        $product->instock = $request->instock;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if (File::exists(public_path('product_images/' . $product->front_image))) {
            File::delete(public_path('product_images/' . $product->front_image));
        }
        $frontImage = request()->front_image->getClientOriginalName();
        request()->front_image->move(public_path('product_images'), $frontImage);
        $product->front_image = $frontImage;

        if (File::exists(public_path('product_images/' . $product->back_image))) {
            File::delete(public_path('product_images/' . $product->back_image));
        }
        $backImage = request()->back_image->getClientOriginalName();
        request()->back_image->move(public_path('product_images'), $backImage);
        $product->back_image = $backImage;

        $product->save();

        return redirect(route('admin.products.index'))
            ->with('message', 'Product Successfully Added!')
            ->with('class', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $words = preg_split("/[\s,_-]+/", $request->name);
        $sku = "";
        foreach($words as $word) {
            $sku .=ucwords(mb_substr($word, 0, 1));
        }
        $sku .= "-" . strtoupper(mb_substr($request->color, 0, 3));
        $sku .= "-" . $request->size;

        $request->merge(['id'=>$sku]);

        $request->validate([
            'id' => 'required|max:255|unique:products,id,' . $product->id,
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'size' => 'required',
            'color' => 'required',
            'gender' => 'required|in:Male,Female',
            'instock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'front_image' => 'image',
            'back_image' => 'image',
        ]);

        $product->id = $request->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->gender = $request->gender;
        $product->instock = $request->instock;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if ($request->front_image) {
            File::delete(public_path('product_images/' .$product->front_image));
            $frontImage = request()->front_image->getClientOriginalName();
            request()->front_image->move(public_path('product_images'), $frontImage);
            $product->front_image = $frontImage;
        }

        if ($request->back_image) {
            File::delete(public_path('product_images/' . $product->back_image));
            $backImage = request()->back_image->getClientOriginalName();
            request()->back_image->move(public_path('product_images'), $backImage);
            $product->back_image = $backImage;
        }

        $product->update();

        return redirect(route('admin.products.index'))
            ->with('message', 'Product Successfully Updated!')
            ->with('class', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $order_exists = OrderDetail::where('product_id', $product->id)->exists();
        $purchase_exists = PurchaseDetail::where('product_id', $product->id)->exists();
        if ($order_exists || $purchase_exists) {
            return back()
                    ->with('message', 'Product has related data in purchases or orders hence can\'t delete.')
                    ->with('class', 'danger');
        }

        $product->delete();



        return back()
            ->with('message', 'Product Successfully Deleted!')
            ->with('class', 'success');
    }
}
