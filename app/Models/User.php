<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\News;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipies() {
        return $this->hasMany(Recipe::class);
    }

    public function userNews() {
        return $this->hasMany(News::class);
    }

    // Get users full name
    public function getFullNameAttribute() {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }


    // Relationship with Role Model
    public function roles() {
        return $this->belongsToMany(Role::class);
    }
    
    // Checking User roles 
    public function userHasRole($role_name) {
        foreach($this->roles as $role) {
            if(Str::lower($role_name) == Str::lower($role->name)) {
                return true;
            }
            return false;
        }
    }

}
