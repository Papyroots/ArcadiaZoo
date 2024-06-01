<?php
require_once '../database/opinion/get_opinions.php';

require_once '../database/opinion/opinion.php';
require_once '../database/config_database.php';
?>

<div class="hero-scene text-center text-light">
    <div class="hero-text">
        <h1>Bienvenue</h1>
    </div>
</div>
<div class="container py-5">
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/zoo/zoo1.jpeg" class="card-img-top" alt="Image du zoo">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-light bg-primary">
                <div class="card-body">
                    <p class="card-text">Bienvenue à Arcadia, le zoo de Bretagne engagé pour l'autonomie énergétique
                        et l'écologie. Depuis 1960, nous prouvons qu'on peut prospérer tout en respectant la nature.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/zoo/zoo2.jpeg" class="card-img-top" alt="Image du zoo">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/zoo/zoo3.jpeg" class="card-img-top" alt="Image du zoo">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-center jose">
                <img src="../assets/zoo/jose.jpeg" class="rounded-circle img-fluid" alt="Portrait de jose">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-light bg-primary">
                <div class="card-body">
                    <p class="card-text">En visitant Arcadia, vous soutenez une vision où l'homme et la nature
                        coexistent en harmonie. Rejoignez-nous dans notre mission pour un avenir plus vert et plus
                        durable, où la santé de notre planète et de ses habitants est préservée pour les générations
                        futures.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-light bg-primary">
                <div class="card-body">
                    <p class="card-text">Découvrez nos habitats variés et nos pensionnaires heureux. Sous la
                        direction de José, nous œuvrons pour un avenir durable. Rejoignez-nous dans cette mission
                        écologique dès aujourd'hui !</p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/zoo/zoo4.jpeg" class="card-img-top" alt="Image du zoo">
            </div>
        </div>
    </div>
</div>


<article class="items-content-center opinions">
    <div class="column align-content-center ">

        <h3 class="text-center">Avis des visiteurs</h3>
        <div class="justify-content-center outer-div">
            <?php $opinions = getOpinions(); ?>
            <?php foreach ($opinions as $opinion): ?>
                <div class="opinion-list m-3 p-3 text-light bg-primary inner-div">
                    <p class="opinion-text">
                    <h4 class="text-start"><?= $opinion['nameVisitor'] ?></h4>
                    <h6 class="opinion-text"><?= $opinion['createdAt'] ?></h6>
                    <h6 class="opinion-text"><?= $opinion['visitorOpinion'] ?></h6>
                </div>
            <?php endforeach; ?>
        </div>
        <!--  <button id="load-more" onclick="loadMore()">Voir plus</button>
                 !-->
    </div>
    </div>
</article>




<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <h3 class="text-center">Laisser un avis</h3>
            <form action="../database/opinion/submit_opinion.php" method="POST">
                <div class="mb-3">
                    <label for="name_visitor" class="form-label">Votre pseudonyme</label>
                    <input type="text" class="form-control" id="name_visitor" name="name_visitor" required>
                </div>
                <div class="mb-3">
                    <label for="visitor_opinion" class="form-label">Votre Avis</label>
                    <textarea class="form-control" id="visitor_opinion" name="visitor_opinion" rows="3"
                        required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-warning btn-block text-dark"
                        value='submit_opinion'>Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>