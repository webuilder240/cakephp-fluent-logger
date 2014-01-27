<?php

use Fluent\Logger\FluentLogger;
Fluent\Autoloader::register();

App::uses('BaseLog', 'Log/Engine');

class FluentLog extends BaseLog {

  protected $logger = null;

  protected $_defaults = array(
    'prefix' => 'app',
    'port'   => 24224,
    'host'   => '127.0.0.1',
  );

  public function __construct($config = array()) {
    $config = Hash::merge($this->_defaults, $config);
    if (is_null($this->logger)) {
      $this->logger = FluentLogger::open($config['host'], $config['port']);
    }
    parent::__construct($config);
  }

  public function write($type, $message) {
    $log = array(
      'datetime' => date('Y-m-d H:i:s'),
      'hostname' => env('HOSTNAME'),
      'type' => ucfirst($type),
      'message' => $message
    );
    $this->logger->post(
      sprintf('%s.%s', $this->_config['prefix'], strval($type)),
      $log
    );
    return true;
  }

}
