(()=>{

    const cad_regime_mei = document.getElementById("cad_regime_mei");
    const cad_regime_simples = document.getElementById("cad_regime_simples");
    const cad_regime_real = document.getElementById("cad_regime_real");
    const cad_regime_presumido = document.getElementById("cad_regime_presumido");
    const cad_regime_outro = document.getElementById("cad_regime_outro");

    cad_regime_mei.addEventListener("change", ()=>{
        if(cad_regime_mei.checked){
            cad_regime_mei.value = cad_regime_mei.getAttribute("id");
            cad_regime_simples.checked = false;
            cad_regime_real.checked = false;
            cad_regime_presumido.checked = false;
            cad_regime_outro.checked = false;
        }
    })

    cad_regime_simples.addEventListener("change", ()=>{
        if(cad_regime_simples.checked){
            cad_regime_simples.value = cad_regime_simples.getAttribute("id");
            cad_regime_mei.checked = false;
            cad_regime_real.checked = false;
            cad_regime_presumido.checked = false;
            cad_regime_outro.checked = false;
        }
    })

    cad_regime_real.addEventListener("change", ()=>{
        if(cad_regime_real.checked){
            cad_regime_real.value = cad_regime_real.getAttribute("id");
            cad_regime_simples.checked = false;
            cad_regime_mei.checked = false;
            cad_regime_presumido.checked = false;
            cad_regime_outro.checked = false;
        }
    })

    cad_regime_presumido.addEventListener("change", ()=>{
        if(cad_regime_presumido.checked){
            cad_regime_presumido.value = cad_regime_presumido.getAttribute("id");
            cad_regime_simples.checked = false;
            cad_regime_real.checked = false;
            cad_regime_mei.checked = false;
            cad_regime_outro.checked = false;
        }
    })

    cad_regime_outro.addEventListener("change", ()=>{
        if(cad_regime_outro.checked){
            cad_regime_outro.value = cad_regime_outro.getAttribute("id");
            cad_regime_simples.checked = false;
            cad_regime_real.checked = false;
            cad_regime_presumido.checked = false;
            cad_regime_mei.checked = false;
        }
    })
    document.getElementById("form-cadastro-regime-tributario").addEventListener("submit", async(e)=>{
        e.preventDefault();
        if (cad_regime_outro.checked === false && cad_regime_presumido.checked === false && cad_regime_real.checked === false && cad_regime_simples.checked === false && cad_regime_mei.checked === false) {
            alerta("danger","Selecione um regime tributário!");
        }

        const formData = new FormData(document.getElementById("form-cadastro-regime-tributario"));
        formData.append("tipo", "CadRegimeTributario");
        const response = await fetch("../../src/href/routes.php",{
            method: "POST",
            body: formData
        })

        if(response.ok){
            alerta("success","Regime tributário cadastrado com sucesso!");
            window.location.assign("?page=DocumentoFiscal");
        }else{
            alerta("danger","Erro ao cadastrar regime tributário!");
        }

    })

})();