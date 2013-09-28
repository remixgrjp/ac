<?php
/**	ＵＴＦ８
*	Remove.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Remove Form implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Form_Remove extends Ac_ActionForm
{
	/**
	*	@access private
	*	@var	array   form definition.
	*/
	var $form = array(
		'file'		=>	array(	'required'	=>	true,	),
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
*	Remove action implementation.
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Action_Remove extends Ac_ActionClass
{
	/**
	*	preprocess of Remove Action.
	*
	*	@access public
	*	@return string	forward name(null: success.
	*								false: in case you want to exit.)
	*/
	function prepare()
	{
		if( 0 < $this->af->validate() ){
			$this->af->setApp( 'warn', 'パラメータエラー' );
			return 'Index';
		}
		return null;
	}

	/**
	*	Remove action implementation.
	*
	*	@access public
	*	@return string  forward name.
	*/
	function perform()
	{
		$file = $this->af->get( 'file' );

		//	ディレクトリトラバーサル（Directory Traversal）
		if( ! unlink( $this->config->get( 'pathSave' ).'/'.basename( $file ) ) ){
			$this->af->setApp( 'warn', "削除エラー($file)" );
		}else{
			$this->af->setApp( 'info', "削除しました($file)" );
		}

		return 'Index';
	}
}
?>
