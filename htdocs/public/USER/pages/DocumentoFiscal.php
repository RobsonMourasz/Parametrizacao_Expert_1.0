<?php 
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['idParametrizacao']) && !empty($_SESSION['idParametrizacao'])){ ?>
    <div class="card">

    <div class="card-header w-100 center">
        <h1><small>Etapa 4:</small> Qual Tipo de Emissao fiscal irá emitir?</h1>
    </div> <!-- card-header -->

    <div class="card-body w-100 center">
        <form class="center" id="form-cadastro-tipo-fiscal" method="post">

            <div class="row">

                <div class="col">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="" class="check-lembrar"><small>Irá emitir </small>NFC-e: </label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce" id="nfce-sim" value="Sim">
                            <label for="nfce-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce" id="nfce-nao" value="nao">
                            <label for="nfce-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

                <div class="col">

                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="" class="check-lembrar"><small>Irá emitir </small>NF-e: </label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfe" id="nfe-sim" value="Sim">
                            <label for="nfe-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfe" id="nfe-nao" value="nao">
                            <label for="nfe-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="" class="check-lembrar"><small>Irá emitir </small>SAT: </label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="sat" id="sat-sim" value="Sim">
                            <label for="sat-sim" class="label-radio">Sim</label>
                            <input type="radio" name="sat" id="sat-nao" value="nao">
                            <label for="sat-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="" class="check-lembrar"><small>Já emitiu </small>NFC-e ?</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce-emitida" id="nfce-emitida-sim" value="Sim">
                            <label for="nfce-emitida-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce-emitida" id="nfce-emitida-nao" value="nao">
                            <label for="nfce-emitida-nao" class="label-radio">Nao</label>
                        </div>
                        <div class="group-input">
                            <input type="number" name="ultima_nfce" id="ultima_nfce" placeholder="Ultima NFC-e" class="input-form d-none">
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="" class="check-lembrar"><small>Já emitiu </small>NF-e ?</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfe-emitida" id="nfe-emitida-sim" value="Sim">
                            <label for="nfe-emitida-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfe-emitida" id="nfe-emitida-nao" value="nao">
                            <label for="nfe-emitida-nao" class="label-radio">Nao</label>
                        </div>
                        <div class="group-input">
                            <input type="number" name="ultima_nfe" id="ultima_nfe" placeholder="Ultima NF-e" class="input-form d-none">
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="" class="check-lembrar"><small>Já emitiu </small>SAT ?</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="sat-emitida" id="sat-emitida-sim" value="Sim">
                            <label for="sat-emitida-sim" class="label-radio">Sim</label>
                            <input type="radio" name="sat-emitida" id="sat-emitida-nao" value="nao">
                            <label for="sat-emitida-nao" class="label-radio">Nao</label>
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

<script src="../../app/assets/js/DocumentoFiscal.Validacao.js"></script>
<?php }else {
    header('Location: ../../404.php');
    exit();
}