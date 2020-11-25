<?php

//Variáveis 
$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Senha = $_POST['Senha'];

//----------------------


//Faz a conexão ao BD
$status = mysqli_connect("localhost","root","","banco1");

//Transfere a query a variavel $Insere_dados
$Insere_dados = "insert into registro_tabela(NOME,EMAIL,SENHA)VALUES('$Nome','$Email','$Senha')";


//Na primeira etapa do código o cadastro passará na etapa de verificação


$verifica_existente = "select * from registro_tabela WHERE EMAIL = '$Email'";

//Código verifica se há email existente em sua base de dados
if(mysqli_num_rows(mysqli_query($status,$verifica_existente)) > 0 ){

    echo "<b><font color=red>"."Error email já cadastrado!"."</b></font>";
    header('refresh: 3; url = cadastro.html');   

}

 //Fim da verificação

 else{
   

//Se o email não existir na base de dados, o cadastro e realizado e redirecionado para o login    
if(mysqli_query($status,$Insere_dados)){

 echo "cadastrado com sucesso!, redirecionando para a página de login";
 header('Refresh:3; url=index.html');   
}
else{

echo "Error campos vazios ou erro no servidor!";

 }
}




?>