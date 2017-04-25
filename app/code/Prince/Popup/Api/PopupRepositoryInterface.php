<?php


namespace Prince\Popup\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PopupRepositoryInterface
{


    /**
     * Save popup
     * @param \Prince\Popup\Api\Data\PopupInterface $popup
     * @return \Prince\Popup\Api\Data\PopupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function save(
        \Prince\Popup\Api\Data\PopupInterface $popup
    );

    /**
     * Retrieve popup
     * @param string $popupId
     * @return \Prince\Popup\Api\Data\PopupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getById($popupId);

    /**
     * Retrieve popup matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Prince\Popup\Api\Data\PopupSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete popup
     * @param \Prince\Popup\Api\Data\PopupInterface $popup
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function delete(
        \Prince\Popup\Api\Data\PopupInterface $popup
    );

    /**
     * Delete popup by ID
     * @param string $popupId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function deleteById($popupId);
}
