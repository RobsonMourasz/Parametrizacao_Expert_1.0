(()=>{
    
    document.getElementById("form-verificar-tributacao").addEventListener("submit", async (event)=>{
        event.preventDefault();
        window.location.assign("?page=Finalizar");
    });

})();