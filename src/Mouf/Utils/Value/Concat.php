<?php 
namespace Mouf\Utils\Value;

/**
 * This object represents a concatenation of values.
 * 
 * @author Pierre Vaidie
 */
class Concat implements ValueInterface {
	
	/**
	 * The array of values to concatenate.
	 * 
	 * @var ValueInterface[]
	 */
	protected $valuesArray;
	
	/**
	 * @Important
	 * @param ValueInterface[] $valuesArray The array of values to concatenate.
	 */
	public function __construct($valuesArray = null) {
		$this->valuesArray = $valuesArray;
	}

	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		$str = '';

		foreach($this->valuesArray as $value) {
			$str .= $value->val();
		}

		return $str;
	}
}