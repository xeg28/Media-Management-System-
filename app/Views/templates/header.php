<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/javascript/dropzone.min.js"></script>
    <script src="public/javascript/jquery-3.5.1.slim.min.js"></script>
    <script src="public/javascript/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="public/css/dropzone.min.css" /> 
    <link rel="stylesheet" type="text/css" href="public/css/style.css?version=<%= Common.GetVersion%" /> 
    <link rel="shortcut icon" href="public/cat.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <title><?php echo $title; ?></title>
</head>
<body>

<!-- This script prevents a user from submiting an empty form  -->
<script>
    document.addEventListener('submit', function(event) {
        var target = event.target;
        var elements = target.elements;
        for(let i = 0; i < elements.length; i++) {
            var element = elements[i];
            var value = element.value.trim();
            if(value === '' && element.classList.contains('field')) {
                event.preventDefault();
            }
        }     
        return;
    });
    $(document).ready(function() {
        $(".error-btn").click(function() {
            $(this).closest(".error-msg").hide();
        });

        $(".success-btn").click(function() {
            $(this).closest(".success-msg").hide();
        })
    });


    document.addEventListener('click', function(event) {
        var target = event.target;
        if(target.classList.contains('home-shortcut')) {
            location.assign('<?=base_url('home')?>');
      }
    });
</script>

<?php if($title == 'Home') {
    ?> <script src='public/javascript/views/home.js'></script>
<?php } if($title == 'Image') { 
    ?> <script src='public/javascript/views/image.js'></script>
<?php } if($title == 'Audio') { 
    ?> <script src='public/javascript/views/audio.js'></script>
<?php } if($title == 'Video') { 
    ?> <script src='public/javascript/views/video.js'></script>
<?php } if($title == 'Search Results') { 
    ?> <script src='public/javascript/views/search.js'></script>
<?php } ?>
    

<?php if (isset($showNavbar) && $showNavbar): ?>
    <?php
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img class="home-shortcut mx-3 navbar-brand" src="public/cat.png" alt="Cat" style="width: 70px; height: auto;">
    <button class="navbar-toggler mx-3" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-3" id="navbarText">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
            <li class="nav-item <?php if($current_page == 'home') {echo 'active';} ?>">
                <a class="nav-link" href="<?=base_url('/home')?>">Home</a>
            </li>
            <li class="nav-item <?php if($current_page == 'image') {echo 'active';} ?>">
                <a class="nav-link" href="<?=base_url('image')?>">Image</a>
            </li>
            <li class="nav-item <?php if($current_page == 'audio') {echo 'active';} ?>">
                <a class="nav-link" href="<?=base_url('/audio')?>">Audio</a>
            </li>
            <li class="nav-item <?php if($current_page == 'video') {echo 'active';} ?>">
                <a class="nav-link" href="<?=base_url('/video')?>">Video</a>
            </li>
            <a class="nav-item nav-link d-lg-none" href="<?=base_url('/logout')?>">Logout</a>
            <form class="d-lg-none d-flex" action="<?=base_url()?>/search" method="get">
                <div class="input-group">
                    <input type="search" class="form-control field" name="query" placeholder="Search..." aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
           
        </ul>
    </div>

    <form class="d-none d-lg-block" action="<?=base_url()?>/search" method="get">
        <div class="input-group">
            <input type="search" class="form-control field" name="query" placeholder="Search..." aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    
     <a class="nav-item nav-link px-5 d-none d-lg-block" href="<?=base_url('/logout')?>">Logout</a>


</nav>

<?php endif; ?>

