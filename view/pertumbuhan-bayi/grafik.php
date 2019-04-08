<?php if (@$_SESSION['user']) { ?>

<?php
$kode_bayi = $_GET['kode'];
$data = $objAdmin->grafk_pertumbuhan($kode_bayi);
// $a = $data->fetch_object();
// var_dump($a);
// ambil data :
// berat badan
// Linkar kepala
// Lebar badan

 ?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Umur', 'Berat Badan', 'Linkar kepala', 'Lebar Badan'],
          <?php while($a = $data->fetch_object()) { echo '['.$a->Umur_bayi.','.$a->Berat_badan.','.$a->Lingkar_kepala.','.$a->Lebar_badan.'],'; } ?>
          // ['2014',  2, 20, 40],
          // ['2015',  2, 18, 30],
          // ['2016',  3, 24, 30]
        ]);

        var options = {
          title: 'Grafik Pertumbuhan Bayi',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <div id="chart_div" style="width: 100%; height: 500px;"></div>
<?php } ?>
