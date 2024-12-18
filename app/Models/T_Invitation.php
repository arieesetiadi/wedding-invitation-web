<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Constants\PublishStatus;

class T_Invitation extends Model
{
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'modify_date';

    protected $table = 't_invitation';
    protected $primaryKey = 'invitation_id';
    protected $guarded = [];

    public function rsvp(): HasOne
    {
        return $this->hasOne(T_Rsvp::class, 'invitation_id');
    }

    public function scopePublished(Builder $builder): Builder
    {
        return $builder->where('publish', PublishStatus::PUBLISHED);
    }
}
