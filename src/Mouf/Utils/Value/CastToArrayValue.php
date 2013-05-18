<?php 
namespace Mouf\Utils\Value;

/**
 * Takes any object implementing ValueInterface and
 * cast it into an object implementing ArrayValueInterface.
 * Throws an exception if the value from the object
 * is not an array (or a Traversable object). 
 * 
 * @author David Négrier
 */
class CastToArrayValue implements ArrayValueInterface {
	
	/**
	 * The array we picked the value into.
	 * @var ValueInterface
	 */
	protected $array;
	
	/**
	 * @Important $array
	 * @param ValueInterface $array The object to cast into an ArrayValueInterface.
	 */
	public function __construct(ValueInterface $array) {
		$this->array = $array;
	}
	
	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		$val = $this->array->val();
		
		if (!is_array($val) && !$val instanceof \Traversable) {
			throw new \Exception("Error while casting value to ArrayValueInterface. The value evaluated is not an array.");
		}
		return $val;
	}
}