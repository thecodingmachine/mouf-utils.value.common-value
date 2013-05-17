<?php 
namespace Mouf\Utils\Value;


/**
 * This object represents a POST parameter.
 * 
 * @author David Négrier
 */
class PostParam implements ScalarValueInterface, ArrayValueInterface {
	
	private $paramName;
	private $defaultValue;
	
	/**
	 * @Important $paramName
	 * @param string $paramName The POST parameter this object represents
	 * @param string|ScalarValueInterface|ArrayValueInterface $defaultValue The default value to use if the parameter does not exist.
	 */
	public function __construct($paramName = null, $defaultValue = null) {
		$this->paramName = $paramName;
		$this->defaultValue = $defaultValue;
	}
	
	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		if (isset($_POST[$this->paramName])) {
			$value = $_POST[$this->paramName];
			if (get_magic_quotes_gpc()==1)
			{
				// we check first for arrays
				if (is_array($value)){
					if (!array_walk_recursive($value, "stripslashes")) {
						throw new \Exception('<b>Error!</b> An error occured while walking GET array "'.$this->paramName.'".');
					}
						
					return $value;
				}
				
				return stripslashes($value);
			}
			else
			{
				return $value;
			}
		} else {
			if ($this->defaultValue instanceof ValueInterface) {
				return $this->defaultValue->val();
			} else {
				return $this->defaultValue;
			}
		}
	}
	
	/**
	 * A casting to a string will return the parameter value, if it is a string.
	 * If it is an array, it will return "[Array]".
	 * 
	 * @return string
	 */
	public function __toString() {
		$val = $this->val();
		if (is_string($val)) {
			return $val;
		} else {
			return "[Array]";
		}
	}
}