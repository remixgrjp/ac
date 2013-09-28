<?php
/*
*	ＵＴＦ８
*	ac-ini.php
*
*	update:
*/
$config = array(
	'DESCRIPTION'=>	'エアーチェック。',
	'KEYWORDS'	=>	'エアーチェック,fm,am,radiko,cron',
	'APPNAME'	=>	'エアーチェック',	///	AC
	'VERSION'	=>	'1.0',	///	

	'fileData'	=>	BASE.'/etc/crontab.txt',	///	
	'fileCron'	=>	BASE.'/tmp/crontab.txt',	///	
	'urlStation'=>	'http://radiko.jp/v2/station/list',	///	
	'cronUser'	=>	'radiko',	///	
	'command'	=>	'/usr/local/bin/rec_radiko.sh',	///	
	'pathSave'	=>	'/var/www/html',	///	
	'demo'		=>	false,	///

	// site
	'url' => '',

	// debug
	// (to enable ethna_info and ethna_unittest, turn this true)
//	'debug' => true,	///	★リリース時falseに
	'debug' => false,	///	★通常運用

	// db
	// sample-1: single db
	// 'dsn' => 'mysql://user:password@server/database',
	//
	// sample-2: single db w/ multiple users
	// 'dsn'   => 'mysql://rw_user:password@server/database', // read-write
	// 'dsn_r' => 'mysql://ro_user:password@server/database', // read-only
	//
	// sample-3: multiple db (slaves)
	// 'dsn'   => 'mysql://rw_user:password@master/database', // read-write(master)
	// 'dsn_r' => array(
	//	 'mysql://ro_user:password@slave1/database',		 // read-only(slave)
	//	 'mysql://ro_user:password@slave2/database',		 // read-only(slave)
	// ),

//	log
//	sample-1: sigile facility
//	'log_facility'		  => 'echo',
//	'log_level'			 => 'warning',
//	'log_option'			=> 'pid,function,pos',
//	'log_filter_do'		 => '',
//	'log_filter_ignore'	 => 'Undefined index.*%%.*tpl',

//	sample-2: mulitple facility
	'log' => array(
//		'echo'  => array(	///	★リリース時無効に
//			'level'	=> 'warning',
//		),
		'file'  => array(
			'level'	=> 'info',	///	★通常運用
		///	'level'	=> 'notice',
		///	'level'	=> 'warning',
		///	'level'	=> 'debug',
		///	'file'		  => '/var/log/ac.log',
			'mode'		  => 0666,
		),
//		'alertmail'	=> array(
//			'level'	=> 'err',	///	通常運用
//			'mailaddress'	=> 'mail@mydomain',
//		),
	),
	'log_option'		=> 'pid,function,pos',
	'log_filter_do'		=> '',
	'log_filter_ignore'	=> 'Undefined index.*%%.*tpl',

	// memcache
	// sample-1: single (or default) memcache
	// 'memcache_host' => 'localhost',
	// 'memcache_port' => 11211,
	// 'memcache_use_pconnect' => false,
	// 'memcache_retry' => 3,
	// 'memcache_timeout' => 3,
	//
	// sample-2: multiple memcache servers (distributing w/ namespace and ids)
	// 'memcache' => array(
	//	 'namespace1' => array(
	//		 0 => array(
	//			 'memcache_host' => 'cache1.example.com',
	//			 'memcache_port' => 11211,
	//		 ),
	//		 1 => array(
	//			 'memcache_host' => 'cache2.example.com',
	//			 'memcache_port' => 11211,
	//		 ),
	//	 ),
	// ),

	// i18n
	//'use_gettext' => false,
	
	// mail 
	//'mail_func_workaround' => false,

	// Smarty
	//'renderer' => array(
	//	'smarty' => array(
	//		'left_delimiter' => '{',
	//		'right_delimiter' => '}',
	//	),
	//),

	// csrf
	// 'csrf' => 'Session',

	'area'		=>  array(
		'name'		=>	'area',
		'required'	=>	false,
		'form_type'	=>	FORM_TYPE_SELECT,
		'type'		=>	VAR_TYPE_STRING,
		'default'	=>	'JP13',
		'option'	=>	array(
			'JP1'	=>'HOKKAIDO',
			'JP2'	=>'AOMORI',
			'JP3'	=>'IWATE',
			'JP4'	=>'MIYAGI',
			'JP5'	=>'AKITA',
			'JP6'	=>'YAMAGATA',
			'JP7'	=>'FUKUSHIMA',
			'JP8'	=>'IBARAKI',
			'JP9'	=>'TOCHIGI',
			'JP10'	=>'GUNMA',
			'JP11'	=>'SAITAMA',
			'JP12'	=>'CHIBA',
			'JP13'	=>'TOKYO',
			'JP14'	=>'KANAGAWA',
			'JP15'	=>'NIIGATA',
			'JP16'	=>'TOYAMA',
			'JP17'	=>'ISHIKAWA',
			'JP18'	=>'FUKUI',
			'JP19'	=>'YAMANASHI',
			'JP20'	=>'NAGANO',
			'JP21'	=>'GIFU',
			'JP22'	=>'SHIZUOKA',
			'JP23'	=>'AICHI',
			'JP24'	=>'MIE',
			'JP25'	=>'SHIGA',
			'JP26'	=>'KYOTO',
			'JP27'	=>'OSAKA',
			'JP28'	=>'HYOGO',
			'JP29'	=>'NARA',
			'JP30'	=>'WAKAYAMA',
			'JP31'	=>'TOTTORI',
			'JP32'	=>'SHIMANE',
			'JP33'	=>'OKAYAMA',
			'JP34'	=>'HIROSHIMA',
			'JP35'	=>'YAMAGUCHI',
			'JP36'	=>'TOKUSHIMA',
			'JP37'	=>'KAGAWA',
			'JP38'	=>'EHIME',
			'JP39'	=>'KOUCHI',
			'JP40'	=>'FUKUOKA',
			'JP41'	=>'SAGA',
			'JP42'	=>'NAGASAKI',
			'JP43'	=>'KUMAMOTO',
			'JP44'	=>'OHITA',
			'JP45'	=>'MIYAZAKI',
			'JP46'	=>'KAGOSHIMA',
			'JP47'	=>'OKINAWA',
		),
	),
);
?>
