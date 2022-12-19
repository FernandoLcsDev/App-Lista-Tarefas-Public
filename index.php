<?php
	$acao = 'recuperarPendentes';
	require 'tarefa_controller.php';

?>
<html lang="pt-br">
  	<head>
	    <!-- Required meta tags -->
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

	    <!-- Estilo customizado -->
	    <link rel="stylesheet" type="text/css" href="css/estilo.css">

	    <script type="text/javascript">
	    	function editar(id, txt_tarefa) {
	    		//criar um form de edição
	    		let form = document.createElement('form')
	    		form.action = 'index.php?pag=index&acao=atualizar'
	    		form.method = 'post'
	    		form.className = 'row'

	    		//criar um input para entrada do texto
	    		let inputTarefa = document.createElement('input')
	    		inputTarefa.type = 'text'
	    		inputTarefa.name = 'tarefa'
	    		inputTarefa.className = 'col-9 form-control'
	    		inputTarefa.value = txt_tarefa

	    		//criar um input hidden para guardar o id da tarefa
	    		let inputId = document.createElement('input')
	    		inputId.type = 'hidden'
	    		inputId.name = 'id'
	    		inputId.value = id

	    		//criar button para envio do form
	    		let button = document.createElement('button')
	    		button.type = 'submit'
	    		button.className = 'col-3 btn btn-info'
	    		button.innerHTML = 'atualizar'

	    		//incluir inputId no form
	    		form.appendChild(inputId)

	    		//incluir inputTarefa no form
	    		form.appendChild(inputTarefa)

	    		//incluir o button no form
	    		form.appendChild(button)

	    		//seleciona a div tarefa
	    		let tarefa = document.getElementById('tarefa_'+id)

	    		//limpar o texto da tarefa para inclusao do form
	    		tarefa.innerHTML = ''

	    		//incluir form na pagina
	    		tarefa.insertBefore(form, tarefa[0])
	    	}

	    	function remover(id){
	    		location.href = 'index.php?pag=index&acao=remover&id='+id;
	    	}

	    	function marcarRealizada(id){
	    		location.href = 'index.php?pag=index&acao=marcarRealizada&id='+id;
	    	}
	    </script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />

								<?php
									foreach($tarefas as $indice => $tarefa){
								?>

									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?php echo $tarefa->id ?>">
											<?php echo $tarefa->tarefa ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?php echo $tarefa->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?php echo $tarefa->id ?>, '<?php echo $tarefa->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?php echo $tarefa->id ?>)"></i>
										</div>
									</div>

								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>