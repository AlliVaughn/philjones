<?php

namespace Drupal\texas_migrate_programs\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Format outcome start date - baseline plus 12 weeks.
 *
 * @MigrateProcessPlugin(
 *   id = "12W_date",
 * )
 */
class Week12Date extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    try {
      if (is_numeric($value)) {
        $date = new \DateTime();
        $date->setTimestamp($value);
      }
      elseif (is_array($value)) {
        $value = implode(',', $value);
        $date = new \DateTime($value);
      }
      else {
        $date = new \DateTime($value);
      }
      $date = date_add($date, date_interval_create_from_date_string('12 weeks'));
      $value = $date->format('Y-m-d');
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid source date.');
    }
    return $value;
  }
}
