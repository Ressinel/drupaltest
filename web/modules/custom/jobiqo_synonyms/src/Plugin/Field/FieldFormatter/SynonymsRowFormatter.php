<?php

declare(strict_types = 1);

namespace Drupal\jobiqo_synonyms\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin for Synonyms formatter.
 *
 * The row formatter which print the synonym in separate row.
 *
 * @FieldFormatter(
 *   id = "jobiqo_synonyms_row_formatter",
 *   label = @Translation("Synonyms row formatter"),
 *   field_types = {
 *     "jobiqo_synonyms"
 *   }
 * )
 */
class SynonymsRowFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'inline_template',
        '#template' => '{{ value|nl2br }}',
        '#context' => ['value' => $item->synonym],
      ];
    }
    return $elements;
  }

}
