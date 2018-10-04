<?php

namespace view;


class HTMLPage {

	public function echoPage(string $title, string $body)  {
		echo '<!DOCTYPE HTML SYSTEM>
<html>
  <head>
    <title>' . $title . '</title>
    <meta http-equiv=\'content-type\' content=\'text/html; charset=utf8\'>
  </head>
  <body>
  	' . $body . '
  </body>
</html>';
	}
}