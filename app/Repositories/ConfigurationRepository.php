<?php

namespace App\Repositories;

use App\Interfaces\ConfigurationRepositoryInterface;
use App\Models\Configuration;

class ConfigurationRepository implements ConfigurationRepositoryInterface
{
    public function getConfigurationByKey($key)
    {        
        return Configuration::where('key',$key)->first();
    }
}
