<?php

namespace Drupal\shc_migrate_change_club\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class Migrate_Change_ClubController extends ControllerBase {
  public function content() {
    return array('#markup' => shc_migrate_change_club_runner());
  }

}
