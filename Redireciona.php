<?php

//Variáveis
$Email = $_POST['Email'];
$Senha = $_POST['Senha'];
//-------------------------


//Conexão com o banco de dados
$status = mysqli_connect("localhost","root","","banco1");


//Adiciona o código de visualização sql para verificar se há registro dos campos especifidados
$visualiza = "select * from registro_tabela where EMAIL = '$Email' and SENHA = '$Senha'";

//Verifica se há conta existente, se houver registro o usuario e redirecionado para o painel após 2 segundos
if(mysqli_num_rows(mysqli_query($status,$visualiza)) > 0 ){

header('refresh: 2; url= painel_usuario.html');
}else{

//Se houver erro mantem o site login
header('location:index.html');
}












?>