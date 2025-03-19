<?php
// Array para armazenar os usuários
$usuarios = [];

// Função para cadastrar um usuário
function cadastrarUsuario(&$usuarios) {
    $nome = readline("Digite o nome do usuário: ");
    $email = readline("Digite o email do usuário: ");
    $idade = readline("Digite a idade do usuário: ");

    // Validar a idade
    if ($idade <= 18) {
        echo "Erro: A idade deve ser maior que 18 anos.\n";
        return;
    }

    // Verificar se o email já está cadastrado
    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email) {
            echo "Erro: O email já está cadastrado.\n";
            return;
        }
    }

    // Cadastrar o usuário
    $usuarios[] = [
        'nome' => $nome,
        'email' => $email,
        'idade' => $idade
    ];
    echo "Usuário cadastrado com sucesso!\n";
}

// Função para listar todos os usuários cadastrados
function listarUsuarios($usuarios) {
    if (empty($usuarios)) {
        echo "Nenhum usuário cadastrado.\n";
        return;
    }

    echo "Lista de Usuários:\n";
    foreach ($usuarios as $usuario) {
        echo "Nome: " . $usuario['nome'] . " | Email: " . $usuario['email'] . " | Idade: " . $usuario['idade'] . "\n";
    }
}

// Função para editar um usuário (alterar nome ou idade)
function editarUsuario(&$usuarios) {
    $email = readline("Digite o email do usuário que deseja editar: ");
    
    foreach ($usuarios as &$usuario) {
        if ($usuario['email'] === $email) {
            $novoNome = readline("Digite o novo nome (deixe vazio para não alterar): ");
            $novaIdade = readline("Digite a nova idade (deixe vazio para não alterar): ");
            
            if (!empty($novoNome)) {
                $usuario['nome'] = $novoNome;
            }
            
            if (!empty($novaIdade)) {
                if ($novaIdade > 18) {
                    $usuario['idade'] = $novaIdade;
                } else {
                    echo "Erro: A idade deve ser maior que 18 anos.\n";
                    return;
                }
            }
            echo "Usuário atualizado com sucesso!\n";
            return;
        }
    }

    echo "Erro: Usuário não encontrado.\n";
}

// Função para excluir um usuário
function excluirUsuario(&$usuarios) {
    $email = readline("Digite o email do usuário que deseja excluir: ");
    
    foreach ($usuarios as $key => $usuario) {
        if ($usuario['email'] === $email) {
            unset($usuarios[$key]);
            echo "Usuário excluído com sucesso!\n";
            return;
        }
    }

    echo "Erro: Usuário não encontrado.\n";
}

// Menu de opções
while (true) {
    echo "\nEscolha uma opção:\n";
    echo "1. Cadastrar Usuário\n";
    echo "2. Listar Usuários\n";
    echo "3. Editar Usuário\n";
    echo "4. Excluir Usuário\n";
    echo "5. Sair\n";

    $opcao = readline("Digite o número da opção: ");
    
    switch ($opcao) {
        case 1:
            cadastrarUsuario($usuarios);
            break;
        case 2:
            listarUsuarios($usuarios);
            break;
        case 3:
            editarUsuario($usuarios);
            break;
        case 4:
            excluirUsuario($usuarios);
            break;
        case 5:
            echo "Saindo do sistema...\n";
            exit;
        default:
            echo "Opção inválida. Tente novamente.\n";
    }
}
?>
