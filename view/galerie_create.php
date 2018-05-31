<?php
if(isset($_SESSION['user_id'])): ?>

<div class="content">
    <form action="/galerie/doCreate" method="post" enctype="multipart/form-data">
        <span class="titel"><?= $heading ?></span><br><br>

        <label for="galeriename" class="label">Galeriename</label>
        <input id="galeriename" name="galeriename" type="text" class="textForm" required/>

        <label for="beschreibung" class="label">Beschreibung</label>
        <input id="beschreibung" name="beschreibung" type="text" class="textForm" required/>

        <label for="thumbnail" class="label">Thumbnail</label>
        <input type="file" name="fileToUpload" id="fileToUpload"class="textForm" required/>

        <label for="global" class="label">Öffentlich</label>
        <input type="checkbox" class='form' name="global" />
        <br><br>

        <input id="send" name="send" value="Erstellen" type="submit" class="submitForm">

        <div class="fehlermeldung">
            <p><?php $fehlermeldung?></p>
        </div>
    </form>

</div>

<?php else: ?>

<div class="content">
    <h2 class="u_titel">Du bist nicht eingeloggt!</h2>
</div>

<?php endif ?>
