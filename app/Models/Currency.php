<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected static $defaultCurrency = 'EUR';

    protected $fillable = [
        'name',
        'symbol',
        'code'
    ];

    protected $casts = [
        'name' => 'string',
        'symbol' => 'string',
        'code' => 'string'
    ];

    protected  $hidden = [
        'created_at',
        'updated_at'
    ];

    static public function getDefaultCurrency(): self
    {
        return self::where('code', self::$defaultCurrency)->firstOrFail();
    }
}
