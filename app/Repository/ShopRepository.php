<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\DB;
use App\Repository\ExceptionRepository;

use Carbon\Carbon;
use App\Products;
use App\Categories;


class ShopRepository {
    
    public function getProducts() {
        $resp = ['statut'=>'success'];
        try {
            $products = Products::all();
            $cart = session()->get('cart');
            foreach ($products as $key => $prod) {
                $isInCart = $cart && array_key_exists($prod->id, $cart);
                $prod->isInCart = $isInCart;
            }
            
            $categories = Categories::all();
            $resp['products'] = $products;
            $resp['categories'] = $categories;
            
        } catch (\Throwable $th) {
            $resp['statut'] = 'err';
            $resp['msg'] = "Oops! Error while trying to fetch products.";
        }

        return $resp;
    }
    
    
    public function getProductsWithFilter($payload) {
        $resp = ['statut'=>'success'];
        try {
            $products = Products::where([
                ['categorie_id', $payload['categorie_id']],
                ['name', 'LIKE', '%'.$payload['searchStr'].'%']])->orderBy('price', $payload['priceOptions'])->get();
            $cart = session()->get('cart');
            foreach ($products as $key => $prod) {
                $isInCart = $cart && array_key_exists($prod->id, $cart);
                $prod->isInCart = $isInCart;
            }
            $resp['products'] = $products;
            
        } catch (\Throwable $th) {
            $resp['statut'] = 'err';
            $resp['msg'] = "Oops! Error while trying to fetch products.";
        }

        return $resp;
    }
    
    public function addToCart($payload) {
        $resp = ['statut'=>'success'];
        try {
            $cart = [];
            $prod = Products::find($payload['product_id']);
            if ($prod) {
                if (session()->has('cart')) {
                    $cart = session()->get('cart');   
                }
                $prod->qte = 1;
                $cart[$prod->id] = $prod;
                session()->put('cart', $cart);
            } else {
                $resp['statut'] = 'err';
                $resp['msg'] = "Product not found.";
            }
                        
        } catch (\Throwable $th) {
            $resp['statut'] = 'err';
            $resp['msg'] = "Oops! Error while trying to fetch products.";
        }

        return $resp;
    }

    public function removeItemFromCart($payload) {
        $resp = ['statut'=>'success'];
        try {
            if (session()->has('cart')) {
                $cart = session()->get('cart');
                unset($cart[$payload['product_id']]);
                session()->put('cart', $cart);
            }
        } catch (\Throwable $th) {
            $resp = ['statut'=>'err', 'msg'=>'Oups! An error occured !'];
        }
        return $resp;
    }

}