<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class ExtraHours extends Model
{
    public $table = 'extra_hours';

    protected $fillable = [ 'user_id', 'hours_quantity', 'date', 'created_by' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class);
    }
}
