function sidebar_index_click(index) {
	/*for (i=1;i<7;i++) {
		document.getElementById('nav'+i).style.backgroundPosition = 'left bottom';
		document.getElementById('nav'+i).style.color = '#fff';
	}
	document.getElementById('nav'+j).style.backgroundPosition = 'right bottom';
	document.getElementById('nav'+j).style.color = '#3b6ea5';
	*/
//	alert(index);
		 $(".sidebar-index").each(function () {
			 if(index == $(this).index()){
				 $(this).children("a").css("background","#F2F2F2");
//				 alert(index);
			 }else{
				 $(this).children("a").css("background","#FFFFFF");
			 }
	         
	    });       
	
}