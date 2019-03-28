<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class account_pay extends Model
{
    protected $primaryKey = 'id_conta_pay';
    protected $fillable = ['id_conta_receive', 'name', 'value', 'date', 'estado', 'user_id_transaction'];
}
