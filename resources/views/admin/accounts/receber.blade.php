{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Contas a Pagar')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Contas a Receber</h1>

    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="contas_a_receber">Contas a Receber</a></li>
    </ol>
@stop
@section('content')
    <div class="box">
    	<div class="box-header">
    		<a href="add_receive" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adicionar Conta</a>
    	</div>
    	<div class="box-body">

    		<table class="table table-dark">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Valor</th>
			      <th scope="col">Data</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach ($account_receive as $account)
			  		@if ($account)
					    <tr>
					      <th scope="row">{{$account->id_conta_receive}}</th>
					      <td>{{$account->name}}</td>
					      <td>{{$account->value}}</td>
					      <td>{{$account->date}}</td>
					        <td><a href="account_receive_delete?id={{$account->id_conta_receive}}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
					    </tr>
					 @endif
				@endforeach
			  </tbody>
			</table>
		</div>
    </div>
@stop

