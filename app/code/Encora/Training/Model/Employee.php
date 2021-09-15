<?php
namespace Encora\Training\Model;
class Employee extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'encora_training_employee';

	protected $_cacheTag = 'encora_training_employee';

	protected $_eventPrefix = 'encora_training_employee';

	protected function _construct()
	{
		$this->_init('Encora\Training\Model\ResourceModel\Employee');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}