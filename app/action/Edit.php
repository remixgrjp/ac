<?php
/**	ＵＴＦ８
*	Edit.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Edit Form implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Form_Edit extends Ac_ActionForm
{
	/**
	*	@access private
	*	@var	array   form definition.
	*/
	var $form = array(
		'area'		=>  array(),
		'cd'		=>	array(	'required'	=>	true,	),
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
*	Edit action implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Action_Edit extends Ac_ActionClass
{
	/**
	*	preprocess of Edit Action.
	*
	*	@access public
	*	@return string	forward name(null: success.
	*								false: in case you want to exit.)
	*/
	function prepare()
	{
		if( 0 < $this->af->validate() ){
//			$this->af->setApp( 'warn', $this->msgValidateError );
			$this->af->setApp( 'warn', 'パラメータエラー' );
//			return $this->view;
			return 'List';
		}
		return null;
	}

	/**
	*	Edit action implementation.
	*
	*	@access public
	*	@return string  forward name.
	*/
	function perform()
	{
		$crontab = $this->mgrDatas->getCrontab();

		$a = each( $crontab[$this->af->get( 'cd' )] );
		$this->af->set( 'week'		, $a['value']['week']	);
		$this->af->set( 'hour'		, $a['value']['hour']	);
		$this->af->set( 'minute'	, $a['value']['minute']	);
		$this->af->set( 'term'		, $a['value']['term']	);
		$this->af->set( 'station'	, $a['value']['station']);
		$this->af->set( 'comment'	, $a['key']				);

		return 'List';
	}
}

?>
