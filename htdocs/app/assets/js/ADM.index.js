(() => {
    let DadosEmpresas = [];
    const AddParametrizacao = document.getElementById("adicionar-parametrizacao");
    let AbrirModalVisualizar = document.getElementById("table-body-empresas");

    AddParametrizacao.addEventListener("click", () => {
        const Modal = document.getElementById("modal-cadastrar-empresa");
        Modal.style.display = "flex";
    });

    document.addEventListener("DOMContentLoaded", async () => {
        DadosEmpresas = await BuscarEmpresas();
        CriarTabelaEmpresas(DadosEmpresas);
    });

    AbrirModalVisualizar.addEventListener("dblclick", (e) => {
        let campo = e.target;
        let id = campo.parentNode.querySelector("div").id;
        console.log(id);
        AbrirModal(id, DadosEmpresas, "modal-visualizar-empresa");
    });

    document.getElementById("zerar-parametrizacao").addEventListener("click", async(e) => {
        e.preventDefault();
        const resposta = confirm("Deseja realmente zerar os parâmetros?");
        if (resposta) {
            const resp = await ZerarParametrizacao(document.getElementById("id-parametrizacao").value);
            if (resp) {
                alerta('success', 'Parametrização zerada com sucesso!');
                DadosEmpresas = await BuscarEmpresas();
                CriarTabelaEmpresas(DadosEmpresas);
            }else{
                alerta('danger', 'Erro ao zerar a parametrização!');
            }
        }
    });

})();

async function AbrirModal(id, arrayDados, modal) {

    if (modal === 'modal-visualizar-empresa') {

        for (let i = 0; i < arrayDados.length; i++) {
            if (arrayDados[i].id === id) {
                try {

                    const form = document.getElementById("form-empresa");
                    const inputs = form.querySelectorAll("input");

                    const valores = [
                        arrayDados[i].id,
                        arrayDados[i].NomeEmpresa,
                        arrayDados[i].Cpf_Cnpj_empresa,
                        arrayDados[i].RazaoSocial,
                        arrayDados[i].CpfCnpj,
                        arrayDados[i].Email,
                        arrayDados[i].Telefone,
                        arrayDados[i].NomeResponsavel,
                        arrayDados[i].usuario,
                        arrayDados[i].ModeloCertificado,
                        arrayDados[i].SenhaCertificado,
                        arrayDados[i].JaEmitiuNFCe,
                        arrayDados[i].JaEmitiuNFe,
                        arrayDados[i].JaEmitiuSat,
                        arrayDados[i].IraEmitirNFCe,
                        arrayDados[i].IraEmitirNFe,
                        arrayDados[i].IraEmitirSat,
                        arrayDados[i].UltimaNFCe,
                        arrayDados[i].UltimaNFe,
                    ];

                    // Itera pelos inputs e pelos valores simultaneamente
                    inputs.forEach((input, i) => {
                        if (valores[i] !== undefined) {
                            input.value = valores[i]; // Atribui o valor correspondente ao input
                        }
                    });

                } catch (error) {
                    console.error("Erro na requisição:", error);
                }
            }
        }
        const Modal = document.getElementById(modal);
        Modal.style.display = "flex";

    }else{
        const Modal = document.getElementById(modal);
        Modal.style.display = "flex";
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

            if (data.msg === "Não há registros") {
                return "Não há registros";
            } else {
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

        let divNomeEmpresa = document.createElement("div");
        divNomeEmpresa.className = "table-cell";
        divNomeEmpresa.textContent = dados[index].NomeEmpresa;
        divNomeEmpresa.id = dados[index].id;

        let divCpfCnpj = document.createElement("div");
        divCpfCnpj.className = "table-cell";
        divCpfCnpj.textContent = FormatarCpfCnpj(dados[index].Cpf_Cnpj_empresa);

        let divModoPreenchimento = document.createElement("div");
        divModoPreenchimento.className = "table-cell";
        let span = document.createElement("span");
        if (dados[index].ModoPreenchimento == "CRIADO") {
            span.className = "falso";
        } else if (dados[index].ModoPreenchimento == "PREENCHIDO") {
            span.className = "intermediario";
        } else if (dados[index].ModoPreenchimento == "FINALIZADO") {
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

async function ZerarParametrizacao(id) {
    const response = await fetch(`../../src/href/routes.php?idZerarParametrizacao=${id}`);
    const data = await response.json();
    if (data.status === "ok") {
        return true;
    }else{
        return false;
    }
}