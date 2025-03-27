(()=>{
    let DadosEmpresas = [];
    const AddParametrizacao = document.getElementById("adicionar-parametrizacao");
    let AbrirModalVisualizar = document.getElementById("table-body-empresas");

    AddParametrizacao.addEventListener("click", ()=>{
        const Modal = document.getElementById("modal-cadastrar-empresa");
        Modal.style.display = "flex";
    });

    document.addEventListener("DOMContentLoaded", async () => {
        DadosEmpresas = await BuscarEmpresas();
        CriarTabelaEmpresas(DadosEmpresas);
    });

    AbrirModalVisualizar.addEventListener("dblclick", (e)=>{
        console.log(e.target);
    });


})();

async function AbrirModal(id) {
    const Modal = document.getElementById("modal-visualizar-empresa");
    Modal.style.display = "flex";

    try {
        const response = await fetch(`../../src/href/routes.php?idVisualizarParametrizacao=${id}`);
        const data = await response.json();

        if (data.status === "ok") {
            const form = document.getElementById("form-empresa");
            const inputs = form.querySelectorAll("input");
           
            const valores = [
                data.msg.NomeEmpresa,
                data.msg.Cpf_Cnpj_empresa,
                data.msg.RazaoSocial,
                data.msg.CpfCnpj,
                data.msg.Email,
                data.msg.Telefone,
                data.msg.NomeResponsavel,
                data.msg.usuario,
                data.msg.ModeloCertificado,
                data.msg.SenhaCertificado,
                data.msg.JaEmitiuNFCe,
                data.msg.JaEmitiuNFe,
                data.msg.JaEmitiuSat,
                data.msg.IraEmitirNFCe,
                data.msg.IraEmitirNFe,
                data.msg.IraEmitirSat,
                data.msg.UltimaNFCe,
                data.msg.UltimaNFe,
            ];
    
            // Itera pelos inputs e pelos valores simultaneamente
            inputs.forEach((input, index) => {
                if (valores[index] !== undefined) {
                    input.value = valores[index]; // Atribui o valor correspondente ao input
                }
            });

        } else {
            console.error("Erro ao carregar os dados:", data.msg);
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
    }
}

function FecharModal(id) {
    const Modal = document.getElementById(id);
    Modal.style.display = "none";
}

async function BuscarEmpresas() {
    try {
        const response = await fetch(`../../src/href/routes.php?idVisualizarParametrizacao=todos`);
        const data = await response.json();
        let DadosEmpresas = [];
        if (data.status === "ok") {

            if (data.msg === "Não há registros"){
                return "Não há registros";
            }else{
                for (let index = 0; index < data.msg.length; index++) {
                    DadosEmpresas.push(data.msg[index]);
                }

                return DadosEmpresas;
            }
            
        } else {
            console.error("Erro ao carregar os dados:", data.msg);
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
    }
}

function CriarTabelaEmpresas(dados) {
    let tbody = document.getElementById("table-body-empresas");
    tbody.innerHTML = ""; // Limpa o conteúdo anterior

    for (let index = 0; index < dados.length; index++) {
        let divRow = document.createElement("div");
        divRow.className = "table-row";
        divRow.id = dados[index].id;

        let divNomeEmpresa = document.createElement("div");
        divNomeEmpresa.className = "table-cell";
        divNomeEmpresa.textContent = dados[index].NomeEmpresa;

        let divCpfCnpj = document.createElement("div");
        divCpfCnpj.className = "table-cell";
        divCpfCnpj.textContent = FormatarCpfCnpj(dados[index].Cpf_Cnpj_empresa);

        let divModoPreenchimento = document.createElement("div");
        divModoPreenchimento.className = "table-cell";
        let span = document.createElement("span");
        if (dados[index].ModoPreenchimento == "CRIADO"){
            span.className = "falso";
        }else if (dados[index].ModoPreenchimento == "PREENCHIDO"){
            span.className = "intermediario";
        }else if (dados[index].ModoPreenchimento == "FINALIZADO"){
            span.className = "verdadeiro";
        }
        
        span.textContent = dados[index].ModoPreenchimento;
        divModoPreenchimento.appendChild(span);

        // Adiciona os elementos ao tbody
        tbody.appendChild(divRow);
        divRow.appendChild(divNomeEmpresa);
        divRow.appendChild(divCpfCnpj);

        divRow.appendChild(divModoPreenchimento);
    }
}