<?php

namespace Unit3\Converter\Block;

use Magento\Framework\View\Element\Template;

class Select extends Template 
{
 
    public function getFormActionUrl()
    {
        return $this->getUrl('*/post/index');
    }   

    public function getCurrencyList()
    {
        return ['USD', 'EUR', 'GBP', 'MXN', 'BTC'];
    }
}