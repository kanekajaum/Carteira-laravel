<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class adminController extends Controller
{
    public function index(){

    	
    	$balance = (auth()->user()->balance);
    	$user_id = (auth()->user()->id);
        
        $user = (auth()->user());

        // dd($user->name);

    	$historics = DB::table('historics')->where('user_id', $user_id)->orderBy('id','desc')->take(1)->get();

    	$historics_O =  DB::table('historics')->where('type', 'O')->where('user_id', $user_id)->sum('amount');
   		$historics_I =  DB::table('historics')->where('type', 'I')->where('user_id', $user_id)->sum('amount');
    	$historics_T =  DB::table('historics')->where('type', 'T')->where('user_id', $user_id)->sum('amount');

        $accounts_pay = DB::table('account_pays')->where("estado","alta")->take(1)->get();

        $account_receives = DB::table('account_receives')->orderBy('date', 'ASC')->take(1)->get();

            // dd($account_receives);
    
    	return view('admin.home.index', compact('balance', 'historics', 'historics_O', 'historics_I', 'historics_T','user','accounts_pay', 'account_receives'));
    }
    // public function iniciar(){
    //     return 'cheguei!!';
    // }
}
