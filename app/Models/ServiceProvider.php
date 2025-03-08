<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    protected $fillable = ['name', 'email', 'password', 'category_id', 'admin_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function services(){
        return $this->belongsToMany(Service::class,'service_service_provider')->withPivot('price');
    }
}
