<?php
if(isset($_SESSION['user_id'])):

header('Location: /user/meinVerein');
else: ?>

<div class="content">
    <span class="titel"><?= $heading ?></span>
</div>

<?php if (empty($users)): ?>
    <div class="content">
        <h2 class="u_titel">Hoopla! Es sind noch keine Vereine vorhanden!</h2>
    </div>
<?php else: ?>
    <?php foreach ($users as $user): ?>
        <div class="content">
            <div style="float: left;">
                <h2 class = "u_titel">Username: <?= " " .$user->username ;?></h2><br>
                <h3 class="u_titel"> Email: <a class="link" href="mailto:<?= $user->mail;?>"><?= $user->mail;?></a></h3><br>
                <a href="/galerie/globalGalerieUser?email=<?=$user->mail?>"><div style="width: 200px;" class="submitForm"><i class="fas fa-images"></i> Zu den Galerien</div></a>
            </div>

            <div style="clear: both;"></div>
        </div>
    <?php endforeach ?>
<?php endif ?>
<?php endif ?>

