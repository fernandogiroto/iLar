<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionRegistration extends Model
{
    public $table = 'actions_registrations';

    protected $fillable = ['action_id', 'extraData','schedule_to', 'executed', 'executed_at', 'notes'];


    public function action() {
        return $this->belongsTo(Action::class);
    }
}
