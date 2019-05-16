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
          <?php while($a = $data->fetch_object()) {
            echo '['.$a->umur_bayi.','.$a->Berat_badan.','.$a->Lingkar_kepala.','.$a->Lebar_badan.'],'; } ?>
          // ['2014',  2, 20, 40],
          // ['2015',  2, 18, 30],
          // ['2016',  3, 24, 30]
        ]);

        var options = {
          title: 'Grafik Pertumbuhan Bayi',
          hAxis: {title: 'Umur/Bulan',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <div id="chart_div" style="width: 100%; height: 500px;"></div>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);
      <?php
      $kode_bayi = $_GET['kode'];
      $data2 = $objAdmin->grafk_pertumbuhan($kode_bayi);
       ?>
      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
        ['Umur', 'Berat Badan', 'Linkar kepala', 'Lebar Badan'],
        <?php while($b = $data2->fetch_object()) {
          echo '['.$b->umur_bayi.', '.$b->Berat_badan.', '.$b->Lingkar_kepala.', '.$b->Lebar_badan.'], '; } ?>
        ]);

        var options = {
          title : 'Grafik Pertumbuhan Bayi',
          // vAxis: {title: 'Cups'},
          hAxis: {title: 'Umur/Bulan'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_batang'));
        chart.draw(data, options);
      }
    </script>

        <div id="chart_batang" style="width: 900px; height: 500px;"></div>

<?php } ?>
