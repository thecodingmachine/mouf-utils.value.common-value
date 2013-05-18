<?php
namespace Mouf\Utils\Action;

use Mouf\Utils\Value\ValueInterface;

use Mouf\Utils\Value\ValueUtils;

use Mouf\Utils\Value\VariableInterface;

use Mouf\Html\HtmlElement\HtmlElementInterface;

/**
 * This action assigns a value to a variable.
 * 
 * @author David Négrier
 */
class Assign implements ActionInterface {
	
	private $variable;
	private $value;
	
	/**
	 * @Important $variable
	 * @Important $value
	 * @param VariableInterface $variable
	 * @param ValueInterface|string $value
	 */
	public function __construct(VariableInterface $variable, $value) {
		$this->variable = $variable;
		$this->value = $value;
	}
	
	/**
	 * Performs the action the object was designed to do.
	 */
	public function run() {
		$this->variable->setValue(ValueUtils::val($this->value));
	}
}