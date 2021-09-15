<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens, SoftDeletes, HasFactory;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tax_class_id',
        'slug',
        'sku',
        'price',
        'qty',
        'name',
        'description',
        'in_stock',
        'is_active',
        'new_from',
        'new_to',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'new_from',
        'new_to',
        'deleted_at',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ratingPercent()
    {
        return ($this->reviews->avg->rating / 5) * 100;
    }


}
