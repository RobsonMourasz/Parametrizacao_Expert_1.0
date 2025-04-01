(() => {
    const Emitir_NFCe = document.getElementsByName('nfce');
    const Emitir_NFe = document.getElementsByName('nfe');
    const Emitir_SAT = document.getElementsByName('sat');
    const JaEmitiu_NFCe = document.getElementsByName('nfce-emitida');
    const JaEmitiu_NFe = document.getElementsByName('nfe-emitida');
    const JaEmitiu_SAT = document.getElementsByName('sat-emitida');

    document.getElementById("nfce-emitida-sim").addEventListener("change", () => {
        document.getElementById("ultima_nfce").classList.remove("d-none");
    });

    document.getElementById("nfce-emitida-nao").addEventListener("change", () => {
        document.getElementById("ultima_nfce").classList.add("d-none");
    });

    document.getElementById("nfe-emitida-sim").addEventListener("change", () => {
        document.getElementById("ultima_nfe").classList.remove("d-none");
    });

    document.getElementById("nfe-emitida-nao").addEventListener("change", () => {
        document.getElementById("ultima_nfe").classList.add("d-none");
    });




    document.getElementById("form-cadastro-tipo-fiscal").addEventListener("submit", async (e) => {
        e.preventDefault();

        if (!ValidacaoRadios(Emitir_NFCe)) {
            alerta("danger", "Selecione uma opção se irá emitir NFC-e!");
            return; // Interrompe a execução se nenhum botão foi marcado

        }

        if (!ValidacaoRadios(Emitir_NFe)) {
            alerta("danger", "Selecione uma opção se irá emitir NF-e!");
            return; // Interrompe a execução se nenhum botão foi marcado
        }

        if (!ValidacaoRadios(Emitir_SAT)) {
            alerta("danger", "Selecione uma opção se irá emitir SAT!");
            return; // Interrompe a execução se nenhum botão foi marcado
        }

        if (!ValidacaoRadios(JaEmitiu_NFCe)) {
            alerta("danger", "Selecione uma opção se já emitiu NFC-e!");
            return; // Interrompe a execução se nenhum botão foi marcado
        }

        if (!ValidacaoRadios(JaEmitiu_NFe)) {
            alerta("danger", "Selecione uma opção se já emitiu NF-e!");
            return; // Interrompe a execução se nenhum botão foi marcado
        }

        if (!ValidacaoRadios(JaEmitiu_SAT)) {
            alerta("danger", "Selecione uma opção se já emitiu SAT!");
            return; // Interrompe a execução se nenhum botão foi marcado
        }

        if (document.getElementById("nfce-emitida-sim").checked && document.getElementById("ultima_nfce").value == "") {
            alerta("danger", "Preencha qual a ultima NFC-e emitida!");
            document.getElementById("ultima_nfce").focus();
            return; // Interrompe a execução se nenhum botão foi marcado
        }

        if (document.getElementById("nfe-emitida-sim").checked && document.getElementById("ultima_nfe").value == "") {
            alerta("danger", "Preencha qual a ultima NFC-e emitida!");
            document.getElementById("ultima_nfe").focus();
            return; // Interrompe a execução se nenhum botão foi marcado
        }

        const formData = new FormData(document.getElementById("form-cadastro-tipo-fiscal"));
        formData.append('tipo', 'CadTipoFiscal');
        const response = await fetch('../../src/href/routes.php', {
            method: 'POST',
            body: formData,
        });
        if(response.ok){
            alerta("success", "Tipo Fiscal cadastrado com sucesso!");
            window.location.assign('?page=Tributacao');
        }else{
            alerta("danger", "Erro ao cadastrar tipo fiscal!");
        }
        
    })

})();

function ValidacaoRadios(params) {
    for (const radio of params) {
        if (radio.checked) {
            return radio.value; // Retorna o valor da opção selecionada
        }
    }
    return false; // Retorna false se nenhuma opção foi selecionada
}
