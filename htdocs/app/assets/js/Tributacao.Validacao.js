(() => {
    document.getElementById("form-cadastro-tributacao").addEventListener("submit", async (event) => {
        event.preventDefault();
        const form = new FormData(document.getElementById("form-cadastro-tributacao"));
        form.append("tipo", "CadTributacao")

        let tributados = 0;
        let st = 0;
        let isentos = 0;
        let outros = 0;

        for (input of form) {

            if (input[0] !== "tipo") {

                if (input[0] === "st") {
                    st += parseInt(input[1]);
                } else if (input[0] === "tributados") {
                    tributados += parseInt(input[1]);
                } else if (input[0] === "outros") {
                    outros += parseInt(input[1]);
                } else if (input[0] === "isento") {
                    isentos += parseInt(input[1]);
                } 

            }

        }

        const total = st + tributados + outros + isentos;

        if (total !== 100) {
            alerta("danger","O total dos campos deve ser 100%");
            return;
        }

        const response = await fetch("../../src/href/routes.php", {
            method: "POST",
            body: form
        });

        if (response.ok){
            alerta("success","Tributação cadastrada com sucesso");
            window.location.href = "?page=VerificarTributacao";
        }else{
            alerta("danger","Erro ao cadastrar tributação");
        }
        

    });
})();