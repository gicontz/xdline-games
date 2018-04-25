var current_ans = "";
var mission_num = mission_mode == 'mission1' ? 1 : 2;
var item_num = 0;

$(document).ready(function(){
	$(".level").click(function(){
		tempo_diff = $(this).attr('id');
		var num_levels = Object();

		num_levels = mission_mode == 'mission1' ? mission1[tempo_diff] : mission2[tempo_diff];

		var text_diff = mission_mode == 'mission1' ? 'Mission 1' : 'Mission 2';
		var content_to_load = "";

		$("#modal_questions .modal-header").html("<h4 class='text-diff'>"+ text_diff + "-" + tempo_diff.toUpperCase() +"</h4>");

		for(var x in num_levels){
			var dig = parseInt(x);
			content_to_load += "<br><button class='btn btn-default quest_level' data-level='"+ (dig+1) +"'><i class='fa fa-chevron-right'></i> LEVEL "+ (dig+1)	 +"</button><br>";
		}
		$("#modal_questions .modal-levels").html(content_to_load);


		$(".quest_level").click(function(){
			difficulty = tempo_diff;
			var questions = mission_mode == 'mission1' ? mission1[difficulty] : mission2[difficulty];
			var main_content = "";
			level = $(this).attr('data-level') - 1;
			item_num = level + 1;
			main_content = "<h2>" + questions[level].t + "</h2>";
			main_content += "<p>" + questions[level].q + "</p>";
			current_ans = questions[level].a;
			$("#mission-content .content-quest").html(main_content);
			$(".modal-footer button").click();
		});	

	});

	$("#send_answer").submit(function(e){
		e.preventDefault();
		var user_ans = $("#answer").val();
		if(user_ans == current_ans && current_ans != ""){
			var inf = new Object();
			inf["mission_num"] = mission_num;
			inf["difficulty"] = difficulty;
			inf["item_num"] = item_num;
			$.post("lib/points.php", {
				info: inf},
				function(callback){   
			      // var subload = JSON.parse(callback);   
			      if(callback == "SUCCESS"){
						alert("CORRECT!");
						$(".modal-footer button").click();
			      }else if(callback == "ERROR"){
						alert("AN ERROR OCCURRED TRY AGAIN!");   	
			      }else if(callback == "ERROR"){
						alert("AN ERROR OCCURRED TRY AGAIN!");  
				  }else if(callback == "GG"){
						alert("ALREADY ANSWERED!");  						
				  }
			  }
			  );
		}else{
			alert("INCORRECT!");
		}
	});


});