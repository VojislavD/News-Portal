<div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <div class="flex flex-col lg:flex-row items-center justify-between px-8 mt-10">
    	<div class="w-full md:px-8 lg:px-0 lg:w-1/2 lg:pr-2 xl:pr-8">
    		<h3 class="text-center text-xl font-bold">Last 7 Days</h3>
    		<canvas id="myChart"></canvas>
    	</div>
    	<div class="w-full md:px-8 lg:px-0 lg:w-1/2 lg:pl-2 xl:pl-8 mt-8 lg:mt-0">
    		<h3 class="text-center text-xl font-bold">Last 30 Days</h3>
    		<canvas id="myChart2"></canvas>
    	</div>
    </div>

    <script>
		var commentsBy7DaysJson = {!! json_encode($commentsBy7Days) !!};
		var commentsBy30DaysJson = {!! json_encode($commentsBy30Days) !!};
		var viewsBy7DaysJson = {!! json_encode($viewsBy7Days) !!};
		var viewsBy30DaysJson = {!! json_encode($viewsBy30Days) !!};

		var commentsBy7DaysName = [];
		var commentsBy7DaysValue = [];
		var commentsBy30DaysName = [];
		var commentsBy30DaysValue = [];
		var viewsBy7DaysValue = [];
		var viewsBy30DaysValue = [];

		for(i=6; i>=0;i--) {
		    commentsBy7DaysName.push(commentsBy7DaysJson[i].name);
		    commentsBy7DaysValue.push(commentsBy7DaysJson[i].count);
		}

		for(i=29; i>=0;i--) {
		    commentsBy30DaysName.push(commentsBy30DaysJson[i].name);
		    commentsBy30DaysValue.push(commentsBy30DaysJson[i].count);
		}

		for(i=6; i>=0;i--) {
		    viewsBy7DaysValue.push(viewsBy7DaysJson[i].count);
		}

		for(i=29; i>=0;i--) {
		    viewsBy30DaysValue.push(viewsBy30DaysJson[i].count);
		}

		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: commentsBy7DaysName,
		        datasets: [{
		            label: 'Views',
		            data: viewsBy7DaysValue,
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)'
		            ],
		            borderWidth: 1
		        },
		        {
		            label: 'Comments',
		            data: commentsBy7DaysValue,
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		            ],
		            borderWidth: 1
		        },]
		    },
		    options: {
		    	responsive: true,
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});

		var ctx2 = document.getElementById('myChart2').getContext('2d');
		var myChart = new Chart(ctx2, {
		    type: 'line',
		    data: {
		        labels: commentsBy30DaysName,
		        datasets: [{
		            label: 'Views',
		            data: viewsBy30DaysValue,
		            backgroundColor: [
		                'rgba(255, 206, 86, 0.2)',

		            ],
		            borderColor: [
		                'rgba(255, 206, 86, 1)',
		            ],
		            borderWidth: 1
		        },
		        {
		            label: 'Comments',
		            data: commentsBy30DaysValue,
		            backgroundColor: [
		                'rgba(75, 192, 192, 0.2)',
		            ],
		            borderColor: [
		                'rgba(75, 192, 192, 1)',
		            ],
		            borderWidth: 1
		        },]
		    },
		    options: {
		    	responsive: true,
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});
	</script>
</div>