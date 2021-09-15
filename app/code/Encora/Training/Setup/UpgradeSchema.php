<?php
namespace Encora\Training\Setup;
class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{

	public function upgrade(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (version_compare($context->getVersion(), '1.0.1', '<')) {
			if (!$installer->tableExists('encora_training_employee')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('encora_training_employee')
				)
					->addColumn(
						'emp_id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity' => true,
							'nullable' => false,
							'primary'  => true,
							'unsigned' => true,
						],
						'Employee ID'
					)
					->addColumn(
						'emp_name',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						['nullable => false'],
						'Employee Name'
					)
					->addColumn(
						'emp_code',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						11,
						[],
						'Employee Code'
					)
					->addColumn(
						'emp_post',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						'255',
						[],
						'Employee Post'
					)
					->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
					)->addColumn(
						'updated_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
						'Updated At')
					->setComment('Post Table');
				$installer->getConnection()->createTable($table);

				$installer->getConnection()->addIndex(
					$installer->getTable('encora_training_employee'),
					$setup->getIdxName(
						$installer->getTable('encora_training_employee'),
						['emp_name', 'emp_code', 'emp_post'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
					),
					['emp_name', 'emp_code', 'emp_post'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
				);
			}
		}
		$installer->endSetup();
	}
}
