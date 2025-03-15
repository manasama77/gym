<?php

namespace App\Models;

use App\GenderType;
use App\MembershipStatus;
use App\MemberType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Membership extends Model
{
    /** @use HasFactory<\Database\Factories\MembershipFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender',
        'member_type',
        'join_date',
        'expired_date',
        'no_whatsapp',
        'status', // active, expired, new
    ];

    protected $casts = [
        'gender' => GenderType::class,
        'member_type' => MemberType::class,
        'join_date' => 'date',
        'expired_date' => 'date',
        'status' => MembershipStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->orderBy('name', 'asc');
    }

    public function logMembership(): HasMany
    {
        return $this->hasMany(LogMembership::class);
    }
}
