<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>

<h1>Battery Pack Design Tool</h1>
<!-- <img src='batdes_packvisualizer.php'> -->
<!-- <style>
#spectable
{
border-collapse:collapse;
}
#spectable td, #spectable th 
{
font-size:1em;
border:1px solid #000000;
padding:3px 7px 2px 7px;
}
#spectable th 
{
font-size:1.1em;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#ffffff;
}
#spectable tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}
</style> -->
<h3>Electrical Specifications</h3>
<table>
  <tbody>
    <tr>
      <td width="200px"><br>
      </td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">Min<br>
        </span> </td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">Avg<br>
        </span> </td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">Max<br>
        </span> </td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">UOM</span><br>
      </td>
    </tr>
    <tr>
      <td>Voltage<br>
      </td>
      <td style="text-align: center;">[v_min]<br>
      </td>
      <td style="text-align: center;">[v_nom]<br>
      </td>
      <td style="text-align: center;">[v_max]<br>
      </td>
      <td>V<br>
      </td>
    </tr>
    <tr>
      <td colspan="5" rowspan="1"><strong>Discharging</strong><br>
      </td>
    </tr>
    <tr>
      <td>Current<br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[i_dis_cont]<br>
      </td>
      <td style="text-align: center;">[i_dis_pulse]<br>
      </td>
      <td>A<br>
      </td>
    </tr>
    <tr>
      <td>Current Max Duration<br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[i_dis_pulse_dur]<br>
      </td>
      <td>sec<br>
      </td>
    </tr>
    <tr>
      <td>Energy<br>
      </td>
      <td style="text-align: center;">[energy]<br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td>() Ah () Wh </td>
    </tr>
    <tr>
      <td>Runtime<br>
      </td>
      <td style="text-align: center;">[time_op_min]<br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td>minutes<br>
      </td>
    </tr>
    <tr>
      <td>Storage time</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[time_st_max]</td>
      <td>months</td>
    </tr>
    <tr>
      <td colspan="5" rowspan="1"><strong>Charging</strong><br>
      </td>
    </tr>
    <tr>
      <td>Current</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[i_chg_cont]</td>
      <td style="text-align: center;">[i_chg_pulse]</td>
      <td>A</td>
    </tr>
    <tr>
      <td>Current Max Duration</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[i_chg_pulse_dur]</td>
      <td>sec</td>
    </tr>
    <tr>
      <td>Recharge time</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[time_chg_min]</td>
      <td>minutes</td>
    </tr>
  </tbody>
</table>
<h3>Mechanical Specifications</h3>
<table>
  <tbody>
    <tr>
      <td width="200px"><br>
      </td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">X</span></td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">Y</span></td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">Z</span></td>
      <td width="100px" style="text-align: center;"><span style="font-weight: bold;">UOM</span></td>
    </tr>
    <tr>
      <td>Dimensions</td>
      <td style="text-align: center;">[dim_x]</td>
      <td style="text-align: center;">[dim_y]</td>
      <td style="text-align: center;">[dim_z]</td>
      <td>() in () mm</td>
    </tr>
    <tr>
      <td><br>
      </td>
      <td style="text-align: center;"><span style="font-weight: bold;">Min</span></td>
      <td style="text-align: center;"><span style="font-weight: bold;">Avg</span></td>
      <td style="text-align: center;"><span style="font-weight: bold;">Max</span></td>
      <td><br>
      </td>
    </tr>
    <tr>
      <td>Operating Temperature</td>
      <td style="text-align: center;">[temp_op_min]</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[temp_op_max]</td>
      <td>°C</td>
    </tr>
    <tr>
      <td>Storage Temperature</td>
      <td style="text-align: center;">[temp_st_min]</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[temp_st_max]</td>
      <td>°C</td>
    </tr>
    <tr>
      <td>Weight</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;">[weight_max]</td>
      <td>() lbs () kg</td>
    </tr>
    <tr>
      <td>Circuit Protection</td>
      <td>() Active () Passive</td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
    <tr>
      <td>Fuel Gauging</td>
      <td>[] Required</td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
  </tbody>
</table>
<h2>Design Criteria</h2>
<table style="width: 100%">
  <tbody>
    <tr>
      <td style="text-align: center;" colspan="3" rowspan="2"><span style="font-weight: bold;">Optimizations</span></td>
      <td style="width: 20px;"><br>
      </td>
      <td style="text-align: center;" colspan="2" rowspan="1"><span style="font-weight: bold;">Filters</span></td>
    </tr>
    <tr>
      <td><br>
      </td>
      <td style="text-align: center;"><span style="font-weight: bold;">Chemistry</span></td>
      <td style="text-align: center;"><span style="font-weight: bold;">Form
          Factor</span></td>
    </tr>
    <tr>
      <td><br>
      </td>
      <td style="text-align: center;"><span style="font-weight: bold;">1<sup>st</sup><br>
        </span></td>
      <td style="text-align: center;"><span style="font-weight: bold;">2<sup>nd</sup><br>
        </span></td>
      <td><br>
      </td>
      <td>[] Any</td>
      <td>[] Any </td>
    </tr>
    <tr>
      <td>Runtime</td>
      <td style="text-align: center;">(runtime_1)</td>
      <td style="text-align: center;">(runtime_2)</td>
      <td><br>
      </td>
      <td>[] Li-Ion NMC/LMO</td>
      <td>[] Cylindrical </td>
    </tr>
    <tr>
      <td>Power</td>
      <td style="text-align: center;">(power_1)</td>
      <td style="text-align: center;">(power_2)</td>
      <td><br>
      </td>
      <td>[] Li-Ion LFP </td>
      <td>[] Prismatic </td>
    </tr>
    <tr>
      <td>Weight</td>
      <td style="text-align: center;">(weight_1)</td>
      <td style="text-align: center;">(weight_2)</td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td>[] Pouch </td>
    </tr>
    <tr>
      <td>Volume</td>
      <td style="text-align: center;">(volume_1)</td>
      <td style="text-align: center;">(volume_2)</td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
    <tr>
      <td>Cost</td>
      <td style="text-align: center;">(cost_1)</td>
      <td style="text-align: center;">(cost_2)</td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
  </tbody>
</table>
<br>

<?php


?>

<?php include("models/usercake_frameset_footer.php"); ?>