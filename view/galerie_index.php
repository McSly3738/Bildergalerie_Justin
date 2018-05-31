
<?php
if(isset($_SESSION['user_id'])):?>
    <div class="content">
        <span class="titel">User: <?= ($user->username); ?></span><br>
    </div>


    <?php if (empty($user)): ?>
        <div class="content">
            <h2 class="item title">Hoopla! Alles ist leer!</h2>
        </div>
    <?php endif ?>
    <?php if (empty($galerien)): ?>

        <div class="content">
            <h2 class="u_titel">Hoopla! Es sind noch keine Galerien vorhanden!</h2>
        </div>

    <?php else: ?>

        <div class="content">
            <span class="titel"><?= $heading2?></span>
        </div>

         <?php foreach ($galerien as $galerie): ?>
            <?php $endpfad = "/$galerie->bildpfad"?>
        <div class="content">
            <div style="float: left;">
                <div>
                    <h2 class="u_titel"><?=($galerie->galeriename);?></h2>
                    <p class="u_titel">Beschreibung: <?= ($galerie->beschreibung);?></p>
                </div>
                <div style="width: 250px; float: left;">
                    <a title="Löschen" href="/galerie/delete?id=<?= $galerie->id ?>"><div class="submitForm"><i class="far fa-trash-alt"></i> Löschen</div></a>
                    <a title="spieler" href="/bilder/anzeigen?id=<?= $galerie->id ?>"><div class="submitForm"><i class="fas fa-users"></i> Bilder</div></a>
                    <a title="spieler" href="/galerie/update?id=<?= $galerie->id ?>"><div class="submitForm"><i class="far fa-edit"></i> Galerie bearbeiten</div></a>
                </div>
            </div>
            <img src="<?= $endpfad;?>" style="max-height: 40%;max-width: 40%; padding-top: 2%;">
            <div style="clear: both;"></div>

        </div>
        <?php endforeach ?>
    <?php endif ?>
    <?php else:?>
        <div class="content">
            <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
        </div>
<?php endif ?>
