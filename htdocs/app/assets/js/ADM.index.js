(() => {
    let DadosEmpresas = [];
    let DadosParametrizacao = [];
    const AddParametrizacao = document.getElementById("adicionar-parametrizacao");
    let AbrirModalVisualizar = document.getElementById("table-body-empresas");

    AddParametrizacao.addEventListener("click", () => {
        const Modal = document.getElementById("modal-cadastrar-empresa");
        Modal.style.display = "flex";
    });

    document.addEventListener("DOMContentLoaded", async () => {
        DadosParametrizacao = await BuscarParametrizacao();
        CriarTabelaEmpresas(DadosParametrizacao);
    });

    document.getElementById("adicionar-parametrizacao").addEventListener("click", async (e) => {
        e.preventDefault();
        DadosEmpresas = await BuscarEmpresas();
        if (DadosEmpresas) {
            PreenchimentoBuscaEmpresa(DadosEmpresas.msg);
        }
    });

    document.getElementById("list-empresa").addEventListener("click", (e) => {
        let select = e.target;
        let input = document.getElementById("form-empresa-nome");
        input.value = select.textContent;
        document.getElementById("form-empresa-cnpj").value = FormatarCpfCnpj(select.getAttribute("cnpj"));
        document.getElementById("idEmpresa").value = select.getAttribute("id")
        document.querySelector(".list-empresa").style.display = "none";
    });

    document.getElementById("form-empresa-nome").addEventListener("input", async (e) => {
        let text = e.target.value;
        let resultados = [];
        if (text !== "") {
            document.querySelector(".list-empresa").style.display = "flex";
            resultados = DadosEmpresas.msg.filter((empresa) =>
                empresa.NomeEmpresa.toLowerCase().includes(text));
            PreenchimentoBuscaEmpresa(resultados)
        } else {
            document.querySelector(".list-empresa").style.display = "none";
        }
    });

    AbrirModalVisualizar.addEventListener("dblclick", (e) => {
        let campo = e.target;
        let id = campo.parentNode.querySelector("div").id;
        if (id !== undefined && id !== "" && id !== null && id !== 0) {
            AbrirModal(id, DadosParametrizacao, "modal-visualizar-empresa");
        }
    });

    document.getElementById("zerar-parametrizacao").addEventListener("click", async (e) => {
        e.preventDefault();
        const resposta = confirm("Deseja realmente zerar os parâmetros?");
        if (resposta) {
            const resp = await ZerarParametrizacao(document.getElementById("id-parametrizacao").value);
            if (resp) {
                alerta('success', 'Parametrização zerada com sucesso!');
                DadosParametrizacao = await BuscarParametrizacao();
                CriarTabelaEmpresas(DadosParametrizacao);
            } else {
                alerta('danger', 'Erro ao zerar a parametrização!');
            }
        }
    });

    document.getElementById("gerar-link-parametrizacao").addEventListener("click", async (e) => {
        e.preventDefault();
        const idEmpresa = document.getElementById("idEmpresa").value;
        
        const response = await fetch(`../../src/href/routes.php?idGerarLinkParametrizacao=${idEmpresa}`);
        if (response.ok) {
            const responseRetorno = await response.json();
            if (responseRetorno.status === "ok") {
                const idLink = responseRetorno.msg
                document.getElementById("link").value = "";
            }
            alerta("success",'Link gerado com sucesso!');
        } else {
            alerta('danger', 'Erro ao gerar o link!');
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

    } else {
        const Modal = document.getElementById(modal);
        Modal.style.display = "flex";
    }
}

function FecharModal(id) {
    const Modal = document.getElementById(id);
    Modal.style.display = "none";
}

async function BuscarParametrizacao() {
    try {
        const response = await fetch(`../../src/href/routes.php?idVisualizarParametrizacao=todos`);
        const data = await response.json();
        let DadosParametrizacao = [];
        if (data.status === "ok") {

            if (data.msg === "Não há registros") {
                return "Não há registros";
            } else {
                for (let index = 0; index < data.msg.length; index++) {
                    DadosParametrizacao.push(data.msg[index]);
                }

                return DadosParametrizacao;
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
    } else {
        return false;
    }
}

async function BuscarEmpresas() {
    const Empresas = await fetch("../../src/href/routes.php?Empresas=todos");
    const ResEmpresas = await Empresas.json();
    if (ResEmpresas.status === "ok") {
        if (ResEmpresas.msg.length > 0) {
            return ResEmpresas;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

async function PreenchimentoBuscaEmpresa(valores) {
    let list = document.getElementById("list-empresa");
    list.innerHTML = "";
    for (let index = 0; index < valores.length; index++) {
        let li = document.createElement("li");
        li.textContent = valores[index].NomeEmpresa;
        li.setAttribute("cnpj", valores[index].Cpf_Cnpj);
        li.setAttribute("id", valores[index].id);
        li.classList.add("list-item");
        list.appendChild(li);
    }
}