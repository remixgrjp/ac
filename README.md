### ���\�t�g����
	�G�A�`�F�b�N �N�[�����}�l�[�W���[

### ���o�[�W����
	1.0

### ���\�t�g�̊T�v
	�@Linux �Ȃ� UNIX �Ń��W�R���^�C�}�[�^������ׂ̃N�[������ �ҏW���邽�߂�
	�v�d�a�A�v���P�[�V�����ł��B

### ���������
	�@�V�F�����烉�W�R�̘^�����ł��Ă��邱�ƁB
	�@�ݒu�Ώۂ̃T�[�o�ŁAApache �Ȃǂ̂v�d�a�T�[�o���� php �����s�ł��Ă���
	�K�v������܂��B�t���[�����[�N Ethna �́A����o�[�W���� 2.5.0�B
	���̑��̏ڍׂȃ��W���[���́A���ꂼ�ꉺ�L���Q�l�Ƀ_�E�����[�h���C���X�g�[����
	�Ă��������B
	http://ethna.jp/

	����m�F�ς̊���P
		CentOS release 6.4 (Final)
		Apache 2.0
		PHP Version 5.3.3
		php-mbstring 5.3.3-23.el6_4
		PEAR Version: 1.9.4
			�ipear list�j
			Archive_Tar      1.3.11
			Console_Getopt   1.3.1
			DB               1.7.14
			PEAR             1.9.4
			Structures_Graph 1.0.4
			XML_RPC          1.5.5
			XML_Util         1.2.1
		Smarty-2.6.26
		Ethna 2.5.0

	�@�\�[�X�� UTF-8 �ł��B

### ���C���X�g�[���̎菇
	�P�D�ݒu�Ώۂ̃T�[�o�Œ��ڃ_�E�����[�h�E�𓀂��邩�A�𓀍ς݂̑S�Ẵt�@�C
	�����f�B�N�g���\���̂܂܂e�s�o�Őݒu���܂��B

	�@��v�ȃt�@�C���ƃf�B�N�g���\��
		ac
		��  README.md	�����̃t�@�C��
		����etc
		��      ac-ini.php	���ݒ�t�@�C��
		��      crontab.txt	���N�[�����f�[�^
		����locale
		����www
		��  ��  unittest.php
		��  ��  xmlrpc.php
		��  ��  info.php
		��  ��  index.php	���G���g���[�|�C���g
		��  ����css
		��  ����js
		����template
		��  ����ja_JP
		����bin
		����app
		��  ��  Ac_Datas.php	���N�[��������t�@�C��
		��  ����action_cli
		��  ����action_xmlrpc
		��  ����view
		��  ����action
		��  ����test
		��  ����plugin
		��      ����Filter
		��      ����Smarty
		��      ����Validator
		����log		�����O�f�B���N�g��
		����schema
		����skel
		����tmp		���e���|�����f�B���N�g��
		��      crontab.txt
		����lib

	�Q�D�K�v�ŏ����̃p�[�~�b�V�����ݒ�B
	�@�G���g���[�|�C���g�ɂ͕s����҂� read ������t���܂��B
	�@���O�f�B���N�g���A�e���|�����f�B���N�g���A�N�[�����f�[�^�ɂ́Aapache �v��
	�Z�X�� write ������t���܂��B

	�R�D�v�d�a�T�[�o��DocumentRoot��ύX���邱�Ƃ��\�Ȃ�΁A�𓀂��� www �t�H
	���_�� DocumentRoot �ɂ���̂��ł��ȒP�ł��B
	�@������ DocumentRoot �ɔz�u�������ꍇ�A�V���{���b�N�����N�𒣂邩�A�G���g��
	�[�|�C���g���܂ށAwww �t�H���_���̃t�@�C���������� DocumentRoot �ɔz�u�� �G
	���g���[�|�C���g�t�@�C���̂Q�s��
		require_once dirname(__FILE__) . '/../app/Ac_Controller.php';
	��
		require_once '/var/www/cgi-bin/ac/app/Ac_Controller.php';
	�̂悤�Ȑ�΃p�X�ɏ��������܂��B

	�S�DLinux �̐ݒ��B
	�@apache �̃v���Z�X���� sudo�R�}���h�����s���邽��
		sudo visudo
	�R�}���h�ŁA
		apache  ALL=(ALL)       NOPASSWD: /usr/bin/crontab
		Defaults:apache !requiretty
	���ŉ��s�ɒǉ����܂��B
	�@apache �O���[�v�� cron ���s���[�U��ǉ����܂��B
		sudo useradd -g apache radiko
	�@�O�̂��߁Aapache �� radiko �Ń��O�C���ł��Ȃ����Ƃ��m�F���ׂ��ł��B

	�T�D�ݒ�t�@�C�� ac-ini.php �ݒ��B
	�@cron ���s���[�U�B
		'cronUser'	=>	'radiko',
	�@���W�R�^���V�F��(��΃p�X)�B
		'command'	=>	'/usr/local/bin/rec_radiru.sh',
	�@�^���t�@�C���ۑ��t�H���_(��΃p�X)�B
		'pathSave'	=>	'/var/www/html',

	�U�D�N�[���������X�N���v�g�̏C���B
	�@�K�v�ɉ����A���Ȃ��̃��W�R�^���V�F���̃p�����[�^�ɍ��킹�āAencodeData() 
	�� $txt ���C�����܂��B����̃��W�R�^���V�F���́A
		�X�e�[�V�����h�c
		�^�����ԁi���j
		�ۑ��t�H���_
	�̃p�����[�^���w�肷��悤�ɂȂ��Ă��܂��B

### ���A���C���X�g�[���̎菇
	�@�C���X�g�[�����ɉ𓀂���ac�t�H���_���ƍ폜���邾���ŃA���C���X�g�[��
	���������܂��B�v�d�a�T�[�o�̐ݒ��Linux���[�U�[�����֖߂��̂����Y��Ȃ��B

### ���g�p���@
	�@���� URL �Ńf�������J���Ă��܂��B
	�@http://www.remix.gr.jp/service/ac/radiko/

### ����舵�����
	�@�����ł��B
	�@��҂͖{�\�t�g�E�G�A���g�p�������Ƃɂ�萶�������Q�ɂ��Ĉ�؂̐ӔC�𕉂�
	�܂���B

### �����z
	����

### ���������@
	�@��t���Ă���������ꍇ�A���U�����s������ԐM�������܂��̂�

		http://www.remix.asia/service/formmail/

	���A���A�����������B

### �����p����
	�����͂���܂���B���p�҂̐ӔC�Őݒu�E�^�p���肢�������܂��B

### ���A����
	http+formmail���q�d�l�h�w�D�`�r�h�`
	�q�d�l�h�w
	http://www.vector.co.jp/vpack/browse/person/an044540.html

### ���ύX����
	2013-09-29	Version 1.0 ���Ń����[�X
