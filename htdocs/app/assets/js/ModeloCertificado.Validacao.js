(()=>{
    document.getElementById("cad_modelo_a1").addEventListener("change", () => {
        if (document.getElementById("cad_modelo_a1").checked) {
            document.getElementById("cad_modelo_a3_token").checked = false;
            document.getElementById("cad_modelo_a3_cartao").checked = false;
            document.getElementById("file-certificado").style = "display:inline-block;";
        }else{
            document.getElementById("file-certificado").style = "display:none;";
        }
    });
    
    document.getElementById("cad_modelo_a3_token").addEventListener("change", () => {
        if (document.getElementById("cad_modelo_a3_token").checked) {
            document.getElementById("cad_modelo_a1").checked = false;
            document.getElementById("cad_modelo_a3_cartao").checked = false;
        }
        document.getElementById("file-certificado").style = "display:none;";
    });
    
    document.getElementById("cad_modelo_a3_cartao").addEventListener("change", () => {
        if (document.getElementById("cad_modelo_a3_cartao").checked) {
            document.getElementById("cad_modelo_a3_token").checked = false;
            document.getElementById("cad_modelo_a1").checked = false;
        }
        document.getElementById("file-certificado").style = "display:none;";
    });
})()