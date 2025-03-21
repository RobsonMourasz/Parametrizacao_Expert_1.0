(()=>{
    document.getElementById("form-finalizar").addEventListener("submit", (e)=>{
        e.preventDefault();
        alerta("successs", "Pedido finalizado com sucesso!");
    })
})();