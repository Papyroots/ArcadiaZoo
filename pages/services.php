<?php require_once ("../database/config_database.php"); ?>
<?php require_once ("../database/service/getservice.php"); ?>



<div class="hero-scene text-center text-light">

    <div class="hero-scene-content">
        <div class="hero-text">
            <h1>Les services</h1>
        </div>

    </div>
</div>
<section>
    <?php $services = getServices(); ?>
    <?php foreach ($services as $service): ?>


        <h3 class="card-title">
            <?= $service->getNameService(); ?>
        </h3>
        <div class="card">
            <p class="card-text m-3"><?= $service->getDescriptionService(); ?></p>
        </div>

        <h1> </h1>
    </section>
<?php endforeach; ?>
</div>