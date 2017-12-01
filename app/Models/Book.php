<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models;
use App\Models\CategoryOfBook;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name',
    	'author_id',
    	'publisher_id',
    	'image',
    	'description',
    	'price',
    	'publish_year',
    	'discount_id',
    	'quantity',
    	'avg_rate',
    	'total_people_rate',
    ];

    protected $appends = ['imagePath'];

    protected $dates = ['deleted_at'];

    public function cateOfBooks()
    {
    	return $this->hasMany(CateOfBook::class);
    }

    public function orderBooks()
    {
    	return $this->hasMany(OrderBook::class);
    }

    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }

    public function author()
    {
    	return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
    	return $this->belongsTo(Publisher::class);
    }

    public function discount()
    {
    	return $this->belongsTo(Discount::class);
    }

    public function scopeListNewBooks($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function getImagePathAttribute()
    {
        return config('index.link.image_home_folder') . $this->image;
        // return 'abc';
    }

    public function scopeSearch($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function scopeListBookSearch($query, $field, $id) 
    {
        return $query->where($field, '=', $id);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'cates_of_books', 'book_id', 'cate_id');
    }
}
