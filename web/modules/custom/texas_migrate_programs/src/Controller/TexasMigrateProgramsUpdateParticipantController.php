<?php

namespace Drupal\texas_migrate_programs\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasMigrateProgramsUpdateParticipantController extends ControllerBase {
  public function content($responseids,$program) {
    return array('#markup' => texas_migrate_programs_update_responseid($program,$responseids));
  }

}
