<?php
require 'includes/header.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$rq = $db->prepare('SELECT * FROM users WHERE username = "' . $_SESSION['username'] . '"');
$rq->execute();
$user = $rq->fetch();

var_dump($user);

?>
<h2>Mon profil</h2>
<div>
    <p>Mon pseudo: <?= $user['username'] ?></p>
    <p>Mon email: <?= $user['email'] ?></p>
    <p>Mon nombre de points de fidelité: <?= $user['fidelity_points'] ?></p>
</div>
<?php

require 'includes/footer.php';
?>