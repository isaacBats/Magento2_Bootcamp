<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Unit4\Retailer\Setup;

use Magento\Catalog\Model\Product\Attribute\Backend\Media\ImageEntryConverter;
use Magento\Catalog\Model\ResourceModel\Product\Gallery;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        if (version_compare($context->getVersion(), '0.1.0', '<')) {
            $installer->startSetup();

            $table = $installer->getConnection()
                ->newTable('unit4_retailer2product')
                ->addColumn(
                    'retailer2product_id',
                    TABLE::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Retailer 2 Product Id'
                )
                ->addColumn(
                    'retailer_id',
                    TABLE::TYPE_INTEGER,
                    null,
                    [
                        'unsigned' => true,
                        'nullable' => false
                    ],
                    'Retailer Id'
                )
                ->addColumn(
                    'product_id',
                    TABLE::TYPE_INTEGER,
                    null,
                    [
                        'unsigned' => true,
                        'nullable' => false,
                    ],
                    'Product Id'
                )
                ->addIndex(
                    $installer->getIdxName(
                        'unit4_retailer2product',
                        ['product_id']
                    ),
                    ['product_id']
                )
                ->addForeignKey(
                    $installer->getFkName(
                        'unit4_retailer2product',
                        'retailer_id',
                        'unit4_retailer',
                        'retailer_id'
                    ),
                    'retailer_id',
                    'unit4_retailer',
                    'retailer_id',
                    Table::ACTION_CASCADE
                )
                ->addForeignKey(
                    $installer->getFkName(
                        'unit4_retailer2product',
                        'product_id',
                        'catalog_product_entity',
                        'entity_id'
                    ),
                    'product_id',
                    'catalog_product_entity',
                    'entity_id',
                    Table::ACTION_CASCADE
                )
                ->setComment('Product Id');
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }

    }
}
