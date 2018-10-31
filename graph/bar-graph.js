
$(document).ready(function(){

	$.ajax({
		url : "http://localhost/Clare/graph/data-bar.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var baby_parameters = {
				temperature : [],
				heart_rate : [],
				respiration : []
			};

			var len = data.length;

			for (var i = 0; i < len; i++) {
				if (data[i].temperature) {
					baby_parameters.temperature.push(data[i].temperature); 
				}
				if (data[i].heart_rate) {
					baby_parameters.heart_rate.push(data[i].heart_rate); 
				}
				if (data[i].respiration) {
					baby_parameters.respiration.push(data[i].respiration); 
				}
			}

			console.log(baby_parameters);


			//Global Options
	      Chart.defaults.global.defaultFontFamily = 'Lato';
	      Chart.defaults.global.defaultFontSize = 18;
	      Chart.defaults.global.defaultFontColor = '#777';


			var ctx = $("#myChart");

			var data = {
				labels : ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],
				datasets : [
					{
						label : "Temperature",
						data : baby_parameters.temperature,
						backgroundColor : "#007bff",
						borderColor : "#007bff",
						fill : false,
						borderWidth: 3
					},
					{
						label : "Heart Rate",
						data : baby_parameters.heart_rate,
						backgroundColor : "#28a745",
						borderColor : "#28a745",
						fill : false,
						borderWidth: 3
					},
					{
						label : "Respiration",
						data : baby_parameters.respiration,
						backgroundColor : "#dc3545",
						borderColor : "#dc3545",
						fill : false,
						borderWidth: 3
					}
				]
			};

			var options = {
				legend : {
					display : true,
					position : 'right'
				},
				title : {
					display: true,
					text: "Graph Title",
					fontSize: 26
				},
				scales: {
            yAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'Baby\'s Parameters'
              }
            }],
            xAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'Days of the Week'
              }
            }]
          }

			};



			
			var chart = new Chart(ctx, {
				type : 'bar',
				data : data,
				options : options
			});


		},
		error : function(data){
			console.log(data);
		}

	});

});