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
            $categories = Categories::all();
            $resp['products'] = $products;
            $resp['categories'] = $categories;
            
        } catch (\Throwable $th) {
            $resp['statut'] = 'err';
            $resp['msg'] = "Oops! Error while trying to fetch products.";
        }

        return $resp;
    }
    
    public function getProductsOfCategorie($categorie_id) {
        $resp = ['statut'=>'success'];
        try {
            $products = Products::where('categorie_id', $categorie_id)->get();
            $resp['products'] = $products;
            
        } catch (\Throwable $th) {
            $resp['statut'] = 'err';
            $resp['msg'] = "Oops! Error while trying to fetch products.";
        }

        return $resp;
    }
    
    public function getProductsSearch($searchStr, $categorie_id = -1) {
        $resp = ['statut'=>'success'];
        try {
            if ($categorie_id > -1) $products = Products::where([['categorie_id', $categorie_id],['name', 'LIKE', '%'.$searchStr.'%']])->get();
            else $products = Products::where('name', 'LIKE', '%'.$searchStr.'%')->get();
            
            $resp['products'] = $products;
            
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
            
            $resp['products'] = $products;
            
        } catch (\Throwable $th) {
            $resp['statut'] = 'err';
            $resp['msg'] = "Oops! Error while trying to fetch products.";
        }

        return $resp;
    }

}