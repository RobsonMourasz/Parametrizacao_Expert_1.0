<?php 
use HTDOCS\funcoes\Conexao;
use HTDOCS\funcoes\MoverArquivo;
header("content-type: application/json");
require_once __DIR__."/../../vendor/autoload.php";
require_once __DIR__."/../funcoes/funcoes.php";

if (!isset($_SESSION)) {
    session_start();
}

/* CADASTRO DA EMPRESA DO CONTADOR */
if(isset($_POST['tipo']) && $_POST['tipo'] == "CadEscritorio"){

    $razao = filter_input(INPUT_POST, 'razao', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf_cnpj = limpar_texto(filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nome_responsavel = filter_input(INPUT_POST, 'nome_responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = limpar_texto(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS));
    $_SESSION['cpf_cnpj'] = $cpf_cnpj;
    $_SESSION['email'] = $email;
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


/* UPLOAD DO CERTIFICADO  */
if(isset($_POST['tipo']) && $_POST['tipo'] == "CadCertificado"){
    $modelo_certificado =  filter_input(INPUT_POST, 'ModeloCertificado', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha_certificado =  filter_input(INPUT_POST, 'senha_certificado', FILTER_SANITIZE_SPECIAL_CHARS);
    $certificado = $_FILES['certificado'];
    
    $mover = new MoverArquivo();

    $mover->nomeArquivo = $_SESSION['cpf_cnpj'];
    $res = $mover->mover($certificado);
    $res1 = $mover->gravarTexto($senha_certificado);
    if ($res['status'] == "ok" && $res1['status'] == "ok") {
        echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "msg" => "Erro ao inserir certificado"]);
    }

}

/* CADASTRAR TIPO DE REGIME TRIBUTARIO */
if(isset($_POST['tipo']) && $_POST['tipo'] == "CadRegimeTributario"){
    $regime_tributario = filter_input(INPUT_POST, 'RegimeTributario', FILTER_SANITIZE_SPECIAL_CHARS);
    // $conexao = new Conexao();
    // $SqlInsert = "INSERT cadregimetributario (RegimeTributario, DataCadastro, Modificacao) VALUES (?,?,NOW())";
}
