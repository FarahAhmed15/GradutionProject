<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function serviceproviders(){
        return $this->hasMany(ServiceProvider::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
