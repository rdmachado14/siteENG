<?php
try
  {
    // conexão com o banco
    $database = new PDO('mysql:host=localhost; dbname=cadastroENGSOFT', 'root', '');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // atributos da tabela
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $repetir_senha = $_POST['repetir_senha'];

    // verificando se os campos estão vazios
    if ($nome == "" || $nome == NULL || $email == "" || $email == NULL || $senha == "" || $senha == NULL
      || $repetir_senha == "" || $repetir_senha == NULL || $senha != $repetir_senha) 
    {
      echo "<script language='javascript' type='text/javascript'>
              alert('Dados incorretos');
              window.location.href='cadastroUsuario.html';

            </script>";

    }

    // cadastrando na tabela
    else
    {
      $insert = $database->prepare("INSERT INTO professor(nome, email, senha, repetirSenha) 
      VALUES('$nome', '$email', '$senha', '$repetir_senha')");
      $insert->execute([$nome, $email, $senha, $repetir_senha]);

      if ($insert) 
      {
        echo "Usuário cadastrado com sucesso!";
      }

    }
  }
  catch (PDOException $e)
  {
    echo $e->getMessage();
  }

?>