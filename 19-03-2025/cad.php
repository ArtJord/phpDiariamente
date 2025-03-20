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

function editarUsuarios(&$usuarios){
    $email = readline("Digite o email do usuario que deseja alterar: ");

    foreach ($usuarios as &$usuario){
        if($usuario['email'] === $email)
        {
            $novoNome = readline("Digite o novo nome do usuario ou aperte ENTER para não modificar: ");
            $novaIdade = readline("Digite a nova idade ou aperte ENTER para não editar: ");

            if(!empty($novoNome)){
                $usuario['nome'] = $novoNome;
            }

            if(!empty($novaIdade)){
                if($novaIdade > 18){
                    $usuario['idade'] = $novaIdade;
                }else{
                    echo "Erro: A idade deve ser maior que 18 anos. \n";
                    return;
                }
            }
            echo "Usuario atualizado com sucesso";
            return;
        }
    }
    echo "Erro: Usuario não encontrado.\n ";
}

while(true){
    echo "\n Escolha uma opção:\n";
    echo "1. Cadastrar usuario\n";
    echo "2. Listar Usuarios\n";
    echo "3. Editar Usuario\n";
    echo "4. Sair\n";

    $opcao = readline("Digite um numero da opção: ");
    
    switch($opcao){
        case 1:
            cadastrarUsuarios($usuarios);
            break;
            
        case 2:
            listarUsuarios($usuarios);
            break;

        case 3:
            editarUsuarios($usuarios);
            break;

        case 4:
            echo "Saindo...";
            exit;

            default:
            echo "Opção invalida.\n";
    }
}