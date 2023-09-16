@extends('layouts.admin')

@section('title', 'Edit Product ' . $product->name)

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Edit Form</h3>
                </div>
                <form action="{{ route('admin.products.update', ['product' => $product]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            @error('id')
                                <div class="mb-3 col-12">
                                    <div class="text-danger">{{ $message }}</div>
                                </div>
                            @enderror

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="product_name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="product_name" name="name" value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="product_price">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="product_price" name="price" placeholder="100000 MMK"
                                    value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="product_size">Size</label>
                                <select name="size" id="product_size"
                                    class="form-select @error('size') is-invalid @enderror">
                                    <option value="XS" {{ old('size', $product->size) == 'XS' ? 'selected' : '' }}>
                                        XS</option>
                                    <option value="S" {{ old('size', $product->size) == 'S' ? 'selected' : '' }}>S
                                    </option>
                                    <option value="M" {{ old('size', $product->size) == 'M' ? 'selected' : '' }}>M
                                    </option>
                                    <option value="L" {{ old('size', $product->size) == 'L' ? 'selected' : '' }}>L
                                    </option>
                                    <option value="XL" {{ old('size', $product->size) == 'XL' ? 'selected' : '' }}>
                                        XL</option>
                                    <option value="2XL" {{ old('size', $product->size) == '2XL' ? 'selected' : '' }}>2XL
                                    </option>
                                    <option value="3XL" {{ old('size', $product->size) == '3XL' ? 'selected' : '' }}>3XL
                                    </option>
                                </select>
                                @error('size')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="instock">Quantity</label>
                                <input type="number"
                                    class="form-control @error('instock') is-invalid @enderror"id="instock" name="instock"
                                    value="{{ old('instock', $product->instock) }}">
                                @error('instock')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="product_color" class="mr-2">Color</label>
                                {{-- <input type="color" class="@error('color') is-invalid @enderror"
                                            id="product_color" name="color" value="{{ old('color') }}"> --}}
                                <select name="color" class="form-select @error('color') is-invalid @enderror"
                                    id="product_color">
                                    <option value="Black"
                                        {{ old('color', $product->color) == 'Black' ? 'selected' : '' }}>Black
                                    </option>
                                    <option value="White"
                                        {{ old('color', $product->color) == 'White' ? 'selected' : '' }}>White
                                    </option>
                                    <option value="Red" {{ old('color', $product->color) == 'Red' ? 'selected' : '' }}>Red
                                    </option>
                                    <option value="Beige" {{ old('color', $product->color) == 'Beige' ? 'selected' : '' }}>Beige
                                    </option>
                                    <option value="Brown" {{ old('color', $product->color) == 'Brown' ? 'selected' : '' }}>Brown
                                    </option>
                                    <option value="Green"
                                        {{ old('color', $product->color) == 'Green' ? 'selected' : '' }}>Green
                                    </option>
                                    <option value="Blue" {{ old('color', $product->color) == 'Blue' ? 'selected' : '' }}>
                                        Blue
                                    </option>
                                    <option value="Navy" {{ old('color', $product->color) == 'Navy' ? 'selected' : '' }}>Navy
                                    </option>
                                    <option value="Gray" {{ old('color', $product->color) == 'Gray' ? 'selected' : '' }}>
                                        Gray
                                    </option>
                                    <option value="Purple"
                                        {{ old('color', $product->color) == 'Purple' ? 'selected' : '' }}>Purple
                                    </option>
                                </select>
                                {{-- <select name="color" id="product_color"
                                                class="form-select @error('color') is-invalid @enderror">
                                                <option value="red">Red</option>
                                                <option value="white">White</option>
                                                <option value="black">Black</option>
                                                <option value="blue">Blue</option>
                                                <option value="green">Green</option>
                                            </select> --}}
                                @error('color')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="gender" class="mr-2">Gender</label>
                                <div class="d-flex mt-2 align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="Male"
                                            {{ old('gender', $product->gender) == 'Male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="Female"
                                            {{ old('gender', $product->gender) == 'Female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="brand_id">Brand</label>
                                <select name="brand_id" id="brand_id"
                                    class="form-select @error('brand_id') is-invalid @enderror">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == old('brand_id', $product->brand_id) ? 'selected' : '' }}>
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 order-1 order-md-1">
                                <label for="front_image">Front Image</label>
                                <input type="file" class=" form-control @error('front_image') is-invalid @enderror"
                                    id="front_image" name="front_image">
                                @error('front_image')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 order-3 order-md-2">
                                <label for="back_image">Back Image</label>
                                <input type="file" class=" form-control @error('back_image') is-invalid @enderror"
                                    id="back_image" name="back_image">
                                @error('back_image')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6 order-2 order-md-3">
                                <img src="{{ asset('product_images/' . $product->front_image) }}" class="img-thumbnail"
                                    alt="{{ $product->name }}">
                            </div>
                            <div class="mb-3 col-12 col-md-6 order-4 order-md-4">
                                <img src="{{ asset('product_images/' . $product->back_image) }}" class="img-thumbnail"
                                    alt="{{ $product->name }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success"><i class="fas fa-pen-to-square"></i>
                            Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
