<?php


namespace Prince\Popup\Controller\Ajax;

class Click extends \Magento\Framework\App\Action\Action
{


    protected $_popupModel;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Prince\Popup\Model\Popup $popupModel
    ) {
        $this->_popupModel = $popupModel;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        if($this->getRequest()->isAjax()){
            $id = $this->getRequest()->getParam('id', false);
            $click = $this->getRequest()->getParam('click', false);
            $popup = $this->_popupModel->load($id);
            $popup->setClick($click + 1);
            $popup->save();
        }
        return '';
    }
}
