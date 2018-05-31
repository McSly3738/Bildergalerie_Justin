<?php
if(isset($_SESSION['user_id'])):?>

<div class="content">
    <form action="/bilder/doAdd" method="post" enctype="multipart/form-data">

        <span class="titel"><?= $heading ?></span>
        <br><br>

        <label for="beschreibung" class="label">Beschreibung</label>
        <input id="beschreibung" name="beschreibung" type="text" class="textForm" required/>

        <label for="bildpfad" class="label">Bildpfad</label>
        <input type="file" name="fileToUpload" id="fileToUpload"class="textForm" required/>

        <input type="hidden" name="g_id" value="<?= $g_id ?>">
        <input id="send" name="send" value="Bild hinzufügen" type="submit" class="submitForm">

    </form>
</div>

<?php else: ?>
<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>
<?php endif ?>
