<?php
namespace Encora\Training\Controller\Adminhtml\Employee;

use Magento\Backend\App\Action\Context;

class Delete extends \Magento\Backend\App\Action
{
    protected $modelBlog;

    public function __construct(
        Context $context,
        \Encora\Training\Model\Employee $employeeFactory
    ) {
        parent::__construct($context);
        $this->modelEmployee = $employeeFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Encora_Training::employee');
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->modelEmployee;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Record deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Record does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}