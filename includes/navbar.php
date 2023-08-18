<div class="border">
    <nav class="navbar navbar-expand-lg" data-bs-theme="light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-end" id="navbarColor03">
                <div class="d-flex">
                    <?php if ($GLOBALS['page'] === 'personal'): ?>
                        <a href="/views/main.php"
                           style="text-decoration: none"
                           class="btn me-3 btn-outline-primary">

                            Главная

                        </a>
                    <?php else: ?>
                        <a href="/views/personal/index.php"
                           style="text-decoration: none"
                           class="btn me-3 btn-outline-primary">

                            Личный кабинет

                        </a>
                    <?php endif ?>
                </div>
                <div class="d-flex">
                    <a href="/views/logout.php"
                       class="btn btn-outline-primary">

                        Выйти

                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
