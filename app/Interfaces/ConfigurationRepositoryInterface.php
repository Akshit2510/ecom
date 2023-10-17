<?php

namespace App\Interfaces;

interface ConfigurationRepositoryInterface
{
    public function getConfigurationByKey($keyName);
}