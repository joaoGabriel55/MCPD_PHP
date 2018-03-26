<div class="container">
	<?php if (isset($_SESSION['is_logged_in'])): ?>
	<a class="btn btn-success btn-share"
		href="<?php echo ROOT_PATH; ?>propriedades/add">Nova Propriedade</a>
	<?php endif;?>
	<?php foreach ($viewmodel as $item): ?>
	<div class="row">
		<div class="mine">
			<img class="card-img-top" alt="Card image" style="width:100%" src="<?php echo ROOT_PATH; ?>assets/imgs_propriedades/<?php echo $item['nome'] ?>">
		</div>
		<div class="col s12 m12">
			<div class="card">
				<div class="card-stacked">
					<div class="card-content">
						<div class="card-header text-right">
						<h5 class="card-title text-left" style="position: absolute;"><?php echo $item['nome_propriedade'] ?></h5>
							<input class="icon" type="submit" name="alterar" value="create" title="Editar" />
							<input class="icon" type="submit" name="delete" value="delete" title="Remover" />
						</div>

						<div class="card-body">
							<ul>
								<li class="staggered-list"><b>Pais: </b><?php echo $item['pais'] ?></li>
								<li class="staggered-list"><b>Estado: </b><?php echo $item['nome_estado'] ?></li>
								<li class="staggered-list"><b>Cidade: </b><?php echo $item['nome_cidade'] ?></li>
								<li class="staggered-list"><b>Area(m<sup>2</sup>): </b><?php echo $item['area'] ?></li>

							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<?php endforeach;?>
</div>