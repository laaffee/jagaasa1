<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Logactivity extends Model
{
    use HasFactory;

    protected $table = 'logactivity';
 
    protected $guarded = [];

    public static function addLog($user_id, $aktivitas)
    {
        return Logactivity::Create([
            'user_id'       =>  $user_id,
            'aktivitas'     =>  $aktivitas,
            'created_at'    =>  Carbon::now()->toDateTimeString()
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
