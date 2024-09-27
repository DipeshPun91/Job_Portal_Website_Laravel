<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'salary',
        'deadline',
        'description'
    ];

    protected $casts = [
        'deadline'=> 'datetime:Y-m-d',
        'created_at'=> 'datetime:Y-m-d',
        'updated_at'=> 'datetime:Y-m-d'
    ];

    function user() {
        return $this->belongsto(User::Class);
    }

    function category() {
        return $this->belongsto(Category::Class);
    }

    function applications() {
        return $this->hasmany(Application::Class);
    }
}
