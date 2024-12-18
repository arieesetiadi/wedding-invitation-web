<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class T_Rsvp extends Model
{
    const CREATED_AT = 'create_date';
    const UPDATED_AT = null;

    protected $table = 't_rsvp';
    protected $primaryKey = 'rsvp_id';
    protected $guarded = [];

    public $append = [
        'create_date_diff',
        'greetings_escaped'
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(T_Invitation::class, 'invitation_id');
    }

    protected function createDateDiff(): Attribute // Example: 5h ago
    {
        return Attribute::make(
            get: fn () => Carbon::make($this->create_date)->diffForHumans(short: true)
        );
    }

    protected function greetingsEscaped(): Attribute
    {
        return Attribute::make(
            get: fn () => htmlspecialchars($this->greetings)
        );
    }
}
