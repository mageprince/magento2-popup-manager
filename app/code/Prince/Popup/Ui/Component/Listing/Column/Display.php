<?php
namespace Prince\Popup\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Display extends Column
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
                $display = explode(',', $items['display']);
                $displayType = [];
                foreach ($display as $key => $item) { 
                    if($item == 1){
                        $displayType[$key] =  "Home Page";
                    }elseif($item == 2){
                        $displayType[$key] =  "Product Page";
                    }
                    elseif($item == 3){
                        $displayType[$key] =  "Category Page";
                    }
                    elseif($item == 4){
                        $displayType[$key] =  "Shopping Cart";
                    }
                    elseif($item == 5){
                        $displayType[$key] =  "Checkout Page";
                    }
                    
                }
                $items['display'] = implode(' - ', $displayType);               
            }
        }
        
        return $dataSource;
    }
}