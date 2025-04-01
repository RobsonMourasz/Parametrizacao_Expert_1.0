(()=>{
    document.getElementById("form-finalizar").addEventListener("submit", async (e) {

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
        
    })
})();