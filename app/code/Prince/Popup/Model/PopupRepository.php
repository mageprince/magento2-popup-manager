<?php


namespace Prince\Popup\Model;

use Magento\Framework\Reflection\DataObjectProcessor;
use Prince\Popup\Model\ResourceModel\Popup as ResourcePopup;
use Prince\Popup\Api\Data\PopupSearchResultsInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SortOrder;
use Prince\Popup\Model\ResourceModel\Popup\CollectionFactory as PopupCollectionFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\DataObjectHelper;
use Prince\Popup\Api\PopupRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Prince\Popup\Api\Data\PopupInterfaceFactory;
use Magento\Store\Model\StoreManagerInterface;

class PopupRepository implements popupRepositoryInterface
{

    protected $dataObjectHelper;

    protected $dataPopupFactory;

    protected $searchResultsFactory;

    private $storeManager;

    protected $resource;

    protected $dataObjectProcessor;

    protected $popupCollectionFactory;

    protected $popupFactory;


    /**
     * @param ResourcePopup $resource
     * @param PopupFactory $popupFactory
     * @param PopupInterfaceFactory $dataPopupFactory
     * @param PopupCollectionFactory $popupCollectionFactory
     * @param PopupSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourcePopup $resource,
        PopupFactory $popupFactory,
        PopupInterfaceFactory $dataPopupFactory,
        PopupCollectionFactory $popupCollectionFactory,
        PopupSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->popupFactory = $popupFactory;
        $this->popupCollectionFactory = $popupCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataPopupFactory = $dataPopupFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Prince\Popup\Api\Data\PopupInterface $popup
    ) {
        /* if (empty($popup->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $popup->setStoreId($storeId);
        } */
        try {
            $this->resource->save($popup);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the popup: %1',
                $exception->getMessage()
            ));
        }
        return $popup;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($popupId)
    {
        $popup = $this->popupFactory->create();
        $popup->load($popupId);
        if (!$popup->getId()) {
            throw new NoSuchEntityException(__('popup with id "%1" does not exist.', $popupId));
        }
        return $popup;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $collection = $this->popupCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $items = [];
        
        foreach ($collection as $popupModel) {
            $popupData = $this->dataPopupFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $popupData,
                $popupModel->getData(),
                'Prince\Popup\Api\Data\PopupInterface'
            );
            $items[] = $this->dataObjectProcessor->buildOutputDataArray(
                $popupData,
                'Prince\Popup\Api\Data\PopupInterface'
            );
        }
        $searchResults->setItems($items);
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Prince\Popup\Api\Data\PopupInterface $popup
    ) {
        try {
            $this->resource->delete($popup);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the popup: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($popupId)
    {
        return $this->delete($this->getById($popupId));
    }
}
