<?php


namespace Prince\Popup\Controller\Adminhtml\Popup;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        // echo "<pre>";
        // print_r($data); exit;

        if(isset($data['display']))
        {
            $display = implode(',', $data['display']);
            $data['display'] = $display;
        }
        
        if(isset($data['catalog']))
        {
            $catalog = implode(',', $data['catalog']);
            $data['catalog'] = $catalog;
        }

        // if(isset($data['product']))
        // {
        //     $products = implode(',', $data['product']);
        //     $data['product'] = $products;
        // }

        if(isset($data['customer_group']))
        {
            $customerGroup = implode(',', $data['customer_group']);
            $data['customer_group'] = $customerGroup;
        }

        if(isset($data['storeview']))
        {
            $store = implode(',', $data['storeview']);
            $data['storeview'] = $store;
        }

        if ($data) {
            $id = $this->getRequest()->getParam('popup_id');
        
            $model = $this->_objectManager->create('Prince\Popup\Model\Popup')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This Popup no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the Popup.'));
                $this->dataPersistor->clear('prince_popup_popup');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['popup_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Popup.'));
            }
        
            $this->dataPersistor->set('prince_popup_popup', $data);
            return $resultRedirect->setPath('*/*/edit', ['popup_id' => $this->getRequest()->getParam('popup_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
