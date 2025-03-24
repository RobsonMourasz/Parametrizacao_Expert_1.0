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
                            <div class="group-input w-50">
                                <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar">
                            </div>
                            <div class="group-botoes w-30 align-left">
                                <input type="submit" name="pesquisar" id="pesquisar" class="btn btn-primary" value="pesquisar">
                            </div>
                        </div>
                    </form>
                    <div class="col">
                        <div class="group-botoes justify-content-left" >
                            <button class="btn btn-success">Adicionar</button>
                            <button class="btn btn-info">Visualizar</button>
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
                            <div class="table-cell">HS BEBIDAS</div>
                            <div class="table-cell">56.991.836/0001-50</div>
                            <div class="table-cell">Preenchido</div>
                        </div> <!-- table-row -->

                        <div class="table-row">
                            <div class="table-cell">MR ELETRICA AUTOMOTIVA/ROMES JOSE DE OLIVEIRA</div>
                            <div class="table-cell">58.654.857/0001-05</div>
                            <div class="table-cell">Preenchido</div>
                        </div> <!-- table-row -->

                    </div> <!-- table-body -->

                </div> <!-- table -->
            </div> <!-- empresas -->
        </div> <!-- container-page -->
    </div> <!-- container -->



    <!-- TELA MODAL -->

    <div class="modal d-none" id="modal-empresa">

        <div class="modal-content">

            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Cadastrar Empresa</h2>
            </div>
            <div class="modal-body">
                <form action="" id="form-empresa">
                    <label for="nome">Nome da Empresa</label>
                    <input type="text" name="nome" id="nome">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status">
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn-cancelar">Cancelar</button>
                <button class="btn-salvar">Salvar</button>
            </div>

        </div> <!-- modal-content -->

    </div> <!-- modal -->

    <!-- FIM TELA MODAL -->


    <!-- TELA MODAL -->

    <div class="modal d-none" id="modal-empresa">

        <div class="modal-content">

            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Cadastrar Empresa</h2>
            </div>
            <div class="modal-body">
                <form action="" id="form-empresa">
                    <label for="nome">Nome da Empresa</label>
                    <input type="text" name="nome" id="nome">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status">
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn-cancelar">Cancelar</button>
                <button class="btn-salvar">Salvar</button>
            </div>

        </div> <!-- modal-content -->

    </div> <!-- modal -->

    <!-- FIM TELA MODAL -->


</body>

</html>