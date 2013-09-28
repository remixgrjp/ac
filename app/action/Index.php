<?php
/**
*	Index.php
*
*	@author	{$author}
*	@package   Ac
*	@version   $Id$
*/

/**
*	Index form implementation
*
*	@author	{$author}
*	@access	public
*	@package   Ac
*/

class Ac_Form_Index extends Ac_ActionForm
{
	/**
	*	@access   private
	*	@var	  array   form definition.
	*/
	var $form = array(
	);

	/**
	*	Form input value convert filter : sample
	*
	*	@access protected
	*	@param  mixed   $value  Form Input Value
	*	@return mixed		   Converted result.
	*/
	/*
	function _filter_sample($value)
	{
		//  convert to upper case.
		return strtoupper($value);
	}
	*/
}

/**
*	Index action implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Action_Index extends Ac_ActionClass
{
	/**
	*	preprocess Index action.
	*
	*	@access	public
	*	@return	string  Forward name (null if no errors.)
	*/
	function prepare()
	{
		/**
		if ($this->af->validate() > 0) {
			return 'error';
		}
		$sample = $this->af->get('sample');
		*/
		return null;
	}

	/**
	*	Index action implementation.
	*
	*	@access	public
	*	@return	string  Forward Name.
	*/
	function perform()
	{
		return 'Index';
	}
}
?>
