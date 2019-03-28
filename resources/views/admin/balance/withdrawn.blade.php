{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Saque')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Retirada</h1>

    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="balance">Saldo</a></li>
    	<li><a href="balance.withdrawn">Saque</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		<h3>Fazer Retirada</h3>
    	</div>
    	<div class="box-body">

            @if (!empty($resultado))
                @foreach ($resultado as $resul)
                        <p>{{ $resul}}</p>
                    @endforeach
                </div>
            @endif

            <div class="alert alert-success">
                <h4><strong>Seu saldo atual:  </strong>{{ number_format($balance->amount, 2, '.', ',') }}</h4>
            </div>

    		<form method="post"  action="/withdrawn" >
    			{{ csrf_field() }}
    			<div class="form-group">
    				<input type="text" name="value" class="form-control" placeholder="EX: 20.50" required>
    			</div>
    			<div class="form-group">
    				<input type="submit" class="btn btn-success" value="Retirado"> 
    			</div>
    		</form>
    	</div>
    </div>
@stop

