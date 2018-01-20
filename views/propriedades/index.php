<div class="container">
	<?php if (isset($_SESSION['is_logged_in'])): ?>
	<a class="btn btn-success btn-share"
		href="<?php echo ROOT_PATH; ?>propriedades/add">Share Something</a>
	<?php endif;?>
	<?php foreach ($viewmodel as $item): ?>
	<div class="row">
		<div class="col s12 m12">
			<div class="card">

			<img src="<?php echo ROOT_URL ?>showImage.php?id=<?php echo $item['id'] ?>">
				<div class="card-stacked">
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4"><?php echo $item['nome_propriedade'] ?></span>
						<ul>
							<li class="staggered-list"><b>Pais: </b><?php echo $item['pais'] ?></li>
							<li class="staggered-list"><b>Estado: </b><?php echo $item['nome_estado'] ?></li>
							<li class="staggered-list"><b>Cidade: </b><?php echo $item['nome_cidade'] ?></li>
							<li class="staggered-list"><b>Area(m<sup>2</sup>): </b><?php echo $item['area'] ?></li>
						</ul>
					</div>
					<div class="card-action">
						<a href="#">Editar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
</div>