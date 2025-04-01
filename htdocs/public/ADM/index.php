<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/assets/css/style.css">
    <link rel="stylesheet" href="../../app/assets/css/adm.css">
    <title>ADM - Expert</title>
</head>

<body style="background-color: #f4f4f4;">
    <div class="alert"><small></small>
    </div> <!-- alert -->
    <div class="container">
        <div class="container-page">
            <div class="header">

                <div class="titulo">
                    <h1>Lista de Parametrização</h1>
                </div> <!--titulo -->


                <div class="pesquisa">
                    <form action="" method="post">
                        <div class="row center">
                            <div class="col align-left">
                                <div class="group-input w-100">
                                    <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar">
                                </div>
                            </div>
                            <div class="col align-left">
                                <div class="group-botoes w-30 align-left">
                                    <input type="submit" name="pesquisar" id="pesquisar" class="btn btn-primary" value="pesquisar">

                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="row">
                        <div class="col">
                            <div class="group-botoes justify-content-left">
                                <button class="btn btn-success" id="adicionar-parametrizacao">Adicionar</button>
                            </div>
                        </div>

                    </div>
                </div><!--pesquisa-->


            </div> <!-- header -->
        </div> <!--container-page-->



        <div class="container-page">
            <div class="empresas">
                <div class="table">

                    <div class="table-header">
                        <div class="table-row">
                            <div class="table-cell">Nome Empresa</div>
                            <div class="table-cell">CNPJ</div>
                            <div class="table-cell">Status</div>
                            <div class="table-cell">Ação</div>
                        </div> <!-- table-row -->
                    </div> <!-- table-header -->

                    <div class="table-body" id="table-body-empresas">

                    </div> <!-- table-body -->

                </div> <!-- table -->
            </div> <!-- empresas -->
        </div> <!-- container-page -->
    </div> <!-- container -->



    <!-- TELA MODAL -->

    <div class="modal d-none" id="modal-visualizar-empresa">

        <div class="modal-content">

            <div class="modal-header">
                <h2>Visualizar Empresa</h2>
                <span class="close" onclick="FecharModal('modal-visualizar-empresa')">&times;</span>
            </div>
            <div class="modal-body">
                <form action="" id="form-empresa" class="modal-form">

                    <input type="number" name="id" id="id-parametrizacao" hidden>

                    <div class="group-input">
                        <label for="nome_empresa_cliente">Nome da Empresa</label>
                        <input type="text" name="nome_empresa_cliente" id="nome_empresa_cliente" value="" readonly>
                    </div>
                    <div class="group-input">
                        <label for="cnpj_empresa_cliente">CNPJ</label>
                        <input type="text" name="cnpj_empresa_cliente" id="cnpj_empresa_cliente" value="" readonly>
                    </div>
                    <div class="group-input">
                        <label for="razao_escritorio">Escritório</label>
                        <input type="text" name="razao_escritorio" id="razao_escritorio" value="" readonly>
                    </div>
                    <div class="group-input">
                        <label for="cnpj_escritorio">CPF ou CNPJ do escritório</label>
                        <input type="text" name="cnpj_escritorio" id="cnpj_escritorio" value="" readonly>
                    </div>
                    <div class="group-input">
                        <label for="email_escritorio">Email do escritório</label>
                        <input type="text" name="email_escritorio" id="email_escritorio" value="" readonly>
                    </div>
                    <div class="group-input">
                        <label for="telefone_escritorio">Telefone</label>
                        <input type="text" name="telefone_escritorio" id="telefone_escritorio" value="" readonly>
                    </div>
                    <div class="group-input">
                        <label for="responsavel_escritorio">Responsável por preencher</label>
                        <input type="text" name="responsavel_escritorio" id="responsavel_escritorio" value="" readonly>
                    </div>
                    <div class="group-input">
                        <label for="usuario_expert">Usuario Expert</label>
                        <input type="text" name="usuario_expert" id="usuario_expert" value="" readonly>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="modelo_certificado">Modelo Certificado</label>
                                <input type="text" name="modelo_certificado" id="modelo_certificado" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="senha_certificado">Senha</label>
                                <input type="text" name="senha_certificado" id="senha_certificado" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="RegimeTributario">Regime Tributário</label>
                                <input type="text" name="RegimeTributario" id="RegimeTributario" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col">
                            <div class="group-input">
                                <label for="ja_emitiu_nfce">Já emitiu NFC-e ?</label>
                                <input type="text" name="ja_emitiu_nfce" id="ja_emitiu_nfce" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="ja_emitiu_nfe">Já emitiu NF-e ?</label>
                                <input type="text" name="ja_emitiu_nfe" id="ja_emitiu_nfe" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="ja_emitiu_sat">Já emitiu SAT ?</label>
                                <input type="text" name="ja_emitiu_sat" id="ja_emitiu_sat" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="vai_emitir_nfce">Vai emitir NFC-e ?</label>
                                <input type="text" name="vai_emitir_nfce" id="vai_emitir_nfce" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="vai_emitir_nfe">Vai emitir NF-e ?</label>
                                <input type="text" name="vai_emitir_nfe" id="vai_emitir_nfe" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="vai_emitir_sat">Vai emitir SAT ?</label>
                                <input type="text" name="vai_emitir_sat" id="vai_emitir_sat" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="ultima_nfce">Ultima NFC-e ?</label>
                                <input type="text" name="ultima_nfce" id="ultima_nfce" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="ultima_nfe">Ultima NF-e ?</label>
                                <input type="text" name="ultima_nfe" id="ultima_nfe" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="ModoPreenchimento">Preenchimento</label>
                                <input type="text" name="ModoPreenchimento" id="ModoPreenchimento" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="Tributados">Produtos Tributados</label>
                                <input type="text" name="Tributados" id="Tributados" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="ST">Produtos ST</label>
                                <input type="text" name="ST" id="ST" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="Isento">Produtos Isentos</label>
                                <input type="text" name="Isento" id="Isento" value="" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="Outros">Produtos Outros</label>
                                <input type="text" name="Outros" id="Outros" value="" readonly>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <div class="group-botoes">
                    <button class="btn btn-success" id="zerar-parametrizacao">Zerar parametrização</button>
                </div>

            </div>

        </div> <!-- modal-content -->

    </div> <!-- modal -->

    <!-- FIM TELA MODAL -->


    <!-- TELA MODAL -->

    <div class="modal d-none" id="modal-cadastrar-empresa">

        <div class="modal-content">

            <div class="modal-header">
                <h2>Cadastrar Empresa</h2>
                <span class="close" onclick="FecharModal('modal-cadastrar-empresa')">&times;</span>
            </div>
            <div class="modal-body">
                <form action="" id="form-empresa" class="modal-form">
                    <input type="number" name="idEmpresa" id="idEmpresa" hidden>
                    <div class="group-input">
                        <label for="nome">Nome da Empresa</label>
                        <input type="text" name="nome" id="form-empresa-nome" autocomplete="off">
                        <div class="list-empresa">
                            <ul class="list" id="list-empresa">
                            </ul> <!-- list -->
                        </div>
                    </div>
                    <div class="group-input">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" id="form-empresa-cnpj" autocomplete="off">
                    </div>
                    <div class="group-input">
                        <label for="status">link</label>
                        <input type="text" name="link" id="link" readonly>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="group-botoes">
                    <button class="btn btn-primary">Cancelar</button>
                    <button class="btn btn-success" id="gerar-link-parametrizacao">Gerar Link</button>
                </div>

            </div>

        </div> <!-- modal-content -->

    </div> <!-- modal -->

    <!-- FIM TELA MODAL -->

    <script src="../../app/assets/js/ADM.index.js"></script>
    <script src="../../app/assets/js/Funcoes.Feitas.js"></script>
</body>

</html>