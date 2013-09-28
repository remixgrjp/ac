<?php
/**	ＵＴＦ８
*	Area.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Area Form implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Form_Area extends Ac_ActionForm
{
	/**
	*	@access private
	*	@var	array   form definition.
	*/
	var $form = array(
		'area'		=>  array(	'required'	=>	true,	),
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
*	Area action implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Action_Area extends Ac_ActionClass
{
	/**
	*	preprocess of Area Action.
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
	*	Area action implementation.
	*
	*	@access public
	*	@return string  forward name.
	*/
	function perform()
	{
		$area = $this->mgrDatas->setArea( $this->af->get( 'area' ) );

		return 'List';
	}
}
?>
