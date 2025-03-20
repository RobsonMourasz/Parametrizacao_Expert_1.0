(() => {
    const Emitir_NFCe = document.getElementById('nfce-sim');
    const Emitir_NFe = document.getElementById('nfe-sim');
    const Emitir_SAT = document.getElementById('sat-sim');
    const JaEmitiu_NFCe = document.getElementsByName('nfce-emitida');
    const JaEmitiu_NFe = document.getElementsByName('nfe-emitida');
    const JaEmitiu_SAT = document.getElementsByName('sat-emitida-sim');

    VerificarRadio(JaEmitiu_NFe,"ultima_nfe");
    VerificarRadio(JaEmitiu_NFCe,"ultima_nfce");

    document.getElementById("form-cadastro-tipo-fiscal").addEventListener("submit", async(e)=>{
        e.preventDefault();

        if (ValidacaoRadios(Emitir_NFCe) === false && ValidacaoRadios(Emitir_NFe) && ValidacaoRadios(Emitir_SAT) && ValidacaoRadios(JaEmitiu_NFCe) && ValidacaoRadios(JaEmitiu_NFe) && ValidacaoRadios(JaEmitiu_SAT)){
            alerta("danger", "Selecione os Campos !!!")
        }
    })

})();


function VerificarRadio(params,inputAfetar) {
    let selecionado = null;
    for (const radio of params) {
        if (radio.checked) {
            selecionado = radio.value; // Valor da opção selecionada
            break;
        }
    }

    if (selecionado) {
        if (selecionado == "Sim"){
            document.getElementById(inputAfetar).classList.remove('d-none');
        }else{
            document.getElementById(inputAfetar).classList.add('d-none');
        }
        // Aqui você pode prosseguir com o envio ou lógica adicional
    } else {
        alert("Por favor, selecione uma opção (Sim ou Não).");
    }
}

function ValidacaoRadios(params) {
    Array.from(params).forEach(radio => {
        radio.addEventListener('change', () => {
            console.log('teste');
            let selecionado = null;
            for (const radio of params) {
                if (radio.checked) {
                    selecionado = radio.value; // Valor da opção selecionada
                    break;
                }
            }

            if (!selecionado) {
                return false;
            }
        });
    });
}