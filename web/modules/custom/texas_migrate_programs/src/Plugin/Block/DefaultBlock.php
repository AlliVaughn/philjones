<?php

namespace Drupal\texas_migrate_programs\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "default_block",
 *  admin_label = @Translation("Default block"),
 * )
 */
class DefaultBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'default_block';
    //fire qulatrics download function
    $build['default_block']['#markup'] = texas_migrate_programs_runner();
    return $build;
  }

}
