(()=>{

    document.addEventListener("DOMContentLoaded", async ()=>{
        const response = await fetch(`../../src/href/routes.php?VerificarTributacao=${""}`);
        const data = await response.json();
        if(data.status === "ok"){
            document.getElementById("form-verificar-tributacao").style.display = "block";
            const tributados = parseInt(data.msg[0].Tributados ? data.msg[0].Tributados.replace("%", "") : 0);
            const st = parseInt(data.msg[0].ST ? data.msg[0].ST.replace("%", "") : 0);
            const isentos = parseInt(data.msg[0].Isento ? data.msg[0].Isento.replace("%", "") : 0);
            const outros = parseInt(data.msg[0].Outros ? data.msg[0].Outros.replace("%", "") : 0);
            console.log(tributados, st, isentos, outros);
        }else{
            document.getElementById("form-verificar-tributacao").style.display = "none";
        }
    });
    
    document.getElementById("form-verificar-tributacao").addEventListener("submit", async (event)=>{
        event.preventDefault();
        const form = new FormData();
        form.append("confirmar", "SIM");
        const response = await fetch("../../src/href/routes.php", {
            method: "POST",
            body: form
        });
        const data = await response.json();
        if(data.status === "ok"){
            window.location.assign("?page=Finalizar");
        }else{
            alerta("danger", "Erro ao finalizar a verificação!");
        }

    });

})();