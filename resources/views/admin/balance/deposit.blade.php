{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Recarga')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Deposito</h1>

    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="balance">Saldo</a></li>
    	<li><a href="/balance.deposit">Deposito</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		<h3>Fazer Recarga</h3>
    	</div>
    	<div class="box-body">

            @if(session('status'))
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
                </div>
            @endif


    		<form method="post"  action="/deposit" >
    			{{ csrf_field() }}
    			<div class="form-group">
    				<input type="text" name="value" class="form-control" placeholder="EX: 20.50" required>
    			</div>
    			<div class="form-group">
    				<input type="submit" class="btn btn-success" value="Recarregar"> 
    			</div>
    		</form>
    	</div>
    </div>
@stop

