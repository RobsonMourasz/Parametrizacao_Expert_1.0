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
                                <button class="btn btn-success">Adicionar</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-botoes justify-content-left">
                                <button class="btn btn-info">Visualizar</button>
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
                        </div> <!-- table-row -->
                    </div> <!-- table-header -->

                    <div class="table-body">

                        <div class="table-row">
                            <div class="table-cell" ondblclick="AbrirModal(2)" id="2">HS BEBIDAS</div>
                            <div class="table-cell">56.991.836/0001-50</div>
                            <div class="table-cell"><span class="falso">Não preenchido</span></div>
                        </div> <!-- table-row -->

                        <div class="table-row">
                            <div class="table-cell" ondblclick="AbrirModal(1)" id="1">MR ELETRICA AUTOMOTIVA/ROMES JOSE DE OLIVEIRA</div>
                            <div class="table-cell">58.654.857/0001-05</div>
                            <div class="table-cell"><span class="verdadeiro">Preenchido</span></div>
                        </div> <!-- table-row -->

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
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="" id="form-empresa" class="modal-form">
                    <div class="group-input">
                        <label for="nome">Nome da Empresa</label>
                        <input type="text" name="nome" id="nome" value="">
                    </div>
                    <div class="group-input">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" value="">
                    </div>
                    <div class="group-input">
                        <label for="status">Escritório</label>
                        <input type="text" name="status" id="status" value="">
                    </div>
                    <div class="group-input">
                        <label for="status">CPF ou CNPJ do escritório</label>
                        <input type="text" name="status" id="status" value="">
                    </div>
                    <div class="group-input">
                        <label for="status">Email do escritório</label>
                        <input type="text" name="status" id="status" value="">
                    </div>
                    <div class="group-input">
                        <label for="status">Telefone</label>
                        <input type="text" name="status" id="status" value="">
                    </div>
                    <div class="group-input">
                        <label for="status">Responsável por preencher</label>
                        <input type="text" name="status" id="status" value="">
                    </div>
                    <div class="group-input">
                        <label for="status">Usuario Expert</label>
                        <input type="text" name="status" id="status" value="">
                    </div>
                    <div class="group-input">
                        <label for="status">Modelo Certificado</label>
                        <input type="text" name="status" id="status" value="">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Já emitiu NFC-e ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Já emitiu NF-e ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Já emitiu SAT ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Vai emitir NFC-e ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Vai emitir NF-e ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Vai emitir SAT ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Ultima NFC-e ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="group-input">
                                <label for="status">Ultima NF-e ?</label>
                                <input type="text" name="status" id="status" value="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="group-botoes">
                    <button class="btn btn-primary">Cancelar</button>
                    <button class="btn btn-success">Salvar</button>
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
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="" id="form-empresa" class="modal-form">
                    <div class="group-input">
                        <label for="nome">Nome da Empresa</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    <div class="group-input">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj">
                    </div>
                    <div class="group-input">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="group-botoes">
                    <button class="btn btn-primary">Cancelar</button>
                    <button class="btn btn-success">Salvar</button>
                </div>

            </div>

        </div> <!-- modal-content -->

    </div> <!-- modal -->

    <!-- FIM TELA MODAL -->

    <script src="../../app/assets/js/ADM.index.js"></script>
</body>

</html>