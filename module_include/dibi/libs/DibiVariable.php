<?php

/**
 * dibi - tiny'n'smart database abstraction layer
 * ----------------------------------------------
 *
 * Copyright (c) 2005, 2009 David Grudl (http://davidgrudl.com)
 *
 * This source file is subject to the "dibi license" that is bundled
 * with this package in the file license.txt.
 *
 * For more information please see http://dibiphp.com
 *
 * @copyright  Copyright (c) 2005, 2009 David Grudl
 * @license    http://dibiphp.com/license  dibi license
 * @link       http://dibiphp.com
 * @package    dibi
 * @version    $Id: DibiVariable.php 174 2008-12-31 00:13:40Z david@grudl.com $
 */



/**
 * Default implemenation of IDibiVariable.
 * @package dibi
 */
class DibiVariable extends DibiObject implements IDibiVariable
{
	/** @var mixed */
	public $value;

	/** @var string */
	public $modifier;


	public function __construct($value, $modifier)
	{
		$this->value = $value;
		$this->modifier = $modifier;
	}



	public function toSql(DibiTranslator $translator, $modifier)
	{
		return $translator->formatValue($this->value, $this->modifier);
	}

}