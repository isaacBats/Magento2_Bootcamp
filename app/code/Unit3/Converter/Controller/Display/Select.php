<?php
namespace Unit3\Converter\Controller\Display;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Select extends Action
{

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
        // $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        // $resultPage->getConfig()->getTitle()->set(__('Select'));
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
