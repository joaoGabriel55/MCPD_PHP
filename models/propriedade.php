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
            $img = $this->handlerImage($imagem, $tamanho, $tipo, $nome);

            if ($img != 0) {
                $this->query('UPDATE propriedade SET id_imagem_fk = :id_imagem_fk WHERE id = :id');
                $this->bind(':id', $idPropriedade);
                $this->bind(':id_imagem_fk', $img);
                $this->execute();
            } else {
                header('Location: ' . ROOT_URL . 'propriedades/add');
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
        // Verificando se selecionou alguma imagem

        if ($imagem != "none") {

            //'rb' arquivos que nao sao texto, para somente texto 'r'
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);

            $this->query('INSERT INTO imagem (nome, conteudo, tipo, tamanho) 
                            VALUES (:nome, :conteudo, :tipo, :tamanho)');
            $this->bind(':nome', $nome);
            $this->bind(':conteudo', $conteudo);
            $this->bind(':tipo', $tipo);
            $this->bind(':tamanho', $tamanho);
            $this->execute();

            $id = $this->lastInsertId();

            return $id;

        } else {
            echo 'ERROR';
            return null;
        }

    }

}
