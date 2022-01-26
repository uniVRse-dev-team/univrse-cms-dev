<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Sponsor extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasMediaTrait;
    use Auditable;

    public const SPO_PACKAGE_SELECT = [
        'Spo_package_bronze' => 'Bronze',
        'Spo_package_silver' => 'Silver',
        'Spo_package_gold'   => 'Gold',
    ];

    public $table = 'sponsors';

    protected $appends = [
        'spo_logo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'spo_register',
        'spo_name',
        'spo_hall',
        'spo_adr_1',
        'spo_adr_2',
        'spo_postcode',
        'spo_city',
        'spo_state',
        'spo_country',
        'spo_email',
        'spo_pic',
        'spo_position',
        'spo_office',
        'spo_mobile',
        'spo_package',
        'spo_product',
        'spo_amount',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getSpoLogoAttribute()
    {
        return $this->getMedia('spo_logo')->last();
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
