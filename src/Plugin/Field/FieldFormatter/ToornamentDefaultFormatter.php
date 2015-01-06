<?php

/**
 * @file
 * Contains \Drupal\toornament\Plugin\Field\FieldFormatter\ToornamentDefaultFormatter.
 */

namespace Drupal\toornament\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'toornament_default' formatter.
 *
 * @FieldFormatter(
 *   id = "toornament_default",
 *   label = @Translation("Default"),
 *   field_types = {
 *     "toornament"
 *   }
 * )
 */
class ToornamentDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#theme' => 'toornament_widget',
        '#tournamentId' => $item->value
      );
    }

    return $elements;
  }
}
