<?php
/**	ＵＴＦ８
*	Del.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Del Form implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Form_Del extends Ac_ActionForm
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
*	Del action implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Action_Del extends Ac_ActionClass
{
	/**
	*	preprocess of Del Action.
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
	*	Del action implementation.
	*
	*	@access public
	*	@return string  forward name.
	*/
	function perform()
	{
		$cd = $this->af->get( 'cd' );

		$this->mgrDatas->del( $cd );

		$this->af->setApp( 'info', "削除しました($cd)" );

		$this->af->clearFormVars();

		return 'List';
	}
}
?>
