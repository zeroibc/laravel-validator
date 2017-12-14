<?php namespace Prettus\Validator\Exceptions;

use Dingo\Api\Exception\ResourceException;
use Illuminate\Support\MessageBag;

/**
 * Class ValidatorException
 * @package Prettus\Validator\Exceptions
 */
class ValidatorException extends ResourceException
{


    /**
     * @param MessageBag $messageBag
     */
    public function __construct(MessageBag $messageBag)
    {
        parent::__construct('参数验证失败',$messageBag);
    }


}
