
<?php if(isset($_SESSION['user_id'])):
if(!isset($_GET['id'])): ?>
    <div class="content">
        <h3 class="u_titel">Diese Galerie hat noch keine Bilder!</h3>
    </div>
<?php else: ?>

<div class="content">
    <span class="titel"><?=($heading); ?> von <?=($galerie->galeriename); ?></span>
    <a title="bilder" href="/bilder/add?id=<?=$g_id?>"><div style="float: right; width: 200px;" class="submitForm">Bilder hinzufügen</div></a>
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
                <a href="/bilder/delete?bid=<?=$bild->id?>&id=<?=$galerie->id;?>"><div style="width: 100%;" class="submitForm"><i class="far fa-trash-alt"></i> Löschen</div></a>                <br/>
                <a href="/bilder/update?bid=<?=$bild->id?>&id=<?=$galerie->id;?>"><div style="width: 100%;" class="submitForm"><i class="far fa-edit"></i> Bearbeiten</div></a>
            </div>
        </div>
    <?php endforeach ?>
<?php endif;?>

<?php endif; ?>
<?php else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif; ?>
