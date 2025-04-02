<?php 
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['idParametrizacao']) && !empty($_SESSION['idParametrizacao'])){ ?>
<div class="card h-100">

    <div class="card-header w-100 center">
        <h1><small>Etapa 6:</small> De acordo com a regra fiscal exibida de forma automática, com base na porcentagem definida na etapa anterior, confirma está de acordo com os valores exibido abaixo?</h1>
    </div> <!-- card-header -->

    <div class="card-body w-100 center">
        <form class="center" id="form-verificar-tributacao">

            <div class="row">

                <div class="col">
                    <div class="table-response" id = "tabela-dentro-estado">

                    </div>
                </div>

                <div class="col">
                    <div class="table-response" id="tabela-fora-estado">

                    </div>
                </div>
            </div>
            <div class="group-botoes">
                <button type="button" class="btn btn-danger">Voltar</button>
                <button type="submit" class="btn btn-success">Próximo</button>
            </div>
        </form>
    </div> <!-- card-body -->
</div> <!-- card -->
<script src="../../app/assets/js/VerificarTributacao.Validacao.js"></script>
<?php }else{
    header('Location: ../../404.php');
    exit();
} ?>