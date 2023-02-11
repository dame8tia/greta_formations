
<form class="d-flex" role="search" method= "get" action="<?php echo home_url('/');?>">
    <!-- get_template_directory_uri() -->
    <p><?= esc_url(home_url('/'));?></p>
    <input class="form-control me-2" name="s" type="search" placeholder="Rechercher" aria-label="Search" value= "<?= get_search_query();?>">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>