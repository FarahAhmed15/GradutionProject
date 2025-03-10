<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['category_name','description','admin_id'];
    public $timestamps = false;

    public function serviceproviders(){
        return $this->hasMany(ServiceProvider::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
