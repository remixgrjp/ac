<?php
// vim: foldmethod=marker
/**
*	Ac_ActionForm.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/

// {{{ Ac_ActionForm
/**
*	ActionForm class.
*
*	@author	 {$author}
*	@package	Ac
*	@access	 public
*/
class Ac_ActionForm extends Ethna_ActionForm
{
	/**#@+
	*	@access private
	*/

	/** @var	array   form definition (default)*/
	var $form_template = array(
		'area'		=>  array(
			'name'		=>	'area',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_SELECT,
			'type'		=>	VAR_TYPE_STRING,
		),
		'cd'		=>  array(
			'name'		=>	'CD',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_HIDDEN,
			'type'		=>	VAR_TYPE_STRING,
		),
		'week'		=>	array(
			'name'		=>	'曜日',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_CHECKBOX,
			'type'		=>	array(VAR_TYPE_INT),
			'option'	=>	array(
				1=>'月',
				2=>'火',
				3=>'水',
				4=>'木',
				5=>'金',
				6=>'土',
				7=>'日',
			),
		),
		'hour'		=>	array(
			'name'		=>	'時刻(時)',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_SELECT,
			'type'		=>	VAR_TYPE_INT,
			'option'	=>	array(
				''=>'',
				 0=>'00',
				 1=>'01',
				 2=>'02',
				 3=>'03',
				 4=>'04',
				 5=>'05',
				 6=>'06',
				 7=>'07',
				 8=>'08',
				 9=>'09',
				10=>'10',
				11=>'11',
				12=>'12',
				13=>'13',
				14=>'14',
				15=>'15',
				16=>'16',
				17=>'17',
				18=>'18',
				19=>'19',
				20=>'20',
				21=>'21',
				22=>'22',
				23=>'23',
			),
		),
		'minute'	=>	array(
			'name'		=>	'時刻(分)',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_SELECT,
			'type'		=>	VAR_TYPE_INT,
			'option'	=>	array(
				''=>'',
				 0=>'00',
				 1=>'01',
				 2=>'02',
				 3=>'03',
				 4=>'04',
				 5=>'05',
				 6=>'06',
				 7=>'07',
				 8=>'08',
				 9=>'09',
				10=>'10',
				11=>'11',
				12=>'12',
				13=>'13',
				14=>'14',
				15=>'15',
				16=>'16',
				17=>'17',
				18=>'18',
				19=>'19',
				20=>'20',
				21=>'21',
				22=>'22',
				23=>'23',
				24=>'24',
				25=>'25',
				26=>'26',
				27=>'27',
				28=>'28',
				29=>'29',
				30=>'30',
				31=>'31',
				32=>'32',
				33=>'33',
				34=>'34',
				35=>'35',
				36=>'36',
				37=>'37',
				38=>'38',
				39=>'39',
				40=>'40',
				41=>'41',
				42=>'42',
				43=>'43',
				44=>'44',
				45=>'45',
				46=>'46',
				47=>'47',
				48=>'48',
				49=>'49',
				50=>'50',
				51=>'51',
				52=>'52',
				53=>'53',
				54=>'54',
				55=>'55',
				56=>'56',
				57=>'57',
				58=>'58',
				59=>'59',
			),
		),
		'term'		=>	array(
			'name'		=>	'期間',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_TEXT,
			'type'		=>	VAR_TYPE_INT,
			'min'		=>	1,
		),
		'station'	=>	array(
			'name'		=>	'放送局',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_SELECT,
			'type'		=>	VAR_TYPE_STRING,
			'default'	=>	null,
		),
		'comment'		=>	array(
			'name'		=>	'コメント',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_TEXT,
			'type'		=>	VAR_TYPE_STRING,
		),
		'file'		=>	array(
			'name'		=>	'ファイル',
			'required'	=>	false,
			'form_type'	=>	FORM_TYPE_TEXT,
			'type'		=>	VAR_TYPE_STRING,
		),
	);

	/**#@-*/

	/**
	*	Error handling of form input validation.
	*
	*	@access public
	*	@param  string	  $name   form item name.
	*	@param  int		 $code   error code.
	*/
	function handleError($name, $code)
	{
		return parent::handleError($name, $code);
	}

	/**
	*	setter method for form template.
	*
	*	@access protected
	*	@param  array   $form_template  form template
	*	@return array   form template after setting.
	*/
	function _setFormTemplate($form_template)
	{
		return parent::_setFormTemplate($form_template);
	}

	/**
	*	setter method for form definition.
	*
	*	@access protected
	*/
	function _setFormDef()
	{
		return parent::_setFormDef();
	}
}
// }}}

?>
