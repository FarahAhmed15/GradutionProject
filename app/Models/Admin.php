<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name', 'email', 'password'];

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
