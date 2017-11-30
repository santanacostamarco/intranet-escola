<?php

	// verifica se o banco existe
	function connection_checker() {
		$connection = mysqli_connect('localhost', 'root', '', 'intranet_escola');
		if ( mysqli_connect_error() ) {
			//echo '<h1> Algo está errado =\ </h1> <p>' . mysqli_connect_error() . '<br/>Verifique o servior MySQL </p>';
			die("Connection failed: " . mysqli_connect_error());
		} else {
			return $connection;
		}

	}

	function getUserType($id){
		$connection = connection_checker();
		$query = "SELECT user_tipo FROM users WHERE user_id = '{$id}'";
		$result = mysqli_query($connection, $query);
		if (mysqli_num_rows($result) > 0){
			return mysqli_fetch_array($result);;
		} else {
			return "erro";
		}
	}

	function getBotoes($id){
		$user_type = getUserType($id)[0];
		$result = [];
		$result[] = '<ul class="botoes">';
		$result[] = '<li><a   href="home.php"><div class="button inicio">Início</div></a></li>';
		$result[] = '<li><a   href="outro.php"><div class="button outro">outro</div></a></li>';
		$result[] = '<li><a   href="outro.php"><div class="button outro">outro</div></a></li>';
		switch ($user_type){
			case "admin":
				$result[] = '<li><a   href="form_cadastrar.php"><div class="button cadastrar">Cadastrar usuário</div></a></li>';
				$result[] = '<li><a   href="list_users.php"><div class="button usuarios">Usuários</div></a></li>';
				break;
			case "professor":
				$result[] = '<li><a   href="#cadastrarAluno"><div class="button cadastrar-aluno">Cadastrar Aluno</div></a></li>';
				$result[] = '<li><a   href="#meuClaendário"><div class="button calendario">Meu calendario</div></a></li>';
				$result[] = '<li><a   href="list_alunos.php"><div class="button meus-alunos">Meus Alunos</div></a></li>';
				break;
			case "aluno":
				$result[] = '<li><a   href="#meuClaendário"><div class="button calendario">Meu calendario</div></a></li>';

				break;
		}
		$result[] = '<li><a   href="arquivos.php"><div class="button arquivos">Arquivos</div></a></li>';
		$result[] = '<li><a   href="ajustes.php"><div class="button ajustes">Ajustes</div></a></li>';
		$result[] = '<li><a   href="sair.php"><div class="sair" style="color: white;"> Sair </div></a></li>';

		$result[] = '</ul>';
		return $result;
	}

	function stringAleatoria($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function existeUsuario($user, $email){
		if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE username = '{$user}' AND email = '{$email}'")) > 0){
			return 3;
		}
		if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE email = '{$email}'")) > 0){
			return 2;
		}
		if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE username = '{$user}'")) > 0){
			return 1;
		}
		return 0;
	}
	function get_file_ext($mime_type){
		$mime_types = array(
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx', 'application/postscript' => 'ai', 'audio/x-aiff' => 'aif', 'audio/x-aiff' => 'aifc', 'audio/x-aiff' => 'aiff', 'text/plain' => 'asc', 'application/atom+xml' => 'atom', 'audio/basic' => 'au', 'video/x-msvideo' => 'avi', 'application/x-bcpio' => 'bcpio', 'application/octet-stream' => 'bin', 'image/bmp' => 'bmp', 'application/x-netcdf' => 'cdf', 'image/cgm' => 'cgm', 'application/octet-stream' => 'class', 'application/x-cpio' => 'cpio', 'application/mac-compactpro' => 'cpt', 'application/x-csh' => 'csh', 'text/css' => 'css', 'text/csv' => 'csv', 'application/x-director' => 'dcr', 'application/x-director' => 'dir', 'image/vnd.djvu' => 'djv', 'image/vnd.djvu' => 'djvu', 'application/octet-stream' => 'dll', 'application/octet-stream' => 'dmg', 'application/octet-stream' => 'dms', 'application/msword' => 'doc', 'application/xml-dtd' => 'dtd', 'application/x-dvi' => 'dvi', 'application/x-director' => 'dxr', 'application/postscript' => 'eps', 'text/x-setext' => 'etx', 'application/octet-stream' => 'exe', 'application/andrew-inset' => 'ez', 'image/gif' => 'gif', 'application/srgs' => 'gram', 'application/srgs+xml' => 'grxml', 'application/x-gtar' => 'gtar', 'application/x-hdf' => 'hdf', 'application/mac-binhex40' => 'hqx', 'text/html' => 'htm', 'text/html' => 'html', 'x-conference/x-cooltalk' => 'ice', 'image/x-icon' => 'ico', 'text/calendar' => 'ics', 'image/ief' => 'ief', 'text/calendar' => 'ifb', 'model/iges' => 'iges', 'model/iges' => 'igs', 'image/jpeg' => 'jpe', 'image/jpeg' => 'jpeg', 'image/jpeg' => 'jpg', 'application/x-javascript' => 'js', 'application/json' => 'json', 'audio/midi' => 'kar', 'application/x-latex' => 'latex', 'application/octet-stream' => 'lha', 'application/octet-stream' => 'lzh', 'audio/x-mpegurl' => 'm3u', 'application/x-troff-man' => 'man', 'application/mathml+xml' => 'mathml', 'application/x-troff-me' => 'me', 'model/mesh' => 'mesh', 'audio/midi' => 'mid', 'audio/midi' => 'midi', 'application/vnd.mif' => 'mif', 'video/quicktime' => 'mov', 'video/x-sgi-movie' => 'movie', 'audio/mpeg' => 'mp2', 'audio/mpeg' => 'mp3', 'video/mpeg' => 'mpe', 'video/mpeg' => 'mpeg', 'video/mpeg' => 'mpg', 'audio/mpeg' => 'mpga', 'application/x-troff-ms' => 'ms', 'model/mesh' => 'msh', 'video/vnd.mpegurl' => 'mxu', 'application/x-netcdf' => 'nc', 'application/oda' => 'oda', 'application/ogg' => 'ogg', 'image/x-portable-bitmap' => 'pbm', 'chemical/x-pdb' => 'pdb', 'application/pdf' => 'pdf', 'image/x-portable-graymap' => 'pgm', 'application/x-chess-pgn' => 'pgn', 'image/png' => 'png', 'image/x-portable-anymap' => 'pnm', 'image/x-portable-pixmap' => 'ppm', 'application/vnd.ms-powerpoint' => 'ppt', 'application/postscript' => 'ps', 'video/quicktime' => 'qt', 'audio/x-pn-realaudio' => 'ra', 'audio/x-pn-realaudio' => 'ram', 'image/x-cmu-raster' => 'ras', 'application/rdf+xml' => 'rdf', 'image/x-rgb' => 'rgb', 'application/vnd.rn-realmedia' => 'rm', 'application/x-troff' => 'roff', 'application/rss+xml' => 'rss', 'text/rtf' => 'rtf', 'text/richtext' => 'rtx', 'text/sgml' => 'sgm', 'text/sgml' => 'sgml', 'application/x-sh' => 'sh', 'application/x-shar' => 'shar', 'model/mesh' => 'silo', 'application/x-stuffit' => 'sit', 'application/x-koan' => 'skd', 'application/x-koan' => 'skm', 'application/x-koan' => 'skp', 'application/x-koan' => 'skt', 'application/smil' => 'smi', 'application/smil' => 'smil', 'audio/basic' => 'snd', 'application/octet-stream' => 'so', 'application/x-futuresplash' => 'spl', 'application/x-wais-source' => 'src', 'application/x-sv4cpio' => 'sv4cpio', 'application/x-sv4crc' => 'sv4crc', 'image/svg+xml' => 'svg', 'image/svg+xml' => 'svgz', 'application/x-shockwave-flash' => 'swf', 'application/x-troff' => 't', 'application/x-tar' => 'tar', 'application/x-tcl' => 'tcl', 'application/x-tex' => 'tex', 'application/x-texinfo' => 'texi', 'application/x-texinfo' => 'texinfo', 'image/tiff' => 'tif', 'image/tiff' => 'tiff', 'application/x-troff' => 'tr', 'text/tab-separated-values' => 'tsv', 'text/plain' => 'txt', 'application/x-ustar' => 'ustar', 'application/x-cdlink' => 'vcd', 'model/vrml' => 'vrml', 'application/voicexml+xml' => 'vxml', 'audio/x-wav' => 'wav', 'image/vnd.wap.wbmp' => 'wbmp', 'application/vnd.wap.wbxml' => 'wbxml', 'text/vnd.wap.wml' => 'wml', 'application/vnd.wap.wmlc' => 'wmlc', 'text/vnd.wap.wmlscript' => 'wmls', 'application/vnd.wap.wmlscriptc' => 'wmlsc', 'model/vrml' => 'wrl', 'image/x-xbitmap' => 'xbm', 'application/xhtml+xml' => 'xht', 'application/xhtml+xml' => 'xhtml', 'application/vnd.ms-excel' => 'xls', 'application/xml' => 'xml', 'image/x-xpixmap' => 'xpm', 'application/xml' => 'xsl', 'application/xslt+xml' => 'xslt', 'application/vnd.mozilla.xul+xml' => 'xul', 'image/x-xwindowdump' => 'xwd', 'chemical/x-xyz' => 'xyz', 'application/zip' => 'zip',


		);
		if (!array_key_exists($mime_type, $mime_types)){
			return "outro";
		}else{
			return $mime_types[$mime_type];
		}

	}
	function invertArray(){
		$array = array(
			'ai'      => 'application/postscript',
    'aif'     => 'audio/x-aiff',
    'aifc'    => 'audio/x-aiff',
    'aiff'    => 'audio/x-aiff',
    'asc'     => 'text/plain',
    'atom'    => 'application/atom+xml',
    'atom'    => 'application/atom+xml',
    'au'      => 'audio/basic',
    'avi'     => 'video/x-msvideo',
    'bcpio'   => 'application/x-bcpio',
    'bin'     => 'application/octet-stream',
    'bmp'     => 'image/bmp',
    'cdf'     => 'application/x-netcdf',
    'cgm'     => 'image/cgm',
    'class'   => 'application/octet-stream',
    'cpio'    => 'application/x-cpio',
    'cpt'     => 'application/mac-compactpro',
    'csh'     => 'application/x-csh',
    'css'     => 'text/css',
    'csv'     => 'text/csv',
    'dcr'     => 'application/x-director',
    'dir'     => 'application/x-director',
    'djv'     => 'image/vnd.djvu',
    'djvu'    => 'image/vnd.djvu',
    'dll'     => 'application/octet-stream',
    'dmg'     => 'application/octet-stream',
    'dms'     => 'application/octet-stream',
    'doc'     => 'application/msword',
    'dtd'     => 'application/xml-dtd',
    'dvi'     => 'application/x-dvi',
    'dxr'     => 'application/x-director',
    'eps'     => 'application/postscript',
    'etx'     => 'text/x-setext',
    'exe'     => 'application/octet-stream',
    'ez'      => 'application/andrew-inset',
    'gif'     => 'image/gif',
    'gram'    => 'application/srgs',
    'grxml'   => 'application/srgs+xml',
    'gtar'    => 'application/x-gtar',
    'hdf'     => 'application/x-hdf',
    'hqx'     => 'application/mac-binhex40',
    'htm'     => 'text/html',
    'html'    => 'text/html',
    'ice'     => 'x-conference/x-cooltalk',
    'ico'     => 'image/x-icon',
    'ics'     => 'text/calendar',
    'ief'     => 'image/ief',
    'ifb'     => 'text/calendar',
    'iges'    => 'model/iges',
    'igs'     => 'model/iges',
    'jpe'     => 'image/jpeg',
    'jpeg'    => 'image/jpeg',
    'jpg'     => 'image/jpeg',
    'js'      => 'application/x-javascript',
    'json'    => 'application/json',
    'kar'     => 'audio/midi',
    'latex'   => 'application/x-latex',
    'lha'     => 'application/octet-stream',
    'lzh'     => 'application/octet-stream',
    'm3u'     => 'audio/x-mpegurl',
    'man'     => 'application/x-troff-man',
    'mathml'  => 'application/mathml+xml',
    'me'      => 'application/x-troff-me',
    'mesh'    => 'model/mesh',
    'mid'     => 'audio/midi',
    'midi'    => 'audio/midi',
    'mif'     => 'application/vnd.mif',
    'mov'     => 'video/quicktime',
    'movie'   => 'video/x-sgi-movie',
    'mp2'     => 'audio/mpeg',
    'mp3'     => 'audio/mpeg',
    'mpe'     => 'video/mpeg',
    'mpeg'    => 'video/mpeg',
    'mpg'     => 'video/mpeg',
    'mpga'    => 'audio/mpeg',
    'ms'      => 'application/x-troff-ms',
    'msh'     => 'model/mesh',
    'mxu'     => 'video/vnd.mpegurl',
    'nc'      => 'application/x-netcdf',
    'oda'     => 'application/oda',
    'ogg'     => 'application/ogg',
    'pbm'     => 'image/x-portable-bitmap',
    'pdb'     => 'chemical/x-pdb',
    'pdf'     => 'application/pdf',
    'pgm'     => 'image/x-portable-graymap',
    'pgn'     => 'application/x-chess-pgn',
    'png'     => 'image/png',
    'pnm'     => 'image/x-portable-anymap',
    'ppm'     => 'image/x-portable-pixmap',
    'ppt'     => 'application/vnd.ms-powerpoint',
    'ps'      => 'application/postscript',
    'qt'      => 'video/quicktime',
    'ra'      => 'audio/x-pn-realaudio',
    'ram'     => 'audio/x-pn-realaudio',
    'ras'     => 'image/x-cmu-raster',
    'rdf'     => 'application/rdf+xml',
    'rgb'     => 'image/x-rgb',
    'rm'      => 'application/vnd.rn-realmedia',
    'roff'    => 'application/x-troff',
    'rss'     => 'application/rss+xml',
    'rtf'     => 'text/rtf',
    'rtx'     => 'text/richtext',
    'sgm'     => 'text/sgml',
    'sgml'    => 'text/sgml',
    'sh'      => 'application/x-sh',
    'shar'    => 'application/x-shar',
    'silo'    => 'model/mesh',
    'sit'     => 'application/x-stuffit',
    'skd'     => 'application/x-koan',
    'skm'     => 'application/x-koan',
    'skp'     => 'application/x-koan',
    'skt'     => 'application/x-koan',
    'smi'     => 'application/smil',
    'smil'    => 'application/smil',
    'snd'     => 'audio/basic',
    'so'      => 'application/octet-stream',
    'spl'     => 'application/x-futuresplash',
    'src'     => 'application/x-wais-source',
    'sv4cpio' => 'application/x-sv4cpio',
    'sv4crc'  => 'application/x-sv4crc',
    'svg'     => 'image/svg+xml',
    'svgz'    => 'image/svg+xml',
    'swf'     => 'application/x-shockwave-flash',
    't'       => 'application/x-troff',
    'tar'     => 'application/x-tar',
    'tcl'     => 'application/x-tcl',
    'tex'     => 'application/x-tex',
    'texi'    => 'application/x-texinfo',
    'texinfo' => 'application/x-texinfo',
    'tif'     => 'image/tiff',
    'tiff'    => 'image/tiff',
    'tr'      => 'application/x-troff',
    'tsv'     => 'text/tab-separated-values',
    'txt'     => 'text/plain',
    'ustar'   => 'application/x-ustar',
    'vcd'     => 'application/x-cdlink',
    'vrml'    => 'model/vrml',
    'vxml'    => 'application/voicexml+xml',
    'wav'     => 'audio/x-wav',
    'wbmp'    => 'image/vnd.wap.wbmp',
    'wbxml'   => 'application/vnd.wap.wbxml',
    'wml'     => 'text/vnd.wap.wml',
    'wmlc'    => 'application/vnd.wap.wmlc',
    'wmls'    => 'text/vnd.wap.wmlscript',
    'wmlsc'   => 'application/vnd.wap.wmlscriptc',
    'wrl'     => 'model/vrml',
    'xbm'     => 'image/x-xbitmap',
    'xht'     => 'application/xhtml+xml',
    'xhtml'   => 'application/xhtml+xml',
    'xls'     => 'application/vnd.ms-excel',
    'xml'     => 'application/xml',
    'xpm'     => 'image/x-xpixmap',
    'xsl'     => 'application/xml',
    'xslt'    => 'application/xslt+xml',
    'xul'     => 'application/vnd.mozilla.xul+xml',
    'xwd'     => 'image/x-xwindowdump',
    'xyz'     => 'chemical/x-xyz',
    'zip'     => 'application/zip'
		);
		foreach ($array as $key => $value) {
			echo "'".$value."' => '".$key."', ";
		}
	}


?>
