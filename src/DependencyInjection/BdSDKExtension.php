<?php declare(strict_types=1);

/**
 * @author Daniel P. Baddeley JR <dan.baddeley@bestdefense.io>
 * @date 09/15/2024
 * @time 3:15 PM
 * @note
 *
 * @link
 */

namespace BestdefenseIo\BdSdkPhp\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class BdSDKExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // Load and process configuration if needed
    }
}