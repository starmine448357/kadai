<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_names',
        'last_names',
        'genders',
        'emails',
        'tels',
        'addresses',
        'buildings',
        'category_id', // category_ids から category_id に変更
        'details',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // category_ids から category_id に変更
    }
}