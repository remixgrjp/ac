<?php
/**	ＵＴＦ８
*	Ac_Datas.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Ac_DatasManager
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_DatasManager extends Ethna_AppManager
{
	var $data;
	var $fileData;
	var $fileCron;

	/**
	*	constructor Ac_DatasManager
	*		初期化要件がなければ削除してかまわない
	*
	*	@access	public
	*	@param	object	Ethna_Backend	$backend	backendオブジェクト
	*/
	function Ac_DatasManager( &$backend )
	{	///	親クラスのコンストラクタのコールを忘れずに
		parent::Ethna_AppManager($backend);

		$this->bk	=& $backend;
		$this->bk->log( LOG_DEBUG, "★Ac_DatasManager★" );

		$this->fileData = $this->config->get('fileData');
		$this->fileCron = $this->config->get('fileCron');
		$this->decodeData();
	}

	/**
	*	decodeData
	*
	*	@access public
	*	@return array data
	*/
	function decodeData()
	{
//		$this->data = json_decode( file_get_contents( $this->fileData ), true );	// >=PHP5.2
		$this->data = unserialize( file_get_contents( $this->fileData ) );
		if( !$this->data || ( 0 == count( $this->data ) ) ){
			///	初期化
			$this->data['crontab']= array();	///	インデックスゼロ使えないのでダミー挿入
			$this->encodeData();	///	作り直し
		}
//var_dump($this->data);
//		$x['area'] = 'JP13';
//		each( $this->data );
//		while( list(, $v) = each( $this->data ) ){
//			$x['crontab'][] = $v;
//		}
//		file_put_contents( $this->fileData, json_decode( $x, true ) );	// >=PHP5.2
//		file_put_contents( $this->fileData, serialize( $x ) );
	}

	/**
	*	encodeData
	*
	*	sudo visudo
	*		apache  ALL=(ALL)       NOPASSWD: /usr/bin/crontab
	*		Defaults:apache !requiretty
	*
	*	@access public
	*	@return array data
	*/
	function encodeData()
	{
//$this->data['crontab'][]= array();
		$this->sorted();
//		file_put_contents( $this->fileData, json_encode( $this->data ) );	// >=PHP5.2
		file_put_contents( $this->fileData, serialize( $this->data ) );
		$txt='';
		each( $this->data['crontab'] );	///	インデックスゼロダミースキップ
		while( list(, $v) = each( $this->data['crontab'] ) ){
			$a = each($v);
			$txt .= $a['value']['minute'];
			$txt .= ' '.$a['value']['hour'];
			$txt .= ' * *';
			list(, $w) = each( $a['value']['week'] );
			$txt .= " $w";
			while( list(, $w) = each( $a['value']['week'] ) ){
				$txt .= ",$w";
			}
			$txt .= ' '.$this->config->get( 'command' );	///	★ラジコ録音シェル
			$txt .= ' '.$a['value']['station'];				///	★ステーションＩＤ
			$txt .= ' '.$a['value']['term'];				///	★録音時間（分）
			$txt .= ' '.$this->config->get( 'pathSave' );	///	★保存フォルダ
			$txt .= ' >/dev/null 2>&1';
///			$txt .= ' >/dev/null 2>/tmp/error.txt';
			$txt .= ' #'.$a['key']."\n";
			unset( $w );
		}
		unset( $v );
		$this->bk->log( LOG_DEBUG, "\n$txt" );
		file_put_contents( $this->fileCron, $txt );

		$cronUser = $this->config->get( 'cronUser' );
		$cmd = "sudo crontab -u {$cronUser} {$this->fileCron}";
		$this->bk->log( LOG_DEBUG, $cmd );
		if( $this->config->get( 'demo' ) ){
			$this->af->setApp( 'crontab_l', 'デモの為、追加・コメント更新・削除は制限しています。' );
		}else{
			$q = shell_exec( $cmd );
			$this->af->setApp( 'crontab_l', $txt );
		}
	}

	/**
	*	form2data
	*
	*	@access	public
	*	@param	int		$cd	index
	*	@return	void
	*/
	function form2data()
	{
		$this->data['crontab'][]= array(
			$this->af->get( 'comment' ) => array(
				'week'		=> $this->af->get( 'week' ),
				'hour'		=> $this->af->get( 'hour' ),
				'minute'	=> $this->af->get( 'minute' ),
				'term'		=> $this->af->get( 'term' ),
				'station'	=> $this->af->get( 'station' ),
			),
		);
	}

	/**
	*	replace
	*
	*	@access	public
	*	@param	int		$cd	index
	*	@return	void
	*/
	function replace( $cd )
	{
		if( $this->config->get( 'demo' ) ){
			$demo = each( $this->data['crontab'][$cd] );
			$this->af->set( 'comment', $demo['key'] );
		}

		unset( $this->data['crontab'][$cd] );

		$this->form2data();

		$this->encodeData();
	}

	/**
	*	add
	*
	*	@access	public
	*	@return	void
	*/
	function add()
	{
		if( ! $this->config->get( 'demo' ) ){
			$this->form2data();
		}

		$this->encodeData();
	}

	/**
	*	del
	*
	*	@access	public
	*	@param	int		$cd	index
	*	@return	void
	*/
	function del( $cd )
	{
		if( ! $this->config->get( 'demo' ) ){
			unset( $this->data['crontab'][$cd] );
		}

		$this->encodeData();
	}

	/**
	*	sorted
	*
	*	@access	public
	*	@return	void
	*/
	function sorted()
	{
		usort( $this->data['crontab'], array( $this, 'compare' ) );
	}

	/**
	*	compare
	*
	*	@access	public
	*	@param	array	data
	*	@param	array	data
	*	@return	void
	*/
	function compare( $a, $b )
	{
		$a = each($a);
		$b = each($b);
//echo $a['key'].'/'.$b['key'].'<br>';
//		return strcmp($a['key'], $b['key']);
		if( 0 === $r = strcmp($a['key'], $b['key']) ){
//echo $a['value']['hour'].'/'.$b['value']['hour'].'<br>';
			if( $a['value']['hour'] == $b['value']['hour'] ){
				$r = ($a['value']['minute'] < $b['value']['minute']) ? -1 : 1;
			}else{
				$r = ($a['value']['hour'] < $b['value']['hour']) ? -1 : 1;
			}
		}
		return $r;
	}

	/**
	*	getArea
	*
	*	@access public
	*	@return string	JP1,,,JP47
	*/
	function getArea()
	{
///		return 'JP13';
		return $this->data['area'];
	}

	/**
	*	setArea
	*
	*	@access public
	*	@param	string	$area	area id ISO 3166-2 http://ja.wikipedia.org/wiki/ISO_3166-2:JP
	*/
	function setArea( $area = 'JP13' )
	{
		$this->data['area'] = $area;

		$this->encodeData();
	}

	/**
	*	getCrontab
	*
	*	@access public
	*	@return array data
	*/
	function getCrontab()
	{
		return $this->data['crontab'];
	}
}

/**
*	Ac_Datas
*
*	@author	 {$author}
*	@access	 public
*	@package	Ac
*/
class Ac_Datas extends Ethna_AppObject
{
	/**
	*	property display name getter.
	*
	*	@access public
	*/
	function getName($key)
	{
		return $this->get($key);
	}
}
?>
