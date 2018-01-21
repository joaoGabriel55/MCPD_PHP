<?php

class PropriedadeModel extends Model {
    
    
    public function Index() {
        $this->query('SELECT * FROM propriedade
			INNER JOIN estado ON propriedade.id_estado_fk = estado.cod_estado
			INNER JOIN cidade ON propriedade.id_cidade_fk = cidade.cod_cidade
			INNER JOIN imagem ON propriedade.id_imagem_fk = imagem.id
			ORDER BY propriedade.id DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {
            $imagem = $_FILES['imagem']['tmp_name'];
            $tamanho = $_FILES['imagem']['size'];
            $tipo = $_FILES['imagem']['type'];
            $nome = $_FILES['imagem']['name'];
//            if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
            //                Messages::setMsg('Please Fill In All Fields', 'error');
            //                return;
            //            }
            $img = $this->handlerImage($imagem, $tamanho, $tipo, $nome);
            if ($img != 0) {
                // Insert into MySQL
                $this->query('INSERT INTO
                            propriedade (nome_propriedade, pais, id_estado_fk, id_cidade_fk, area)
				            VALUES(:nome_propriedade, :pais, :id_estado_fk, :id_cidade_fk, :area)');
                $this->bind(':nome_propriedade', $post['nome_propriedade']);
                $this->bind(':pais', $post['pais']);
                $this->bind(':id_estado_fk', $post['estado']);
                $this->bind(':id_cidade_fk', $post['cidade']);
                $this->bind(':area', $post['area']);
                $this->execute();

                $idPropriedade = $this->lastInsertId();

                $this->query('UPDATE propriedade SET id_imagem_fk = :id_imagem_fk WHERE id = :id');
                $this->bind(':id', $idPropriedade);
                $this->bind(':id_imagem_fk', $img);
                $this->execute();
            } else {
                echo 'ERROR';
            }
            // Verify
            if ($idPropriedade) {
                // Redirect
                header('Location: ' . ROOT_URL . 'propriedades');
            }
        }
        return;
    }

    public function findStates() {
        $this->query('SELECT cod_estado, sigla FROM estado ORDER BY sigla');
        $rows = $this->resultSet();

        return $rows;

    }

    public function handlerImage($imagem, $tamanho, $tipo, $nome) {
        // Pega a extensao
        $extensao = strrchr($nome, '.');

        // Converte a extensao para mimusculo
        $extensao = strtolower($extensao);

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfilero as extesões permitidas e separo por ';'
        // Isso server apenas para eu poder pesquisar dentro desta String
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            $novoNome = md5(microtime()) . '.' . $extensao;

            // Concatena a pasta com o nome
            $destino = $_SERVER['DOCUMENT_ROOT'].'/dashboard/cursoPHP/Mcpd/assets/imgs_propriedades/' . $novoNome;
           
            // tenta mover o arquivo para o destino
            if (@move_uploaded_file($imagem, $destino)) {

                list($width, $height) = getimagesize($destino);

                
                $this->query('INSERT INTO imagem (nome, caminho, tipo, tamanho)
                                VALUES (:nome, :caminho, :tipo, :tamanho)');
                $this->bind(':nome', $novoNome);
                $this->bind(':caminho', $destino);
                $this->bind(':tipo', $tipo);
                $this->bind(':tamanho', $tamanho);
                $this->execute();

                $id = $this->lastInsertId();

                return $id;
                //echo "<img src=\"" . $destino . "\" />";
            } else {
                echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
                return 0;
            }

        } else {
            echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
            return 0;
        }
    }
}
