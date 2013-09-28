{if $config.debug}{*漢字*}
	<hr />{$smarty.now|date_format:"%Y/%m/%d %H:%M:%S"}
	/ action[{$actionName}] / view[{$viewName}]
	{if count($errors)}
		<ul>
		{foreach from=$errors item=error}
			<li>{$error}</li>
		{/foreach}
		</ul>
	{/if}
	<textarea wrap=off cols=80 rows=32>{$session|var_dump}</textarea>
	<hr />AirCheck{$config.VERSION} Ethna-{$smarty.const.ETHNA_VERSION}
{/if}
