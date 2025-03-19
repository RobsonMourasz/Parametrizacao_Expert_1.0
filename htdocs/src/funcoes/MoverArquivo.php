<?php
namespace HTDOCS\funcoes;

class MoverArquivo {

    private $diretorioUpload;
    public $nomeArquivo;
    public function __construct() {
        // Define o diretório de upload
        $this->diretorioUpload = __DIR__ . '/../../app/upload/';
        
        // Cria o diretório se ele não existir
        if (!is_dir($this->diretorioUpload)) {
            mkdir($this->diretorioUpload, 0777, true);
        }
    }

    public function mover($arquivo) {
        // Verifica se o arquivo foi enviado corretamente
        if (!isset($arquivo['tmp_name']) || !is_uploaded_file($arquivo['tmp_name'])) {
            return ["status" => "ERRO", "msg" => "Arquivo inválido ou não enviado."];
        }

        // Obtém informações do arquivo
        $nomeOriginal = $arquivo['name'];
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $nomeTemporario = $arquivo['tmp_name'];

        // Define o novo nome do arquivo (pode ser personalizado)
        $novoNome = $this->nomeArquivo . '.' . $extensao;

        // Caminho completo para salvar o arquivo
        $caminhoSalvar = $this->diretorioUpload . $novoNome;

        // Move o arquivo para o diretório de upload
        if (move_uploaded_file($nomeTemporario, $caminhoSalvar)) {
            return ["status" => "ok", "path" => $caminhoSalvar];
        } else {
            return ["status" => "ERRO", "msg" => "Erro ao mover o arquivo. {$caminhoSalvar}"];
        }
    }

    public function gravarTexto($conteudo) {
        // Define o caminho completo do arquivo de texto
        $caminhoArquivo = $this->diretorioUpload . $this->nomeArquivo.".txt";

        // Tenta gravar o conteúdo no arquivo
        if (file_put_contents($caminhoArquivo, $conteudo) !== false) {
            return ["status" => "ok", "path" => $caminhoArquivo];
        } else {
            return ["status" => "ERRO", "msg" => "Erro ao gravar o arquivo de texto."];
        }
    }
}
