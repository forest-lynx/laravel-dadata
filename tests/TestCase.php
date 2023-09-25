<?php

namespace ForestLynx\DaData\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageServices($app)
    {
        return [
            'ForestLynx\DaData\DaDataServiceProvider'
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'DaDataAddress'    => 'ForestLynx\DaData\Facades\DaDataAddress',
            'DaDataName'       => 'ForestLynx\DaData\Facades\DaDataName',
            'DaDataEmail'      => 'ForestLynx\DaData\Facades\DaDataEmail',
            'DaDataPhone'      => 'ForestLynx\DaData\Facades\DaDataPhone',
            'DaDataCompany'    => 'ForestLynx\DaData\Facades\DaDataCompany',
            'DaDataBank'       => 'ForestLynx\DaData\Facades\DaDataBank',
            'DaDataPassport'   => 'ForestLynx\DaData\Facades\DaDataPassport',
        ];
    }
}
