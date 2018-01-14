<?php
// Uma forma de obter $_POST['estado'] mais segura
require 'config.php';
require 'classes/Model.php';
require 'models/propriedade.php';

$propriedadeModel = new PropriedadeModel();

$codEstado = filter_input(INPUT_POST, 'estado', FILTER_VALIDATE_INT);

$propriedadeModel->query('
				SELECT cod_cidade, nome_cidade FROM cidade 
				WHERE estado_cod_estado = :codestado ORDER BY nome_cidade ASC
			');
$propriedadeModel->bind(':codestado', $codEstado);
$cidades = $propriedadeModel->resultSet();

?>

<?php foreach ($cidades as $cidade) { ?>
<option value="<?php echo $cidade['cod_cidade'] ?>"><?php echo $cidade['nome_cidade'] ?></option>
<?php } ?>