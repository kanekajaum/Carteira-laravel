{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
<link rel="icon" href="img/wallet.ico" type="image/x-icon" />
@section('content_header')
    <h1>Dashboard</h1>
@stop
        
@section('content') 

        <div >
      		<div  id="primary" class="small-box bg-green col-md-12 text-center">
      			<div class="inner">
      				  <h3 >
                 
                        @if (!empty($balance->amount))
                           R$ {{ number_format($balance->amount, 2, '.', '')}}
                        @else
                            <h2>Olá {{$user->name}}<h2> <p>Faça sua primeira inserção ^^</p>
                            <a href="balance.deposit" class="btn btn-default btn-lg btn-block"> Inserir</a>
                          {{ session('/Faça sua primeira inserção ^^') }}
                          <style type="text/css">
                              #saldo{display: none;}
                          </style>
                        @endif
                        
           
                </h3>
      			</div>
      			<div class="icon">
      				<i class="ion ion-cash"></i>
      			</div>
      			<a href="/balance" id="saldo" class="small-box-footer">Saldo <i class=" fa fa-arrow-right"></i></a>
      		</div>
      		
    		{{-- ===================================================================================== --}}
    		<div class="small-box bg-blue col-md-4 text-center">
    			<div class="inner">
              <h4>Proxima conta a receber</h4>
              
                
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
                  
                 @foreach ($account_receives as $receives)
                     
                    

                          <tr>
                            <th scope="row"> {{$receives->id_conta_receive}} </th>
                                <td> {{$receives->name}} </td>
                            <td>{{number_format($receives->value, 2, '.', ',')}}</td>
                            <td>{{$receives->date}}</td>
                            
                          </tr>

                  @endforeach
                 
                </tbody>
              </table>
              
            </div>
    			<div class="icon">
    				<i class="ion ion-plus"></i>
    			</div>
    			<a href="/contas_a_receber" class="small-box-footer">Contas a receber <i class=" fa fa-arrow-right"></i></a>
    		</div>
        {{-- ===================================================================================== --}}
        <div class="small-box bg-red col-md-4 text-center">
          <div class="inner">
              <h4>Contas a pagar de Alta Prioridade</h4>
              
                
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
                  
                 @foreach ($accounts_pay as $pay)
                          <tr>
                            <th scope="row"> {{$pay->id_conta_pay}} </th>
                              <td>{{$pay->name}}</td>
                              <td>{{number_format($pay->value, 2, '.', ',')}}</td>
                              <td>{{$pay->date}}</td>
                          </tr>

                  @endforeach
                 
                </tbody>
              </table>
              
            </div>
          <div class="icon">
            <i class="ion ion-alert"></i>
          </div>
          <a href="/contas_a_pagar" class="small-box-footer">Contas a pagar <i class=" fa fa-arrow-right"></i></a>
        </div>
        {{--  ==================================================== --}}
          <div class="small-box bg-yellow col-md-4 text-center" >
            <div class="inner">
              <h4>Ultima Movimentação:</h4>
              
                
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
                     
                    

                          <tr>
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
                            <td>{{number_format($historic->amount, 2, '.', ',')}}</td>
                            <td>{{$historic->date}}</td>
                            
                          </tr>

                  @endforeach
                 
                </tbody>
              </table>
              
            </div>
            <div class="icon">
              <i class="fa fa-history"></i>
            </div>
            <a href="/historic" class="small-box-footer">Historico<i class=" fa fa-arrow-right"></i></a>
          </div>
        </div>

        {{-- ===================================================================================== --}}
        
    		
    		<div class="container">
    				<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    				<canvas id="myChart" width="100" height="50"></canvas>

					<script>
						
                   
                   			 
									var ctx = document.getElementById("myChart").getContext('2d');
									var myChart = new Chart(ctx, {
									    type: 'bar',
									    data: {
									        labels: ["Inserido", "Retirado", "Transferido"],
									        datasets: [{
									            label: 'Movimentações',
									            data: [{{$historics_I}}, {{$historics_O}}, {{ $historics_T }}],
									            backgroundColor: [
									                'rgba(0, 166, 90, 1)',
									                'rgba(0, 115, 183, 1)',
									                'rgba(243, 156, 18, 1)',
									                'rgba(75, 192, 192, 0.2)',
									                'rgba(153, 102, 255, 0.2)',
									                'rgba(255, 159, 64, 0.2)'
									            ],
									            borderColor: [
									                'rgba(255,99,132,1)',
									                'rgba(54, 162, 235, 1)',
									                'rgba(255, 206, 86, 1)',
									                'rgba(75, 192, 192, 1)',
									                'rgba(153, 102, 255, 1)',
									                'rgba(255, 159, 64, 1)'
									            ],
									            borderWidth: 1
									        }]
									    },
									    options: {
									        scales: {
									            yAxes: [{
									                ticks: {
									                    beginAtZero:true
									                }
									            }]
									        }
									    }
									});
							

               			
					</script>
    		</div>
@stop

