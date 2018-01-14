<?php
class UserModel extends Model{
        
	public function Index(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$this->editOrDel();
		//$this->edit();
		$this->query('SELECT * FROM usuario ORDER BY data_ativacao DESC');
		$rows = $this->resultSet();
		return $rows;
	}

	public function editOrDel(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($post['delete']) {
			$this->excluir();
		} else {
			$this->edit();
		}
	}

	public function excluir(){

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($post['delete']) {
			$this->query('DELETE FROM usuario WHERE id = :id');
			$this->bind(':id', $post['delete_id']);

			$this->execute();

		}
	}

	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['senha']);

		if($post['submit']){
			if($post['nome_completo'] == '' || $post['email'] == '' || $post['senha'] == '' || $post['cpf'] == '' || $post['login'] == ''){
				Messages::setMsg('Preencha todos os campos!', 'error');
				return;
			}

			// Insert into MySQL
			$this->query('INSERT INTO usuario (nome_completo, email, login, senha, cpf, data_inativacao) VALUES(:nome_completo, :email, :login, :senha, :cpf, null)');
			$this->bind(':nome_completo', $post['nome_completo']);
			$this->bind(':email', $post['email']);
			$this->bind(':cpf', $post['cpf']);
			$this->bind(':login', $post['login']);
			$this->bind(':senha', $password);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'users');
			}
		}
		return;
	}

	public function edit(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //Busca para que possa
		$this->query('SELECT * FROM usuario WHERE id = :id');
		$this->bind(':id', $post['id']);
		$row = $this->single();

		if($row){
			$_SESSION['user_edit'] = array(
				"id"	=> $row['id'],
			);

			header('Location: '.ROOT_URL.'users/edit');
		}			

		if($post['submit']){
			//unset($_SESSION['user_edit']['id']);

			if($post['nome_completo'] == '' || $post['email'] == '' || $post['senha'] == '' || $post['cpf'] == '' || $post['login'] == ''){
				Messages::setMsg('Preencha todos os campos!', 'error');
				return;
			}

			$password = md5($senha);
			// Insert into MySQL
			$this->query('UPDATE usuario SET 
							nome_completo = :nome_completo, 
							email = :email, 
							login = :login, 
							senha = :senha, 
							cpf = :cpf
						  WHERE id = :id
						');
			$this->bind(':id', $post['id']);
			$this->bind(':nome_completo', $post['nome_completo']);
			$this->bind(':email', $post['email']);
			$this->bind(':cpf', $post['cpf']);
			$this->bind(':login', $post['login']);
			$this->bind(':senha', $password);
			$this->execute();
		
			// Verify
			header('Location: '.ROOT_URL.'users');
		
		} else {
			return;
		}
                
                //return $row;
	}
        
        public function editOnPost($id){
            //$register = $this->edit();
            $this->query('SELECT * FROM usuario WHERE id = :id');
            $this->bind(':id', $id);
            $row = $this->single();
            
            return $row;
            
        }

        public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['senha']);

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM usuario WHERE login = :login AND senha = :senha');
			$this->bind(':login', $post['login']);
		$this->bind(':senha', $password);

		$row = $this->single();

		if($row){
			$_SESSION['is_logged_in'] = true;
			$_SESSION['user_data'] = array(
				"id"	=> $row['id'],
				"nome_completo"	=> $row['nome_completo'],
				"email"	=> $row['email']
			);
			header('Location: '.ROOT_URL.'home');
		} else {
			Messages::setMsg('Incorrect Login', 'error');
		}
	}
	return;
    }
    
   


}