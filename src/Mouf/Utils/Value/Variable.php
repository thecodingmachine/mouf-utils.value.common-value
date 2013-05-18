<?php 
namespace Mouf\Utils\Value;

/**
 * This object represents a variable (a simple object that can store a value using setValue() and get the value using val()).
 * 
 * @author David Négrier
 */
class Variable implements ValueInterface, VariableInterface {
	
	/**
	 * The value of our variable.
	 * 
	 * @var ValueInterface
	 */
	protected $value;
	
	/**
	 * @param ValueInterface|string $value The value of our variable.
	 */
	public function __construct($value = null) {
		$this->value = $value;
	}
	
	/**
	 * Sets the value of the variable.
	 * @param ValueInterface|string $value
	 */
	public function setValue($value) {
		$this->value = $value;
	}
	
	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		if ($this->value instanceof ValueInterface) {
			return $this->value->val();
		} else {
			return $this->value;
		}
	}
}