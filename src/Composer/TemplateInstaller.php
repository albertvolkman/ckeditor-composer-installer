<?php

namespace Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class TemplateInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 9);
        if ('ckeditor/' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, CKEditor Plugin templates '
                . 'should always start their package name with '
                . '"ckeditor/"'
            );
        }

        return 'vendor/ckeditor/ckeditor/' . substr($package->getPrettyName(), 9);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'ckeditor-plugin' === $packageType;
    }
}
