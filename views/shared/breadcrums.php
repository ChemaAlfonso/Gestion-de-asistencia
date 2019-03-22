
<div class="row">
    <div class="col-12">
        <nav class="breadcrumb text-white">
            <?php foreach( $breadcrums as $breadcrum ) : ?>
                <a class="breadcrumb-item" href="#"><?= $breadcrum == 'shared' ? 'Inicio' : ucfirst($breadcrum); ?></a>
            <?php endforeach; ?>
            <span class="breadcrumb-item active"></span>
        </nav>
    </div>
</div>