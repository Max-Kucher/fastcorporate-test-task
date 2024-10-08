<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'page',
        'event_name',
    ];

    /**
     * Get the user associated with the event.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
