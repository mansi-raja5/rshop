<?php
namespace Encora\Training\Model\ResourceModel\Employee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'emp_id';
	protected $_eventPrefix = 'encora_training_employee_collection';
	protected $_eventObject = 'employee_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Encora\Training\Model\Employee', 'Encora\Training\Model\ResourceModel\Employee');
	}

}