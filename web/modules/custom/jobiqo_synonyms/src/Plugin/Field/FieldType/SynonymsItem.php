<?php

declare(strict_types = 1);

namespace Drupal\jobiqo_synonyms\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin for Synonyms field type.
 *
 * @FieldType(
 *   id = "jobiqo_synonyms",
 *   label = @Translation("Synonyms"),
 *   description = @Translation("Provides synomyms field."),
 *   default_widget = "jobiqo_synonyms_widget",
 *   default_formatter = "jobiqo_synonyms_row_formatter",
 * )
 */
class SynonymsItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function mainPropertyName() {
    return 'synonym';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['synonym'] = DataDefinition::create('string')
      ->setLabel(t('Synonym'));
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema['columns']['synonym'] = [
      'type' => 'varchar',
      'length' => 255,
      'not null' => FALSE,
    ];
    return $schema;
  }

}
