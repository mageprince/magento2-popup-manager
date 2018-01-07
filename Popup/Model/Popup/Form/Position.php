<?php


namespace Prince\Popup\Model\Popup\Form;

class Position implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {

        return [
            ['value' => 'top-left', 'label' => __('Top Left')],
            ['value' => 'top-center', 'label' => __('Top Center')],
            ['value' => 'top-right', 'label' => __('Top Right')],
            ['value' => 'middle-left', 'label' => __('Middle left')],
            ['value' => 'middle-center', 'label' => __('Middle center')],
            ['value' => 'middle-right', 'label' => __('Middle right')],
            ['value' => 'bottom-left', 'label' => __('Bottom left')],
            ['value' => 'bottom-center', 'label' => __('Bottom center')],
            ['value' => 'bottom-right', 'label' => __('Bottom right')],
        ];

    }
}
