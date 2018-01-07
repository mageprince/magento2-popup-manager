<?php


namespace Prince\Popup\Api\Data;

interface PopupSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get popup list.
     * @return \Prince\Popup\Api\Data\PopupInterface[]
     */
    
    public function getItems();

    /**
     * Set status list.
     * @param \Prince\Popup\Api\Data\PopupInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}
