(()=>{
    document.getElementById("form-cadastro-escritorio").addEventListener("submit", async(event)=>{
        event.preventDefault();
        const inputs = new FormData(document.getElementById("form-cadastro-escritorio"));
        for (const [name, value] of inputs.entries()) {

            const inputElement = document.querySelector(`[name="${name}"]`);
            const inputId = inputElement ? inputElement.id : null;

            if (!value.trim()) {
                alerta("danger", `O campo "${name}" não pode estar vazio.`)
                document.getElementById(inputId).focus();
                return; // Interrompe o envio se houver erro
            }

            // Adicione outras validações aqui, como validação de e-mail, números, etc.
        }
        inputs.append("tipo", "CadEscritorio")
        const CadastrarEscritorio = await fetch("../../src/href/routes.php",{
            method: "POST",
            body: inputs,
        })

        if (CadastrarEscritorio.ok){
            alerta("success","Escritorio cadastrado com sucesso")
            limparInputs(document.getElementById("form-cadastro-escritorio"))
            location.assign("?page=ModeloCertificado");
        }else{
            alerta("danger","Erro ao cadastrar escritorio")
        }

    });


    document.getElementById("cad_razao_escritorio").addEventListener("focusout", ()=>{
        document.getElementById("cad_razao_escritorio").value = document.getElementById("cad_razao_escritorio").value.toUpperCase();
    })

    document.getElementById("cad_telefone_escritorio").addEventListener("focusout", ()=>{
        document.getElementById("cad_telefone_escritorio").value = FormatarTelefoneCelular(document.getElementById("cad_telefone_escritorio").value)
    })

    document.getElementById("cad_email_escritorio").addEventListener("focusout", ()=>{
        document.getElementById("cad_email_escritorio").value = document.getElementById("cad_email_escritorio").value.toLowerCase();
    })

    document.getElementById("cad_cpf_cnpj_escritorio").addEventListener("focusout", ()=>{
        document.getElementById("cad_cpf_cnpj_escritorio").value = FormatarCpfCnpj(document.getElementById("cad_cpf_cnpj_escritorio").value)
    })

    document.getElementById("cad_nome_responsavel_escritorio").addEventListener("focusout", ()=>{
        document.getElementById("cad_nome_responsavel_escritorio").value = document.getElementById("cad_nome_responsavel_escritorio").value.toUpperCase();
    })

})();