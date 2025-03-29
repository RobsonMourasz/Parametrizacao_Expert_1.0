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

/*CADASTRAR QUAIS TIPOS DE EMISSAO FISCAL*/
if(isset($_POST['tipo']) && $_POST['tipo'] == "CadTipoEmissao"){
    $IraEmitir_NFCE = filter_input(INPUT_POST, 'nfce', FILTER_SANITIZE_SPECIAL_CHARS);
    $IraEmitir_NFE = filter_input(INPUT_POST, 'nfe', FILTER_SANITIZE_SPECIAL_CHARS);
    $IraEmitir_SAT = filter_input(INPUT_POST, 'sat', FILTER_SANITIZE_SPECIAL_CHARS);
    $JaEmitiu_NFCe = filter_input(INPUT_POST, 'nfce-emitida', FILTER_SANITIZE_SPECIAL_CHARS);
    $JaEmitiu_NFe = filter_input(INPUT_POST, 'nfe-emitida', FILTER_SANITIZE_SPECIAL_CHARS);
    $JaEmitiu_SAT = filter_input(INPUT_POST, 'sat-emitida', FILTER_SANITIZE_SPECIAL_CHARS);
    $Ultima_NFCe = filter_input(INPUT_POST, 'ultima_nfce', FILTER_SANITIZE_SPECIAL_CHARS);
    $Ultima_NFe = filter_input(INPUT_POST, 'ultima_nfe', FILTER_SANITIZE_SPECIAL_CHARS);
    // $conexao = new Conexao();
    // $SqlInsert = "INSERT cadtipoemissao (Nfce, Nfe, Sat, DataCadastro, Modificacao) VALUES (?,?,?,NOW(),NOW())";
    // $Variaveis = ['sss',$nfce,$nfe,$sat];
    // if($conexao->Cadastrar($SqlInsert, $Variaveis)){
    //     echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
    // }else{
    //     json_encode(["status" => "erro", "msg" => "Erro"]);
    // }
}

if (isset($_GET['idVisualizarParametrizacao']) && !empty($_GET['idVisualizarParametrizacao'])){
    if ($_GET['idVisualizarParametrizacao'] === "todos"){

        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT 
        b.NomeEmpresa,	b.Cpf_Cnpj AS Cpf_Cnpj_empresa, 
        c.RazaoSocial, c.CpfCnpj, c.Email, c.Telefone, c.NomeResponsavel,
        d.nome AS usuario,
        a.ModeloCertificado, a.SenhaCertificado, a.RegimeTributario, a.IraEmitirNFCe, a.IraEmitirNFe, a.IraEmitirSat, a.JaEmitiuNFCe, a.JaEmitiuNFe, a.JaEmitiuSat, a.UltimaNFCe, a.UltimaNFe, a.id, a.ModoPreenchimento
        FROM mv_parametrizacao a
        LEFT JOIN cadempresa b ON a.IdEmpresa = b.id
        LEFT JOIN cadcontador c ON a.IdContador = c.IdContador
        LEFT JOIN usuarios d ON a.IdUsuario = d.id");

        echo json_encode(["status" => "ok", "msg" => $res]);

    }else{

        $id = intval(limpar_texto($_GET['idVisualizarParametrizacao']));
        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT 
        b.NomeEmpresa,	b.Cpf_Cnpj AS Cpf_Cnpj_empresa, 
        c.RazaoSocial, c.CpfCnpj, c.Email, c.Telefone, c.NomeResponsavel,
        d.nome AS usuario,
        a.ModeloCertificado, a.SenhaCertificado, a.RegimeTributario, a.IraEmitirNFCe, a.IraEmitirNFe, a.IraEmitirSat, a.JaEmitiuNFCe, a.JaEmitiuNFe, a.JaEmitiuSat, a.UltimaNFCe, a.UltimaNFe
        FROM mv_parametrizacao a
        LEFT JOIN cadempresa b ON a.IdEmpresa = b.id
        LEFT JOIN cadcontador c ON a.IdContador = c.IdContador
        LEFT JOIN usuarios d ON a.IdUsuario = d.id
        WHERE a.id = $id");
    
        echo json_encode(["status" => "ok", "msg" => $res]);

    }

}

if (isset($_GET['idZerarParametrizacao']) && !empty($_GET['idZerarParametrizacao'])) {
    $id = intval(limpar_texto($_GET['idZerarParametrizacao']));
    $conexao = new Conexao();
    $res = $conexao->UpdateSQL(
        "UPDATE mv_parametrizacao SET ModeloCertificado = NULL, SenhaCertificado = NULL, RegimeTributario = NULL, IraEmitirNFCe = NULL, IraEmitirNFe = NULL, IraEmitirSat = NULL, JaEmitiuNFCe = NULL, JaEmitiuNFe = NULL, JaEmitiuSat = NULL, UltimaNFCe = NULL, UltimaNFe = NULL, ModoPreenchimento = 'CRIADO' WHERE id = ?",
        [$id] 
    );

    echo json_encode(["status" => "ok", "msg" => $res]);
}


if (isset($_GET['Empresas']) && !empty($_GET['Empresas'])){
    $conexao = new Conexao();
    $res = $conexao->ExecutarSql("SELECT * FROM cadempresa");
    echo json_encode(["status" => "ok", "msg" => $res]);
}


if (isset($_GET['idGerarLinkParametrizacao']) && !empty($_GET['idGerarLinkParametrizacao'])) {
    $id = intval(limpar_texto($_GET['idGerarLinkParametrizacao']));
    $conexao = new Conexao();
    $res = $conexao->Cadastrar("INSERT INTO mv_parametrizacao VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())", ['ssssssssssssss', [$id] ]
    );

    echo json_encode(["status" => "ok", "msg" => $res]);
}
