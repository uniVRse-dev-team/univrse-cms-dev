<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Booth extends Model
{
    use MultiTenantModelTrait;
    use Auditable;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'boothId',
        'boothName',
        'boothManager',
        'boothColor',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
