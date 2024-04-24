<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(string $id)
 * @method static create(array $array)
 */
class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'contract',
        'description',
        'start',
        'end',
        'email',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
