<?php 
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['idParametrizacao']) && !empty($_SESSION['idParametrizacao'])){ ?>
<div class="card">

    <div class="card-header w-100 center">
        <h1><small>Etapa 2:</small> Modelo Certificado</h1>
    </div> <!-- card-header -->

    <div class="card-body w-100 center">
        <form class="center" id="form-cadastro-modelo-certificado" method="post" enctype="multipart/form-data">

            <div class="group-input-check">
                <input type="checkbox" name="ModeloCertificado" id="cad_modelo_a1" require>
                <label for="cad_modelo_a1" class="check-lembrar">Certificado A1</label>
            </div>

            <div class="group-input-check">
                <input type="checkbox" name="ModeloCertificado" id="cad_modelo_a3_token" require>
                <label for="cad_modelo_a3_token" class="check-lembrar">Certificado A3 TOKEN</label>
            </div>

            <div class="group-input-check">
                <input type="checkbox" name="ModeloCertificado" id="cad_modelo_a3_cartao" require>
                <label for="cad_modelo_a3_cartao" class="check-lembrar">Certificado A3 CARTÃO</label>
            </div>

            <div class="group-input" id="file-certificado" style="display: none;">
                <label for="cad_certificado" class="file-drop-zone">
                    Arraste e solte o arquivo aqui ou clique para selecionar
                    <input type="file" name="certificado" id="cad_certificado" accept=".pfx,.p12">
                </label>
                <span id="file-name" class="file-name">Nenhum arquivo selecionado</span>
                <input type="text" name="senha_certificado" id="cad_senha_certificado" placeholder="Senha do certificado">
            </div>

            <div class="group-botoes">
                <button type="button" class="btn btn-danger">Voltar</button>
                <button type="submit" class="btn btn-success">Próximo</button>
            </div>

        </form>
    </div> <!-- card-body -->

</div> <!-- card -->

<script>
        (() => {
        const fileInput = document.getElementById("cad_certificado");
        const dropZone = document.querySelector(".file-drop-zone");
        const fileNameDisplay = document.getElementById("file-name");
    
        // Atualiza o nome do arquivo selecionado
        fileInput.addEventListener("change", () => {
            const file = fileInput.files[0];
            if (file) {
                fileNameDisplay.textContent = file.name;
                fileNameDisplay.classList.add("selected");
            } else {
                fileNameDisplay.textContent = "Nenhum arquivo selecionado";
                fileNameDisplay.classList.remove("selected");
            }
        });
    
        // Gerencia o evento de arrastar e soltar
        dropZone.addEventListener("dragover", (event) => {
            event.preventDefault();
            dropZone.classList.add("dragging");
        });
    
        dropZone.addEventListener("dragleave", () => {
            dropZone.classList.remove("dragging");
        });
    
        dropZone.addEventListener("drop", (event) => {
            event.preventDefault();
            dropZone.classList.remove("dragging");
    
            const file = event.dataTransfer.files[0];
            if (file && (file.name.endsWith(".pfx") || file.name.endsWith(".p12"))) {
                fileInput.files = event.dataTransfer.files;
                fileNameDisplay.textContent = file.name;
                fileNameDisplay.classList.add("selected");
            } else {
                alerta("danger", "Por favor, selecione um arquivo válido (.pfx ou .p12).");
            }
        });
    })();
</script>

<script src="../../app/assets/js/ModeloCertificado.Validacao.js"></script>
<?php }else{
    header('Location: ../../404.php');
    exit();
}