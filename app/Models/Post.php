<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['title', 'post', 'category'];
    public static array $category = ['Sports', 'Politics', 'Romance', 'Jobs Vacancies', 'Tech', 'Education',
'Autos', 'Health', 'Travel', 'Religion', 'Food', 'Pets', 'Others'];

public function user():BelongsTo{
   return $this->belongsTo(\App\Models\User::class);
}
public function comments(): HasMany{
    return $this->hasMany(\App\Models\Comment::class);
}
}
