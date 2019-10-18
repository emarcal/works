// JavaScript Document

var Xchange = {
	
	init: function() {
		console.log("Xchange");
		this.setUI();
		this.setButtons();
	},
	
	setUI: function() {
		
		
	},
	
	setButtons: function() {
		$("#showcbt").click(function(){
			Xchange.show_conversor();
		});
		
		$("#cscbt").click(function(){			
			$("#conversor").hide();
			$("#slide").show();
		});
		
		
	},
	
	show_conversor: function() {
		$("#slide").hide();
		$("#conversor").show();
		
	}
	
}

$(document).ready(function() {
	Xchange.init();
});