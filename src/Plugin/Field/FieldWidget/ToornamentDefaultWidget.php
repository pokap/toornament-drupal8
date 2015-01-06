<?php
/**
 * @file
 * Contains \Drupal\toornament\Plugin\Field\FieldWidget\ToornamentDefaultWidget.
 */

namespace Drupal\toornament\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'toornament_default' widget.
 *
 * @FieldWidget(
 *   id = "toornament_default",
 *   label = "Toornament widget",
 *   field_types = {
 *     "toornament"
 *   }
 * )
 */
class ToornamentDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value'] = $element + array(
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : NULL,
      '#size' => $this->getSetting('size'),
      '#maxlength' => 24,
      '#attributes' => array('class' => array('text-full')),
    );

    return $element;
  }
}
