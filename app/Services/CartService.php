<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function add(int $productId): void
    {
        $product = Product::findOrFail($productId);

        $quantity = $product->quantity;

        $cart = session()->get('cart', []);

        $quantityInCart = $cart[$productId] ?? 0;

        if ($quantity >= 0) {
            $quantityInCart = $quantityInCart++;
            $quantity = $quantity--;

        }
    }
}
