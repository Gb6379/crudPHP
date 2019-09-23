<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list</title>

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--FontAwesome -->
    <script src="https://kit.fontawesome.com/59ee70bd89.js"></script>
    <!--css-->
    <link rel="stylesheet" href="./css/style.css" >

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
    <div class="container-fluid">
        <h2 class="jumbotron text-center mb-2">Lista de empresas <i class="fas fa-building fa-3x"></i></h2>
    </div> 

    <!-- Search form -->
<form action="config.php" method="POST">
        <input id="searchid" type="search" name="keyword" placeholder="Pesquisar">
        <input class="btn btn-primary" id="sbtn" type="submit" name="searchbtn">
</form>               
  
    <table class="table table-striped table-dark"> 
        <thead>    
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">cnpj</th>
                <th scope="col">cnae</th>
                <th scope="col">endereco</th>
                <th scope='col'>
                    <a href="add.php" class="btn btn-warning btn-lg"><i class="fas fa-plus"></i></a>
                </th>                
            </tr>
        </thead>
        <tbody>
            <form action="config.php" method="POST">
                <?php require_once("config.php");
                #display table
                $sQuery = "SELECT * FROM companies LIMIT 20";
                $result = $mysql->query($sQuery);

                #edit button

                while($row = $result->fetch_assoc()):?>

                <!--printing table-->
                <tr>
                    <td scope="col"><?= $row['name'];?></td>
                    <td scope="col"><?= $row['cnpj'];?></td>
                    <td scope="col"><?= $row['cnae'];?></td>
                    <td scope="col"><?= $row['addres'];?></td>
                    <td class="col-2">
                        <button class="btn btn-danger" type="submit" name="delete" value="<?= $row['id'];?>"><i class="fas fa-times"></i></button>
                        <a href="edit.php" name="edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>

                <?php endwhile; ?>    
            </form>  
        </tbody>

    </table>
</div>





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