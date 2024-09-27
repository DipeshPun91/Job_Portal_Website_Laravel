<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'name',
        'address',
        'email',
        'phone',
        'attachments',
        'cover_letter'
    ];

    function job() {
        return $this->belongsto(Job::Class);
    }
}
