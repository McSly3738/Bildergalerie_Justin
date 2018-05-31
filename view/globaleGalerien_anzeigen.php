<?php ?>

<div class="content">
    <span class="titel"><?= ($heading); ?>
</div>

<?php if (empty($galerien)): ?>
        <div class="content">
            <h3 class="u_titel">Diese Galerie hat noch keine Bilder!</h3>
        </div>
<?php else:?>
    <?php foreach ($galerien as $galerie): ?>
        <?php $endpfad = "/$galerie->bildpfad"?>
        <div class="content">
            <div style="float: left;">
                <div>
                    <h2 class="u_titel"><?=($galerie->galeriename);?></h2>
                    <p class="u_titel">Beschreibung: <?= ($galerie->beschreibung);?></p><br>
                    <!--<p class="u_titel">Username: <//?= ($userinfos->username);?></p>-->
                </div>
                <div style="width: 250px; float: left;">
                    <a title="spieler" href="/bilder/globaleBilder?id=<?= $galerie->id ?>"><div class="submitForm"><i class="fas fa-users"></i> Bilder</div></a>
                </div>
            </div>
            <img src="<?= $endpfad;?>" style="max-height: 40%;max-width: 40%; padding-top: 2%;">
            <div style="clear: both;"></div>

        </div>
    <?php endforeach ?>
<?php endif;?>
