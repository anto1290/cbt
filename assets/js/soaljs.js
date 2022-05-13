$(document).ready(function () {
	$("input:checkbox[name^='kunci']").on('change', function () {
		var valu = this.value;
		var i;
		for (i = 0; i < $("input:checkbox[name^='kunci']").length; i++) {
			if ($("input:checkbox[name^='kunci']")[i].value == valu) {
				$("input:checkbox[name^='kunci']")[i].checked = true;
			} else {
				$("input:checkbox[name^='kunci']")[i].checked = false;
			}
		}
	});
	$('#submit').on('click', function () {
		$('#editSoal').submit();
	});

});
