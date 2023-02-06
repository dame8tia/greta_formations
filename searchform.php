
<form class="d-flex" role="search" method= "get" action="<?= esc_url(home_url('/'));?>">
    <p><?= esc_url(home_url('/'));?></p>
    <input class="form-control me-2" name="s" type="search" placeholder="Rechercher" aria-label="Search" value= "<?= get_search_query();?>">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>