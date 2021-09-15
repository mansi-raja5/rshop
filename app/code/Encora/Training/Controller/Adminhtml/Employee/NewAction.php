<?php

namespace Encora\Training\Controller\Adminhtml\Employee;

class NewAction extends \Magento\Backend\App\Action
{

    public function execute()
    {
        $this->_forward('edit');
    }

	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Encora_Training::employee');
	}
}
?>