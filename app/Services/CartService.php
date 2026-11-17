<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;
use RuntimeException;

class CartService
{
    public function add(int $productId): void
    {
        $product = Product::findOrFail($productId);

        $stockQuantity = $product->quantity;

        $cart = session()->get('cart', []);

        $quantityInCart = $cart[$productId] ?? 0;

        if ($stockQuantity <= $quantityInCart) {
            throw new RuntimeException('Недостаточно товара на складе');
        }

        ++$quantityInCart;

        $cart[$productId] = $quantityInCart;

        session()->put('cart', $cart);
    }

    public function remove(int $productId): void
    {

        $cart = session()->get('cart', []);

        $quantityInCart = $cart[$productId] ?? 0;

        if ($quantityInCart > 1) {
            --$quantityInCart;
            $cart[$productId] = $quantityInCart;
        } else {
            unset($cart[$productId]);
        }
        session()->put('cart', $cart);
    }

    public function getItems(): Collection
    {
        $cart = session()->get('cart', []);

        $productIds = array_keys($cart);

        $products = Product::whereIn('id', $productIds)->get();

        $items = $products->map(function ($item) use ($cart) {
            $quantityInCart = $cart[$item->id];
            return ['product' => $item, 'quantityInCart' => $quantityInCart];
        });

        return $items;
    }
}
