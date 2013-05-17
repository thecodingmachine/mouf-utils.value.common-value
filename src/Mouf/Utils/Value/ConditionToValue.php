<?php 
namespace Mouf\Utils\Value;

use Mouf\Utils\Common\ConditionInterface\ConditionInterface;

/**
 * This object casts a condition (class implementing ConditionInterface) to a variable (class implementing BoolValueInterface)
 * 
 * @author David Négrier
 */
class ConditionToValue implements BoolValueInterface {
	
	/**
	 * The value of our variable.
	 * 
	 * @var ConditionInterface
	 */
	protected $condition;
	
	/**
	 * @Important $condition
	 * @param ConditionInterface $condition The condition to convert into a value.
	 */
	public function __construct($condition = null) {
		$this->condition = $condition;
	}
	
	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		return $this->condition->isOk();
	}
}