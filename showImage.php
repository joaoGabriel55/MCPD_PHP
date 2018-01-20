<?php

require 'config.php';
require 'classes/Model.php';
require 'models/propriedade.php';

$propriedadeModel = new PropriedadeModel();

$propriedadeModel->query('SELECT imagem.id FROM propriedade
			INNER JOIN estado ON propriedade.id_estado_fk = estado.cod_estado
			INNER JOIN cidade ON propriedade.id_cidade_fk = cidade.cod_cidade
			INNER JOIN imagem ON propriedade.id_imagem_fk = imagem.id
			ORDER BY propriedade.id DESC');
$rows = $propriedadeModel->resultSet();

foreach ($rows as $key) {
    $propriedadeModelNew = new PropriedadeModel();
    $propriedadeModelNew->query('SELECT * FROM imagem WHERE id=:id_img');
    $id = (int) $key['id'];
    $propriedadeModelNew->bind('id_img', $id);
    $newRow = $propriedadeModelNew->resultSet();
    
}

foreach ($newRow as $key) {
    $imageData = $key['conteudo'];
    
    $encoded_image = base64_encode($imageData);

    header('content-type: image/jpg ');
    echo $encoded_image;
}


?>