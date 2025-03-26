(()=>{
    const AddParametrizacao = document.getElementById("adicionar-parametrizacao");

    AddParametrizacao.addEventListener("click", ()=>{
        const Modal = document.getElementById("modal-cadastrar-empresa");
        Modal.style.display = "flex";
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