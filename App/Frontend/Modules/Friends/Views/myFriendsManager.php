<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
  <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Mes amis</h5>
</div>
<form method="POST" action="" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto text-center">
<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
    <button type='submit' class='btn col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6' name="myFriendsList">Afficher ma liste d'amis</button>
    </div>
</form>
<?php
if(!empty($myFriendsListRequest)) {
foreach ($myFriendsListRequest as $myFriendsRequest) {
?>
    <div class='card col-xl-6 col-lg-6 col-md-6 col-sm-6 m-auto'>
        <span><?= htmlspecialchars($myFriendsRequest['users_name']) ?></span>
        <a class="btn col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" href="Deleted-Friends-<?= htmlspecialchars($myFriendsRequest['friends_request_idFK']) ?>.html">Supprimer cette amis de la lsite</a>
    </div>
    <?php
}
}
if(!empty($myFriendsListReceive)) {
foreach ($myFriendsListReceive as $myFriendsReceive) {
?>
    <div class='card col-xl-6 col-lg-6 col-md-6 col-sm-6 m-auto'>
        <span><?= htmlspecialchars($myFriendsReceive['users_name']) ?></span>
        <a class="btn col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" href="Deleted-Friends-<?= htmlspecialchars($myFriendsReceive['friends_request_idFK']) ?>.html">Supprimer cette amis de la lsite</a>
    </div>
    <?php
}
}
if(!empty($friendsRequestReceiveList)) {
foreach ($friendsRequestReceiveList as $friendsRequestReceive) {
?>
    <div class='container mb-3'>
        <span class='text-uppercase text-white'>Mes demande d'amis reçus </span>
            <div class='card col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-1 p-2'>
                <span>Demande de : <?= htmlspecialchars($friendsRequestReceive['users_name']) ?></span>
                <a class="btn col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" href="Accepte-Friends-Request-Receive-<?= htmlspecialchars($friendsRequestReceive['friends_request_idFK'])?>.html">Accepter la demande d'amis</a>
            </div>
    </div>
<?php 
}
} else { 
?>
    <div class='container mb-3'>
        <span class='text-uppercase text-white'>Aucune demande d'amis</span>
    </div>
<?php
}
?>