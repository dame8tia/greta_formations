<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <header class= "header-bcg">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="https://localhost/wordpress-6.1.1-fr_FR/wordpress/wp-content/uploads/2023/01/LOGO.jpg" alt="" width =180px height=80px>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php wp_nav_menu(
                        [
                            'container' => false,
                            'theme_location' => 'header',
                            'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0' // class sur les ul
                        ]
                    ) ;?>
                <?= get_search_form();?>
                </div>

            </div>
        </nav>
    </header>
    <div class="container">
        
    
    

