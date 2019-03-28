{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Historico</h1>

    <ol class="breadcrumb">
    	<li><a href="admin/">Dashboard</a></li>
    	<li><a href="historic">Historico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		Historico
    	</div>
    	<div class="box-body">

            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Data</th>
                </tr>
              </thead>
              <tbody>
                
               @foreach ($historics as $historic)
                   
                    @if ($historic->type == 'I')

                        <tr class="bg-primary">
                          <th scope="row"> {{$historic->id}} </th>
                              <td>
                                  
                                    @switch($historic->type)
                                        @case('I')
                                             {{"inserido"}}
                                            @break
                                        @case('O')
                                             {{"Retirado"}}
                                            @break
                                        @case('T')
                                             {{"Transferido"}}
                                            @break
                                    @endswitch
                                    
                                  
                               </td>
                          <td>{{$historic->amount}}</td>
                          <td>{{$historic->date}}</td>
                          <td><a href="historic_delete?id={{$historic->id}}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                        </tr>
                    @endif
                    @if ($historic->type == 'O')

                        <tr class="bg-warning">
                          <th scope="row"> {{$historic->id}} </th>
                              <td>
                                  
                                    @switch($historic->type)
                                        @case('I')
                                             {{"inserido"}}
                                            @break
                                        @case('O')
                                             {{"Retirado"}}
                                            @break
                                        @case('T')
                                             {{"Transferido"}}
                                            @break
                                    @endswitch
                                    
                                  
                               </td>
                          <td>{{$historic->amount}}</td>
                          <td>{{$historic->date}}</td>
                          <td><a href="historic_delete?id={{$historic->id}}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                        </tr>
                    @endif
                    @if ($historic->type == 'T')

                        <tr class="bg-info">
                          <th scope="row"> {{$historic->id}} </th>
                              <td>
                                  
                                    @switch($historic->type)
                                        @case('I')
                                             {{"inserido"}}
                                            @break
                                        @case('O')
                                             {{"Retirado"}}
                                            @break
                                        @case('T')
                                             {{"Transferido"}}
                                            @break
                                    @endswitch
                                    
                                  
                               </td>
                          <td>{{$historic->amount}}</td>
                          <td>{{$historic->date}}</td>
                          <td><a href="historic_delete?id={{$historic->id}}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                        </tr>
                    @endif

                @endforeach
               
              </tbody>
            </table>
            
    	<div class="small-box bg-light">
    			<div class="inner">
    				
    			</div>
    			<div class="icon">
    				{{-- <i class="ion ion-more"></i> --}}
    			</div>
    		</div>
    	</div>
    </div>
@stop

