(()=>{

    document.addEventListener("DOMContentLoaded", async()=>{
        const idEmpresa = window.location.href.split("=")[1];
        const BuscaDadosEmpresa = await fetch(`../../src/href/routes.php?PreencherEmpresa=${idEmpresa}`)
        if (BuscaDadosEmpresa.ok){
            const dadosEmpresa = await BuscaDadosEmpresa.json();
            const empresa = await fetch(`../../src/href/routes.php?Empresas=${dadosEmpresa.msg[0].IdEmpresa}`)
            const respEmpresa = await empresa.json();
            alerta("success", `Preencha a parametrização referente a empresa : ${respEmpresa.msg[0].NomeEmpresa}`);
        }

    });

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
            const resp = await CadastrarEscritorio.json();
            console.log(resp);
            alerta("success","Escritorio cadastrado com sucesso")
            //limparInputs("form-cadastro-escritorio")
            //window.location.assign("?page=ModeloCertificado");
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