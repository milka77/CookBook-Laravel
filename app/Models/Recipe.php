<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'info',
        'prep_time',
        'cooking_time',
        'servings',
        'user_id',
        'category_id',
        'difficulty_id',
        'ingredients',
        'prep_instructions',
        'cook_instructions',
        'tools',
        'file_path',
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function difficulty() {
        return $this->belongsTo(Difficulty::class);
    }

    public function getFilePathAttribute($value) {
        if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }

        return asset('uploads/' . $value);
    }
}
