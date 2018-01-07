<?php


namespace Prince\Popup\Model\Popup\Form;

class Animation implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {

        return [
            ['value' => 'mfp-fade-zoom', 'label' => __('Fade-zoom')],
            ['value' => 'mfp-fade-slide', 'label' => __('Fade-slide')],
            ['value' => 'mfp-newspaper', 'label' => __('Newspaper')],
            ['value' => 'mfp-move-horizontal', 'label' => __('Horizontal move')],
            ['value' => 'mfp-move-from-top ', 'label' => __('Move from top')],
            ['value' => 'mfp-3d-unfold', 'label' => __('3d unfold')],
            ['value' => 'mfp-zoom-out', 'label' => __('Zoom-out')],
        ];

    }
}
