<?php 
return array (
  'id' => 
  array (
    'name' => 'id',
    'type' => 'int(10)',
    'notnull' => false,
    'default' => NULL,
    'primary' => true,
    'autoinc' => true,
  ),
  'aid' => 
  array (
    'name' => 'aid',
    'type' => 'int(10)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'add_time' => 
  array (
    'name' => 'add_time',
    'type' => 'int(11)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'update_time' => 
  array (
    'name' => 'update_time',
    'type' => 'int(11)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'article_content' => 
  array (
    'name' => 'article_content',
    'type' => 'longtext',
    'notnull' => false,
    'default' => NULL,
    'primary' => false,
    'autoinc' => false,
  ),
  'weather' => 
  array (
    'name' => 'weather',
    'type' => 'enum(\'晴\',\'多云\',\'雨\',\'夜晚\')',
    'notnull' => false,
    'default' => '晴',
    'primary' => false,
    'autoinc' => false,
  ),
);