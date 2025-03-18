(()=>{
    document.getElementById("form-cadastro-escritorio").addEventListener("submit", (event)=>{
        event.preventDefault();
        console.log("entrou");
        const inputs = new FormData(document.getElementById("form-cadastro-escritorio"));
        for (const [name, value] of inputs.entries()) {
            // Exemplo de validação: verifica se o campo está vazio
            if (!value.trim()) {
                alerta("danger", `O campo "${name}" não pode estar vazio.`)
                return; // Interrompe o envio se houver erro
            }

            // Adicione outras validações aqui, como validação de e-mail, números, etc.
        }

    });
})();