(()=>{
    document.getElementById("cad_modelo_a1").addEventListener("change", () => {
        if (document.getElementById("cad_modelo_a1").checked) {
            document.getElementById("cad_modelo_a1").value = "A1"
            document.getElementById("cad_modelo_a3_token").checked = false;
            document.getElementById("cad_modelo_a3_cartao").checked = false;
            document.getElementById("file-certificado").style = "display:inline-block;";
        }else{
            document.getElementById("file-certificado").style = "display:none;";
        }
    });
    
    document.getElementById("cad_modelo_a3_token").addEventListener("change", () => {
        if (document.getElementById("cad_modelo_a3_token").checked) {
            document.getElementById("cad_modelo_a3_token").value = "token"
            document.getElementById("cad_modelo_a1").checked = false;
            document.getElementById("cad_modelo_a3_cartao").checked = false;
        }
        document.getElementById("file-certificado").style = "display:none;";
    });
    
    document.getElementById("cad_modelo_a3_cartao").addEventListener("change", () => {
        if (document.getElementById("cad_modelo_a3_cartao").checked) {
            document.getElementById("cad_modelo_a3_cartao").value = "cartao";
            document.getElementById("cad_modelo_a3_token").checked = false;
            document.getElementById("cad_modelo_a1").checked = false;
        }
        document.getElementById("file-certificado").style = "display:none;";
    });

    document.getElementById("form-cadastro-modelo-certificado").addEventListener("submit", async(event)=>{
        
        event.preventDefault();
        if (document.getElementById("cad_modelo_a1").checked == true || document.getElementById("cad_modelo_a3_token").checked == true || document.getElementById("cad_modelo_a3_cartao").checked == true) {

            if(document.getElementById("cad_modelo_a1").checked == true && document.getElementById("cad_certificado").files.length == 0){
                alerta("danger", "Selecione um certificado!");
                return;
             
            }

            if(document.getElementById("cad_certificado").files.length !== 0 && document.getElementById("cad_senha_certificado").value == ""){
                alerta("danger", "Por favor, informe a senha do certificado!");
                return;
            }

            const data = new FormData(document.getElementById("form-cadastro-modelo-certificado"));
            data.append("tipo","CadCertificado");
            const response = await fetch("../../src/href/routes.php", {
                method: "POST",
                body: data,
            })

            if (response.ok){
                alerta("success", "Modelo de certificado cadastrado com sucesso!");
                window.location.href = "?page=RegimeTributacao";
            }else{
                alerta("danger", "Erro na sincronização!");
            }
        }else{
            alerta("danger", "Selecione um modelo de certificado!");
        }
    })


})()