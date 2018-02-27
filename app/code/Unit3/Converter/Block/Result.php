<?php

namespace Unit3\Converter\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class Result extends Template
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * Result constructor.
     * @param Template\Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->registry = $registry;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->registry->registry('amount');
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->registry->registry('from');
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->registry->registry('to');
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->registry->registry('value');
    }
}