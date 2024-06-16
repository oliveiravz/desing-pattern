<link rel="stylesheet" href="/assets/css/sidebar.css">
<nav class="sidebar-navigation">
	<ul>
		<li class="active">
			<a href="/home">
				<i class="fa fa-solid fa-book" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Home</span>
		</li>
		<?php if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == '1') { ?>
		<li>
			<a href="/morador">
				<i class="fa fa-user" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Cadastrar moradores</span>
		</li>
		<li>
			<a href="/moradores">
				<i class="fas fa-users" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Moradores Cadastrados</span>
		</li>
		<li>
			<a href="/reservas-ativas">
				<i class="fas fa-calendar-check" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Reservas Ativas</span>
		</li>
		<?php } ?>
		<li>
			<a href="/reservas/morador/<?=$_SESSION['user']['id_morador']?>">
				<i class="fas fa-clipboard-list" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Minhas Reservas</span>
		</li>
		<?php if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == '1') { ?>
		<li>
			<a href="/relatorio">
				<i class="fas fa-list" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Relatórios de login</span>
		</li>
		<?php } ?>
		<?php if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] == '1') { ?>
		<li>
			<a href="/delecoes">
			<i class="fas fa-trash-alt" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Relatórios de Deleções</span>
		</li>
		<?php } ?>
		<li>
			<a href="/logout">
				<i class="fas fa-sign-out-alt" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Sair</span>
		</li>
	</ul>
</nav>