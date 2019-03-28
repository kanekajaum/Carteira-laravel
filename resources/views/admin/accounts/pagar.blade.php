{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Contas a Pagar')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Contas a Pagar</h1>

    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="contas_a_pagar">Contas a Pagar</a></li>
    </ol>
@stop
@section('content')
    <div class="box">
    	<div class="box-header">
    		<a href="add_pay" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adicionar Conta</a>
    	</div>
    	<div class="box-body">
						{{-- {{dd($account_pay)}} --}}
    		<table class="table table-dark">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Valor</th>
			      <th scope="col">Vencimento</th>
			      <th scope="col">Prioridade</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach ($account_pay as $account)
			  		@if ($account)
					    <tr>
					      <th scope="row">{{$account->id_conta_pay}}</th>
					      <td>{{$account->name}}</td>
					      <td>{{$account->value}}</td>
					      <td>{{$account->date}}</td>
					      <td>{{$account->estado}}</td>
					      <td>
					      		{{-- <a href="account_pay?id={{$account->id_conta_pay}}" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Caso ja tenha pago a conta de baixa no valor por aqui.">
								  Pagou?
								</a> --}}
					      		<a href="account_pay_delete?id={{$account->id_conta_pay}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
					      </td>
					    </tr>
				    @endif
				@endforeach
			  </tbody>
			</table>

    </div>
@stop

