<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
<style>
.header {
  text-align:center;
  font-size:8pt;
  line-height:7pt;padding:0 0 4px 0;margin:0;
  border-top:1pt solid #777777;
  border-bottom:1pt solid #777777;  
}
.headtable th {
font-size:14pt;
text-align:center;
}
.foot {
  font-size:8pt;
}
table.adresses, table.details {
  border-collapse:collapse;
}
table.details {
  border-bottom:2px solid #000;
}
table.tabnote td {
  font-size:9pt;
}
table.tabnote th {
  font-size:8pt;
  border:0.5px solid #000;
}

tr.odd {
  background-color:#ffffff;
}
tr.even {
    background-color:#dddddd;
}
.totals td {
  text-align:right;
}
.adresses th, .details th {
  border:1pt solid #000000;
  background-color:#cccccc;
  text-align:left;
  margin:0;
}

.bloc {
text-align:left;
border: 0.5pt solid black;
}
body {
  font-family: sans-serif;
  font-size:9pt;
  margin:20pt;
}
.lines {
  border:0.3pt solid black;
  border-collapse:collapse;
}

.lines td {
  border-right:0.3pt solid black;
  padding:5px 10px;
}
table.listing
{ 
page-break-after: always
}
</style>
</head>

<body>
  <script type="text/php">
  if ( isset($pdf) ) {

    $font = Font_Metrics::get_font("verdana");
    $size = 6;
    $color = array(0,0,0);
    $text_height = Font_Metrics::get_font_height($font, $size);

    $foot = $pdf->open_object();

    $w = $pdf->get_width();
    $h = $pdf->get_height();

    // Draw a line along the bottom
    $y = $h - $text_height - 24;
    $pdf->line(16, $y, $w - 16, $y, $color, 0.5);


    $text = "<?php echo $title?>";  

    // Center the text
    $width = Font_Metrics::get_text_width("<?php echo $title?>", $font, $size);
    $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);
    $pdf->close_object();
    $pdf->add_object($foot, "all");

  }
  </script>

