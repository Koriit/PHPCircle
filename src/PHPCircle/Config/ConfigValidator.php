<?php
/**
 * @copyright 2017 Aleksander Stelmaczonek <al.stelmaczonek@gmail.com>
 * @license   MIT License, see license file distributed with this source code
 */

namespace Koriit\PHPCircle\Config;


use Koriit\PHPCircle\Config\Exceptions\InvalidConfig;
use function array_unique;
use function count;

class ConfigValidator
{
    /**
     * @param Config $config
     *
     * @throws InvalidConfig
     */
    public function check(Config $config)
    {
        $this->checkIfEmpty($config);

        $this->checkNameDuplication($config);
    }

    /**
     * @param Config $config
     *
     * @throws InvalidConfig
     */
    private function checkIfEmpty(Config $config)
    {
        if (empty($config->getDirModules()) && empty($config->getClassModules()) && empty($config->getFileModules()) && empty($config->getDirDetectors())) {
            throw new InvalidConfig("Configuration cannot be empty");
        }
    }

    /**
     * @param Config $config
     *
     * @throws InvalidConfig
     */
    private function checkNameDuplication(Config $config)
    {
        $modules = [];
        foreach ($config->getDirModules() as $module) {
            $modules[] = $module->getName();
        }
        foreach ($config->getClassModules() as $module) {
            $modules[] = $module->getName();
        }
        foreach ($config->getFileModules() as $module) {
            $modules[] = $module->getName();
        }

        if (count($modules) != count(array_unique($modules))) {
            throw new InvalidConfig("Two or more of your configured modules have the same name");
        }
    }
}