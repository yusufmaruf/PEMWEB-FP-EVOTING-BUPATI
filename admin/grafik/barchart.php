<?php
  $data = mysqli_query($koneksi, "SELECT id_paslon as paslon,count(*) as 'jumlah pemilih' FROM `tb_vote` GROUP BY id_paslon");
  $count = 0;
  while($row = mysqli_fetch_assoc($data)){
    $data_chart['nama'][$count] = "paslon ".$row['paslon'];
    $data_chart['jumlah'][$count] = $row['jumlah pemilih'];
    $count++;
  }
?>
<div class="card card-info">
	<div class="card-header ">
		<h3 class="card-title">
			<i class="fa fa-chart-pie "></i> Grafik Bar chart Hasil Suara</h3>
	</div>
    <div class="card-body justify-content-center">
    <div id="canvas-holder" >
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'bar',
			data: {
				datasets: [{
                    
					data:<?php echo json_encode(($data_chart['jumlah'])); ?>,
                    label: "perhitungan suara",
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],

					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
				}],
				labels: <?php echo json_encode($data_chart['nama']); ?>},
			options: {
				responsive: true,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
		
	</script>

    </div>

</div>
