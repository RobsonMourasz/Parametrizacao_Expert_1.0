<?php

use HTDOCS\funcoes\Conexao;
use HTDOCS\funcoes\MoverArquivo;

header("content-type: application/json");
require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../funcoes/funcoes.php";

if (!isset($_SESSION)) {
    session_start();
}

/* CADASTRO DA EMPRESA DO CONTADOR */
if (isset($_POST['tipo']) && $_POST['tipo'] == "CadEscritorio") {
    $razao = filter_input(INPUT_POST, 'razao', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf_cnpj = limpar_texto(filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nome_responsavel = filter_input(INPUT_POST, 'nome_responsavel', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = limpar_texto(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS));
    $idParametrizacao = $_SESSION['idParametrizacao'];
    $conexao = new Conexao();

    $JaCadastrado = $conexao->ExecutarSql("SELECT * FROM cadcontador WHERE CpfCnpj = '$cpf_cnpj'");

    if ($JaCadastrado == "Não há registros") {

        $SqlInsert = "INSERT cadcontador VALUES (?,?,?,?,?,?,NOW(),NOW())";
        $Variaveis = [NULL,$razao, $cpf_cnpj, $email, $nome_responsavel, $telefone];
        if ($conexao->Cadastrar($SqlInsert, $Variaveis)) {
            $novoID = $conexao->GetUltimoId("cadcontador");
        }
    }

    try {

        if (isset($novoID)) {
            $sqlUpdate = "UPDATE mv_parametrizacao SET IdContador = ? WHERE id = ?";
            $Variaveis = [$novoID, $idParametrizacao];
            if ($conexao->UpdateSQL($sqlUpdate, $Variaveis)) {
                echo json_encode(["status" => "ok", "msg" => "Atualizado com sucesso!"]);
            } else {
                echo json_encode(["status" => "erro", "msg" => "Erro na atualização!"]);
            }
        } else {
            $tempID = $JaCadastrado[0]['IdContador'];
            $sqlUpdate = "UPDATE mv_parametrizacao SET IdContador = ? WHERE id = ?";
            $Variaveis = [$tempID, $idParametrizacao];
            try {
                if ($conexao->UpdateSQL($sqlUpdate, $Variaveis)) {
                    echo json_encode(["status" => "ok", "msg" => "Atualizado com sucesso!"]);
                } else {
                    echo json_encode(["status" => "erro", "msg" => "Erro na atualização!"]);
                }
            } catch (\Throwable $th) {
                echo json_encode(["status" => "erro", "msg" => "Erro na atualização!" . $th->getMessage()]);
            }
        }
    } catch (\Throwable $th) {
        json_encode(["status" => "erro", "msg" => "Erro ao inserir a empresa " . $th->getMessage()]);
    }
}


/* UPLOAD DO CERTIFICADO  */
if (isset($_POST['tipo']) && $_POST['tipo'] == "CadCertificado") {
    $modelo_certificado =  filter_input(INPUT_POST, 'ModeloCertificado', FILTER_SANITIZE_SPECIAL_CHARS);

    $conexao = new Conexao();
    if ($modelo_certificado == "A1") {
        $senha_certificado =  filter_input(INPUT_POST, 'senha_certificado', FILTER_SANITIZE_SPECIAL_CHARS);
        $certificado = $_FILES['certificado'];
        $mover = new MoverArquivo();
        $mover->nomeArquivo = $_SESSION['cpf_cnpj'];
        $res = $mover->mover($certificado);
        $res1 = $mover->gravarTexto($senha_certificado);
        $sqlInsert = "UPDATE mv_parametrizacao SET ModeloCertificado = ?, SenhaCertificado = ? WHERE id = ?";
        $Variaveis = [$modelo_certificado, $senha_certificado, $_SESSION['idParametrizacao']];
    } else {
        $sqlInsert = "UPDATE mv_parametrizacao SET ModeloCertificado = ? WHERE id = ?";
        $Variaveis = [$modelo_certificado, $_SESSION['idParametrizacao']];
    }

    try {
        if ($conexao->UpdateSQL($sqlInsert, $Variaveis)) {
            echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
        } else {
            echo json_encode(["status" => "erro", "msg" => "Erro ao inserir certificado!"]);
        }
    } catch (\Throwable $th) {
        echo json_encode(["status" => "erro", "msg" => "Erro ao atualizar certificado: " . $th->getMessage()]);
    }
}

/* CADASTRAR TIPO DE REGIME TRIBUTARIO */
if (isset($_POST['tipo']) && $_POST['tipo'] == "CadRegimeTributario") {
    $regime_tributario = filter_input(INPUT_POST, 'RegimeTributario', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($regime_tributario == "cad_regime_mei") {
        $regime_tributario = "MEI";
    } else if ($regime_tributario == "cad_regime_simples") {
        $regime_tributario = "Simples Nacional";
    } else if ($regime_tributario == "cad_regime_real") {
        $regime_tributario = "Lucro Real";
    } else if ($regime_tributario == "cad_regime_presumido") {
        $regime_tributario = "Lucro Presumido";
    } else if ($regime_tributario == "cad_regime_outro") {
        $regime_tributario = "Outro";
    }
    $conexao = new Conexao();
    $sqlInsert = "UPDATE mv_parametrizacao SET RegimeTributario = ? WHERE id = ?";
    $Variaveis = [$regime_tributario, $_SESSION['idParametrizacao']];
    try {
        if ($conexao->UpdateSQL($sqlInsert, $Variaveis)) {
            echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
        } else {
            echo json_encode(["status" => "erro", "msg" => "Erro ao inserir regime tributario!"]);
        }
    }catch (\Throwable $th) {
        echo json_encode(["status" => "erro", "msg" => "Erro ao atualizar regime tributario: " . $th->getMessage()]);
    }
}

/*CADASTRAR QUAIS TIPOS DE EMISSAO FISCAL*/
if (isset($_POST['tipo']) && $_POST['tipo'] == "CadTipoFiscal") {
    $IraEmitir_NFCE = filter_input(INPUT_POST, 'nfce', FILTER_SANITIZE_SPECIAL_CHARS);
    $IraEmitir_NFE = filter_input(INPUT_POST, 'nfe', FILTER_SANITIZE_SPECIAL_CHARS);
    $IraEmitir_SAT = filter_input(INPUT_POST, 'sat', FILTER_SANITIZE_SPECIAL_CHARS);
    $JaEmitiu_NFCe = filter_input(INPUT_POST, 'nfce-emitida', FILTER_SANITIZE_SPECIAL_CHARS);
    $JaEmitiu_NFe = filter_input(INPUT_POST, 'nfe-emitida', FILTER_SANITIZE_SPECIAL_CHARS);
    $JaEmitiu_SAT = filter_input(INPUT_POST, 'sat-emitida', FILTER_SANITIZE_SPECIAL_CHARS);
    $Ultima_NFCe = filter_input(INPUT_POST, 'ultima_nfce', FILTER_SANITIZE_SPECIAL_CHARS);
    $Ultima_NFe = filter_input(INPUT_POST, 'ultima_nfe', FILTER_SANITIZE_SPECIAL_CHARS);

    $conexao = new Conexao();
    $sqlInsert = "UPDATE mv_parametrizacao SET IraEmitirNFCe = ?, IraEmitirNFe = ?, IraEmitirSat = ?, JaEmitiuNFCe = ?, JaEmitiuNFe = ?, JaEmitiuSat = ?, UltimaNFCe = ?, UltimaNFe = ? WHERE id = ?";
    $Variaveis = [$IraEmitir_NFCE, $IraEmitir_NFE, $IraEmitir_SAT, $JaEmitiu_NFCe, $JaEmitiu_NFe, $JaEmitiu_SAT, $Ultima_NFCe != "" ? $Ultima_NFCe : 0, $Ultima_NFe != "" ? $Ultima_NFe : 0, $_SESSION['idParametrizacao']];

    try {
        $conexao->UpdateSQL($sqlInsert, $Variaveis);
        echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
    } catch (\Throwable $th) {
        echo json_encode(["status" => "erro", "msg" => "Ero ao alterar parametrizacao: " . $th->getMessage()]);
    }
}

/* CADASTRAR A PORCENTAGEM DE IMPOSTO DAS MERCADORIAS */
if (isset($_POST['tipo']) && $_POST['tipo'] == "CadTributacao") {
    $trinutados = filter_input(INPUT_POST, 'tributados', FILTER_SANITIZE_SPECIAL_CHARS);
    $st = filter_input(INPUT_POST, 'st', FILTER_SANITIZE_SPECIAL_CHARS);
    $isento = filter_input(INPUT_POST, 'isento', FILTER_SANITIZE_SPECIAL_CHARS);
    $outros = filter_input(INPUT_POST, 'outros', FILTER_SANITIZE_SPECIAL_CHARS);
    $conexao = new Conexao();
    $sqlInsert = "UPDATE mv_parametrizacao SET Tributados = ?, ST = ?, Isento = ?, Outros = ? WHERE id = ?";
    $Variaveis = [$trinutados.'%', $st.'%', $isento.'%', $outros.'%', $_SESSION['idParametrizacao']];
    try {
        if ($conexao->UpdateSQL($sqlInsert, $Variaveis)) {
            echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
        } else {
            echo json_encode(["status" => "erro", "msg" => "Erro ao inserir regime tributario!"]);
        }
    } catch (\Throwable $th) {
        echo json_encode(["status" => "erro", "msg" => "Erro ao atualizar regime tributario: " . $th->getMessage()]);
    }
}

if(isset($_POST['confirmar']) && !empty($_POST['confirmar']) && $_POST['confirmar'] == "SIM"){
    $conexao = new Conexao();
    try {
        $conexao->UpdateSQL("UPDATE mv_parametrizacao SET ModoPreenchimento = 'PREENCHIDO', DataAlteracao = ? WHERE id = ?", [date('Y-m-d H:i:s'), $_SESSION['idParametrizacao']]);
        echo json_encode(["status" => "ok", "msg" => "Cadastrado com sucesso!"]);
    } catch (\Throwable $th) {
        echo json_encode(["status" => "erro", "msg" => "Erro ao atualizar parametrizacao: " . $th->getMessage()]);
    }
}

if (isset($_GET['idZerarParametrizacao']) && !empty($_GET['idZerarParametrizacao'])) {
    $id = intval(limpar_texto($_GET['idZerarParametrizacao']));
    $conexao = new Conexao();
    $res = $conexao->UpdateSQL(
        "UPDATE mv_parametrizacao SET IdContador = 0, ModeloCertificado = NULL, SenhaCertificado = NULL, RegimeTributario = NULL, IraEmitirNFCe = NULL, IraEmitirNFe = NULL, IraEmitirSat = NULL, JaEmitiuNFCe = NULL, JaEmitiuNFe = NULL, JaEmitiuSat = NULL, UltimaNFCe = NULL, UltimaNFe = NULL, Tributados = NULL, ST = NULL, Isento = NULL, Outros = NULL, ModoPreenchimento = 'CRIADO' WHERE id = ?",
        [$id]
    );

    echo json_encode(["status" => "ok", "msg" => $res]);
}

if (isset($_GET['idVisualizarParametrizacao']) && !empty($_GET['idVisualizarParametrizacao'])) {
    if($_GET['idVisualizarParametrizacao'] == "todos"){
        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT 
        b.NomeEmpresa,	b.Cpf_Cnpj AS Cpf_Cnpj_empresa, 
        c.RazaoSocial, c.CpfCnpj, c.Email, c.Telefone, c.NomeResponsavel,
        d.nome AS usuario,
        a.ModeloCertificado,a.SenhaCertificado,a.RegimeTributario,a.IraEmitirNFCe, a.IraEmitirNFe, a.IraEmitirSat, a.JaEmitiuNFCe, a.JaEmitiuNFCe, a.JaEmitiuSat, a.UltimaNFCe, a.UltimaNFe, a.ModoPreenchimento, a.Tributados, a.ST, a.Isento, a.Outros, a.id
        FROM mv_parametrizacao a
        LEFT JOIN cadempresa b ON a.IdEmpresa = b.id
        LEFT JOIN cadcontador c ON a.IdContador = c.IdContador
        LEFT JOIN usuarios d ON a.IdUsuario = d.id
        ORDER BY a.id DESC");
        echo json_encode(["status" => "ok", "msg" => $res]);
    }else{
        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT 
        b.NomeEmpresa,	b.Cpf_Cnpj AS Cpf_Cnpj_empresa, 
        c.RazaoSocial, c.CpfCnpj, c.Email, c.Telefone, c.NomeResponsavel,
        d.nome AS usuario,
        a.ModeloCertificado,a.SenhaCertificado,a.RegimeTributario,a.IraEmitirNFCe, a.IraEmitirNFe, a.IraEmitirSat, a.JaEmitiuNFCe, a.JaEmitiuNFCe, a.JaEmitiuSat, a.UltimaNFCe, a.UltimaNFe, a.ModoPreenchimento, a.Tributados, a.ST, a.Isento, a.Outros, a.id
        FROM mv_parametrizacao a
        LEFT JOIN cadempresa b ON a.IdEmpresa = b.id
        LEFT JOIN cadcontador c ON a.IdContador = c.IdContador
        LEFT JOIN usuarios d ON a.IdUsuario = d.id
        WHERE a.id = " . $_GET['idVisualizarParametrizacao']);
        echo json_encode(["status" => "ok", "msg" => $res]);
    }

}


if (isset($_GET['Empresas']) && !empty($_GET['Empresas'])) {
    if ($_GET['Empresas'] === "todos") {
        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT * FROM cadempresa");
        echo json_encode(["status" => "ok", "msg" => $res]);
    } else {
        $id = intval(limpar_texto($_GET['Empresas']));
        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT * FROM cadempresa WHERE id = $id");
        $_SESSION['cpf_cnpj'] = $res[0]['Cpf_Cnpj'];
        echo json_encode(["status" => "ok", "msg" => $res]);
    }
}


if (isset($_GET['idGerarLinkParametrizacao']) && !empty($_GET['idGerarLinkParametrizacao'])) {
    $id = intval(limpar_texto($_GET['idGerarLinkParametrizacao']));
    try {
        $conexao = new Conexao();
        $res = $conexao->Cadastrar("INSERT INTO mv_parametrizacao VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),?)",[NULL, 0, $id, $_SESSION['idUsuario'], NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,  NULL, NULL,NULL, NULL, NULL, NULL, "CRIADO"]);

        $temp = $conexao->GetUltimoId("mv_parametrizacao");
        $id = intval($temp);
        echo json_encode(["status" => "ok", "msg" => $id]);
    } catch (\Throwable $th) {
        echo json_encode(["status" => "erro", "msg" => $th->getMessage()]);
    }
}

if (isset($_GET['PreencherEmpresa']) && !empty($_GET['PreencherEmpresa'])) {
    $id = intval(limpar_texto($_GET['PreencherEmpresa']));
    try {
        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT * FROM mv_parametrizacao WHERE id = $id AND ModoPreenchimento = 'CRIADO' ORDER BY id DESC  LIMIT 1");
        if($res == "Não há registros"){
            $_SESSION['idParametrizacao'] = 0;
            echo json_encode(["status" => "erro", "msg" => "Nenhum registro encontrado!"]);
        }else{
            $_SESSION['idParametrizacao'] = $res[0]['id'];
            echo json_encode(["status" => "ok", "msg" => $res[0]['IdEmpresa']]);
        }
    } catch (\Throwable $th) {
        $_SESSION['idParametrizacao'] = 0;
        echo json_encode(["status" => "erro", "msg" => $th->getMessage()]);
    }

}

if (isset ($_GET['VerificarTributacao']) && empty($_GET['VerificarTributacao'])) {
    $ID = intval(limpar_texto($_SESSION['idParametrizacao']));
    try {
        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT Tributados , ST, Isento, Outros FROM mv_parametrizacao WHERE id = $ID ");
        echo json_encode(["status" => "ok", "msg" => $res]);
    } catch (\Throwable $th) {
        echo json_encode(["status" => "erro", "msg" => $th->getMessage()]);
    }

}
