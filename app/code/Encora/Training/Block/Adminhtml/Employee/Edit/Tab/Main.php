<?php
namespace Encora\Training\Block\Adminhtml\Employee\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
 
    public function __construct(
        \Magento\Backend\Block\Template\Context $context, 
        \Magento\Framework\Registry $registry, 
        \Magento\Framework\Data\FormFactory $formFactory,  
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig, 
        array $data = []
    ) 
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Employee Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Employee Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_encora_training_employee');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Employee Information')]);
        if ($model->getId()) {
            $fieldset->addField('emp_id', 'hidden', ['name' => 'emp_id']);
        }
        $fieldset->addField(
            'emp_name',
            'text',
            ['name' => 'emp_name', 'label' => __('Employee Name'), 'title' => __('Employee Name'), 'required' => true]
        );
        $fieldset->addField(
            'emp_code',
            'text',
            ['name' => 'emp_code', 'label' => __('Employee Code'), 'title' => __('Employee Code'), 'required' => true]
        );
        $fieldset->addField(
            'emp_post',
            'text',
            ['name' => 'emp_post', 'label' => __('Employee Post'), 'title' => __('Employee Post'), 'required' => true]
        );
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
