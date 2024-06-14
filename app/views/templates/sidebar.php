<link rel="stylesheet" href="assets/css/sidebar.css">
<nav class="sidebar-navigation">
	<ul>
		<li class="active">
			<a href="/home">
				<i class="fa fa-solid fa-book"></i>
			</a>
			<span class="tooltip">Home</span>
		</li>
		<? if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin']) { ?>
		<li>
			<a href="/user">
				<i class="fa fa-user" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Cadastrar usuários</span>
		</li>
		<? } ?>
		<li>
			<a href="#">
				<i class="fas fa-clipboard-list" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Minhas Reservas</span>
		</li>
		<li>
			<a href="/relatorio">
				<i class="fas fa-list" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Relatórios de login</span>
		</li>
		<li>
			<a href="/logout">
				<i class="fas fa-sign-out-alt" style="color: #ffffff;"></i>
			</a>
			<span class="tooltip">Sair</span>
		</li>
	</ul>
</nav>
<script>

	   $('ul li').on('click', function() {
			$('li').removeClass('active');
			$(this).addClass('active');
		});
		
</script>