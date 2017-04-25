<?php


namespace Prince\Popup\Controller\Adminhtml\Popup;

class Delete extends \Prince\Popup\Controller\Adminhtml\Popup
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('popup_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Prince\Popup\Model\Popup');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You deleted the Popup.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['popup_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a Popup to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
