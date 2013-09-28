<?php
/**
*	Index.php
*
*	@author		{$author}
*	@package	Ac
*	@version	$Id$
*/

/**
*	Index view implementation.
*
*	@author		{$author}
*	@access		public
*	@package	Ac
*/
class Ac_View_Index extends Ac_ViewClass
{
	/**
	*	preprocess before forwarding.
	*
	*	@access public
	*/
	function preforward()
	{
		$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
		$base = 1024;
		$path = '/';

		//	全体サイズ
		$total = disk_total_space($path);
		$class = min((int)log($total , $base) , count($si_prefix) - 1);
		$this->af->setApp( 'total', sprintf('%1.1f' , $total / pow($base,$class)) . $si_prefix[$class] );

		//	空き容量
		$free = disk_free_space($path);
		$class = min((int)log($free , $base) , count($si_prefix) - 1);
		$this->af->setApp( 'free', sprintf('%1.1f' , $free / pow($base,$class)) . $si_prefix[$class] );

		//	使用容量
		$used = $total - $free;
		$class = min((int)log($used , $base) , count($si_prefix) - 1);
		$this->af->setApp( 'used', sprintf('%1.1f' , $used / pow($base,$class)) . $si_prefix[$class] );

		//	使用率
		$resio = round($used / $total * 100, 2);

		if( $handle = opendir( $this->config->get( 'pathSave' ) ) ){
			while( false !== ( $file = readdir( $handle ) ) ){
				if( preg_match( '/\.mp3$/', $file ) ){
					$files[] = $file;
				}
			}
		    closedir($handle);
		}
		if( isset( $files ) ){
			rsort( $files );
			$this->af->setApp( 'files', $files );
		}
	}
}
?>
