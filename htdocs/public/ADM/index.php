<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - Expert</title>
</head>

<body>
    <h1>Lista de Parametrização</h1>
    <div class="pesquisa">
        <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar">
        <button>Pesquisar</button>
        <button>Adicionar</button>
        <button>Visualizar</button>
    </div>
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

        </div>
    </div> <!-- empresas -->


    <!-- TELA MODAL -->

    <div class="modal" id="modal-empresa">

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

    <div class="modal" id="modal-empresa">

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