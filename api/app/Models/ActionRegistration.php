<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ActionRegistration extends Model
{
    public $table = 'actions_registrations';

    protected $fillable = ['action_id', 'extraData','scheduled_to', 'executed', 'executed_at', 'notes'];


    public function action() {
        return $this->belongsTo(Action::class);
    }

    public function authors() {
        return $this->belongsToMany(User::class, 'action_has_authors');
    }

    public function receptors() {
        return $this->belongsToMany(User::class, 'action_has_receptors');
    }
}
