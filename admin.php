<?php
require 'includes/header.php';
?>
<h2>Page Administrateur</h2>
<div class="admin-btn-group">
    <button class="admin-btn" onclick="window.location.href = 'clientadmin.php'">Clients</button>
    <button class="admin-btn" onclick="window.location.href = 'entrepriseadmin.php'">Entreprise</button>
    <button class="admin-btn" onclick="window.location.href = 'produitsadmin.php'">Produits</button>
</div>

<?php
require 'includes/footer.php';
