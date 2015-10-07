<?php
namespace Composer\Installers;

use Composer\Package\Package;

class PhpCodeSnifferInstaller extends BaseInstaller
{
    protected $locations = [
        'coding-standard' => '{$phpcs_standards_folder}/{$name}',
    ];

    public function inflectPackageVars($vars)
    {
        $phpcsPackage = new Package('squizlabs/php_codesniffer', '2.0', '');
        $base         = $this->composer->getInstallationManager()->getInstallPath($phpcsPackage);

        if (!$base) {
            throw new \InvalidArgumentException('Package is not installed: "squizlabs/php_codesniffer"');
        }

        $vars['phpcs_standards_folder'] = $base.DIRECTORY_SEPARATOR.'CodeSniffer'.DIRECTORY_SEPARATOR.'Standards';

        return $vars;
    }
}
