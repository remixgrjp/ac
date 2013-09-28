<?php
/**	ＵＴＦ８
*	List.php
*
*	@author		{$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	List view implementation.
*
*	@author		{$author}
*	@access	 public
*	@package	Ac
*/
class Ac_View_List extends Ac_ViewClass
{
	/**
	*	preprocess before forwarding.
	*
	*	@access public
	*/
	function preforward()
	{
		$this->af->setDef( 'area', $this->config->get( 'area' ) );

		///	PHP5からPEARライブラリを使う事なく、XMLを簡単に読み込める
		$area = $this->mgrDatas->getArea();

		$xml = simplexml_load_file( $this->config->get( 'urlStation' )."/$area.xml" );
/*
PHP Warning: simplexml_load_file(http://radiko.jp/v2/station/list/JP13.xml): failed to open stream: \xe6\x8e\xa5\xe7\xb6\x9a\xe3\x81\x8c\xe3\x82\xbf\xe3\x82\xa4\xe3\x83\xa0\xe3\x82\xa2\xe3\x82\xa6\xe3\x83\x88\xe3\x81\x97\xe3\x81\xbe\xe3\x81\x97\xe3\x81\x9f in /var/www/cgi-bin/ac/app/view/List.php on line 37, referer: http://192.168.254.3/index.php?action_Search=0
PHP Warning: simplexml_load_file(): I/O warning : failed to load external entity "http://radiko.jp/v2/station/list/JP13.xml" in /var/www/cgi-bin/ac/app/view/List.php on line 37, referer: http://192.168.254.3/index.php?action_Search=0
PHP Notice: Trying to get property of non-object in /var/www/cgi-bin/ac/app/view/List.php on line 39, referer: http://192.168.254.3/index.php?action_Search=0
PHP Warning: Invalid argument supplied for foreach() in /var/www/cgi-bin/ac/app/view/List.php on line 39, referer: http://192.168.254.3/index.php?action_Search=0
*/
		$stations = array( ''=>'' );
		foreach( $xml->station as $v ){
			$stations[(string)$v->id] = (string)$v->name;
		}
		$def=$this->af->getDef( 'station' );
		$def['option'] = $stations;
		$this->af->setDef( 'station', $def );

		if( ! $this->af->get( 'area' ) ){
			$this->af->set( 'area', $this->mgrDatas->getArea() );
		}

		$this->af->setApp( 'crontab', $this->mgrDatas->getCrontab() );
	}
}
?>
