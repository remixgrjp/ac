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
<h1 style="margin:0;">{$config.APPNAME}<input type="submit" name="action_Search" value="設定"></h1>
{if $app.info}<div class="info">{$app.info}</div>{/if}
{if $app.warn}<div class="warn">{$app.warn}</div>{/if}
</form>



<p>ディスク容量{$app.total} 使用{$app.used} {$app.used/$app.total*100|string_format:"%.1f"}% 残り{$app.free} </p>



{foreach from=$app.files key=k item=file}
	<form action="." method="post">
	<input type="hidden" name="file" value="{$file}">
	<input type="submit" name="action_Remove" value="削除">
	<a href="/{$file}">{$file}</a>
	</form>
{/foreach}



{include file="Debug.tpl"}
</body>
</html>
