<a href="{{ route('products.show', ['product' => $product]) }}" class="text-dark">
    <div class="card h-100 product-card rounded-0">
        <div class="overflow-hidden">
            <img src="{{ asset('product_images/' . $product->front_image) }}" class="card-img-top rounded-0"
                alt="{{ $product->name }}" height="300" style="object-fit: cover; object-position: top;">
        </div>
        <div class="card-body">
            <p class="card-title fw-semibold">{{ $product->name }}</p>
            <p class="card-text">
                <span class="text-muted">{{ $product->category->name }}</span> | <span
                    class="fw-semibold">{{ $product->price }} MMK</span>
            </p>
            <div class="mt-2">
                <a href="{{ route('products.show', ['product' => $product]) }}"
                   class="btn btn-outline-dark rounded-0">View</a>
                @if(Auth::check())
                    <a href="{{ route(\App\Models\Wishlist::where('product_id', $product->id)
                                                          ->where('user_id', Auth::user()->id)->exists() ? 'wishlist.remove' : 'wishlist.add', ['product' => $product]) }}"
                       class="btn btn-outline-dark rounded-0">
                        <i class="fa-{{ \App\Models\Wishlist::where('product_id', $product->id)
                                                          ->where('user_id', Auth::user()->id)->exists() ? 'solid' : 'regular' }} fa-heart"></i>
                    </a>
                @else
                    <a href="{{ route('wishlist.add', ['product' => $product]) }}" class="btn btn-outline-dark rounded-0">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</a>
