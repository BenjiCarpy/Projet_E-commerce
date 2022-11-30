<?php $title = 'Accueil'; ?>
<?php $style = 'home'; ?>
<?php $script = 'home'; ?>

<?php ob_start(); ?>

<main class="contenue">
    <div class="presente">
        <?php if (!empty($_SESSION['connectedUser'])): ?>
            <p>Hello <b><?= $_SESSION['connectedUser']['identifiant_utilisateur'] ?>.</b>
        <?php endif; ?>
        <h3 class="who">Votre boutique en ligne préférer est bientôt en ligne.</h3>
        <p class="asavoir">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate facilisis risus a tincidunt.
            Maecenas auctor arcu ut molestie facilisis.
            Mauris vitae sagittis massa. Aenean vestibulum interdum risus, eu scelerisque odio venenatis sed.
            Aliquam volutpat id mauris vitae efficitur. Mauris placerat tincidunt dolor id rhoncus.<br>
        </p>
            <button class = btnA><a href="catalogue.php">A venir...</a></button>
    </div>
            
    <div class="image">
        <img src="media/pc-hardware.png" alt="image">
    </div>
</main>
<section>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 m-auto w-50">
                <div class="owl-carousel owl-theme">
                <?php foreach ($categories as $category): ?>
                    <div class="item mb-4">
                        <div class="card shadow border-0">
                            <img src="<?= $category->getImageCategorie() ?>" alt="<?= $category->getNomCategorie() ?>" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4><?= $category->getNomCategorie() ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/../base.tpl.php'; ?>