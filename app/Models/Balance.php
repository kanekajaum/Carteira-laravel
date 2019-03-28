<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit($value) : Array{
    	
        DB::beginTransaction();


        $totalBefore = $this->amount ? $this->amount : 0;
        // dd($value);
    	$this->amount += $value;
    	$deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'I', 
            'amount' => $value, 
            'total_before' => $totalBefore, 
            'total_after' => $this->amount, 
            'user_id_transaction' , 
            'date' => date('Ymd'),
        ]);

    	if ($deposit && $historic) {
    		
            DB::commit();

            return [
    			'success' => true,
    			'message' => 'Sucesso :D'
    		];
        }else{

            DB::rollback();

    		return [
    			'success' => false,
    			'message' => 'Falha :´('
    		];
    	
    	}
    }

// =====================================================

    public function withdrawn($value) : Array{

        if ($this->amount < $value) {
             return [
                'success' => false,
                'message' => 'Saldo insuficiente :('
            ];
        }

        // dd($value);

         DB::beginTransaction();



        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $withdrawn = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'O', 
            'amount' => $value, 
            'total_before' => $totalBefore, 
            'total_after' => $this->amount, 
            'user_id_transaction' , 
            'date' => date('Ymd'),
        ]);

        if ($withdrawn && $historic) {
            
            DB::commit();

            return [
                'success' => true,
                'message' => 'Sucesso :D'
            ];
        }else{

            DB::rollback();

            return [
                'success' => false,
                'message' => 'Falha :´('
            ];
        
        }
    }
    //=====================================================
    public function transfer(float $value, User $sender){

        if ($this->amount < $value) {
             return [
                'success' => false,
                'message' => 'Saldo insuficiente :('
            ];
        }

         DB::beginTransaction();



        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $transfer = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'T', 
            'amount' => $value, 
            'total_before' => $totalBefore, 
            'total_after' => $this->amount, 
            'user_id_transaction' => $sender->id, 
            'date' => date('Ymd'),
        ]);
        $sendeBalance = $sender->balance()->fistOrCreate([]);
         $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;
        $senderBalance->amount += number_format($value, 2, '.', '');
        $transferSender = $senderBalance->save();

        $historicSender = $sender->historics()->create([
            'type' => 'I', 
            'amount' => $value, 
            'total_before' => $totalBeforeSender, 
            'total_after' => $senderBalance->amount, 
            'user_id_transaction' => $auth->user()->id, 
            'date' => date('Ymd'),
        ]);

        if ($transfer && $transferSender) {
            
            DB::commit();

            return [
                'success' => true,
                'message' => 'Sucesso :D'
            ];
        }else{

            DB::rollback();

            return [
                'success' => false,
                'message' => 'Falha :´('
            ];
        
        }
    }
}