<?php

/**
 * This file is part of the Nette Framework (http://nette.org)
 * Copyright (c) 2004 David Grudl (http://davidgrudl.com)
 */

namespace Nette\Utils;

use Nette;


/**
 * The exception that indicates error of the last Regexp execution.
 *
 * @author     David Grudl
 */
class RegexpException extends \Exception
{
	public static $messages = array(
		PREG_INTERNAL_ERROR => 'Internal error',
		PREG_BACKTRACK_LIMIT_ERROR => 'Backtrack limit was exhausted',
		PREG_RECURSION_LIMIT_ERROR => 'Recursion limit was exhausted',
		PREG_BAD_UTF8_ERROR => 'Malformed UTF-8 data',
		5 => 'Offset didn\'t correspond to the begin of a valid UTF-8 code point', // PREG_BAD_UTF8_OFFSET_ERROR
	);


	public function __construct($message, $code = NULL, $pattern = NULL)
	{
		if (!$message) {
			$message = (isset(self::$messages[$code]) ? self::$messages[$code] : 'Unknown error') . ($pattern ? " (pattern: $pattern)" : '');
		}
		parent::__construct($message, $code);
	}

}
