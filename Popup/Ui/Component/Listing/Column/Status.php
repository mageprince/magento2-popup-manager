<?php
namespace Prince\Popup\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Status extends Column
{
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {   
        if(isset($dataSource['data']['items'])) {

            foreach($dataSource['data']['items'] as &$items) {
                $status = $items['status'];
                if($status == 1){
                    $items['status'] = "Enable";
                }else{
                    $items['status'] = "Disable";
                }
            }
        }
        
        return $dataSource;
    }
}