<?php 
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['idParametrizacao']) && !empty($_SESSION['idParametrizacao'])){ ?>
<div class="card h-100">

    <div class="card-header w-100 center">
        <h1><small>Etapa 5:</small> Em relação a entrada das mercadorias da empresa, qual a porcentagem de 0 a 100 que é mais utilizada nos produtos ?</h1>
    </div> <!-- card-header -->

    <div class="card-body w-100 center">
        <form class="center" id="form-cadastro-tributacao">

            <div class="row">
                <div class="col">
                    <div class="group-input">
                        <label for="cad_tributados">Tributados</label>
                        <input type="number" name="tributados" id="cad_tributados" require>
                    </div>
                </div>

                <div class="col">
                    <div class="group-input">
                        <label for="cad_st">Subst. Tributária</label>
                        <input type="number" name="st" id="cad_st" require>
                    </div>
                </div>

                <div class="col">
                    <div class="group-input">
                        <label for="cad_isento">Isento</label>
                        <input type="number" name="isento" id="cad_isento" require>
                    </div>
                </div>

                <div class="col">
                    <div class="group-input">
                        <label for="cad_outros">Outros</label>
                        <input type="number" name="outros" id="cad_outros" require>
                    </div>
                </div>


                <div class="group-botoes">
                    <button type="button" class="btn btn-danger">Voltar</button>
                    <button type="submit" class="btn btn-success">Próximo</button>
                </div>
            </div>

        </form>
    </div> <!-- card-body -->

</div> <!-- card -->

<script src="../../app/assets/js/Tributacao.Validacao.js"></script>
<script>
    (() => {
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelector('#form-cadastro-tributacao');
            for (input of inputs) {
                input.value = "0";

            }
        })
    })();
</script>
<?php }else{
    header('Location: ../../404.php');
    exit();
}