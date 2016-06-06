<?php
	try
	{
		$database = new PDO('mysql:host=localhost; dbname=cadastroENGSOFT', 'root', '');
    	$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	$email = $_POST['email'];
    	$senha = $_POST['senha'];

    	$verifica = $database -> prepare("SELECT * FROM aluno WHERE email = '$email' AND senha = '$senha'");
        $verifica -> execute();
        $num_users = $verifica -> rowCount();

        if ($num_users > 0) 
        {
            echo "Login efetuado com sucesso";
        }
        else
        {
            echo "Dados incorretos!";
        }
    		

    }
    catch(PDOException $e)
    {
        echo $e -> getMessage();
        echo "cu";
    }
?>