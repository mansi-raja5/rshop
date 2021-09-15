<?php

namespace Encora\Training\Controller\Adminhtml\Employee;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Encora_Training::employee');
		$resultPage->getConfig()->getTitle()->prepend((__('Employee List')));

		return $resultPage;
	}

	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Encora_Training::employee');
	}

}