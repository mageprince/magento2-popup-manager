<?php

namespace Prince\Popup\Block\Adminhtml\Popup\Renderer;
 
use Magento\Framework\DataObject;
 
class Statistics extends \Magento\Framework\Data\Form\Element\AbstractElement
{

    public function getElementHtml()
    {
        $customDiv = '<div style="width:600px;height:200px;margin:10px 0;border:2px solid #000" id="customdiv"><h1 style="margin-top: 12%;margin-left:40%;">Custom Div</h1></div>';
        return $customDiv;
    }

}