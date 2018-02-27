<?php
namespace Unit3\Converter\Controller\Display;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

class Result extends Action
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * Result constructor.
     * @param Context $context
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        Registry $registry
    )
    {
        parent::__construct($context);
        $this->registry = $registry;
    }


    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->set(__('Result'));

        // amount/1/from/BTC/to/USD/value/10665.0050/
        $a = $this->getRequest()->getParam('amount');
        $from = $this->getRequest()->getParam('from');
        $to = $this->getRequest()->getParam('to');
        $value = $this->getRequest()->getParam('value');

        $this->registry->register('amount', $a);
        $this->registry->register('from', $from);
        $this->registry->register('to', $to);
        $this->registry->register('value', $value);

        return $resultPage;
    }
}
