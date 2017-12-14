<?php namespace Prettus\Validator;

use Illuminate\Contracts\Validation\Factory;

/**
 * Class LaravelValidator
 *
 * @package Prettus\Validator
 */
class LaravelValidator extends AbstractValidator
{
	/**
	 * Validator
	 *
	 * @var \Illuminate\Validation\Factory
	 */
	protected $validator;

	/**
	 * Construct
	 *
	 * @param \Illuminate\Contracts\Validation\Factory $validator
	 */
	public function __construct(Factory $validator)
	{
		$this->validator = $validator;

		$this->_mergeRules();
	}

	/**
	 *  合并规则
	 */
	private function _mergeRules()
	{
		$this->rules = array_merge($this->rules, $this->addRules());
	}

	/**
	 * 添加规则支持函数 闭包...
	 * @return array
	 */
	protected function addRules()
	{
		return [];
	}

	/**
	 * Pass the data and the rules to the validator
	 *
	 * @param string $action
	 *
	 * @return bool
	 */
	public function passes($action = null)
	{
		$rules      = $this->getRules($action);
		$messages   = $this->getMessages();
		$attributes = $this->getAttributes();
		$validator  = $this->validator->make($this->data, $rules, $messages, $attributes);

		if ($validator->fails())
		{
			$this->errors = $validator->messages();

			return false;
		}

		return true;
	}
}
