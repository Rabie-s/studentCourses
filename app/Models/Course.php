<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'price', 'main_image', 'active', 'description', 'category_id', 'admin_id'];

    protected $appends = ['main_image_url']; 

    public function getMainImageUrlAttribute() 
    {
        return asset('storage/images/' . $this->main_image);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }


    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }
}
