<?php
/**	ＵＴＦ８
*	Add.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Add Form implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Form_Add extends Ac_ActionForm
{
	/**
	*	@access private
	*	@var	array   form definition.
	*/
	var $form = array(
		'area'		=>  array(),
		'cd'		=>	array(),
		'week'		=>	array(	'required'	=>	true,	),
		'hour'		=>	array(),
		'minute'	=>	array(	'required'	=>	true,	),
		'term'		=>	array(	'required'	=>	true,	),
		'station'	=>	array(	'required'	=>	true,	),
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
*	Add action implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Action_Add extends Ac_ActionClass
{
	/**
	*	preprocess of Add Action.
	*
	*	@access public
	*	@return string	forward name(null: success.
	*								false: in case you want to exit.)
	*/
	function prepare()
	{
		if( 0 < $this->af->validate() ){
//			$this->af->setApp( 'warn', $this->msgValidateError );
			$this->af->setApp( 'warn', '入力エラー' );
//			return $this->view;
			return 'List';
		}
		return null;
	}

	/**
	*	Add action implementation.
	*
	*	@access public
	*	@return string  forward name.
	*/
	function perform()
	{
		$this->mgrDatas->add();

		$this->af->clearFormVars();

		$this->af->setApp( 'info', '追加しました' );
		return 'List';
	}
}

?>
