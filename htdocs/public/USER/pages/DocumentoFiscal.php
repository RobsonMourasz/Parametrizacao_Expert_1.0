<div class="card">

    <div class="card-header w-100 center">
        <h1><small>Etapa 4:</small> Qual Tipo de Emissao fiscal irá emitir?</h1>
    </div> <!-- card-header -->

    <div class="card-body w-100 center">
        <form class="center" id="form-cadastro-tipo-fiscal" method="post">

            <div class="row">

                <div class="col-3">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="cad_regime_mei" class="check-lembrar">NFC-e</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce" id="nfce-sim" value="Sim">
                            <label for="nfce-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce" id="nfce-nao" value="nao">
                            <label for="nfce-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

                <div class="col-3">

                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="cad_regime_mei" class="check-lembrar">NF-e</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce" id="nfce-sim" value="Sim">
                            <label for="nfce-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce" id="nfce-nao" value="nao">
                            <label for="nfce-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

                <div class="col-3">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="cad_regime_mei" class="check-lembrar">SAT</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce" id="nfce-sim" value="Sim">
                            <label for="nfce-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce" id="nfce-nao" value="nao">
                            <label for="nfce-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-4">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="cad_regime_mei" class="check-lembrar">Já emitiu NFC-e ?</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce" id="nfce-sim" value="Sim">
                            <label for="nfce-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce" id="nfce-nao" value="nao">
                            <label for="nfce-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

                <div class="col-4">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="cad_regime_mei" class="check-lembrar">Já emitiu NF-e ?</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce" id="nfce-sim" value="Sim">
                            <label for="nfce-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce" id="nfce-nao" value="nao">
                            <label for="nfce-nao" class="label-radio">Nao</label>
                        </div>

                    </div>
                </div>

                <div class="col-4">
                    <div class="group-input-radio">

                        <div class="radio-title">
                            <label for="cad_regime_mei" class="check-lembrar">Já emitiu SAT ?</label>
                        </div>
                        <div class="radio-body">
                            <input type="radio" name="nfce" id="nfce-sim" value="Sim">
                            <label for="nfce-sim" class="label-radio">Sim</label>
                            <input type="radio" name="nfce" id="nfce-nao" value="nao">
                            <label for="nfce-nao" class="label-radio">Nao</label>
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