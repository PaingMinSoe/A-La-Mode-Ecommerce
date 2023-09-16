<div {{ $attributes->merge(['class' => 'd-flex']) }}>
    <div class="flex-shrink-0">
        <img src="{{ asset('product_images/' . $product->front_image) }}" alt="{{ $product->name }}" width="100" height="100" style="object-fit: cover; object-position: top;">
    </div>
    <div class="flex-grow-1 ms-3 overflow-hidden" style="text-overflow: ellipsis;">
        <div class="fw-bold text-nowrap">{{ $product->name }}</div>
        <div>Color: {{ $product->color }}</div>
        <div>Size: {{ $product->size }} | Quantity: {{ $quantity }}</div>
        <div>{{ $product->price }} MMK</div>
    </div>
</div>
