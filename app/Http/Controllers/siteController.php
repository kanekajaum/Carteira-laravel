<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use DB;

class siteController extends Controller
{
    public function index(){


    	 	return view('site.home.index');

    	 }

    	
    }
    // public function primary(Request $request){

    // 	$id = (auth()->user()->id);
    // 	$value = $request->value;

    // 	$add = DB::table('balance')->insert(['user_id' => $id, 'amount' => $value]);

       
    //     if('status' == 1){
    //         'Inserido com sucesso';
    //     }else{
    //         'Ouve um erro ao inserir';
    //     }

    //     return redirect('/')->with('status', 'Inserido com sucesso, Bem vindo');
    // }
      

