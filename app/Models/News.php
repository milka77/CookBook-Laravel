<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'my_news';

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
