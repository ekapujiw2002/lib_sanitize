<?
	header("Content-type: text/html; charset=utf-8");

	include('lib_sanitize.php');

	$GLOBALS[test_loops] = 300;


	#
	# greeking from lipsum.com
	#

	$clean_ascii  = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec massa ipsum, eget posuere diam.";
	$clean_ascii .= " Nullam bibendum purus vel purus interdum dictum. Aliquam aliquam lacus at arcu eleifend id sagittis";
	$clean_ascii .= " purus pretium. Phasellus eget porta ipsum. Suspendisse nibh orci, tristique sed semper sed, gravida";
	$clean_ascii .= " et lacus. Nam eget neque scelerisque nunc pellentesque bibendum lobortis sed nisi. Duis iaculis bla";
	$clean_ascii .= "ndit pulvinar. Vivamus elit urna, tincidunt quis pellentesque sed, iaculis vitae dolor. Quisque matt";
	$clean_ascii .= "is dapibus diam eu adipiscing. Maecenas dolor dolor, pellentesque in fermentum at, malesuada nec era";
	$clean_ascii .= "t. Praesent posuere felis eu arcu eleifend scelerisque. Sed sollicitudin auctor nulla, nec blandit m";
	$clean_ascii .= "assa interdum in. Nulla ultricies lacinia orci sit amet consequat. Sed vitae lacus vitae lacus vehic";
	$clean_ascii .= "ula scelerisque vel nec neque. Sed ornare enim a mi sagittis placerat. Proin non dui mi. Proin aucto";
	$clean_ascii .= "r blandit eros non auctor. Nunc non nisi imperdiet massa ultricies pellentesque. In hac habitasse pl";
	$clean_ascii .= "atea dictumst. Vestibulu";


	#
	# some tamil poetry: http://www.columbia.edu/kermit/utf8.html
	#

	$clean_utf8  = "யாமறிந்த மொழிகளிலே தமிழ்மொழி போல் இன";
	$clean_utf8 .= "ிதாவது எங்கும் காணோம், பாமரராய் விலங�";
	$clean_utf8 .= "�குகளாய், உலகனைத்தும் இகழ்ச்சிசொலப் �";
	$clean_utf8 .= "�ான்மை கெட்டு, நாமமது தமிழரெனக் கொண்ட�";
	$clean_utf8 .= "�� இங்கு வாழ்ந்திடுதல் நன்றோ? சொல்லீர்";
	$clean_utf8 .= "!தேமதுரத் தமிழோசை உலகமெலாம் பரவும்வக";
	$clean_utf8 .= "ை செய்தல் வேண்டும்.யாமறிந்த மொழிகளில";
	$clean_utf8 .= "ே தமிழ்மொழி போல் இனிதாவது எங்கும் கா�";
	$clean_utf8 .= "�ோம், பாமரராய் விலங்குகளாய், உலகனைத்த�";
	$clean_utf8 .= "��ம் இகழ்ச்சிசொலப் பான்மை கெட்டு, நாமம";
	$clean_utf8 .= "து தமிழரெ";


	#
	# the same poetry, with randomly inserted 'X's
	#

	$dirty_utf8  = "யாமறிந்த மொழXிகளிலே தமிழ்மொழி போல் இ�";
	$dirty_utf8 .= "ிதாவது எங்குXம் காணோம், பாமரராய் விலங�";
	$dirty_utf8 .= "�குகளாய், உலக�X��ைத்தும் இகழ்ச்சிசொலப் �";
	$dirty_utf8 .= "�ான்மை கெட்ட�X�, நாமமது தமிழரெனக் கொண்ட";
	$dirty_utf8 .= "�� இங்கு வாழ்நX்திடுதல் நன்றோ? சொல்லீர�";
	$dirty_utf8 .= "!தேமதுரத் தம�X�ழோசை உலகமெலாம் பரவும்வ�";
	$dirty_utf8 .= "ை செய்தல் வே�X�்டும்.யாமறிந்த மொழிகளி�";
	$dirty_utf8 .= "ே தமிழ்மொழி �X�ோல் இனிதாவது எங்கும் கா�";
	$dirty_utf8 .= "�ோம், பாமரராய�X�� விலங்குகளாய், உலகனைத்த";
	$dirty_utf8 .= "��ம் இகழ்ச்சி�X��ொலப் பான்மை கெட்டு, நாம�";
	$dirty_utf8 .= "து தமிழரெ";


	#
	# the first chapter of moby dick, translated to japanese with babelfish and converted to SJIS
	#

	$clean_sjis  = "����Ishmael�Ɠd�b���Ȃ����B ���̍��z�łقƂ�ǂ������A����ѓ��艽���C�݂̎��ɋ������N�������鎝����";
	$clean_sjis .= "����A����N�O��-�����Ăǂ̈ʐ��m�ɋC�ɂ��Ă͂����Ȃ�-���͎����ɂ��ď����q�C���A���E�̐����܂񂾕�";
	$clean_sjis .= "�������邱�Ƃ��l�����B ����͎����B���𑖂苎�邱�Ƃ̎����Ă�����@�A����яz�𒲐����邱�Ƃł���B";
	$clean_sjis .= " �����������g�����ɂ��Č��i�Ɉ���Ƃ������鎞�͂��ł�; ���ꂪ���C�ł��鎞�͂��ł��A���̐��";
	$clean_sjis .= "_�̖��J���悤��11��; �����������g��s�{�ӂɊ��̑q�ɂ̑O�ɋx�~���A�����鑒���̌㕔�Ɏ�����Ă邱�Ƃ";
	$clean_sjis .= "������鎞�͂��ł���Ȃ���; �����ē��Ɏ��̃n�C�|������肻�̂悤�ȗD���ł��鎞�͂��ł��A����";
	$clean_sjis .= "���͋������`�������ʂ�ɐT�d�ɕ��݁A�g�D�I��people&#039�����������Ƃ�h���悤�ɗv������; �ȊO��s�̖";
	$clean_sjis .= "X�q�����āA���͂��꒪�������ł���Ƃ����C�ɒ�����������B ����̓s�X�g������ы��̎��̑㗝�ł���B �";
	$clean_sjis .= "N�w�̉ؗ킳�ɂ����Cato�͔ނ̌��ɔގ��g�𓊂���; ���͑D�ɐÂ��Ɏ��B ����ňӊO�ȉ����Ȃ��B �ނ炪�";
	$clean_sjis .= "����������m���Ă�����A�ނ�̒��x�A���Ԃ܂��͑��̂قƂ�ǂ��ׂĂ̐l�́A�����t���Ă���C�m�̕��̓��";
	$clean_sjis .= "����������������̂Ƃ���ő厖�ɂ���B";


	#
	# the first chapter of moby dick, translated to french with babelfish and converted to Latin-1
	#

	$clean_latin1  = "Appelez-moi Ishmael. Quelques ann�es il y a - ne vous occupez jamais de combien de temps avec pr�cis";
	$clean_latin1 .= "ion - ayant peu ou pas d'argent dans ma bourse, et rien particuli�re pour m'int�resser sur le rivage";
	$clean_latin1 .= ", j'ai pens� que je naviguerais au sujet de l'et verrais la partie aqueuse du monde. Il est une mani";
	$clean_latin1 .= "�re que j'ai de chasser la rate, et r�glementation de la circulation. Toutes les fois que je me trou";
	$clean_latin1 .= "ve m'�lever sinistre au sujet de la bouche ; toutes les fois que c'est une humidit�, novembre bruine";
	$clean_latin1 .= "ux dans mon �me ; toutes les fois que je me trouve faire une pause involontairement avant des entrep";
	$clean_latin1 .= "�ts de cercueil, et m'amener vers le haut � l'arri�re de chaque enterrement r�unissez-vous ; et part";
	$clean_latin1 .= "iculi�rement toutes les fois que mes hypos obtiennent un dessus si de moi, cela il exige d'un princi";
	$clean_latin1 .= "pe moral fort de m'emp�cher de faire un pas d�lib�r�ment dans la rue, et de frapper m�thodiquement p";
	$clean_latin1 .= "eople' ; chapeaux de s au loin - puis, je rends compte il grand temps d'arriver � la mer d�s que je ";
	$clean_latin1 .= "pourrai. C'est mon produit";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>lib_sanitize Benchmarks</title>
