<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class account_receive extends Model
{
    protected $primaryKey = 'id_conta_receive';
    protected $fillable = ['id_conta_receive', 'name', 'value', 'date', 'user_id_transaction'];
}
