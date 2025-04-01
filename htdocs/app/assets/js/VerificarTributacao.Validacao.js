(()=>{
    
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