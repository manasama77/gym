<?php

namespace App\Models;

use App\GenderType;
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
        'status', // boolean 1 = aktif, 0 = non aktif
    ];

    protected $casts = [
        'gender' => GenderType::class,
        'member_type' => MemberType::class,
        'join_date' => 'date',
        'expired_date' => 'date',
    ];

    public function getStatusAttribute($value): string
    {
        return $value ? 'Aktif' : 'Tidak Aktif';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->orderBy('name', 'asc');
    }

    public function logMembership(): HasMany
    {
        return $this->hasMany(LogMembership::class);
    }
}
