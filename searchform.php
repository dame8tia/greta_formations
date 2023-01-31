<form class="d-flex" role="search" action="<?= esc_url(home_url('/'));?>">
    <input class="form-control me-2" name="s" type="search" placeholder="Rechercher" aria-label="Search" value= "<?php get_search_query();?>">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>