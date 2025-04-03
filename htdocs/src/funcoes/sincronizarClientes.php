<?php

namespace HTDOCS\funcoes;

use LengthException;
use mysqli;

class SincronizarClientes
{
    private $host = "servidor.expertsistemas.com";
    private $user = "gleiko";
    private $pass = "Qwe1234241+-+";
    private $db = "controle_mensal";
    private $port = "3306";
    private $Select;

    public function __construct()
    {
        $this->Select = new mysqli($this->host, $this->user, $this->pass, $this->db, $this->port);

        if ($this->Select->connect_error) {
            die("Erro na conexão: " . $this->Select->connect_error);
        }
    }

    private function TrazerClientes($id = 0)
    {
        if ($id === 0) {
            $resultado = $this->Select->query("SELECT a.id_principal AS id, a.nomefantasia_apelido AS NomeEmpresa, a.cpf_cnpj AS Cpf_Cnpj 
            FROM cad_clientes_sistema a 
            WHERE a.inativo = 0
            AND a.nomefantasia_apelido <> '' AND a.nomefantasia_apelido IS NOT NULL 
            ORDER BY a.nomefantasia_apelido ASC");

            if (!$resultado) {
                return "Erro na consulta SQL: " . $this->Select->error;
            }

            return ($resultado->num_rows > 0) ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        } else {
            $resultado = $this->Select->query("SELECT a.id_principal AS id, a.nomefantasia_apelido AS NomeEmpresa, a.cpf_cnpj AS Cpf_Cnpj
            FROM cad_clientes_sistema a
            WHERE a.inativo = 0
            AND a.nomefantasia_apelido <> '' AND a.nomefantasia_apelido IS NOT NULL
            AND a.id_principal NOT IN($id)
            ORDER BY a.nomefantasia_apelido ASC");

            if (!$resultado) {
                return "Erro na consulta SQL: " . $this->Select->error;
            }

            return ($resultado->num_rows > 0) ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
        }
    }

    private function SelecionarIds()
    {
        $ids = [];
        $Empresas = $this->TrazerClientes(0);

        if (!is_array($Empresas)) {
            return []; // Retorna array vazio em caso de erro
        }

        foreach ($Empresas as $Empresa) {
            $ids[] = $Empresa['id'];
        }

        if (empty($ids)) {
            return [];
        }

        $idsString = implode(",", $ids);

        $conexao = new Conexao();
        $res = $conexao->ExecutarSql("SELECT id FROM cadempresa WHERE id NOT IN ($idsString)");

        return $res;
    }

    public function Sincronizar()
    {
        $ids =  [];
        $ids = $this->SelecionarIds();

        if (!is_array($ids)) {
            if ($ids === "Não há registros") {
                $NovosClientes = $this->TrazerClientes(0);
                $conexao = new Conexao();
                foreach ($NovosClientes as $Cliente) {
                    if (!empty($Cliente['id']) && !empty($Cliente['NomeEmpresa']) && !empty($Cliente['Cpf_Cnpj'])) {
                        $conexao->Cadastrar("INSERT INTO cadempresa (id, NomeEmpresa, Cpf_Cnpj) VALUES (?,?,?)", [$Cliente['id'], $Cliente['NomeEmpresa'], $Cliente['Cpf_Cnpj']]);
                    }
                }
                return;
            }

        }

        $idsString = implode(",", array_column($ids, 'id')); // Garante formato adequado para SQL
        $NovosClientes = $this->TrazerClientes($idsString);
        $conexao = new Conexao();

        foreach ($NovosClientes as $Cliente) {
            if (!empty($Cliente['id']) && !empty($Cliente['NomeEmpresa']) && !empty($Cliente['Cpf_Cnpj'])) {
                $conexao->Cadastrar("INSERT INTO cadempresa (id, NomeEmpresa, Cpf_Cnpj) VALUES (?,?,?)", [$Cliente['id'], $Cliente['NomeEmpresa'], $Cliente['Cpf_Cnpj']]);
            }
        }
        return;
    }
}
