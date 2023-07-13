<?php require_once '../../includes/head.php' ?>

<?php require_once '../../includes/sidebar.php' ?>

<main class="main-content">

    <?php require_once '../../includes/navbar.php' ?>

    <div class="container navbar-breadcrumb-pos-x navbar-breadcrumb-pos-y">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none;"
                                           href="/views/index.php">Главная</a></li>
            <li class="breadcrumb-item"><a style="text-decoration: none;"
                                           href="/views/category/category.php">Категории</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить категорию</li>
        </ol>
    </div>

    <div class="container-fluid">

        <form action="/database/connect.php" method="POST">

            <div class="row">
                <div class="col-4">
                    <label class="small fw-bold mt-2 mb-1" for="name">Название категории</label>
                    <div class="d-flex">
                        <input placeholder="Название категории"
                               class="form-control"
                               name="name"
                               type="text"
                               id="name">

                        <input class="btn btn-outline-primary ms-2"type="submit" value="Добавить">
                    </div>
                </div>
            </div>

        </form>
    </div>
</main>

<?php require_once '../../includes/foot.php' ?>

