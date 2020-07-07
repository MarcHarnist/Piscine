<?php
/**             Contrôleur __member-update
*                   Marc L. Harnist
*                       28/08/2018
*
*   Autorisation limitée au webmaster
*/  $website->membersPermissions(1, $member);

  $update = new Database;
  $ancre = $update->update_table_members('light_members', $_POST);
  header ('Location: ' . $website->page_url . '__member-index#' . $ancre . '');