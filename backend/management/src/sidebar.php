<nav id="sidebarMenu" class="m-0 col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="pt-5 pb-5 sidebar-sticky">
    
    <ul class="nav flex-column mt-5">

        <?php if(isset($_GET["2sts"])): ?>
            <li class="nav-item mt-2">
                <a class="nav-link active" href="<?php if(isset($_GET["2sts"])){ echo "../"; } ?>pages/admin.php?2sts">
                    <span data-feather="home" class="align-text-bottom"></span>
                    ACCEUIL
                </a>
            </li>
        <?php endif ?>

        <li class="nav-item mt-2">
            <a class="nav-link nav-l" href="<?php if(isset($_GET["2sts"])){ echo "../"; } ?>pages/article.php?2sts">
                <span> ARTICLE </span>
            </a>
        </li>

    </ul>



    <hr class="bg-dark">

    <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link item bgDc" href="<?php if(isset($_GET["2sts"])){ echo "../"; } ?>logic/logout.php">
                <span class="fa fa-power-off"></span>
                Déconnexion
            </a>
        </li>
    </ul>
    </div>
</nav>

<style>
    .bgDc {
        background: #e7cfcf;
    }
</style>