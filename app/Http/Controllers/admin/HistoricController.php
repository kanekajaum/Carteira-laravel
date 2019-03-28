<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Historic;
use DB;

class HistoricController extends Controller
{

    public function getHistorico(){
      $user_id = (auth()->user()->id);
      

       $historics = DB::table('historics')->where('user_id',$user_id)->get();

      return view('admin.historic.index',compact('historics'));
    }

   //===========================================
    public function historic_delete(Request $request){

    	$id = $request->id;

    	DB::table('historics')->delete($id);
    	
    	return redirect('/historic');
    }
    


}
