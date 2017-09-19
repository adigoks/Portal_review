
<div class="col-md-12">
	<h3>Dashboard</h3>	
	<div class="dashboard-item col-md-12" >
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Daily View</h3>	
			</div>
			<div class="panel-body">
				<p>jumlah view tiap hari selama 1 minggu terkahir</p>
				<div id="viewChart" class="col-md-12">

					<canvas id="dailyChart">
					
					</canvas>	
				</div>		
			</div>
		</div>
		
	</div>
	<div class="col-md-7 dashboard-item">
		<div class="panel panel-success " >
			<div class="panel-heading">
				<h3 class="panel-title">Post View</h3>	
			</div>
			<div class="panel-body">
				<p>post yang paling banyak dilihat selama 1 minggu terakhir</p>	
				<table class="table table-striped table-hover">
					<tr>
						<th>url</th>
						<th width="80px">page view</th>
					</tr>
					<?php 
					foreach ($page_view as $key): ?>

						<tr>
							<td><?php echo $key->url; ?></td>
							<td width="80px"><?php  echo $key->count; ?></td>
						</tr>	
					<?php
						
					 endforeach ?>
				</table>	
			</div>
			
		</div>	
	</div>
	<div class="col-md-5 dashboard-item">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"> people visit today</h3>
			</div>
			<div class='panel-body'>
				<p align="center" style="font-size: 50px"> <?php echo $people_visit->count;?> <span style="font-size: 40px" class="glyphicon glyphicon-user"></span></p>
			</div>
		</div>
		
	</div>
	
</div>

<script type="text/javascript">

<?php
	$day = 0;
	$time = date('Y-m-d');
	$label = '"'.$time.'"';
	$dataset = " ".$view[$time];

	while (strtotime($limit) < strtotime($time)) {
		$day++;
		$time = date('Y-m-d', strtotime('-'.$day.' days'));
		$label = '"'.$time.'", '.$label ;
		$dataset = $view[$time].', '.$dataset;
	}
?>
	var elmt1 = $('#dailyChart');
	var dailychart = new Chart(elmt1,{
		type : 'line',
		data : {
			labels : [<?php echo $label;?>],
			datasets :[{
				label: 'Site View',
				backgroundColor: 'rgb(255, 99, 132)',
            	borderColor: 'rgb(255, 99, 132)',
            	data: [<?php echo $dataset;?>]
			}]
		},
		options : {
			maintainAspectRatio: false,
			responsive : true,
			scales: {
				yAxes: [{
				stacked: true,
					gridLines: {
					display: true,
					color: "rgba(255,99,132,0.2)"
					}
			    }],
			    xAxes: [{
			      gridLines: {
			        display: false
			      }
			    }]
			  }
		}
	});
	
</script>