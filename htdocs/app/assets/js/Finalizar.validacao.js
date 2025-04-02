(()=>{

    document.addEventListener("DOMContentLoaded", async() => {
        const response = await fetch(`../../src/href/routes.php?idVisualizarParametrizacao=${document.getElementById("id-parametrizacao").value}`);
        const data = await response.json();
        if (data.status === "ok") {
            let VaiEmitir = "";
            let Tributados = "";
            if (data.msg[0].IraEmitirNFCe === "Sim"){
                VaiEmitir += "NFCe";
            }
            if (data.msg[0].IraEmitirNFe === "Sim"){
                if(VaiEmitir == "NFCe"){
                    VaiEmitir += ", NFe";
                }else{
                    VaiEmitir += "NFe";
                }
            }
            if (data.msg[0].IraEmitirSat === "Sim"){
                VaiEmitir += " Sat ";
            }

            if (data.msg[0].Tributados !== "0%"){
                Tributados += "Tributados: " + data.msg[0].Tributados + ", ";
            }else{
                Tributados += "Tributados: 0%, ";
            }
            if (data.msg[0].ST !== "0%"){
                Tributados += "ST: " + data.msg[0].ST + ", ";
            }else{
                Tributados += "ST: 0%, ";
            }
            if (data.msg[0].Isento !== "0%"){
                Tributados += "Isento: " + data.msg[0].Isento + ", ";
            }else{
                Tributados += "Isento: 0%, ";
            }
            if (data.msg[0].Outros !== "0%"){
                Tributados += "Outros: " + data.msg[0].Outros;
            }else{
                Tributados += "Outros: 0%";
            }
            document.getElementById("modelo-certificado").textContent = data.msg[0].ModeloCertificado;
            document.getElementById("senha-certificado").textContent = data.msg[0].SenhaCertificado ? data.msg[0].SenhaCertificado : "Não informado";
            document.getElementById("regime-tributario").textContent = data.msg[0].RegimeTributario;
            document.getElementById("ira-emitir").textContent = VaiEmitir ? VaiEmitir : "Não informado";
            console.log(data.msg[0].UltimoNFCe )
            document.getElementById("ultima-nfe").textContent = data.msg[0].UltimaNFCe ? data.msg[0].UltimaNFCe : "0";
            document.getElementById("ultima-nfce").textContent = data.msg[0].UltimaNFe ? data.msg[0].UltimaNFe : "0";
            document.getElementById("tributacao-itens").textContent = Tributados;
        }
    });

    document.getElementById("form-finalizar").addEventListener("submit", async (e) => {

        e.preventDefault();
        const form = new FormData();
        form.append("confirmar", "SIM");
        const response = await fetch("../../src/href/routes.php", {
            method: "POST",
            body: form,
        });
        const data = await response.json();
        if(data.status === "ok"){
            window.location.assign("?page=FIM");
        }else{
            alerta("successs", "Pedido finalizado com sucesso!");
        }
        
    });

})();