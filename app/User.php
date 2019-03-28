<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Balance;
use App\Models\Historic;
use App\Models\account_pay;
use App\Models\account_receive;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function balance(){

        return $this->hasOne(Balance::class);

    }
    public function historics(){

        return $this->hasOne(Historic::class);

    }

    public function account_pay(){

        return $this->hasOne(account_pay::class);

    }

    public function accounts_receive(){

        return $this->hasOne(accounts_receive::class);

    }


     public function getSender($sender){

       return $this->where('name', 'LIKE', "%sender%")
        ->orWhere('email', $sender)
        ->get()
        ->first();

    }
}
