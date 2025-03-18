<div class="card h-100">

    <div class="card-header w-100 center">
        <h1><small>Etapa 1:</small> Informações do Escritório / Contador</h1>
    </div> <!-- card-header -->

    <div class="card-body w-100 center">
        <form class="center" id="form-cadastro-escritorio">

            <div class="group-input">
                <label for="">Razão Social Escritório de Contabilidade</label>
                <input type="text" name="razao" id="cad_razao_escritorio" require>
            </div>

            <div class="group-input">
                <label for="">CPF ou CNPJ do Escritório</label>
                <input type="text" name="cpf_cnpj" id="cad_cpf_cnpj_escritorio" require>
            </div>

            <div class="group-input">
                <label for="">Email do Escritório / Contador</label>
                <input type="email" name="email" id="cad_email_escritorio" require>
            </div>

            <div class="group-input">
                <label for="">Telefone / Celular</label>
                <input type="tel" name="telefone" id="cad_telefone_escritorio" placeholder="Ex: 34 9999 - 9999">
            </div>

            <div class="group-input">
                <label for="">Nome do Responsável pelo preenchimento fiscal</label>
                <input type="text" name="nome_responsavel" id="cad_nome_responsavel_escritorio" require>
            </div>

            <div class="group-botoes">
                <button type="button" class="btn btn-danger">Voltar</button>
                <button type="submit" class="btn btn-success">Próximo</button>
            </div>

        </form>
    </div> <!-- card-body -->

</div> <!-- card -->