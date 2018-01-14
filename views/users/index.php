<div class="row" style="margin-top: 3%; margin-left: 5%; margin-right: 5%;">
    <div class="card">
      <div class="card-header">
        Usuários Cadastrados
        <a class="btn-floating btn-large green" title="Adicionar novo usuário" href="<?php echo ROOT_URL; ?>users/register">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" width="25%">Nome Completo</th>
                <th scope="col" >CPF</th>
                <th scope="col">Login</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($viewmodel as $item) : ?>
                <tr>
                    <td><?php echo $item['nome_completo']; ?></td>
                    <td><?php echo $item['cpf']; ?></td>
                    <td><?php echo $item['login']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['data_ativacao']; ?></td>
                    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <td >
                            <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>" />
                            <input class="icon" type="submit" name="delete" value="delete" title="Remover" />
                        </td>
                    </form>
                    <form method="post" action="<?php echo ROOT_URL; ?>users/edit">
                        <td>
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                            <input type="hidden" name="nome_completo" value="<?php echo $item['nome_completo']; ?>" />
                            <input type="hidden" name="cpf" value="<?php echo $item['cpf']; ?>" />
                            <input type="hidden" name="login" value="<?php echo $item['login']; ?>" />
                            <input type="hidden" name="email" value="<?php echo $item['email']; ?>" />
                            <input class="icon" type="submit" name="alterar" value="create" title="Editar" />
                        </td>
                    </form>

                </tr>
            <?php endforeach; ?>
        </tbody>

        <div class="fixed-action-btn">


        </div>
    </table>
</div>

</div>
