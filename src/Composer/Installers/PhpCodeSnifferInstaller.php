<?php
namespace Composer\Installers;

class PhpCodeSnifferInstaller extends BaseInstaller
{
    protected $locations = array(
        'standard' => 'vendor/squizlabs/php_codesniffer/CodeSniffer/Standards/{name}/',
    );
}