</head>
<body>

<h1>lib_sanitize Benchmarks</h1>

<ul>
	<li> Each test is run <b><?=$GLOBALS[test_loops]?> times</b> (you can modify a line at the top of this file to change that). </li>
	<li> iconv is generally fastest when not converting from another encoding. </li>
	<li> mbstring is generally fastest when converting from another encoding. </li>
	<li> PHP is significantly slower than both. </li>
	<li> PHP mode can't convert from anything other than Latin-1. </li>
	<li> The first number is time taken to perform the test set. </li>
	<li> The second number is how many loops can be performed per second. </li>
	<li> Refreshing will likely get you different results, with the same ratios. </li>
</ul>


<?
	do_test("", "Empty String");
	do_test($clean_ascii, "1K of clean ASCII");
	do_test($clean_utf8, "1K of clean UTF8");
	do_test($dirty_utf8, "1K of dirty UTF8");

	$GLOBALS['sanitize_input_encoding'] = 'SJIS';
	do_test($clean_sjis, "1K of clean Shift_JIS");

	$GLOBALS['sanitize_mode'] = SANITIZE_INVALID_CONVERT;
	$GLOBALS['sanitize_convert_from'] = 'ISO-8859-1'; # Latin-1
	$GLOBALS['sanitize_input_encoding'] = 'UTF-8';
	do_test($clean_latin1, "1K of fallback Latin-1");


	function do_test($input, $name){

		echo "<h2>".HtmlSpecialChars($name)."</h2>\n";


		$exts = array(
			SANITIZE_EXTENSION_MBSTRING	=> 'MBSTRING', 
			SANITIZE_EXTENSION_ICONV	=> 'ICONV',
			SANITIZE_EXTENSION_PHP		=> 'PHP',
		);

		$results = array();
		$max = 0;

		foreach ($exts as $ext => $lbl){

			$GLOBALS['sanitize_extension'] = $ext;
			$start = microtime_micro();
			$error = 0;
			for ($i=0; $i<$GLOBALS[test_loops]; $i++){
				try {
					$temp = sanitize_string($input, 1);
				} catch (Exception $e){
					$temp = 'ERR';
					$error = 1;
				}
			}
			$t = microtime_micro() - $start;
			$ps = round(1000000 * $GLOBALS[test_loops] / $t);
			$results[$ext] = array(
				't' => round($t / 1000),
				'ps' => $ps,
				'e' => $error,
				'last' => $temp,
			);

			if (!$error){
				$max = max($max, $ps);
			}
		}

		echo "<table border=\"1\" cellpadding=\"4\">\n";
		echo "<tr>\n";
		echo "<th>Extension</th>\n";
		echo "<th>Time</th>\n";
		echo "<th>Rate</th>\n";
		echo "<th>&nbsp;</th>\n";
		echo "</tr>\n";


		foreach ($exts as $ext => $lbl){

			echo "<tr>\n";
			echo "<td>$lbl</td>\n";

			if ($results[$ext][e]){
				echo "<td align=\"center\">n/a</td>";
				echo "<td align=\"center\">n/a</td>";
				echo "<td>&nbsp;</td>";
			}else{
				echo "<td align=\"right\">".number_format($results[$ext][t])."ms</td>";
				echo "<td align=\"right\">".number_format($results[$ext][ps])."/s</td>";

				$w = round(300 * ($results[$ext][ps] / $max));

				$col = ($results[$ext][ps] == $max) ? '#0c0' : '#9f9';

				echo "<td align=\"left\"><div style=\"height: 30px; width: {$w}px; background-color: $col\"></div></td>";

				#echo substr($results[$ext][last], 0, 20);
			}
			echo "</td>\n";

			echo "</tr>\n";

		}

		echo "</table>\n";
	}

	function microtime_micro(){ 
		list($usec, $sec) = explode(" ", microtime()); 
		return round(1000000 * ((float)$usec + (float)$sec));
	}
?>

</body>
</html>