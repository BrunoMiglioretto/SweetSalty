<?php
	include "../../controller/cozinheiroController/verificacaoSessionCozinheiroController.php";

?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="" title="Sweet Salty | Cozinha">
		<h6>Sweet Salty | <?= $cozinheiro->getNomeCompleto()?></h6>
	</a>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" data-toggle="modal" data-target="#exampleModal" title="Sair">
			<i class="fa fa-fw fa-sign-out"></i>Sair</a>
		</li>
	</ul>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Você tem certeza?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Ao clicar em "Sair" você será deslogado do sistema</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-primary" href="../../controller/sairFuncionarioController.php">Sair</a>
			</div>
		</div>
	</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fa fa-angle-up"></i>
</a>