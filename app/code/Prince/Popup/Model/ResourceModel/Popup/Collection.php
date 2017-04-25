<?php


namespace Prince\Popup\Model\ResourceModel\Popup;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Prince\Popup\Model\Popup',
            'Prince\Popup\Model\ResourceModel\Popup'
        );
    }
}
