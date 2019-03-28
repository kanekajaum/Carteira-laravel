<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\User;
use DB;
use App\Http\Requests\MoneyValidationFormRequest;

class BalanceController extends Controller
{
    //=======================================
    public function index(){

        $balance = (auth()->user()->balance);

        $amount = $balance ? $balance->amount : 0;
        
        if($amount == null){
            
            $amount = 0;

            return view('admin.balance.index', compact('amount'));
        }else{
            $balance = (auth()->user()->balance);

        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
        }
        

        return view('admin.balance.index', compact('amount'));
        
    }
    //=======================================
    public function deposit(){
        
        return view('admin.balance.deposit');
    }
    //=======================================
    public function depositStore(MoneyValidationFormRequest $request){

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $resultado = $balance->deposit($request->value);
            
        if('status' == 1){
            'Inserido com sucesso';
        }else{
            'Ouve um erro ao inserir';
        }

        return redirect('/admin')->with('status', 'Inserido com sucesso');
    }
    //==========================              saque                  ================================
    public function withdrawn(){
        $balance = (auth()->user()->balance);
        return view('admin.balance.withdrawn',compact('balance'));
    }
    //=======================================
    public function withdrawnStore(MoneyValidationFormRequest $request){
            // dd($request->all());
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $resultado = $balance->withdrawn($request->value);
            
        // return view('admin.balance.withdrawn', compact('resultado'));
        return redirect('/balance')->with('status', 'Sacado com sucesso');
    }
    
    //==========================              Transferencia                     ================================
    public function tranfer(){
        $contacts = DB::table('users')->get();
        // dd($conctacts);
        return view('admin.balance.tranfer', compact('contacts'));
    }
    //=======================================
    public function ConfirmTranf(Request $request, User $user){
            // dd($request->all());
        if($sender = $user->getSender($request->sender))
        {
          if ($sender->id === auth()->user()->id) {
              return redirect('/balance');
          }

          $balance = auth()->user()->balance;


            return view('admin.balance.transfer_confirm', compact('sender', 'balance'));
        }
    }
   //=======================================
    public function transferStrore(MoneyValidationFormRequest
     $request, User $user){
        // dd($request->all()); getPagar
        

        if(!$sender = $user->find($request->sender_id)){
            return redirect('/balance',print_r("algo deu errado"));
        }

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $resultado = $balance->transfer($request->value);

        return redirect('/balance')->with('status', 'Transferido com sucesso com sucesso');
    }
    //==========================              Contas a pagar e receber                       ================================
    
    //================================                     Contas a receber                                =========================
   
    public function getReceber(){
        $user_id = (auth()->user()->id);

         $account_receive = DB::table('account_receives')->where('user_id_transaction', $user_id)->get();


        return view('admin.accounts.receber', compact('account_receive'));
    }
    
    public function add_receive(){

        // $account_receive = DB::table('account_receives')->get();


         return view('admin.accounts.add_receive');

    }
    public function add_receiveStore(Request $request){

        
        
        $name = $request->name;
        $value = $request->value;
        $date = $request->date;
        $user_id = (auth()->user()->id);

        // dd($user_id);

        DB::table('account_receives')->insert(['name' => $name, 'value' => $value, 'date' => $date, 'user_id_transaction' => $user_id ]);

        
        return redirect('/contas_a_receber');
    }
    //=======================================
    public function account_receive_delete(Request $request){

    
        $id = $request->id;

        DB::table('account_receives')->where('id_conta_receive', $id)->delete();

        return redirect('/contas_a_receber');
    }



    //================================                     Contas a pagar                                =========================
    public function getPagar(){
        $user_id = (auth()->user()->id);
        // dd($user_id);
        $account_pay = DB::table('account_pays')->where('user_id', $user_id)->get();

        return view('admin.accounts.pagar', compact('account_pay'));

    }
    //=======================================
    public function add_pay(){

         return view('admin.accounts.add_pay');

    }
    //=======================================
    public function add_payStore(Request $request){

        
        
        $name = $request->name;
        $value = $request->value;
        $date = $request->date;
        $estado = $request->estado;
        $user_id = (auth()->user()->id);

        // dd($user_id);

        DB::table('account_pays')->insert(['name' => $name, 'value' => $value, 'date' => $date, 'estado' => $estado, 'user_id' => $user_id ]);

        
        return redirect('/contas_a_pagar');
    }
    //=======================================
    public function account_pay_delete(Request $request){

    
        $id = $request->id;

        DB::table('account_pays')->where('id_conta_pay', $id)->delete();

        return redirect('/contas_a_pagar');
    }

    //===========================================
     public function account_pay(MoneyValidationFormRequest $request){
          // dd($request->all());
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $resultado = $balance->withdrawn($request->value);
            
        // return view('admin.balance.withdrawn', compact('resultado'));
        return redirect('/contas_a_pagar')->with('status', 'Sacado com sucesso');
    
       
    }
     //===========================================   ========================================================
    
   
}
