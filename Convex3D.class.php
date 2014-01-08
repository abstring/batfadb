<?php
/*
+-------------------------------------------------+
+                                                 +
+   Convex3d.class.php ver. 1.0 by László Zsidi   +
+     examples and support on http://gifs.hu      +
+                                                 +
+    This class can be used and distributed       +
+    free of charge, but cannot be modified       +
+        without permission of author.            +
+                                                 +
+-------------------------------------------------+
*/
define (VERSION_MAJOR, '1.0');
/*
:::::::::::::::::::::::::::::::::::::::::::::::::::
::                                               ::
::               Required classes                ::
::                                               ::
:::::::::::::::::::::::::::::::::::::::::::::::::::
*/
require('Objects.class.php');
/*
:::::::::::::::::::::::::::::::::::::::::::::::::::
::                                               ::
::                Convex3d class                 ::
::                                               ::
:::::::::::::::::::::::::::::::::::::::::::::::::::
*/
class Convex3D {
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::
	::                                           ::
	::             Class variables               ::
	::                                           ::
	:::::::::::::::::::::::::::::::::::::::::::::::
	*/
	var $rgbR;
	var $rgbG;
	var $rgbB;
	var $_000;
	var $_001;
	var $_002;
	var $_003;
	var $_004;
	var $_005;
	var $_006;
	var $_007;
	var $_008;
	var $_009;
	var $_010;
	var $_011;
	var $_012	= Array();
	var $_013	= Array();
	var $_014	= Array();
	var $_015	= Array();
	var $_016	= Array();
	var $_017	= Array();
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::
	::                                           ::
	::            Class constructor              ::
	::                                           ::
	:::::::::::::::::::::::::::::::::::::::::::::::
	*/
	function Convex3D($m, $n, $b, $o, $w, $h)
	{
		$this->rgbR = $b[r];
		$this->rgbG = $b[g];
		$this->rgbB = $b[b];
        $this->_000 = 0.0;
		$this->_001 = $w;
		$this->_002 = $h;
		$this->_003 = $this->_002 / 2;
		$this->_004 = $this->_001 / 2;
		$this->_005 = 0.20000000000000001;
		$this->_006 = 0.29999999999999999;
		$this->_007 = 0.01;
		$objects = new Objects($m, $n);
        $pointsV = $objects->pointV();
        $pointsF = $objects->pointF();
		$this->_009 = count($pointsV);
		$this->_010 = count($pointsF);
		for($i = 0; $i < $this->_009; $i++)
		{
			$this->_016[$i][0] = (double)$pointsV[$i][0];
			$this->_016[$i][1] = (double)$pointsV[$i][1];
			$this->_016[$i][2] = (double)$pointsV[$i][2];
			$d1 = $this->_016[$i][0] * $this->_016[$i][0] + $this->_016[$i][1] * $this->_016[$i][1] + $this->_016[$i][2] * $this->_016[$i][2];
			if($this->_000 < $d1)
				$this->_000 = $d1;
		}
		$this->_015 = $pointsF;
		$this->_011 = (double)$this->_003 / sqrt($this->_000);
		for($l = 0; $l < $this->_010; $l++)
		{
			$this->_014[$l][0] = ($this->_016[$this->_015[$l][1]][1] - $this->_016[$this->_015[$l][0]][1]) * ($this->_016[$this->_015[$l][2]][2] - $this->_016[$this->_015[$l][1]][2]) - ($this->_016[$this->_015[$l][2]][1] - $this->_016[$this->_015[$l][1]][1]) * ($this->_016[$this->_015[$l][1]][2] - $this->_016[$this->_015[$l][0]][2]);
			$this->_014[$l][1] = -($this->_016[$this->_015[$l][1]][0] - $this->_016[$this->_015[$l][0]][0]) * ($this->_016[$this->_015[$l][2]][2] - $this->_016[$this->_015[$l][1]][2]) + ($this->_016[$this->_015[$l][2]][0] - $this->_016[$this->_015[$l][1]][0]) * ($this->_016[$this->_015[$l][1]][2] - $this->_016[$this->_015[$l][0]][2]);
			$this->_014[$l][2] = ($this->_016[$this->_015[$l][1]][0] - $this->_016[$this->_015[$l][0]][0]) * ($this->_016[$this->_015[$l][2]][1] - $this->_016[$this->_015[$l][1]][1]) - ($this->_016[$this->_015[$l][2]][0] - $this->_016[$this->_015[$l][1]][0]) * ($this->_016[$this->_015[$l][1]][1] - $this->_016[$this->_015[$l][0]][1]);
			$d2 = sqrt($this->_014[$l][0] * $this->_014[$l][0] + $this->_014[$l][1] * $this->_014[$l][1] + $this->_014[$l][2] * $this->_014[$l][2]) / 255.5;
			$this->_014[$l][0] /= $d2;
			$this->_014[$l][1] /= $d2;
			$this->_014[$l][2] /= $d2;
		}
		for($i = 0; $i < 256; $i++)
		{
			$i <= $o[r] ? $r = $i : $r = $o[r];
			$i <= $o[g] ? $g = $i : $g = $o[g];
			$i <= $o[b] ? $b = $i : $b = $o[b];
        	$this->_012[$i] = array($r, $g, $b);
		}
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::
	::                                           ::
	::                Init block                 ::
	::                                           ::
	:::::::::::::::::::::::::::::::::::::::::::::::
	*/
	function init()
	{
		$d	= cos($this->_005);
		$d1 = cos($this->_006);
		$d2 = sin($this->_005);
		$d3 = sin($this->_006);
		$d4 = $this->_011 * $d1;
		$d5 = $this->_011 * $d3;
		$d6 = $this->_011 * $d2 * $d3;
		$d7 = $this->_011 * $d;
		$d8 = -$this->_011 * $d2 * $d1;
		$d9 = -$d * $d3;
		$d10 = $d2;
		$d11 = $d * $d1;
		for($i = 0; $i < $this->_009; $i++)
		{
			$this->_017[$i][0] = $d4 * $this->_016[$i][0] + $d5 * $this->_016[$i][2];
			$this->_017[$i][1] = $d6 * $this->_016[$i][0] + $d7 * $this->_016[$i][1] + $d8 * $this->_016[$i][2];
		}
		for($j = 0; $j < $this->_010; $j++)
			$this->_013[$j] = $d9 * $this->_014[$j][0] + $d10 * $this->_014[$j][1] + $d11 * $this->_014[$j][2];
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::
	::                                           ::
	::             Draw polygon block            ::
	::                                           ::
	:::::::::::::::::::::::::::::::::::::::::::::::
	*/
	function draw()
	{
		$this->_008 = imageCreateTrueColor($this->_002, $this->_001);
        imageFill($this->_008, 0, 0, imageColorAllocate($this->_008, $this->rgbR, $this->rgbG, $this->rgbB));
		for($i = 0; $i < $this->_010; $i++)
			if($this->_013[$i] > 0.0)
			{
				$point = Array();
				for($j = 0; $j < count($this->_015[$i]); $j++)
				{
					$point[] = $this->_003 + (int)$this->_017[$this->_015[$i][$j]][0];
					$point[] = $this->_004 - (int)$this->_017[$this->_015[$i][$j]][1];
				}
				reset($point);
				imagefilledpolygon($this->_008, $point, count($this->_015[$i]), imageColorAllocate($this->_008, $this->_012[$this->_013[$i]][0], $this->_012[$this->_013[$i]][1], $this->_012[$this->_013[$i]][2]));
			}
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::
	::                                           ::
	::               Rotate block                ::
	::                                           ::
	:::::::::::::::::::::::::::::::::::::::::::::::
	*/
	function rotate($x, $y)
	{
		$this->_005 += $this->_007 * (double)$x;
		$this->_006 += $this->_007 * (double)$y;
		$this->init();
		$this->draw();
	}
	/*
	:::::::::::::::::::::::::::::::::::::::::::::::
	::                                           ::
	::                 Data block                ::
	::                                           ::
	:::::::::::::::::::::::::::::::::::::::::::::::
	*/
	function object()
	{
		return $this->_008;
	}
}
?>
