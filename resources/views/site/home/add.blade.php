<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<div class="container">
	<div class="col-md-10 light mx-auto" style="margin-top: 140px;">
		<h2 class="text-center">Bem vindo {{$name}} </h2>
        <h4 class="text-center">Para iniciarmos a o Controle precisamos que insira um valor minimo.. </h4><br><br>

		<form method="post"  action="/deposit" >
    			{{ csrf_field() }}
    			<div class="form-group">
    				<input type="text" name="value" class="form-control" placeholder="Primeiro Deposito" required>
    			</div>
    			<div class="form-group">
    				<input type="submit" class="btn btn-success form-control" value="Deposito"> 
    			</div>
    		</form>


	</div>
</div>