<?php

namespace Unit3\Converter\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Data\Form\FormKey\Validator;
use Unit2\Converter\Helper\GoogleConverter;

class Index extends Action
{
    
    protected $validator;
    
    protected $googleConverter;
    
    public function __construct(
        Context $context,
        Validator $validator,
        GoogleConverter $googleConverter
    )
    {
        parent::__construct($context);

        $this->validator = $validator;
        $this->googleConverter = $googleConverter;

    }

    public function execute()
    {
        $resultRedirect = $this->ResultFactory->create(ResultFactory::TYPE_REDIRECT);

        if($this->validator->validate($thid->getRequest())) {
            $this->messageManager->addNoticeMessage('Not valid from key');
            return $resultRedirect->setPath('*/display/select');
        }


        $params = $this->getRequest()->getParams();
        $amount = $params['amount'];
        $from = $params['from'];
        $to = $params['to'];
        \Zend_Debug::dump($params);
        exit;

        $res = $this->googleConverter->convert($amount, $from, $to);
        if (isset($res['error'])) {
            return $resultRedirect->setPath('*/display/error');
        }

        return $resultRedirect->setPath('*/display/result');
        
    }
    
}