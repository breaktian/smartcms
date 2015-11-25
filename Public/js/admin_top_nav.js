function admin_top_nav(index) {
	/*for (i=1;i<7;i++) {
		document.getElementById('nav'+i).style.backgroundPosition = 'left bottom';
		document.getElementById('nav'+i).style.color = '#fff';
	}
	document.getElementById('nav'+j).style.backgroundPosition = 'right bottom';
	document.getElementById('nav'+j).style.color = '#3b6ea5';
	*/
//	alert(index);
		 $(".nav").each(function () {
			 if(index == $(this).index()){
				 $(this).css("backgroundPosition","right bottom");
				 $(this).children("a").css("color","#3b6ea5");
			 }else{
				 $(this).css("backgroundPosition","left bottom");
				 $(this).children("a").css("color","#FFFFFF");
			 }
	         
	    });       
	
}