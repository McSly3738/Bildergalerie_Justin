<?php
if(isset($_SESSION['user_id'])):

if(!isset($_GET['bid']) && !isset($_GET['id'])): ?>
<div class="content">
    <div class="u_titel">Link nicht verfügbar!</div>
</div>

<?php else: ?>

<div class="content">
    <form action="/bilder/doUpdate?bid=<?= $bid ?>&id=<?= $g_id ?>" method="post" enctype="multipart/form-data">
        <div class="titel"><?= $heading ?></div>


        <label for="beschreibung" class="label">Beschreibung</label>
        <input id="beschreibung" name="beschreibung" type="text" value="<?= $bilder->beschreibung ?>" class="textForm" required/>

        <label for="fileToUpload" class="label">Bildpfad</label>
        <input type="file" name="fileToUpload" id="fileToUpload" class="textForm" required/>

        <input id="send" name="send" value="Bearbeiten" type="submit" class="submitForm">


    </form>
</div>

<?php endif; else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
