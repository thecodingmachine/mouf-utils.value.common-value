<?php
namespace Mouf\Utils\Action;

use Mouf\Utils\Value\ArrayValueInterface;

use Mouf\Utils\Value\ValueInterface;

use Mouf\Utils\Value\ValueUtils;

use Mouf\Utils\Value\VariableInterface;

use Mouf\Html\HtmlElement\HtmlElementInterface;

use Traversable;

/**
 * This action loops over an array and triggers actions for each item.
 * 
 * @author David Négrier
 */
class ForEachAction implements ActionInterface {
	
	private $array;
	private $key;
	private $value;
	private $actions;

	/**
	 * 
	 * @Important $array
	 * @Important $key
	 * @Important $value
	 * @Important $actions
	 * @param ArrayValueInterface|array|Traversable $array The array we are travering
	 * @param VariableInterface $key The variable we will assign the key to (optionnal)
	 * @param VariableInterface $value The variable we will assign the item
	 * @param array<ActionInterface> $actions The list of actions to perform
	 */
	public function __construct(ArrayValueInterface $array, VariableInterface $key = null, VariableInterface $value = null, array $actions = array()) {
		$this->array = $array;
		$this->key = $key;
		$this->value = $value;
		$this->actions = $actions;
	}
	
	/**
	 * Performs the action the object was designed to do.
	 */
	public function run() {
		$array = ValueUtils::val($this->array);
		foreach ($array as $key => $value) {
			if ($this->key != null) {
				$this->key->setValue($key);
			}
			if ($this->value != null) {
				$this->value->setValue($value);
			}
			foreach ($this->actions as $action) {
				$action->run();
			}
		}
	}
}