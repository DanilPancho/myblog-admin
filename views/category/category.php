<?php require_once '../../includes/head.php' ?>

<?php require_once '../../includes/sidebar.php' ?>

<main class="main-content">

    <?php require_once '../../includes/navbar.php' ?>

    <div class="container navbar-breadcrumb-pos-x navbar-breadcrumb-pos-y">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none;" href="/views/index.php">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категории</li>
        </ol>
    </div>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-end me-2">
            <a href="/views/category/category-create.php" class="btn btn-primary">Добавить категорию</a>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>

