<?php

namespace HTDOCS\funcoes;

use mysqli;

class Conexao
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "Qwe1234241+-+";
    private $db = "parametrizacao";
    private $port = "3310";
    private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new mysqli($this->host, $this->user, $this->pass, $this->db, $this->port);
            if ($this->conexao->connect_error) {
                die("Erro de conexão: " . $this->conexao->connect_error);
            }
        } catch (\Throwable $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function ExecutarSql($sql){
        $result = $this->conexao->query($sql);

        if ($result){

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }else{
                return "Não há registros";
            }

        } else {
            return "ERRO";
        }
    }

}
