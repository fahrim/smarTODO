<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'completed',
        'completed_at',
        'due_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'completed' => 'boolean',
        'completed_at' => 'datetime',
        'due_date' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->whereCompleted(true);
    }

    public function scopeIncomplete(Builder $query): Builder
    {
        return $query->whereCompleted(false);
    }

    public function updateCompletedToggle(): void
    {
        $this->update([
            'completed' => !$this->completed,
            'completed_at' => $this->completed ? null : now(),
        ]);
    }
}
