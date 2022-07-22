<?php

declare(strict_types = 1);

namespace Drupal\jobiqo_synonyms\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin for Synonyms formatter.
 *
 * The line formatter which prints synonyms in line separated by comma.
 *
 * @FieldFormatter(
 *   id = "jobiqo_synonyms_line_formatter",
 *   label = @Translation("Synonyms line formatter"),
 *   field_types = {
 *     "jobiqo_synonyms"
 *   }
 * )
 */
class SynonymsLineFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $synonyms = [];
    foreach ($items as $item) {
      $synonyms[] = $item->synonym;
    }
    $elements[0] = [
      '#type' => 'inline_template',
      '#template' => '{{ value|nl2br }}',
      '#context' => ['value' => implode(', ', $synonyms)],
    ];
    return $elements;
  }

}
