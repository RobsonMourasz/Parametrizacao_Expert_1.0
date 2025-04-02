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
            let CFOP = await DescobrirCFOP(tributados, st, isentos, outros);
            switch (CFOP) {
                case "Tributados":
                    preencherTabelaCFOP(5102, 102, 6102, 102);
                    break;
                case "ST":
                    preencherTabelaCFOP(5405, 500, 6405, 500);
                    break;
                case "Isentos":
                    preencherTabelaCFOP(5102, 400, 6102, 400);
                    break;

                case "Outros":
                    preencherTabelaCFOP(0, 0, 0, 0);
                    break;
                default:
                    break;
            }
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

function DescobrirCFOP(tributados, st, isentos, outros) {
    const valores = { Tributados: tributados, ST: st, Isentos: isentos, Outros: outros };

    let maiorNome = Object.keys(valores).reduce((a, b) => valores[a] > valores[b] ? a : b);

    return maiorNome;
}


function preencherTabelaCFOP(cfopDentro, csonDentro, cfopFora, csonFora) {
    let tabelaDentroEstado = document.getElementById("tabela-dentro-estado");
    let tabelaForaEstado = document.getElementById("tabela-fora-estado");

    tabelaDentroEstado.innerHTML = "";
    tabelaForaEstado.innerHTML = "";

    // Criando headers e bodies dentro do estado

    /* HEADER CFOP DENTRO DO ESTADO */
    let headerCFOPDentro = document.createElement("div");
    headerCFOPDentro.classList.add("table-header");
    
    let h2CFOPDentro = document.createElement("h2");
    h2CFOPDentro.innerText = "CFOP Dentro do estado";
    headerCFOPDentro.appendChild(h2CFOPDentro);

    let headerCSONDentro = document.createElement("div");
    headerCSONDentro.classList.add("table-header");
    
    let h2CSONDentro = document.createElement("h2");
    h2CSONDentro.innerText = "CSON Dentro do estado";
    headerCSONDentro.appendChild(h2CSONDentro);

    /* HEADER CFOP DENTRO DO ESTADO */

    let bodyCFOPDentro = document.createElement("div");
    bodyCFOPDentro.classList.add("table-body");

    let spanCFOPDentro = document.createElement("span");
    spanCFOPDentro.innerText = cfopDentro;
    bodyCFOPDentro.appendChild(spanCFOPDentro);

    let bodyCSONDentro = document.createElement("div");
    bodyCSONDentro.classList.add("table-body");

    let spanCSONDentro = document.createElement("span");
    spanCSONDentro.innerText = csonDentro;
    bodyCSONDentro.appendChild(spanCSONDentro);

    // Criando headers e bodies fora do estado
    let headerCFOPFora = document.createElement("div");
    headerCFOPFora.classList.add("table-header");

    let h2CFOPFora = document.createElement("h2");
    h2CFOPFora.innerText = "CFOP Fora do estado";
    headerCFOPFora.appendChild(h2CFOPFora);

    let headerCSONFora = document.createElement("div");
    headerCSONFora.classList.add("table-header");

    let h2CSONFora = document.createElement("h2");
    h2CSONFora.innerText = "CSON Fora do estado";
    headerCSONFora.appendChild(h2CSONFora);

    let bodyCFOPFora = document.createElement("div");
    bodyCFOPFora.classList.add("table-body");

    let spanCFOPFora = document.createElement("span");
    spanCFOPFora.innerText = cfopFora;
    bodyCFOPFora.appendChild(spanCFOPFora);

    let bodyCSONFora = document.createElement("div");
    bodyCSONFora.classList.add("table-body");

    let spanCSONFora = document.createElement("span");
    spanCSONFora.innerText = csonFora;
    bodyCSONFora.appendChild(spanCSONFora);

    // Adicionando elementos à tabela dentro do estado
    tabelaDentroEstado.appendChild(headerCFOPDentro);
    tabelaDentroEstado.appendChild(bodyCFOPDentro);
    tabelaDentroEstado.appendChild(headerCSONDentro);
    tabelaDentroEstado.appendChild(bodyCSONDentro);

    // Adicionando elementos à tabela fora do estado
    tabelaForaEstado.appendChild(headerCFOPFora);
    tabelaForaEstado.appendChild(bodyCFOPFora);
    tabelaForaEstado.appendChild(headerCSONFora);
    tabelaForaEstado.appendChild(bodyCSONFora);
}
