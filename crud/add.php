<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--FontAwesome -->
    <script src="https://kit.fontawesome.com/59ee70bd89.js"></script>
  
    <title>add</title>
  </head>
  <body>
      <?php 
        include('navigation/nav.php');
      ?>
<!-- verifcation -->
<?php require_once("config.php"); ?>
                  <div class="container">
                    <?php if(isset($_SESSION['msg'])): ?>
                    <div class="<?=$_SESSION['alert']; ?>">
                      <?= $_SESSION['msg']; 
                      unset($_SESSION['msg']);?>
                    </div>
                    <?php endif; ?>
                  </div>

    <div class="container">
      <div class="card card-body  shadow bg-white">
      <h3>Cadastro Empresa</h3>
          <form action="config.php" method="POST" >
                  <div class="form-group">                 
                      <label for="title" class="col-md-4 control-label">Nome</label>
                      <input type="text" name="name"  class="form-control"  id="name" placeholder="Nome da empresa">
                  </div>
                  <div class="form-group ">
                      <label for="title">CNPJ</label>
                      <input type="text" name="cnpj" pattern="[0-9]+$" maxlength="14"  class="form-control"  id="cnpj" placeholder="cnpj" >
                  </div>
                  <div class="form-group">
                      <label for="title">CNAE</label>
                      <input type="text" name="cnae" pattern="[0-9]+$" maxlength="7"  class="form-control" id="cnae" placeholder="cnae">
                  </div>
                  <div class="form-group">
                      <label for="title">Endereço</label>
                      <input type="text" name="addres" class="form-control" id="addres"  placeholder="endereco">
                  </div>
                  <button type="submit" name="save" class="btn btn-dark">Salvar</button>

                 
          </form>
                  
      </div>
    </div>


    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
  <!-- js for alert vanish after 3s -->
  <script type="text/javascript"> 
    $(document).ready(function(){
      setTimeout(() => {
        $(".alert").remove();
      }, 3000);
    })
    </script>
  
  </body>
</html>