<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Review extends Model
{
    use HasFactory;


    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('approved', function ($query) {
            $query->where('is_approved', true);
        });
    }

    public static function countAndAvgVote()
    {
        return self::select(DB::raw('avg(vote) as avg_vote'))->first();
    }

    public static function countComment()
    {
        return self::select(DB::raw('count(*) as count'))->first();
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }


}
