<?php 
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['idParametrizacao']) && !empty($_SESSION['idParametrizacao'])){ ?>
<div class="card h-100">

<div class="card-header w-100 center">
    <h1><small>Etapa 7:</small> Confira todas as informações passadas !</h1>
</div> <!-- card-header -->

<div class="card-body w-100 center">
    <form class="center" id="form-finalizar">
        <input type="number" id="id-parametrizacao" value="<?php echo $_SESSION['idParametrizacao'] ?>" hidden>
        <div class="row">

            <div class="col">
                <div class="table-response">
                    <div class="table-header">
                        <h2>Modelo do Certificado</h2>
                    </div>
                    <div class="table-body">
                        <span id="modelo-certificado"></span>
                    </div>
                    <div class="table-header">
                        <h2>Senha</h2>
                    </div>
                    <div class="table-body">
                        <span id="senha-certificado"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-response">
                    <div class="table-header">
                        <h2>Regime tributário</h2>
                    </div>
                    <div class="table-body">
                        <span id="regime-tributario" ></span>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="table-response">
                    <div class="table-header">
                        <h2>Irá emitir</h2>
                    </div>
                    <div class="table-body">
                        <span id="ira-emitir"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-response">
                    <div class="table-header">
                        <h2>Ultima NFe </h2>
                    </div>
                    <div class="table-body">
                        <span id="ultima-nfe"></span>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="table-response">

                    <div class="table-header">
                        <h2>Ultima NFC-e </h2>
                    </div>
                    <div class="table-body">
                        <span id="ultima-nfce"></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="table-response">
                    <div class="table-header">
                        <h2>Tributação das mercadorias: </h2>
                    </div>
                    <div class="table-body">
                        <span id="tributacao-itens"></span>
                    </div>
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
<script src="../../app/assets/js/Finalizar.Validacao.js"></script>
<?php }else{
    header('Location: ../../404.php');
    exit();
}