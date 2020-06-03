<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class errorMessage extends Model
{
    //use SoftDeletes;
    //use Notifiable;

    protected $primaryKey = "id";

    protected $table = "errormessage";

    protected $fillable = [
            "message",
            "target_user_id",
            "user_id",
    ];


    public static function notifications(){
        return self::query()->select->all();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}


