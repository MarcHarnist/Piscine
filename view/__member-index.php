<article>
  <header class="row bg-light p-3 ">
    <h2 class="row ml-0 text-muted">Index des membres</h2>
  </header>   
  <div class="col-sm-12 mt-3">

    <!-- ************************ AJOUTER UN MEMBRE ******************* -->
	<p><a title="Ajouter un membre" href="<?=$website->page_url;?>__member-register">Ajouter un membre</a></p>

    <!-- ************************ AFFICHAGE UPDATE ******************* -->
    <table class="table table-striped"><!-- Bootstrap class -->
      <tr>
        <th>Id </th>
        <th>Name</th>
        <th>Password</th>
        <th>Level</th>
        <th colspan="2">Action</th>
      </tr>
          <?php
		  // var_dump($datas);
		// die();

          // Langage moderne en POO avec paanaim Nekudetaïm (::) et FETCH_ASSOC 
          foreach($datas as $data){?>  
      <tr id="<?php $ancre=$count; echo $ancre; $count++;?>">
          <!-- id du formulaire supprimés: leur duplication != valid html5 --> 
          <form method="post" action="<?= $website->page_url;?>__member-update">
			  <td>
				<input type="text" size="1" name="new_id" value="<?=$data['id'];?>">
				<input type="hidden" name="id" value="<?=$data['id'];?>"><!-- on sauve la valeur de l'ancien id-->
			  </td>
			  <td>
				<input type="text" name="name" value="<?=$data['name']?>">
			  </td>
			  <td>
				<input type="text" size="50" name="password" value="<?=$data['password']?>">
			  </td>
			  <td>
				<input type="text" size="1" name="level" value="<?=$data['level']?>">
			  </td>
			  <td class="center">
				<input type="hidden" name="ancre" value="<?php echo $ancre;?>">
				<input type="hidden" name="operation" value="update">
				<input type="submit" value="Edit">
			  </td>
		  </form>
				<td class="center"><span class="center">
					<form method="post" action="<?= $website->page_url;?>__member-delete">
					  <input type="hidden" name="id" value="<?=$data['id'];?>">
					  <input type="hidden" name="ancre" value="<?=$ancre;?>">
					  <input type="hidden" name="operation" value="delete">
					  <input type="submit" value="del">
					</form>
				</td>
        <?php 
      }// Ferme foreach($datas as $data)
    ?>
	</table>
  </div>
</article>