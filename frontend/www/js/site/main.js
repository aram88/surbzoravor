/**
 * 
 */
$(document).ready(function(){
	$('#circleSerach').click(function(){
		$("#googleSearch").slideToggle('slow');
		if ($("#circleSerach").children().is(".fa.fa-search")){
			$("#circleSerach").children().removeClass("fa-search");
			$("#circleSerach").children().addClass("fa-close");
		}
		else{
			$("#circleSerach").children().removeClass("fa-close").addClass("fa-search");
		}
	})
});