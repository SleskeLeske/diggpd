<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image', 'category_id','description', 'times_bought','client_id'];

    public function category() {
    return  $this->belongsTo(Category::class);
    }

    public function client() {
    return  $this->belongsTo(User::class);
    }


    public function purchase() {
    return  $this->times_bought + 1;
    }
    
}
