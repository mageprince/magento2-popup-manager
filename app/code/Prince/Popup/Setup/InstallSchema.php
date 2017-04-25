<?php


namespace Prince\Popup\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_prince_popup = $setup->getConnection()->newTable($setup->getTable('prince_popup'));

        
        $table_prince_popup->addColumn(
            'popup_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );
        

        
        $table_prince_popup->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            null,
            [],
            'status'
        );
        

        
        $table_prince_popup->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'name'
        );
        

        
        $table_prince_popup->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'content'
        );
        

        
        $table_prince_popup->addColumn(
            'display',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [],
            'display'
        );
        

        
        $table_prince_popup->addColumn(
            'position',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'position'
        );
        

        
        $table_prince_popup->addColumn(
            'animation',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'animation'
        );
        

        
        $table_prince_popup->addColumn(
            'event',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'event'
        );
        

        
        $table_prince_popup->addColumn(
            'cookie',
            \Magento\Framework\DB\Ddl\Table::TYPE_NUMERIC,
            null,
            [],
            'cookie'
        );
        

        
        $table_prince_popup->addColumn(
            'css',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'css'
        );
        

        
        $table_prince_popup->addColumn(
            'storeview',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [],
            'storeview'
        );
        

        
        $table_prince_popup->addColumn(
            'customer_group',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [],
            'customer_group'
        );
        

        $setup->getConnection()->createTable($table_prince_popup);

        $setup->endSetup();
    }
}
