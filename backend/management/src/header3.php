<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 m-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"> Administration </a>
      
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="power-off px-2" type="button">
    <a href="<?php if(isset($_GET["2sts"])){ echo "../"; } ?>logic/logout.php" class="text-light">
        <i class="fa-solid fa-2x fa-power-off"></i>
    </a>
    </div>

    <style>
        .news {
            width: 100% !important;
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
        }

        .news .card {
            margin-right: 15px;
        }
        .status {
            width: 10px;
            height: 10px;
            border-radius: 5px;
            background-color: #2fad2f;
            margin-top: 5px;
        }
    </style>

</header>