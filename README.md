cakephp-fluent-logger
======================

Fluent log engine Plugin for CakePHP

## Requirements
- PHP5
- CakePHP2

## Installation

You can install it using the Composer.

### Using Composer
```json
{
  "require": {
    "nanapi/cakephp-fluent-logger": "v1.0.1"
  }
}
```

### copy directory
```sh
cd app/Plugin
git clone git@github.com:nanapi/cakephp-fluent-logger.git FluentLogger

cd app/Vendor
git clone https://github.com/fluent/fluent-logger-php.git fluent/logger
```


## How to user it

Set the FluentLogger in bootstrap.

app/Config/bootstrap.php
```php
<?php

CakePlugin::load('FluentLogger');

CakeLog::config('debug', array(
  'engine' => 'FluentLogger.Fluent',
  'types' => array('notice', 'info', 'debug'),
  'prefix' => 'app',
  'port' => 24224,
  'host' => '127.0.0.1',
));

CakeLog::config('error', array(
  'engine' => 'FluentLogger.Fluent',
  'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
  'prefix' => 'app',
  'port' => 24224,
  'host' => '127.0.0.1',
));
```

your app
```php
<?php

CakeLog::debug($param);
```
