<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class errorMessage extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $primaryKey = "id";

    protected $table = "errormessage";

    protected $fillable = [
            "message",
            "user_id",
    ];
    
   

    public static function notifications(){
        return self::query()->select->all();
    }
}   


