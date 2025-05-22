<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'program',
        'direction',
        'message',
        'status'
    ];

    protected $casts = [
        'agree_terms' => 'boolean'
    ];
} 