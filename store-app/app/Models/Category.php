<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        `id`, `name`, `image`, `deleted_at`, `parent_id`, `created_at`, `updated_at`
    ];
    protected $table = 'caregories';

    public function child(){
        return $this->HasMany(Category::class, 'parent_id', 'id');
    }
    public function product(){
        return $this->hasMany(Product::class, 'parent_id', 'id');
    }
}
