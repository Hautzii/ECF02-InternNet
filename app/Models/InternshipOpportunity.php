<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(string $id)
 * @method static create(array $array)
 */
class InternshipOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'contract',
        'description',
        'start',
        'end',
        'email'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
