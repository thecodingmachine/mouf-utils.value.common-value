<?php 
namespace Mouf\Utils\Value;

/**
 * This object represents a value picked in an array.
 * 
 * @author David Négrier
 */
class ArrayLookup implements ValueInterface {
	
	/**
	 * The array we picked the value into.
	 * @var array|ArrayValueInterface
	 */
	protected $array;
	protected $key;
	protected $defaultValue;
	
	/**
	 * @Important $array
	 * @Important $key
	 * @param ArrayValueInterface|array<string>|array<string,string> $array The array will be looking the value in.
	 * @param string|ScalarValueInterface $key The key we are looking for.
	 * @param string|ValueInterface $defaultValue The default value to use if the parameter does not exist.
	 */
	public function __construct($array = array(), $key = null, $defaultValue = null) {
		$this->array = $array;
		$this->key = $key;
		$this->defaultValue = $defaultValue;
	}
	
	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		if ($this->key instanceof ScalarValueInterface) {
			$key = $this->key->val();
		} else {
			$key = $this->key;
		}
		if ($this->array instanceof ArrayValueInterface) {
			$array = $this->array->val();
		} else {
			$array = $this->array;
		}
		
		if (isset($array[$key])) {
			return $array[$key];
		} else {
			if ($this->defaultValue instanceof ValueInterface) {
				return $this->defaultValue->val();
			} else {
				return $this->defaultValue;
			}
		}
	}
}