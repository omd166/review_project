<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function index()
    {

        $data = [
            'products' => $this->getProducts(),
            'avgVote' => $this->avgVote(),
            'countComment' => $this->getCountComment(),
        ];
        return $data;


    }

    public function getProducts()
    {
        return Product::where('is_active', '1')
            ->with('reviews')
            ->with(['reviews' => function () {
                return $this->avgVote();
            }])
            ->get();
    }

    public function avgVote()
    {
        return $this->getReviewData();
    }

    private function getReviewData()
    {
        return Review::countAndAvgVote();
    }

    private function getCountComment()
    {
        return Review::countComment();
    }

}
