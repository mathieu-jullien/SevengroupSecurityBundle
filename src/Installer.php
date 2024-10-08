<?php

namespace Sevengroup\SecurityBundle;

use Composer\Script\Event;

class Installer
{
    public static function copyConfigFile(Event $event)
    {
        $rootDir = dirname($event->getComposer()->getConfig()->get('vendor-dir'));

        $configDir = $rootDir . '/config/packages/';
        $configFile = $configDir . 'sevengroup_security.yaml';

        $event->getIO()->write("Looking for configuration file {$configFile}");

        if (!file_exists($configFile)) {
            $event->getIO()->write("Create configuration file {$configFile}");
            if (!is_dir($configDir)) {
                mkdir($configDir, 0777, true);
            }

            copy(__DIR__ . '/Resources/config/packages/sevengroup_security.yaml', $configFile);
            $event->getIO()->write("Configuration file sevengroup_security.yaml has been created in config/packages/");
        }
    }
}