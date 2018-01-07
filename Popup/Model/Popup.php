<?php


namespace Prince\Popup\Model;

use Prince\Popup\Api\Data\PopupInterface;

class Popup extends \Magento\Framework\Model\AbstractModel implements PopupInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Prince\Popup\Model\ResourceModel\Popup');
    }

    /**
     * Get popup_id
     * @return string
     */
    public function getPopupId()
    {
        return $this->getData(self::POPUP_ID);
    }

    /**
     * Set popup_id
     * @param string $popupId
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setPopupId($popupId)
    {
        return $this->setData(self::POPUP_ID, $popupId);
    }

    /**
     * Get status
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get content
     * @return string
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Set content
     * @param string $content
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Get display
     * @return string
     */
    public function getDisplay()
    {
        return $this->getData(self::DISPLAY);
    }

    /**
     * Set display
     * @param string $display
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setDisplay($display)
    {
        return $this->setData(self::DISPLAY, $display);
    }

    /**
     * Get position
     * @return string
     */
    public function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    /**
     * Set position
     * @param string $position
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * Get animation
     * @return string
     */
    public function getAnimation()
    {
        return $this->getData(self::ANIMATION);
    }

    /**
     * Set animation
     * @param string $animation
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setAnimation($animation)
    {
        return $this->setData(self::ANIMATION, $animation);
    }

    /**
     * Get event
     * @return string
     */
    public function getEvent()
    {
        return $this->getData(self::EVENT);
    }

    /**
     * Set event
     * @param string $event
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setEvent($event)
    {
        return $this->setData(self::EVENT, $event);
    }

    /**
     * Get cookie
     * @return string
     */
    public function getCookie()
    {
        return $this->getData(self::COOKIE);
    }

    /**
     * Set cookie
     * @param string $cookie
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setCookie($cookie)
    {
        return $this->setData(self::COOKIE, $cookie);
    }

    /**
     * Get css
     * @return string
     */
    public function getCss()
    {
        return $this->getData(self::CSS);
    }

    /**
     * Set css
     * @param string $css
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setCss($css)
    {
        return $this->setData(self::CSS, $css);
    }

    /**
     * Get storeview
     * @return string
     */
    public function getStoreview()
    {
        return $this->getData(self::STOREVIEW);
    }

    /**
     * Set storeview
     * @param string $storeview
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setStoreview($storeview)
    {
        return $this->setData(self::STOREVIEW, $storeview);
    }

    /**
     * Get customer_group
     * @return string
     */
    public function getCustomerGroup()
    {
        return $this->getData(self::CUSTOMER_GROUP);
    }

    /**
     * Set customer_group
     * @param string $customer_group
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    public function setCustomerGroup($customer_group)
    {
        return $this->setData(self::CUSTOMER_GROUP, $customer_group);
    }
}
