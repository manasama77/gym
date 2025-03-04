<?php

namespace App\Models;

use App\LogMembershipStatusType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogMembership extends Model
{
    /** @use HasFactory<\Database\Factories\LogMembershipFactory> */
    use HasFactory;

    protected $fillable = [
        'membership_id',
        'gym_package_id',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'status'     => LogMembershipStatusType::class,
    ];

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    public function gymPackage(): BelongsTo
    {
        return $this->belongsTo(GymPackage::class);
    }
}
