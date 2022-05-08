<?php
require 'includes/header.php';
?>
<div class="table-gere">
  <div class="form formPartner">
    <div class="container">
      <form action="verifpartner.php" method="post">
        <div class="mb-4">
          <label class="form-label">Le nom de votre entreprise</label>
          <input class="form-control" type="text" name="name" placeholder="Votre entreprise">
        </div>
        <div class="mb-4">
          <label class="form-label">Votre email</label>
          <input class="form-control" type="email" name="email" placeholder="Votre email">
        </div>
        <div class="mb-4">
          <label class="form-label">Confirmer votre email</label>
          <input class="form-control" type="email" name="email2" placeholder="Confirmer votre email">
        </div>
        <div class="mb-4">
          <label class="form-label">Votre mot de passe</label>
          <input class="form-control" type="password" name="password" placeholder="Votre mot de passe">
        </div>
        <div class="mb-4">
          <label class="form-label">Confirmer votre mot de passe</label>
          <input class="form-control" type="password" name="password2" placeholder="Confirmer Votre mot de passe">
        </div>
        <div class="mb-4">
          <label class="form-label">Rentrez votre numéro de TVA intracommunautaire</label>
          <select class="form-select" aria-label="Default select example" name="country">
            <option selected>Choisir votre pays</option>
            <option value="AT">AT</option>
            <option value="BG">BG</option>
            <option value="HR">HR</option>
            <option value="CY">CY</option>
            <option value="CZ">CZ</option>
            <option value="DK">DK</option>
            <option value="FE">EE</option>
            <option value="FI">FI</option>
            <option value="FR">FR</option>
            <option value="DE">DE</option>
            <option value="GR">GR</option>
            <option value="HU">HU</option>
            <option value="IE">IE</option>
            <option value="IT">IT</option>
            <option value="LV">LV</option>
            <option value="LT">LT</option>
            <option value="LU">LU</option>
            <option value="MT">MT</option>
            <option value="NL">NL</option>
            <option value="PL">PL</option>
            <option value="PT">PT</option>
            <option value="RO">RO</option>
            <option value="SK">SK</option>
            <option value="SI">SI</option>
            <option value="ES">ES</option>
            <option value="SE">SE</option>
            <option value="GB">GB</option>
          </select>
          <br>
          <select class="form-select" name="digit">
            <option selected>Choisir votre clé informatique</option>
            <option value="00">00</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <?php
            for ($i = 10; $i < 100; $i++) {
              echo "<option value=" . $i . ">" . $i . "</option>";
            } ?>
          </select>
          <br>
          <input class="form-control" type="text" max="999999999" name="siren" placeholder="Votre siren">
        </div>
        <div class="mb-4">
          <input class="btn btn-primary" type="submit" value="S'inscrire">
        </div>
      </form>
    </div>
  </div>
</div>  a
<?php
require 'includes/footer.php';
