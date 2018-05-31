<?php ?>

<div class="content">
  
    <span class="titel"><?= ($heading); ?>
</div>

<?php if (empty($bilder)): ?>
        <div class="content">
            <h3 class="u_titel">Diese Galerie hat noch keine Bilder!</h3>
        </div>
<?php else:?>
    <?php foreach ($bilder as $bild): ?>
        <?php $endpfad = "/$bild->bildpfad"?>
        <div class="content">
            <h2 class="u_titel_bilder"><?=($bild->beschreibung); ?></h2>
            <br>
            <div class="spielerBild">
                <img src="<?= $endpfad;?>">
            </div>
            <div class="contentcrud">
                <a target="_blank" href="<?= $endpfad;?>" id="bottle" ><button class="myBtn"><div style="width: 100%;"></div>Ganzes Bild</button></a>
            </div>
        </div>
    <?php endforeach ?>
<?php endif;?>
