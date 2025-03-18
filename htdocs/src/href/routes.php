<?php 
use HTDOCS\funcoes\Conexao;

//header("content-type: application/json");

require_once __DIR__."/../funcoes/funcoes.php";

if(isset($_POST['tipo']) && $_POST['tipo'] == "CadEscritorio"){
    echo "acessou";
    exit;
    $razao = filter_input(INPUT_POST, 'razao', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf_cnpj = limpar_texto(filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nome_responsavel = filter_input(INPUT_POST, 'nome_responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = limpar_texto(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS));
    $conexao = new Conexao();
    
    $Resposta = $conexao->ExecutarSql("SELECT * FROM cadcontador WHERE CpfCnpj = $cpf_cnpj AND NomeResponsavel LIKE '%$nome_responsavel%'");
    if($Resposta == "Não há registros"){

        $SqlInsert = "INSERT cadcontador (RazaoSocial, CpfCnpj, Email, NomeResponsavel, Telefone, DataCadastro, Modificacao) VALUES (?,?,?,?,?,NOW(),NOW())";
        $Variaveis = ['sssss',$razao,$cpf_cnpj,$email,$nome_responsavel,$telefone];

    }
    if($conexao->Cadastrar($SqlInsert, $Variaveis)){
        echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
    }else{
        json_encode(["status" => "erro", "msg" => "Erro ao inserir a empresa"]);
    }

}
