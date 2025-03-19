<?php 

//array que armazena os usuarios 
$usuarios = [];

function cadastrarUsuarios(&$usuarios){
    $nome = readline("Digite o nome do usuario: ");
    $email = readline("Digite o email do usuario: ");
    $idade = readline("Digite a idade do usuario: ");

    if($idade < 18){
        echo "Erro: A idade deve ser igual ou maior que 18 anos. \n ";
        return;
    }

    foreach ($usuarios as $usuario){
        if($usuario['email'] == $email){
            echo "Erro: O email ja esta cadastro. \n";
            return;
        }
    }

    $usuarios[] = [
        'nome' => $nome,
        'email' => $email,
        'idade' => $idade
    ];
    echo "Usuario cadastrado com sucesso! \n";

}

function listarUsuarios($usuarios){
    if(empty($usuarios)){
        echo "Nenhum usuario cadastrado.\n";
        return;
    }
    echo "Lista de usuarios.\n";
    foreach($usuarios as $usuario){
        echo "Nome: " . $usuario
        ['nome'] . " | Email: " . $usuario ['email'] . "| idade: " . $usuario['idade'] . "\n";
    }
}

while(true){
    echo "\n Escolha uma opção:\n";
    echo "1. Cadastrar usuario\n";
    echo "2. Listar Usuarios\n";
    echo "3. Sair\n";

    $opcao = readline("Digite um numero da opção: ");
    
    switch($opcao){
        case 1:
            cadastrarUsuarios($usuarios);
            break;
            
        case 2:
            listarUsuarios($usuarios);
            break;

        case 3:
            echo "Saindo...";
            exit;

            default:
            echo "Opção invalida.\n";
    }
}