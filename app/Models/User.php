<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "profile_image",
        "role"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function IsRole() {
        return $this->role;
    }

    protected static function boot()
    {
        parent::boot();
        // Delete avatars wHen deleted users
        self::deleted(function (self $user){
            return Storage::disk("public")->delete($user->profile_image);
        });
    }

    public function UploadImage(UploadedFile $uploadedFile){
        $this->profile_image = $uploadedFile->store("avatars",["disk"=>"public"]);
        $this->save();
    }


    public function getUrlAttribute(){
        if ( empty($this->attributes['profile_image']) ){
            return  url("images/default.png");
        }
        return Storage::disk("public")->url($this->attributes['profile_image']);
    }

    public function isAdmin(){
        return $this->attributes['role'] === "admin";
    }

    public function isCashier(){
        return $this->attributes['role'] === "cashier";
    }




}
