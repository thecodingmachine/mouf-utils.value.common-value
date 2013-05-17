<?php 
namespace Mouf\Utils\Value;


/**
 * This object triggers an exception each time we try to call the val() method on it.
 * Can have plenty of use case. For instance, to trigger an error message if a value is missing in a GetParam (by
 * adding the exception to the defaultValue property).
 * 
 * @author David Négrier
 */
class ExceptionValue implements StringValueInterface, BoolValueInterface, IntValueInterface, ArrayValueInterface,
	ObjectValueInterface, MapValueInterface {
	
	private $message;
	private $code;
	private $exceptionType;
	
	/**
	 * @Important $message
	 * @param string|StringValueInterface $message The message displayed in the exception.
	 * @param number $code The exception code 
	 * @param string $exceptionType The fully qualified class name for the exception to trigger. Defaults to "Exception"
	 */
	public function __construct($message = "", $code = 0, $exceptionType = "Exception") {
		$this->message = $message;
		$this->code = $code;
		$this->exceptionType = $exceptionType;
	}
	
	/**
	 * Returns the value represented by this object.
	 * 
	 * @return mixed
	 */
	public function val() {
		if (empty($this->exceptionType)) {
			$exceptionType = "Exception";
		} else {
			$exceptionType = $this->exceptionType;
		}
		throw new $exceptionType($this->message, $this->code);
	}
}