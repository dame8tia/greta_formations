


    </div> <!-- div container du header -->


    <footer>
        <!-- <div class="container d-flex flex-row mb-3"> -->
        <?php wp_nav_menu(
                    [
                        //'container' => false,
                        'container_class' => 'd-flex flex-row mb-3',
                        'theme_location' => 'footer',
                        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0' // class sur les ul
                    ]
                ) ;?>
        </div>
    </footer>
<?php wp_footer();?>

</body>
</html>