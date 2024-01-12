<?php

namespace Civi\AipExample\Processor;

use Civi\AIP\Processor\Base;

class LegacyRecordHandlerProcessor extends Base {

  /**
   * Processor name
   *
   * @return string
   */
  public function getTypeName(): string {
    return E::ts("Test LegacyRecordHandler");
  }

  /**
   * Handle record
   *
   * @param $record
   * @return void
   */
  public function processRecord($record)
  {
    echo '<pre>';
    var_dump('processRecord:');
    var_dump($record);
    echo '</pre>';

    parent::processRecord($record);
  }

}
