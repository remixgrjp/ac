<?php
/**	ＵＴＦ８
*	Search.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Search Form implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Form_Search extends Ac_ActionForm
{
	/**
	*	@access private
	*	@var	array   form definition.
	*/
	var $form = array(
		'area'		=>  array(),
		'cd'		=>	array(),
		'week'		=>	array(),
		'hour'		=>	array(),
		'minute'	=>	array(),
		'term'		=>	array(),
		'station'	=>	array(),
		'comment'	=>	array(),
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
*	Search action implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Action_Search extends Ac_ActionClass
{
	/**
	*	preprocess of Search Action.
	*
	*	@access public
	*	@return string	forward name(null: success.
	*								false: in case you want to exit.)
	*/
	function prepare()
	{
		return null;
	}

	/**
	*	Search action implementation.
	*
	*	@access public
	*	@return string  forward name.
	*/
	function perform()
	{
		return 'List';
	}
}

?>
