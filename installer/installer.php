<?php
$this->logSection('install', 'add files for symfony beginners');
$this->installDir(dirname(__FILE__).'/my_skeleton');

$this->logSection('install', 'add plugin sfFormExtraPlugin');
$this->getFilesystem()->execute('svn co http://svn.symfony-project.org/plugins/sfFormExtraPlugin/branches/1.3 plugins/sfFormExtraPlugin');
$this->enablePlugin('sfFormExtraPlugin');

$this->logSection('install', 'add plugin sfDoctrineGuardPlugin');
$this->getFilesystem()->execute('svn co http://svn.symfony-project.org/plugins/sfDoctrineGuardPlugin/trunk plugins/sfDoctrineGuardPlugin');
$this->enablePlugin('sfDoctrineGuardPlugin');

$this->logSection('install', 'add plugin sfThumbnailPlugin');
$this->getFilesystem()->execute('svn co http://svn.symfony-project.org/plugins/sfThumbnailPlugin/trunk plugins/sfThumbnailPlugin');
$this->enablePlugin('sfThumbnailPlugin');

