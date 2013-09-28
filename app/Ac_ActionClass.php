<?php
// vim: foldmethod=marker
/**
*	Ac_ActionClass.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

// {{{ Ac_ActionClass
/**
*	action execution class
*
*	@author	 {$author}
*	@package	Ac
*	@access	 public
*/
class Ac_ActionClass extends Ethna_ActionClass
{
	var $mgrDatas;		/**	@var	object	&Ethna_AppManager	*/

	/**
	*	constructor Ac_ActionClass
	*
	*	@access public
	*	@param  object  Ethna_Backend   $backend    backendオブジェクト
	*/
	function Ac_ActionClass( &$backend )
	{	///	親クラスのコンストラクタのコールを忘れずに
		parent::Ethna_ActionClass( $backend );

		///	2.5.0-preview2 から追加されているので注意	停止してしまう
//		$this->logger =& $backend->getLogger();

		///	config をcfg連想配列で参照可能に	複製なので代入してもオリジナルではないので注意
//		$this->cfg	= $backend->config->get();	///	参照渡しはPHP4NOTICE

		$this->mgrDatas		=& $backend->getManager( 'datas' );
	}

	/**
	*	authenticate before executing action.
	*
	*	@access public
	*	@return string  Forward name.
	*				  (null if no errors. false if we have something wrong.)
	*/
	function authenticate()
	{
		return parent::authenticate();
	}

	/**
	*	Preparation for executing action. (Form input check, etc.)
	*
	*	@access public
	*	@return string  Forward name.
	*				  (null if no errors. false if we have something wrong.)
	*/
	function prepare()
	{
		return parent::prepare();
	}

	/**
	*	execute action.
	*
	*	@access public
	*	@return string  Forward name.
	*				  (we does not forward if returns null.)
	*/
	function perform()
	{
		return parent::perform();
	}
}
// }}}
?>
