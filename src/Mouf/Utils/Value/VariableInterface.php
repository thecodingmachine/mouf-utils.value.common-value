<?php 
namespace Mouf\Utils\Value;

/**
 * Objects implementing the VariableInterface have a setValue method that can be used to set a value.
 * 
 * @author David Négrier
 */
interface VariableInterface {
	
	/**
	 * Sets the value of the variable.
	 * @param ValueInterface|string $value
	 */
	public function setValue($value);
}