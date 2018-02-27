<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Helper\DefaultCategory;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $install = $setup;
        $install->startSetup();
        $retailers = [
            [
                'name' => 'Alabama',
                'country_id' => 'US',
                'region_id' => 01,
                'city' => 'Shalala',
                'street' => 'Shalala',
                'postcode' => '098765'
            ],
            [
                'name' => 'Alabama 2',
                'country_id' => 'US',
                'region_id' => 02,
                'city' => 'Shalala2',
                'street' => 'Shalala2',
                'postcode' => '098764'
            ],
            [
                'name' => 'Alabama 3',
                'country_id' => 'US',
                'region_id' => 03,
                'city' => 'Shalala3',
                'street' => 'Shalala3',
                'postcode' => '098763'
            ],
            [
                'name' => 'Alabama 4',
                'country_id' => 'US',
                'region_id' => 04,
                'city' => 'Shalala4',
                'street' => 'Shalala4',
                'postcode' => '098764'
            ],
            [
                'name' => 'Alabama 5',
                'country_id' => 'US',
                'region_id' => 05,
                'city' => 'Shalala5',
                'street' => 'Shalala5',
                'postcode' => '098765'
            ],
            [
                'name' => 'Alabama 6',
                'country_id' => 'US',
                'region_id' => 06,
                'city' => 'Shalala6',
                'street' => 'Shalala6',
                'postcode' => '098766'
            ],
            [
                'name' => 'Alabama 7',
                'country_id' => 'US',
                'region_id' => 07,
                'city' => 'Shalala7',
                'street' => 'Shalala7',
                'postcode' => '098767'
            ],

        ];

        foreach ($retailers as $retailes) {
            $install->getConnection()->insertForce('unit4_retailer', $retailer);
        }

        $install->endSetup();
        
    }
}
