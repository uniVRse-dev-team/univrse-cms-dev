<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delegate extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;

    public const DEL_SPEAKER_RADIO = [
        'Del_speaker_yes' => 'Yes',
        'Del_speaker_no'  => 'No',
    ];

    public $table = 'delegates';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'del_name',
        'del_fname',
        'del_lname',
        'del_position',
        'del_office',
        'del_email',
        'del_jobposition',
        'del_contact_no',
        'del_companyname',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
