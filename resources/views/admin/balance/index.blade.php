{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')
    {{-- {{ dd($amount) }} --}}
@section('title', 'Saldo')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="balance">Saldo</a></li>
    </ol>
@stop
    

    

@section('content')


    @if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif

    <div class="box">
    	<div class="box-header">
    		<a href="balance.deposit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Recarregar</a>
        @if ($amount > 0 )
            <a href="balance.withdrawn" class="btn btn-danger"><i class="fa fa-cart-arrow-down"></i> Sacar</a>
            <a href="balance.tranfer" class="btn btn-info"><i class="fa fa-exchange"></i> Transferir</a>
        @endif

    	</div>
    	<div class="box-body">

            

            
    		<div class="small-box bg-green">
    			<div class="inner">
    				<h3>R$ {{ number_format($amount, 2, '.', '') }}</h3>
    			</div>
    			<div class="icon">
    				<i class="ion ion-cash"></i>
    			</div>
    			<a href="historic" class="small-box-footer">Histórico <i class=" fa fa-arrow-right"></i></a>
    		</div>
    	</div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

