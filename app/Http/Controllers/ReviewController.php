<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Generator as Faker;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @param int $productId
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        return Review::where('product_id', $product_id)
            ->where('is_approved','1')
            ->take(3)->latest()->get();
    }



}
