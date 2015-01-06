<?php

/**
 * @file
 * Contains \Drupal\toornament\Plugin\Field\FieldType\ToornamentItem.
 */

namespace Drupal\toornament\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'toornament' field type.
 *
 * @FieldType(
 *   id = "toornament",
 *   label = "Toornament",
 *   description = @Translation("Create and store toornament values."),
 *   default_widget = "toornament_default",
 *   default_formatter = "toornament_default"
 * )
 */
class ToornamentItem extends FieldItemBase {

 /**
  * {@inheritdoc}
  */
 public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
   $properties['value'] = DataDefinition::create('string')
     ->setLabel(t('Id'));

   return $properties;
 }

 /**
  * {@inheritdoc}
  */
 public function isEmpty() {
   $value = $this->get('value')->getValue();

   return $value === NULL || $value === '';
 }

 /**
  * {@inheritdoc}
  */
 public static function schema(FieldStorageDefinitionInterface $field_definition) {
   return array(
     'columns' => array(
       'value' => array(
         'type' => 'varchar',
         'length' => 24,
         'not null' => FALSE,
       )
     ),
   );
 }

 /**
  * {@inheritdoc}
  */
 public function getConstraints() {
   $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
   $constraints = parent::getConstraints();

   $constraints[] = $constraint_manager->create('ComplexData', array(
     'value' => array(
       'Length' => array(
         'max' => 24,
         'maxMessage' => t('%name: the ID may not be longer than @max characters.', array('%name' => $this->getFieldDefinition()->getLabel(), '@max' => 24)),
       )
     ),
   ));

   return $constraints;
 }
}
