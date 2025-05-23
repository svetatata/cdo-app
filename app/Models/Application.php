<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use CrudTrait;
    use HasFactory;

    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELED = 'canceled';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'degree',
        'program_id',
        'message',
        'status',
        'agree_terms'
    ];

    protected $casts = [
        'agree_terms' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новая',
            self::STATUS_IN_PROGRESS => 'В обработке',
            self::STATUS_COMPLETED => 'Завершена',
            self::STATUS_CANCELED => 'Отменена'
        ];
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
} 