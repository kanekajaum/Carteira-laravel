{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Adicionar um debito que receberá</h1>
    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="contas_a_receber">Contas a receber</a></li>
    	<li><a href="add_receive">Adicionar Contas a receber</a></li>
    </ol>
@stop

@section('content')
    <form class="form-group" method="post" action="add_receiveStore">
        {{ csrf_field() }}
    	Nome:<br>
    	<input type="text" name="name" class="form-control">

    	Valor:<br>
    	<input type="text" name="value" class="form-control">

    	Data:<br>
    	<input type="date" name="date" class="form-control">

    	<br>
    	<input type="submit" value="Adicionar" class="btn btn-primary form-group">

    </form>
@stop

