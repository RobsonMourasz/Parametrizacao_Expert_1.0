<div class="card">

    <div class="card-header w-100 center">
        <h1><small>Etapa 3:</small> Qual o regime tributário da empresa ?</h1>
    </div> <!-- card-header -->

    <div class="card-body w-100 center">
        <form class="center" id="form-cadastro-regime-tributario" method="post" enctype="multipart/form-data">

            <div class="group-input-check">
                <input type="checkbox" name="RegimeTributario" id="cad_regime_mei" require>
                <label for="cad_regime_mei" class="check-lembrar">MEI</label>
            </div>

            <div class="group-input-check">
                <input type="checkbox" name="RegimeTributario" id="cad_regime_simples" require>
                <label for="cad_regime_simples" class="check-lembrar">Simples Nacional</label>
            </div>

            <div class="group-input-check">
                <input type="checkbox" name="RegimeTributario" id="cad_regime_real" require>
                <label for="cad_regime_real" class="check-lembrar">Lucro Real</label>
            </div>

            <div class="group-input-check">
                <input type="checkbox" name="RegimeTributario" id="cad_regime_presumido" require>
                <label for="cad_regime_presumido" class="check-lembrar">Lucro Presumido</label>
            </div>

            <div class="group-input-check">
                <input type="checkbox" name="RegimeTributario" id="cad_regime_outro" require>
                <label for="cad_regime_outro" class="check-lembrar">Outro</label>
            </div>

            <div class="group-botoes">
                <button type="button" class="btn btn-danger">Voltar</button>
                <button type="submit" class="btn btn-success">Próximo</button>
            </div>

        </form>
    </div> <!-- card-body -->

</div> <!-- card -->

<script src="../../app/assets/js/RegimeTributacao.Validacao.js"></script>