<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Product extends Model
{
    use HasFactory;
    protected $guarded;

    public function categories(){
        return $this->belongsTo(Categories::class, 'cate_id', 'id');
    }
}
