var url = config.path+"/dashboards/getAllAgeGroupAppUser";
$.get(url,function(resp){
	var data = $.parseJSON(resp);
	console.log(data);
	var male_ageGroup_10_14 = 0;
	var male_ageGroup_15_20 = 0;
	var male_ageGroup_21_25 = 0;
	var male_ageGroup_26_30 = 0;
	var male_ageGroup_31_35 = 0;
	var male_ageGroup_36_50 = 0;
	var male_ageGroup_50 = 0;
	var female_ageGroup_10_14 = 0;
	var female_ageGroup_15_20 = 0;
	var female_ageGroup_21_25 = 0;
	var female_ageGroup_26_30 = 0;
	var female_ageGroup_31_35 = 0;
	var female_ageGroup_36_50 = 0;
	var female_ageGroup_50 = 0;
	$.each(data, function(key, element) {
		var Gender = element.Gender;
		var Dob = element.Year_Of_Birth;
		var current_year = new Date().getFullYear();
		var age = parseInt(current_year - parseInt(Dob));
		if(Gender == 'Male'){
			if(age <= 14){
				male_ageGroup_10_14++;
			}

			if(age <= 20 && age >= 15){
				male_ageGroup_15_20++;
			}

			if(age <= 25 && age >= 21){
				male_ageGroup_21_25++;
			}

			if(age <= 30 && age >= 26){
				male_ageGroup_26_30++;
			}

			if(age <= 35 && age >= 31){
				male_ageGroup_31_35++;
			}

			if(age <= 50 && age >= 36){
				male_ageGroup_36_50++;
			}

			if(age >= 51){
				male_ageGroup_50++;
			}
		}

		if(Gender == 'Female'){
			if(age <= 14){
				female_ageGroup_10_14++;
			}

			if(age <= 20 && age >= 15){
				female_ageGroup_15_20++;
			}

			if(age <= 25 && age >= 21){
				female_ageGroup_21_25++;
			}

			if(age <= 30 && age >= 26){
				female_ageGroup_26_30++;
			}

			if(age <= 35 && age >= 31){
				female_ageGroup_31_35++;
			}

			if(age <= 50 && age >= 36){
				female_ageGroup_36_50++;
			}

			if(age >= 51){
				female_ageGroup_50++;
			}
		}
    });



	var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">'
		+'<thead>'
			+'<tr><th>Age Group</th><th>Male</th><th>Female</th></tr>'
		+'</thead>'
		+'<tbody>'
			+'<tr><td>10-14</td><td>'+male_ageGroup_10_14+'</td><td>'+female_ageGroup_10_14+'</td>'
			+'</tr>'
			+'<tr><td>15-20</td><td>'+male_ageGroup_15_20+'</td><td>'+female_ageGroup_15_20+'</td>'
			+'</tr>'
			+'<tr><td>21-25</td><td>'+male_ageGroup_21_25+'</td><td>'+female_ageGroup_21_25+'</td>'
			+'</tr>'
			+'<tr><td>26-30</td><td>'+male_ageGroup_26_30+'</td><td>'+female_ageGroup_26_30+'</td>'
			+'</tr>'
			+'<tr><td>31-35</td><td>'+male_ageGroup_31_35+'</td><td>'+female_ageGroup_31_35+'</td>'
			+'</tr>'
			+'<tr><td>36-50</td><td>'+male_ageGroup_36_50+'</td><td>'+female_ageGroup_36_50+'</td>'
			+'</tr>'
			+'<tr><td>50+</td><td>'+male_ageGroup_50+'</td><td>'+female_ageGroup_50+'</td>'
			+'</tr>'
		+'</tbody>'
	+'</table>';
    $('#agegrouploader').hide();    
	$('#agegroup').append(table);
});
