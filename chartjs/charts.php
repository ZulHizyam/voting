<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "ovs");
$sub_query = "
   SELECT name, count(*)as name FROM nominees 
   GROUP BY name 
   ORDER BY id ASC";
$result = mysqli_query($connect, $sub_query);
$data = array();
while($row = mysqli_fetch_array($result))
{
 $data[] = array(
  'label'  => $row["name"],
  'value'  => $row["name"]
 );
}
$data = json_encode($data);
?>
<html> 
<head>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    </head>
    
<body>

<div id="donut-example"></div>
<div id="legend" class="donut-legend"></div>
    <script>
    var Data= [
    {label: "Voted", value: 350},
    {label: "Not Vote", value: 650},
  ];
 var total = 1000;
var browsersChart = Morris.Donut({
  element: 'donut-example',
  data: Data,
  formatter: function (value, data) { 
  	return Math.floor(value/total*100) + '%'; 
  }
});

  browsersChart.options.data.forEach(function(label, i) {
    var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<br><span>&nbsp;</span>');
    legendItem.find('span')
      .css('backgroundColor', browsersChart.options.colors[i])
      .css('width', '20px')
      .css('display', 'inline-block')
      .css('margin', '5px');
    $('#legend').append(legendItem)
  });
        </script>
    
    
    
</body>





</html>