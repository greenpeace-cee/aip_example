<?php
use CRM_AipExample_ExtensionUtil as E;

class CRM_AipExample_Page_AipExamplePage extends CRM_Core_Page {

  public function run() {

    $config = [
      'finder' => [
        'class' => '\Civi\AIP\Finder\DropFolderFinder',
        'filter' => [
          'file_name' => '#[a-z0-9]+.csv#',
        ],
        'folder' => [
          'uploading' => CRM_AipExample_ExtensionUtil::path('aipFolder/uploading'),
          'inbox' => CRM_AipExample_ExtensionUtil::path('aipFolder/inbox'),
          'processing' => CRM_AipExample_ExtensionUtil::path('aipFolder/processing'),
          'processed' => CRM_AipExample_ExtensionUtil::path('aipFolder/processed'),
          'failed' => CRM_AipExample_ExtensionUtil::path('aipFolder/failed'),
        ],
      ],
      'reader' => [
        'class' => '\Civi\AIP\Reader\CSV',
        'csv_string_encoding' => 'utf8_encode',
      ],
      'processor' => [
        'class' => '\Civi\AipExample\Processor\LegacyRecordHandlerProcessor'
      ],
      'process' => [
        'log' => [
          'file' => './aipFolder/processing.log',
        ],
        'processing_limit' => [
          'record_count' => 200,
        ]
      ],
    ];
    $state = [];

    echo '<pre>';
    var_dump('You can reuse AipProcess record. But now it creates new one each page reload.');
    var_dump('Creating AipProcess record....');
    echo '</pre>';

    $aipProcess = \Civi\Api4\AipProcess::create()
      ->addValue('name', 'LegacyRecordHandler')
      ->addValue('is_active', TRUE)
      ->addValue('config', json_encode($config))
      ->addValue('class', '\Civi\AIP\Process')
      ->addValue('state', json_encode($config))
      ->addValue('documentation', '11111')
      ->execute();

    echo '<pre>';
    var_dump('Created AipProcess record(id=' . $aipProcess->first()['id'] . '):');
    var_dump($aipProcess);
    echo '</pre>';

    echo '<pre>';
    var_dump('Run AIP.run_process');
    echo '</pre>';

    $result = civicrm_api3('AIP', 'run_process', [
      'pid' => $aipProcess->first()['id'],
    ]);

    echo '<pre>';
    var_dump($result);
    echo '</pre>';
    exit();
  }

}
