<?php 
namespace Mouf\Utils\Value;


/**
 * This object represents a GET parameter.
 * 
 * @author David Négrier
 */
class GetParamValue implements ScalarValueInterface, ArrayValueInterface {
	
	private $paramName;
	private $defaultValue;
	
	/**
	 * @param string $paramName The GET parameter this object represents
	 * @param string|ScalarValueInterface|ArrayValueInterface $defaultValue The default value to use if the 
	 */
	public function __construct($paramName = null, $defaultValue = null) {
		$this->paramName = $paramName;
		$this->defaultName = $defaultName;
	}
	
	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		if (isset($_GET[$paramName])) {
			$value = $_GET[$paramName];
			if (get_magic_quotes_gpc()==1)
			{
				// we check first for arrays
				if (is_array($value)){
					if (!array_walk_recursive($value, "stripslashes")) {
						throw new \Exception('<b>Error!</b> An error occured while walking GET array "'.$paramName.'".');
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
				$this->defaultValue;
			}
		}
	}
}