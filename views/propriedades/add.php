<div class="container">
  <div class="card">
    <div class="card-body">
      <h3 style="color: black;">Registrar Nova Propriedade</h3>
      <br/>
      <form enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

        <div class="form-group">
          <label for="nome_propriedade">Nome da Propriedade</label>            
          <input type="text" class="form-control" id="nome_propriedade" name="nome_propriedade">
        </div>
        <div class="form-row">
          <div class="form-group col-md-1">
            <label for="pais">País:</label><br/>            
            <input type="text" readonly 
            class="form-control-plaintext" id="pais" value="Brasil" name="pais" style="font-weight: bold;">
          </div>

          <div class="form-group col-md-2">
            <label for="exampleFormControlSelect1">Estado:</label>
            <select class="form-control" name="estado" id="estado" required>
              <option value="">Selecione...</option>  
              <?php 
              $propriedadeModel = new PropriedadeModel();
              $estados = $propriedadeModel->findStates();

              foreach ($estados as $estado) { ?>
              <option value="<?php echo $estado['cod_estado'] ?>"><?php echo $estado['sigla'] ?>
              </option>

              <?php } ?>

            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="cidade">Cidade:</label>
            <select class="form-control" name="cidade" id="cidade" disabled required>
              <option value="">Selecione um estado</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="area">Área (m<sup>2</sup>):</label>            
            <input type="text" class="form-control" id="area" name="area"/>
          </div>
        </div>
        
        
        <div class="form-group">
          <label>Foto da Propriedade:</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
          <input class="form-control" type="file" name="imagem"/>
        </div>


        <hr />
        <br/>
        <input class="btn btn-success" name="submit" type="submit" value="Confirmar" />
        <a class="btn btn-danger" style="margin-left: 1%;" href="<?php echo ROOT_URL; ?>propriedades">Cancelar</a>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    console.log("EAE");

    $('#estado').change(function() {
      $.ajax({
        type: 'POST',
        url: '<?php echo ROOT_URL ?>lista_cidades.php',
        dataType: 'html',
        data: {'estado': $('#estado').val()},
                // Antes de carregar os registros, mostra para o usuário que está
                // sendo carregado.
                beforeSend: function(xhr) {
                  $('#cidade').attr('disabled', 'disabled');
                  $('#cidade').html('<option value="">Carregando...</option>');
                  console.log("MASVISH");
                },
                // Após carregar, coloca a lista dentro do select de cidades.
                success: function(data) {
                  if ($('#estado').val() !== '') {
                      // Adiciona o retorno no campo, habilita e da foco
                      $('#cidade').html('<option value="">Selecione</option>');
                      $('#cidade').append(data);
                      $('#cidade').removeAttr('disabled').focus();


                    } else {
                      $('#cidade').html('<option value="">Selecione um estado</option>');
                      $('#cidade').attr('disabled', 'disabled');
                    }
                  }
                });
    });
  });
</script>









