function sidebar_content_click(index) {
	/*for (i=1;i<7;i++) {
		document.getElementById('nav'+i).style.backgroundPosition = 'left bottom';
		document.getElementById('nav'+i).style.color = '#fff';
	}
	document.getElementById('nav'+j).style.backgroundPosition = 'right bottom';
	document.getElementById('nav'+j).style.color = '#3b6ea5';
	*/
//	alert(index);
		 $(".sidebar-content").each(function () {
			 if(index == $(this).index()){
				 $(this).children("a").css("color","red");
				 $(this).children("a").css("font-size","16px");
//				 alert(index);
			 }else{
				 $(this).children("a").css("color","#000000");
//				 $(this).children("a").css("font-weight","normal");
				 $(this).children("a").css("font-size","13px");
			 }
	         
	    });       
	
}