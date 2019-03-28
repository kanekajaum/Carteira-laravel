{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Confirmar Transferência')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Confirmar Transferência</h1>
    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="balance">Saldo</a></li>
    	<li><a href="balance.tranfer">Trasnferir</a></li>
    	<li><a href="/transfer_confirm">Confirmação</a></li>

    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		<h3>Confirmar Tranferência Saldo</h3>
    	</div>
    	<div class="box-body">

            @if (!empty($resultado))
                @foreach ($resultado as $resul)
                        <p>{{ $resul}}</p>
                    @endforeach
                </div>
            @endif
             <p><strong>Recebedor:  </strong>{{ $sender->name }}</p>	
           		
           	<div class="alert alert-success">
           		<h4><strong>Seu saldo atual:  </strong>{{ number_format($balance->amount, 2, '.', ',') }}</h4>
           	</div>

    		<form method="post"  action="/transfer" >
    			{{ csrf_field() }}

    			<input type="hidden" name="sender_id" class="form-control" value="{{$sender->id}}">

    			<div class="form-group">
    				<input type="text" name="value" class="form-control" placeholder="EX: 20.50" required>
    			</div>
    			<div class="form-group">
    				<input type="submit" class="btn btn-success" value="Transferir"> 
    			</div>
    		</form>
    	</div>
    </div>
@stop

