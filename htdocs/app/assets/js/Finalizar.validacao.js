(()=>{

    document.addEventListener("DOMContentLoaded", async() => {
        const response = await fetch(`../../src/href/routes.php?idVisualizarParametrizacao=${document.getElementById("id-parametrizacao").value}`);
        const data = await response.json();
        if (data.status === "ok") {
            let VaiEmitir = "";
            let Tributados = "";
            if (data.msg[0].IraEmitirNFCe === "sim"){
                VaiEmitir += "NFCe, ";
            }
            if (data.msg[0].IraEmitirNFe === "sim"){
                VaiEmitir += "NFe, ";
            }
            if (data.msg[0].IraEmitirSat === "sim"){
                VaiEmitir += "Sat, ";
            }

            if (data.msg[0].Tributados !== "0%"){
                Tributados += "Tributados: " + data.msg[0].Tributados + ", ";
            }
            if (data.msg[0].ST !== "0%"){
                Tributados += "ST: " + data.msg[0].ST + ", ";
            }
            if (data.msg[0].Isento !== "0%"){
                Tributados += "Isento: " + data.msg[0].Isento + ", ";
            }
            if (data.msg[0].Outros !== "0%"){
                Tributados += "Outros: " + data.msg[0].Outros;
            }
            document.getElementById("modelo-certificado").textContent = data.msg[0].ModeloCertificado;
            document.getElementById("senha-certificado").textContent = data.msg[0].SenhaCertificado ? data.msg[0].SenhaCertificado : "Não informado";
            document.getElementById("regime-tributario").textContent = data.msg[0].RegimeTributario;
            document.getElementById("ira-emitir").textContent = VaiEmitir ? VaiEmitir : "Não informado";
            document.getElementById("ultima-nfe").textContent = data.msg[0].UltimoNFCe ? data.msg[0].UltimoNFCe : "0";
            document.getElementById("ultima-nfce").textContent = data.msg[0].UltimoNFe ? data.msg[0].UltimoNFe : "0";
            document.getElementById("tributacao-itens").textContent = Tributados;
        }
    });

    document.getElementById("form-finalizar").addEventListener("submit", async (e) => {

        e.preventDefault();
        const form = new FormData();
        form.append("confirmar", "SIM");
        const response = fetch("../../src/href/routes.php", {
            method: "POST",
            body: form
        });
        const data = await response.json();
        if(data.status === "ok"){
            window.location.assign("?page=Finalizar");
        }else{
            alerta("successs", "Pedido finalizado com sucesso!");
        }
        
    });

})();