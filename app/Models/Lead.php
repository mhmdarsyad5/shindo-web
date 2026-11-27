<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'company',
        'truck_series',
        'quantity',
        'location',
        'notes',
        'source',
        'status',
    ];

    /**
     * Get human-readable status badge color for Filament / UI.
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'new' => 'info',
            'contacted' => 'warning',
            'in_negotiation', 'quoted' => 'primary',
            'closed_won', 'closed' => 'success',
            'closed_lost', 'cancelled' => 'danger',
            default => 'gray',
        };
    }
}
