<?php

session_start();

$server = "localhost";
$username = "root";
$pass = "";
$db = "crud";


$mysql = new mysqli($server, $username, $pass, $db) OR die("Error:" . mysqli_error($mysql));



//save form
if(isset($_POST['save'])){
    if(!empty($_POST['name']) && !empty($_POST['cnpj']) && !empty($_POST['cnae']) && !empty($_POST['addres'])){   
        
        $cnpj = mysqli_real_escape_string($mysql, $_POST['cnpj']);
        $cnae = $_POST['cnae'];
        $addres = $_POST['addres'];
        $name = mysqli_real_escape_string($mysql, $_POST['name']);

        $nameQuery = "SELECT * FROM companies WHERE name='$name'";
        $cpfQuery = "SELECT * FROM companies WHERE cnpj='$cnpj'";

        $result_name = mysqli_query($mysql, $nameQuery);
        $result_cnpj = mysqli_query($mysql, $cnpjQuery);
        
        $count_name = mysqli_num_rows($result_name);
        $count_cnpj = mysqli_num_rows($result_cnpj);
        
        if($count_name > 0){
            $_SESSION['msg'] = "Nome ja existe!";
            $_SESSION['alert'] = "alert alert-danger";
            header("location: add.php");
        }else if($count_cnpj > 0){
            $_SESSION['msg'] = "CNPJ ja existe!";
            $_SESSION['alert'] = "alert alert-danger";
            header("location: add.php");
        }
        else{

            $iQuery = "INSERT INTO companies(name, cnpj, cnae, addres) VALUES (? , ? , ? , ?)";
            

            $statement = $mysql->prepare($iQuery);
            $statement->bind_param("siis", $name, $cnpj, $cnae, $addres);
            if($statement->execute()){
                $_SESSION['msg'] = "Empresa Cadastrada com sucesso!";
                $_SESSION['alert'] = "alert alert-success";
            }
            $statement->close();
            $mysql->close();
            header("location: list.php");
        }
    }
    else{
        $_SESSION['msg'] = "Por favor preencha todos os campos";
        $_SESSION['alert'] = "alert alert-warning";
        header("location: add.php");
    }    
}

//delete

if(isset($_POST['delete'])){
    $id = $_POST['delete'];

    $dQuery = "DELETE FROM companies WHERE id = ?";
    $statement = $mysql->prepare($dQuery);
    $statement->bind_param('i', $id);
    if($statement->execute()){
        $_SESSION['msg'] = "Deletado com sucesso!";
        $_SESSION['alert'] = "alert alert-danger";
    }
    $statement->close();
    $mysql->close();
    header("location: list.php");
}


//update
if (isset($_POST['update'])) {

	$id = $_POST['id'];
    $name = $_POST['name'];
    $cnpj = $_POST['cnpj'];
    $cnae = $_POST['cnae'];
	$addres = $_POST['addres'];

    $uQuery = "UPDATE companies SET name='$name', cnpj='$cnpj', cnae='$cnae', addres='$addres' WHERE id=$id";

    $statement = $mysql->prepare($uQuery);
    $statement->bind_param("siisi", $name, $cnpj, $cnae, $addres, $id);
    if($statement->execute()){
        $_SESSION['msg'] = "Dados alterados com sucesso!";
        $_SESSION['alert'] = "alert alert-success";
    }
    $statement->close();
    $mysql->close();
	header('location: list.php');
}

//searchbox
if(isset($_POST['searchbtn'])){
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM companies WHERE name LIKE '%keyword%'";
    $query = mysqli_query($mysql, $sql);

    if(mysqli_num_rows($query) < 0){
        $_SESSION['msg'] = "Nao existe este nome";
        $_SESSION['alert'] = "alert alert-warning";
    }else{


        while($fetch = mysqli_fetch_assoc($query)){
            $id = $fetch['id'];
            $name = $fetch['name'];
            $cnpj = $fetch['cnpj'];
            $cnae = $fetch['cnae'];
            $addres = $fetch['addres'];

            

        }
        
    }
    header("location: list.php"); 
}


?>