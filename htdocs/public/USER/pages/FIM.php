<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['idParametrizacao']) && !empty($_SESSION['idParametrizacao'])) { ?>

    <div class="card">

        <div class="card-header w-100 center">
            <h1><small>FIM:</small> Parametrização concluida!</h1>
        </div> <!-- card-header -->

        <div class="card-body w-100 center">
            <div class="row">
                <div class="col center">
                    <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExdDZsbDkyMzd4MW82bGFwMXVnNXcyOW9qMmg3bWdqZnE3Nzh3enI0bCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/7qYqbrMCM2T3PWxXhW/giphy.gif" alt="" >
                </div>
            </div>
        </div>
    <?php } else {
    header('Location: ../../404.php');
    exit();
}
