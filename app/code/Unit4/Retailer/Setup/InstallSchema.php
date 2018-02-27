<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Unit4\Retailer\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'catalog_product_entity'
         */
        $table = $installer->getConnection()
            ->newTable('unit4_retailer')
            ->addColumn(
                'retailer_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'Retailer Id'
            )->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                [],
                'Name'
            )->addColumn(
                'country_id',
                Table::TYPE_TEXT,
                2,
                [
                    'nullable' => false,
                    'default' => false
                ],
                'Country Id'
            )->addColumn(
                'region_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false
                ],
                'Region Id'
            )->addColumn(
                'city',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable' => false
                ],
                'City'
            )->addColumn(
                'street',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable' => false
                ],
                'Street'
            )->addColumn(
                'postcode',
                Table::TYPE_TEXT,
                10,
                [
                    'nullable' => false
                ],
                'Post code'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TYPE_TIMESTAMP
                ],
                'Created at'
            )->addIndex(
                $installer->getIdxName('unit4_retailer', ['name']),['name']
            )->addForeignKey(
                $installer->getFkName(
                    'unit4_retailer',
                    'country_id',
                    'directory_country',
                    'country_id'
                ),
                'country_id',
                'directory_country',
                'country_id',
                TABLE::ACTION_CASCADE
            )->addForeignKey(
                $installer->getFkName(
                    'unit4_retailer',
                    'region_id',
                    'directory_country_region',
                    'region_id'
                ),
                'region_id',
                'directory_country_region',
                'region_id',
                TABLE::ACTION_CASCADE
            )->setComment('Retailer Table');
        
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
