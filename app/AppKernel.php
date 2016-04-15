<?php

use Oro\Bundle\DistributionBundle\OroKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends OroKernel
{
    public function registerBundles()
    {
        $bundles = [
            new Liip\MonitorBundle\LiipMonitorBundle(),

//            new AppBundle\AppBundle(),
            new HotfixBundle\HotfixBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Fidry\PsyshBundle\PsyshBundle();
        }

        if ('test' === $this->getEnvironment()) {
            $bundles[] = new Oro\Bundle\TestFrameworkBundle\OroTestFrameworkBundle();
        }

        return array_merge(parent::registerBundles(), $bundles);
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return KERNEL_STORAGE_DIR.'/var/cache/'.$this->environment;
    }

    public function getLogDir()
    {
        return KERNEL_STORAGE_DIR.'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }

    public function boot()
    {
        Kernel::boot();
    }
}
