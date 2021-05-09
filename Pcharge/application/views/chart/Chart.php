<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta code="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>

    
  </head>
  <body>
  <nav>
    <ul>
        <li><a href="<?php echo base_url(); ?>MenuController/menu">Acceuil</a></li>

        <li>
            <a href="<?php echo base_url(); ?>AssureurController">Assureur</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>FactureController">Facture</a></li>
                
            </ul>
        </li>
        <li>
            <a href="">Calendrier</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>EvenementController">Evenement</a></li>
                
            </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>ChartController">Chart</a></li>
    </ul>
</nav>
<?php
$this->db->select('count,assurance');
$dataassureurChart = $this->db->get("chart")->result();
foreach ($dataassureurChart as $k => $v) {
    $arrProd[] = ['label' => $v->assurance, 'y' => $v->count];
}

?>

<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2",
    exportEnabled: true,
	animationEnabled: true,
   
    title:{
        text: "Chart de frequence Assureur VEL'OPTIC"
    },
    legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
    data: [
    {
        type: "pie",
		indexLabel: "{label} - {y}%",
        dataPoints:
            <?=json_encode($arrProd, JSON_NUMERIC_CHECK);?>
        }
    ]
});
chart.render();
}
function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();
 
}          
</script>
</head>

<div id="chartContainer" style="margin-top: 150px;
  margin-right: 0px;
  margin-left: 300px;
  height:800px;
  max-width: 1300px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>

  </body>