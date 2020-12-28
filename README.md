### ■ソフト名称
	エアチェック クーロンマネージャー

### ■バージョン
	1.0

### ■ソフトの概要
	　Linux など UNIX でラジコをタイマー録音する為のクーロンを 編集するための
	ＷＥＢアプリケーションです。

### ■動作条件
	　シェルからラジコの録音ができていること。
	　設置対象のサーバで、Apache などのＷＥＢサーバから php が実行できている
	必要があります。フレームワーク Ethna は、安定バージョン 2.5.0。
	その他の詳細なモジュールは、それぞれ下記を参考にダウンロード＆インストールし
	てください。
	http://ethna.jp/

	動作確認済の環境例１
		CentOS release 6.4 (Final)
		Apache 2.0
		PHP Version 5.3.3
		php-mbstring 5.3.3-23.el6_4
		PEAR Version: 1.9.4
			（pear list）
			Archive_Tar      1.3.11
			Console_Getopt   1.3.1
			DB               1.7.14
			PEAR             1.9.4
			Structures_Graph 1.0.4
			XML_RPC          1.5.5
			XML_Util         1.2.1
		Smarty-2.6.26
		Ethna 2.5.0

	　ソースは UTF-8 です。

### ■インストールの手順
	１．設置対象のサーバで直接ダウンロード・解凍するか、解凍済みの全てのファイ
	ルをディクトリ構造のままＦＴＰで設置します。

	　主要なファイルとディクトリ構造
		ac
		│  README.md	★このファイル
		├─etc
		│      ac-ini.php	★設定ファイル
		│      crontab.txt	★クーロンデータ
		├─locale
		├─www
		│  │  unittest.php
		│  │  xmlrpc.php
		│  │  info.php
		│  │  index.php	★エントリーポイント
		│  ├─css
		│  └─js
		├─template
		│  └─ja_JP
		├─bin
		├─app
		│  │  Ac_Datas.php	★クーロン制御ファイル
		│  ├─action_cli
		│  ├─action_xmlrpc
		│  ├─view
		│  ├─action
		│  ├─test
		│  └─plugin
		│      ├─Filter
		│      ├─Smarty
		│      └─Validator
		├─log		★ログディレクトリ
		├─schema
		├─skel
		├─tmp		★テンポラリディレクトリ
		└─lib

	２．必要最小限のパーミッション設定。
	　エントリーポイントには不特定者の read 権限を付けます。
	　ログディレクトリ、テンポラリディレクトリ、クーロンデータには、apache プロ
	セスの write 権限を付けます。

	３．ＷＥＢサーバのDocumentRootを変更することが可能ならば、解凍した www フォ
	ルダを DocumentRoot にするのが最も簡単です。
	　既存の DocumentRoot に配置したい場合、シンボリックリンクを張るか、エントリ
	ーポイントを含む、www フォルダ内のファイルを既存の DocumentRoot に配置し エ
	ントリーポイントファイルの２行目
		define('BASE', '/var/www/cgi-bin/ac/radiko/ac');
	を実際の絶対パスに書き換えます。

	４．Linux の設定例。
	　apache のプロセスから sudoコマンドを実行するため
		sudo visudo
	コマンドで、
		apache  ALL=(ALL)       NOPASSWD: /usr/bin/crontab
		Defaults:apache !requiretty
	を最下行に追加します。
	　apache グループの cron 実行ユーザを追加します。
		sudo useradd -g apache radiko
	　念のため、apache や radiko でログインできないことを確認すべきです。

	５．設定ファイル ac-ini.php 設定例。
	　cron 実行ユーザ。
		'cronUser'	=>	'radiko',
	　ラジコ録音シェル(絶対パス)。
		'command'	=>	'/usr/local/bin/rec_radiru.sh',
	　録音ファイル保存フォルダ(絶対パス)。
		'pathSave'	=>	'/var/www/html',

	６．クーロン生成スクリプトの修正。
	　必要に応じ、あなたのラジコ録音シェルのパラメータに合わせて、encodeData() 
	の $txt を修正します。現状のラジコ録音シェルは、
		ステーションＩＤ
		録音時間（分）
		保存フォルダ
	のパラメータを指定するようになっています。

### ■アンインストールの手順
	　インストール時に解凍したacフォルダごと削除するだけでアンインストール
	が完了します。ＷＥＢサーバの設定やLinuxユーザーを元へ戻すのをお忘れなく。

### ■使用方法
	　次の URL でデモを公開しています。
	　http://remix.asia/service/ac_demo/radiko/

### ■取り扱い種別
	　無料です。
	　作者は本ソフトウエアを使用したことにより生じた損害について一切の責任を負い
	ません。

### ■金額
	無料

### ■送金方法
	　寄付していただける場合、お振込先銀行口座を返信いたしますので

		http://www.remix.asia/service/formmail/

	より、ご連絡ください。

### ■試用制限
	制限はありません。利用者の責任で設置・運用お願いいたします。

### ■連絡先
	http+formmail＠ＲＥＭＩＸ．ＡＳＩＡ
	ＲＥＭＩＸ / ベクター
	http://www.vector.co.jp/vpack/browse/person/an044540.html

### ■変更履歴
	2013-09-29	Version 1.0 初版リリース
