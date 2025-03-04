<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogMembership extends Model
{
    /** @use HasFactory<\Database\Factories\LogMembershipFactory> */
    use HasFactory;

    protected $fillable = [
        'membership_id',
        'gym_package_id',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Memberships::class);
    }

    public function gymPackage(): BelongsTo
    {
        return $this->belongsTo(GymPackage::class);
    }
}
