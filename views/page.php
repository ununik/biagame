<?php
return "
<!doctype>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width; initial-scale=1.0'>
        {$html->getScript()}
    </head>
    <body>
    	<div id='headline'>
    		<h1>{$html->getHeadlineTitle()}</h1>
    	</div>
		<div id='content'>{$html->getContent()}</div>
		<div id='footer'>{$html->getFooter()}</div>
    </body>
</html>";