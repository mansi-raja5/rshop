<?php

namespace Encora\Training\Block\Adminhtml\Employee\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('encora_training_employee_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Employee'));
    }
}
