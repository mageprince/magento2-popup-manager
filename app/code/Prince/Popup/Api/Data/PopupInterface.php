<?php


namespace Prince\Popup\Api\Data;

interface PopupInterface
{

    const CONTENT = 'content';
    const EVENT = 'event';
    const POPUP_ID = 'popup_id';
    const CSS = 'css';
    const DISPLAY = 'display';
    const CUSTOMER_GROUP = 'customer_group';
    const NAME = 'name';
    const ANIMATION = 'animation';
    const STOREVIEW = 'storeview';
    const STATUS = 'status';
    const POSITION = 'position';
    const COOKIE = 'cookie';


    /**
     * Get popup_id
     * @return string|null
     */
    
    public function getPopupId();

    /**
     * Set popup_id
     * @param string $popup_id
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setPopupId($popupId);

    /**
     * Get status
     * @return string|null
     */
    
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setStatus($status);

    /**
     * Get name
     * @return string|null
     */
    
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setName($name);

    /**
     * Get content
     * @return string|null
     */
    
    public function getContent();

    /**
     * Set content
     * @param string $content
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setContent($content);

    /**
     * Get display
     * @return string|null
     */
    
    public function getDisplay();

    /**
     * Set display
     * @param string $display
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setDisplay($display);

    /**
     * Get position
     * @return string|null
     */
    
    public function getPosition();

    /**
     * Set position
     * @param string $position
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setPosition($position);

    /**
     * Get animation
     * @return string|null
     */
    
    public function getAnimation();

    /**
     * Set animation
     * @param string $animation
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setAnimation($animation);

    /**
     * Get event
     * @return string|null
     */
    
    public function getEvent();

    /**
     * Set event
     * @param string $event
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setEvent($event);

    /**
     * Get cookie
     * @return string|null
     */
    
    public function getCookie();

    /**
     * Set cookie
     * @param string $cookie
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setCookie($cookie);

    /**
     * Get css
     * @return string|null
     */
    
    public function getCss();

    /**
     * Set css
     * @param string $css
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setCss($css);

    /**
     * Get storeview
     * @return string|null
     */
    
    public function getStoreview();

    /**
     * Set storeview
     * @param string $storeview
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setStoreview($storeview);

    /**
     * Get customer_group
     * @return string|null
     */
    
    public function getCustomerGroup();

    /**
     * Set customer_group
     * @param string $customer_group
     * @return Prince\Popup\Api\Data\PopupInterface
     */
    
    public function setCustomerGroup($customer_group);
}
