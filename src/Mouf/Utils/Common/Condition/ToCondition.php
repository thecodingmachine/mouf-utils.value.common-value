<?php 
namespace Mouf\Utils\Common\Condition;

use Mouf\Utils\Common\ConditionInterface\ConditionInterface;
use Mouf\Utils\Value\ValueInterface;

/**
 * This object casts a variable to a condition (class implementing ConditionInterface)
 * 
 * @author David Négrier
 */
class ToCondition implements ConditionInterface {
	
	/**
	 * The value of our variable.
	 * 
	 * @var ValueInterface
	 */
	protected $value;
	
	/**
	 * @Important $value
	 * @param ValueInterface $value The value to convert into a condition.
	 */
	public function __construct($value = null) {
		$this->value = $value;
	}
	
	/**
	 * Returns true if the condition is met, false otherwise.
	 *
	 * @param mixed $caller The condition caller. Optional.
	 * @return bool
	 */
	public function isOk($caller = null) {
		return (bool) $this->value->val();
	}
}