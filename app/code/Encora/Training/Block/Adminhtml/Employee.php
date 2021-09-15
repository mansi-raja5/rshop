<?php
namespace Encora\Training\Block\Adminhtml;

class Employee extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'employee';
        $this->_headerText = __('Employees');
        $this->_addButtonLabel = __('Add New Employee');
        parent::_construct();
    }
}
