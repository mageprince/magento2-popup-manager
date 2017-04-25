<?php


namespace Prince\Popup\Block\Index;

class Popup extends \Magento\Framework\View\Element\Template
{

    protected $_popupCollection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Prince\Popup\Model\PopupFactory $popupCollection
    )
    {
        $this->_popupCollection = $popupCollection;
        parent::__construct($context);
    }

    public function getCollection()
    {
        $collection = $this->_popupCollection->create()->getCollection();
        return $collection;
    }

}

