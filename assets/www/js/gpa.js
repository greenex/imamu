function view_form() {
	$("#formcontent").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;"><img src="images/loading.gif"  /></div>');
	var courses = $("#course").val();
	var coursehtml = '<table width="100%"><tr><th>Subject grade</th><th>Hours number</th></tr>';

	if (courses != '0' && !isNaN($("#noh").val()) && !isNaN($("#lastgpa").val())) {
		for (var i = 1; i <= courses; i++) {
			coursehtml += '<tr><td><select id="grade' + i + '"><option value="5">A+</option><option value="4.75">A</option><option value="4.5">B+</option><option value="4">B</option><option value="3.5">C+</option><option value="3">C</option><option value="2.5">D+</option><option value="2">D</option><option value="1">F</option></select></td><td><select id="hours' + i + '"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="17">19</option><option value="18">20</option></select></td></tr>';
		}
		coursehtml += '<tr><td colspan="2"><a href="#gparesult" style="text-decoration:none;"><input type="button" value="Last Step" onclick="view_gpa_result()" /></a></td></tr></table>';
		$("#formcontent").empty();
		$("#formcontent").append(coursehtml);
		$("#formcontent").trigger('create');
	} else {
		alert("please fill all fields");
	}
}

function view_gpa_result() {
	var courses = $("#course").val();
	var sum = 0;
	var hours = 0;
	for (var i = 1; i <= courses; i++) {
		sum += parseFloat($("#grade" + i).val()) * parseFloat($("#hours" + i).val());
		hours += parseFloat($("#hours" + i).val());
	}
	var calc = parseFloat(sum / hours);
	var allgpa = 0;
	var sumall = parseFloat($("#noh").val()) * parseFloat($("#lastgpa").val());
	sumall +=sum;
	allgpa =parseFloat(sumall / (hours+parseFloat($("#noh").val())));
	var coursehtml = '<table width="100%" style="text-align:center;"><tr><th>Accumlative Avrerage</th><th>Semester Avrerage</th></tr>';
	coursehtml += '<tr><td>' + allgpa.toFixed(2) + '</td><td>' + calc.toFixed(2) + '</td></tr></table>';
	$("#gparesultdata").empty();
	$("#gparesultdata").append(coursehtml);
	$("#gparesultdata").trigger('create');
}

