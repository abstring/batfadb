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
<form name='batdesinput' action='batdes_input_parser.php' method='post'>
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
      <td style="text-align: center;"><input type='text' name='v_min' size=5><br>
      </td>
      <td style="text-align: center;"><input type='text' name='v_nom' size=5><br>
      </td>
      <td style="text-align: center;"><input type='text' name='v_max' size=5><br>
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
      <td style="text-align: center;"><input type='text' name='i_dis_cont' size=5><br>
      </td>
      <td style="text-align: center;"><input type='text' name='i_dis_pulse' size=5><br>
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
      <td style="text-align: center;"><input type='text' name='i_dis_pulse_dur' size=5><br>
      </td>
      <td>sec<br>
      </td>
    </tr>
    <tr>
      <td>Energy<br>
      </td>
      <td style="text-align: center;"><input type='text' name='energy' size=5><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td><input type='radio' name='energy_uom' value='Ah' checked=1> Ah <input type='radio' name='energy_uom' value='Wh'> Wh </td>
    </tr>
    <tr>
      <td>Runtime<br>
      </td>
      <td style="text-align: center;"><input type='text' name='time_op_min' size=5><br>
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
      <td style="text-align: center;"><input type='text' name='time_st_max' size=5></td>
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
      <td style="text-align: center;"><input type='text' name='i_chg_cont' size=5></td>
      <td style="text-align: center;"><input type='text' name='i_chg_pulse' size=5></td>
      <td>A</td>
    </tr>
    <tr>
      <td>Current Max Duration</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><input type='text' name='i_chg_pulse_dur' size=5></td>
      <td>sec</td>
    </tr>
    <tr>
      <td>Recharge time</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><input type='text' name='time_chg_min' size=5></td>
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
      <td style="text-align: center;"><input type='text' name='dim_x' size=5></td>
      <td style="text-align: center;"><input type='text' name='dim_y' size=5></td>
      <td style="text-align: center;"><input type='text' name='dim_z' size=5></td>
      <td><input type='radio' name='dim_uom' value='in' checked=1> in <input type='radio' name='dim_uom' value='mm'> mm</td>
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
      <td style="text-align: center;"><input type='text' name='temp_op_min' size=5></td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><input type='text' name='temp_op_max' size=5></td>
      <td>°C</td>
    </tr>
    <tr>
      <td>Storage Temperature</td>
      <td style="text-align: center;"><input type='text' name='temp_st_min' size=5></td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><input type='text' name='temp_st_max' size=5></td>
      <td>°C</td>
    </tr>
    <tr>
      <td>Weight</td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><br>
      </td>
      <td style="text-align: center;"><input type='text' name='weight_max' size=5></td>
      <td>() lbs () kg</td>
    </tr>
    <tr>
      <td>Circuit Protection</td>
      <td><input type='radio' name='protection_type' value='active' checked=1> Active <br><input type='radio' name='protection_type' value='passive'> Passive</td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
    <tr>
      <td>Fuel Gauging</td>
      <td><input type='checkbox' name='fuel_gauge_req' value=1> Required</td>
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
      <td><input type='radio' name='chemistry' value='any' checked=1> Any</td>
      <td><input type='checkbox' name='formfactor' value='any' checked=1> Any </td>
    </tr>
    <tr>
      <td>Runtime</td>
      <td style="text-align: center;"><input type='radio' name='optimization1' value='runtime' checked=1></td>
      <td style="text-align: center;"><input type='radio' name='optimization2' value='runtime' ></td>
      <td><br>
      </td>
      <td><input type='radio' name='chemistry' value='nmc'> Li-Ion NMC/LMO</td>
      <td><input type='checkbox' name='formfactor' value='cylindrical'> Cylindrical </td>
    </tr>
    <tr>
      <td>Power</td>
      <td style="text-align: center;"><input type='radio' name='optimization1' value='power'></td>
      <td style="text-align: center;"><input type='radio' name='optimization2' value='power'></td>
      <td><br>
      </td>
      <td><input type='radio' name='chemistry' value='lfp'> Li-Ion LFP </td>
      <td><input type='checkbox' name='formfactor' value='prismatic'> Prismatic </td>
    </tr>
    <tr>
      <td>Weight</td>
      <td style="text-align: center;"><input type='radio' name='optimization1' value='weight'></td>
      <td style="text-align: center;"><input type='radio' name='optimization2' value='weight'></td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><input type='checkbox' name='formfactor' value='pouch'> Pouch </td>
    </tr>
    <tr>
      <td>Volume</td>
      <td style="text-align: center;"><input type='radio' name='optimization1' value='volume'></td>
      <td style="text-align: center;"><input type='radio' name='optimization2' value='volume'></td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
    <tr>
      <td>Cost</td>
      <td style="text-align: center;"><input type='radio' name='optimization1' value='cost'></td>
      <td style="text-align: center;"><input type='radio' name='optimization2' value='cost' checked=1></td>
      <td><br>
      </td>
      <td><br>
      </td>
      <td><br>
      </td>
    </tr>
  </tbody>
</table>
<p align='center'><input type='submit' value='Submit' class='submit'></p>
</form>
<br>

<?php


?>

<?php include("models/usercake_frameset_footer.php"); ?>