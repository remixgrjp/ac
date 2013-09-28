<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>{$config.APPNAME} ver{$config.VERSION} [{$smarty.now|date_format:"%Y/%m/%d %H:%M:%S"}]</title>
	<meta name='description' content='{$config.DESCRIPTION}'>
	<meta name='keywords' content='{$config.KEYWORDS}'>
</head>
<body>



<form action="." method="post">
<h1 style="margin:0;">{$config.APPNAME}<input type="submit" name="action_Index" value="録音一覧"> {form_input name="area"}<input type="submit" name="action_Area" value="エリア変更"></h1>
{if $app.info}<div class="info">{$app.info}</div>{/if}
{if $app.warn}<div class="warn">{$app.warn}</div>{/if}
</form>



<form action="." method="post">
<label for="week_1"><input type="checkbox" name="week[1]" value="1" id="week_1" {if $form.week.1}checked{/if} />月</label>
<label for="week_2"><input type="checkbox" name="week[2]" value="2" id="week_2" {if $form.week.2}checked{/if} />火</label>
<label for="week_3"><input type="checkbox" name="week[3]" value="3" id="week_3" {if $form.week.3}checked{/if} />水</label>
<label for="week_4"><input type="checkbox" name="week[4]" value="4" id="week_4" {if $form.week.4}checked{/if} />木</label>
<label for="week_5"><input type="checkbox" name="week[5]" value="5" id="week_5" {if $form.week.5}checked{/if} />金</label>
<label for="week_6"><input type="checkbox" name="week[6]" value="6" id="week_6" {if $form.week.6}checked{/if} />土</label>
<label for="week_7"><input type="checkbox" name="week[7]" value="7" id="week_7" {if $form.week.7}checked{/if} />日</label>

{form_input name="hour"}：
{form_input name="minute"}～
{form_input name="term" style="width:30px;text-align:right;"}分間

{form_input name="station"}

{form_input name="comment"}

<input type="submit" name="action_Add" value="追加">
{if $form.cd}
{form_input name="cd"}
<input type="submit" name="action_Replace" value="変更">
<input type="submit" name="action_Del" value="削除">
<input type="hidden" name="action_Replace" value="dummy">
{/if}
</form>



<hr>

{foreach from=$app.crontab key=kk item=aa name=ll}
	{foreach from=$aa key=k item=a name=l}
<form action="." method="post">
<label><input type="checkbox" name="week[1]" value="1" {if $a.week.1}checked{/if} />月</label>
<label><input type="checkbox" name="week[2]" value="2" {if $a.week.2}checked{/if} />火</label>
<label><input type="checkbox" name="week[3]" value="3" {if $a.week.3}checked{/if} />水</label>
<label><input type="checkbox" name="week[4]" value="4" {if $a.week.4}checked{/if} />木</label>
<label><input type="checkbox" name="week[5]" value="5" {if $a.week.5}checked{/if} />金</label>
<label><input type="checkbox" name="week[6]" value="6" {if $a.week.6}checked{/if} />土</label>
<label><input type="checkbox" name="week[7]" value="7" {if $a.week.7}checked{/if} />日</label>
<select><option>{$a.hour|string_format:"%02d"}</option></select>：
<select><option>{$a.minute|string_format:"%02d"}</option></select>～
<input style="width:30px;text-align:right;" value="{$a.term}" type="text" value="{$a.term}" readonly />分間
<select>
{foreach from=$formDef.station.option key=j item=i name=b}
<option{if $j==$a.station} selected{/if}>{$i}</option>
{/foreach}
</select>
<input type="text" value="{$k}" readonly />
<input type="submit" name="action_Edit" value="選択">{$kk}{if $kk==$form.cd}*{/if}
<input type="hidden" name="cd" value="{$kk}">
</form>
	{/foreach}
{/foreach}



<pre>{$app.crontab_l}</pre>



{include file="Debug.tpl"}
</body>
</html>
