{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Transferencia')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Transferir</h1>

    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="balance">Saldo</a></li>
    	<li><a href="balance.tranfer">Transferencia</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		<h3>Tranferir Saldo (Informe o Recebedor)</h3>
    	</div>
        <div class="alert bg-primary" role="alert">
            <h4>Contatos:</h4>
            @foreach ($contacts as $contact)
                <i>{{$contact->email}}</i><br>
            @endforeach
        </div>
    	<div class="box-body">

            @if (!empty($resultado))
                @foreach ($resultado as $resul)
                        <p>{{ $resul}}</p>
                    @endforeach
                </div>
            @endif

    		<form method="post"  action="/ConfirmTranf" >
    			{{ csrf_field() }}
    			<div class="form-group">
    				<input type="text" name="sender" class="form-control" placeholder="Informe quem recebera (Nome completo ou Email) " required>
    			</div>
    			<div class="form-group">
    				<input type="submit" class="btn btn-success" value="Proxima Etapa"> 
    			</div>
    		</form>
    	</div>
    </div>
@stop

