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

        $subPaths = ['CodeSniffer'.DIRECTORY_SEPARATOR.'Standards'];

        foreach ($subPaths as $subPath) {
            $path = $base.DIRECTORY_SEPARATOR.$subPath;
            if (is_dir($path) && is_readable($path)) {
                $vars['phpcs_standards_folder'] = $path;
            }
        }

        return $vars;
    }
}
