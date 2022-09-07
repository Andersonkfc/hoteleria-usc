$(document).ready(function() {
    
	$(".dropdown-button").dropdown();
	
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 20 // Creates a dropdown of 15 years to control year

  });
	$('select').material_select();
  });