<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = [
        'event_name',
        'description',
        'location',
        'start_time',
        'end_time',
        'color',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted()
    {
        static::creating(function ($event) {
            $event->color = self::mapStatusToColor($event->status);
        });
        static::updating(function ($event) {
            $event->color = self::mapStatusToColor($event->status);
        });
    }
    private static function mapStatusToColor($status)
    {
        return match ($status) { 'completed' => 'green',
            'ongoing' => 'red',
            'upcoming' => 'purple',
            default => 'gray',
        };
    }
}

