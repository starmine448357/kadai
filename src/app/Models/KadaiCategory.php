<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 

class Kadai extends Model
{
    use HasFactory;

    protected $fillable = [
        'titles',
        'descriptions',
        'user_id',
        'statuses',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
