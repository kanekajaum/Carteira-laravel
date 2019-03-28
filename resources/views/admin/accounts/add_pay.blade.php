{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Adicionar uma conta a pagar')

@section('content_header')
    <h1>Adicionar uma conta a pagar</h1>
    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="contas_a_pagar">Contas a Pagar</a></li>
    	<li><a href="add_pay">Adicionar uma conta</a></li>
    </ol>
@stop

@section('content')
    <form class="form-group" method="post" action="add_payStore">
        {{ csrf_field() }}
    	Nome:<br>
    	<input type="text" name="name" class="form-control">

    	Valor:<br>
    	<input type="text" name="value" class="form-control">

    	Data:<br>
    	<input type="date" name="date" class="form-control">

    	Prioridade:<br>
    	<input type="text" name="estado" class="form-control">
    		<br>
    	<input type="submit" value="Adicionar" class="btn btn-primary form-group">

    </form>
@stop

