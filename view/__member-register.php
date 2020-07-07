<?php 
/**                                  Vue __member-register
*                                       Marc L. Harnist
*                                            2017
*/
if (isset($new_member)){?>
  <section>
    <p>Le membre: <span class="text-succes"><?=$new_member->name();?></span> de niveau <span class="text-succes"><?=$new_member->level();?></span> a bien été renregistré!<br> <a href="<?=$website->page_url;?>__member-index">Voir la liste des membres</a> <br> <a href="<?=$website->page_url;?>__admin-index">Admin index</a></p>
  </section>
  <?php
}
elseif(isset($message))
    echo $website::message("Petite erreur", $message->Red(), "pink");
else{?>
	<section>
		<header class="row bg-light p-3	">
			<h2 class="row ml-0 text-muted">Enregistrement d'un nouveau membre</h2> 
		</header>
		
    <section>
      <h3 class="h4">Bienvenue <span class="text-primary"><?=$member->name()?></span>. Enregistrer un membre?</h3>  
      <form action="#" method="post">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Choisissez un pseudo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="pseudo" required autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="pw" class="col-sm-2 col-form-label">Son mot de passe</label>
          <div class="col-sm-10">
            <input type="pw"  maxlength="250" class="form-control" name="pw" id="pw" placeholder="Mot de passe" required>
          </div>
        </div>
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Son niveau</legend>
            <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="level" id="level1" value="1">
              <label class="form-check-label" for="level1">1 Webmaster - Il peut ajouter des membres - tout faire</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="level" id="level2" value="2">
              <label class="form-check-label" for="level2">2 Propriétaire - Il peut modifier les pages du blog!</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="level" id="level3" value="3">
              <label class="form-check-label" for="level3">3 Modérateur</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="level" id="level4" value="4" checked>
              <label class="form-check-label" for="level4">4 Membre</label>
            </div>
            </div>
          </div>
        </fieldset>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="creer">Enregistrer</button>
          </div>
        </div>
      </form>
    </section>
    <?php
    }
?>