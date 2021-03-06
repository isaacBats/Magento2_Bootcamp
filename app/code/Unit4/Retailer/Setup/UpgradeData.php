<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit4\Retailer\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Upgrade Data script
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '0.1.0', '<')) {
            $install = $setup;
            $install->startSetup();

            $binds = [
                ['retailer_id'=>1, 'product_id'=>1],
                ['retailer_id'=>1, 'product_id'=>2],
                ['retailer_id'=>1, 'product_id'=>3],
                ['retailer_id'=>2, 'product_id'=>1],
                ['retailer_id'=>2, 'product_id'=>2],
                ['retailer_id'=>3, 'product_id'=>1],
                ['retailer_id'=>3, 'product_id'=>3],
                ['retailer_id'=>4, 'product_id'=>1],
            ];

            foreach ($binds as $bind) {
                $install->getConnection()->insertForce(
                    'unit4_retailer2product',
                    $bind
                );
            }

            $install->endSetup();
            
        }

    }
}
