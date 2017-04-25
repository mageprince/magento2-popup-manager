<?php

namespace Prince\Popup\Helper;

use Magento\Framework\Registry;
use Magento\Customer\Model\Session;
use Magento\Store\Model\StoreManagerInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{   
    protected $_popupCollection;

    protected $_popupModel;

    protected $_registry;

    protected $_customerSession;

    protected $_store;


    public function __construct(
        \Prince\Popup\Model\PopupFactory $popupCollection,
        \Prince\Popup\Model\Popup $popupModel,
        Registry $registry,
        Session $customerSession,
        StoreManagerInterface $storeManager
    )
    {
        $this->_popupCollection = $popupCollection;
        $this->_popupModel = $popupModel;
        $this->_registry = $registry;
        $this->_customerSession = $customerSession;
        $this->_store = $storeManager;
    }

    public function getCollection()
    {
        $collection = $this->_popupCollection->create()->getCollection();
        return $collection;
    }

    public function getCurrentCateogryId()
    {
        $category = $this->_registry->registry('current_category');
        return $category->getId();
    }

    public function getCurrentProductSku()
    {
        $product = $this->_registry->registry('current_product');
        return $product->getSku();
    }

    public function getMilliseconds($seconds)
    {
        return $seconds*1000;
    }

    public function setCookie($value, $time)
    {
        setCookie('popup-'.$value, true, time() +  (60 * $time));
        return true;
    }

    public function getCookie($value)
    {
        if(isset($_COOKIE['popup-'.$value]) && $_COOKIE['popup-'.$value] == true)
        { 
            return $_COOKIE['popup-'.$value];
        }   

        return false; 
    }

    public function getCurrentCustomer()
    {
        return $this->_customerSession->getCustomer()->getGroupId();
    }

    public function getCurrentStore()
    {
        return $this->_store->getStore()->getId();
    }

    public function setCounter($id)
    {       
        $popup = $this->_popupModel->load($id);
        $viewCount = $popup->getView();
        $popup->setView($viewCount + 1);
        $popup->save();

        return true;
    }

    public function setClick($id)
    {
        $popup = $this->_popupModel->load($id);
        $clickCount = $popup->getClick();
        $popup->setClick($clickCount + 1);
        $popup->save();

        return true;
    }
}