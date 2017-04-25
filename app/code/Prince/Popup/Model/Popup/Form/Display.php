<?php


namespace Prince\Popup\Model\Popup\Form;

class Display implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {

        return [
            ['value' => 1, 'label' => __('Home Page')],
            ['value' => 2, 'label' => __('Product Pages')],
            ['value' => 3, 'label' => __('Catalog Pages')],
            ['value' => 4, 'label' => __('Shopping Cart')],
            ['value' => 5, 'label' => __('Checkout')],
        ];

    }
}
