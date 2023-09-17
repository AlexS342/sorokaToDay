<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'title',
        'author',
        'status',
        'miniDescription',
        'description',
        'img',
        'created_at',
        'updated_at',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function scopeStatus(Builder $query)
    {
        if(request()->has('f'))
        {
            $query->where('status', request()->query('f', 'draft'));
        }
    }

    public function scopeSort(Builder $query)
    {
        if(request()->has('s'))
        {
            $query->where('id_category', request()->query('s', '1'));
        }
    }
}
