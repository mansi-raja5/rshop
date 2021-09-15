<?php
namespace Encora\Training\Controller\Adminhtml\Employee;

class Edit extends \Magento\Backend\App\Action
{
    protected $_coreRegistry;
	protected $resultPageFactory = false;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
	    \Magento\Framework\Registry $coreRegistry,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->_coreRegistry = $coreRegistry;
		$this->resultPageFactory = $resultPageFactory;
	}

    public function execute()
    {        
        $id = $this->getRequest()->getParam('id');
        
        $model = $this->_objectManager->create('Encora\Training\Model\Employee');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This employee no longer exists.'));
                $this->_redirect('encora_training/*');
                return;
            }
        }

        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $model->addData($data);
        }

        $this->_coreRegistry->register('current_encora_training_employee', $model);

        $this->_view->loadLayout();
        $this->_setActiveMenu('Encora_Training::add_employee')->_addBreadcrumb(__('Employee'), __('Employee'));
        $this->_view->getLayout()->getBlock('employee_employee_edit');
        $this->_view->renderLayout();
    }

	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Encora_Training::employee');
	}
}