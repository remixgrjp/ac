<?php
// vim: foldmethod=marker
/**
*	Ac_ViewClass.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

// {{{ Ac_ViewClass
/**
*	View class.
*
*	@author	 {$author}
*	@package	Ac
*	@access	 public
*/
class Ac_ViewClass extends Ethna_ViewClass
{
	var $mgrDatas;		/**	@var	object	&Ethna_AppManager	*/

	/**
	*	constructor Ethna_ViewClass
	*
	*	@access	public
	*	@param	object	Ethna_Backend	$backend    backendオブジェクト
	*	@param	string	$forward_name	ビューに関連付けられている遷移名
	*	@param	string	$forward_path	ビューに関連付けられているテンプレートファイル名
	*/
	function Ac_ViewClass( &$backend, $forward_name, $forward_path )
	{	///	親クラスのコンストラクタのコールを忘れずに
		parent::Ethna_ViewClass( $backend, $forward_name, $forward_path );

		$this->mgrDatas		=& $backend->getManager( 'datas' );
///	setlocale(LC_ALL,'ja_JP');	///	ablenet効かない
	}

	/**
	*	set common default value.
	*
	*	@access protected
	*	@param  object  Ac_Renderer  Renderer object.
	*/
	function _setDefault(&$renderer)
	{
		$renderer->setPropByRef( 'viewName', $this->forward_name );
		
		///	templateでアクション名をで参照可能に（デバック）
		$controller	=& $this->backend->getController();
		$actionName	= $controller->getCurrentActionName();
		$renderer->setPropByRef( 'actionName', $actionName );

		///	templateでフォーム定義をで参照可能に	$formDef['utitle']['name']等として表示名を取得する
		$renderer->setPropByRef( 'formDef', $this->af->getDef() );
	}
}
// }}}
?>
