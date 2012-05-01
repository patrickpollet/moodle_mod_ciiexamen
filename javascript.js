

function openPopup2(theURL,winName,width,height,features) { 
	if (!features)
		features='scrollbars=yes,resizable=yes';
	features ="height="+height+",width="+width+","+features;
	// v 1.41 centrage du popup 
			var top=(screen.height-height)/2;
			var left=(screen.width-width)/2;
			features="top="+top+",left="+left+","+features;
       // alert(features)
	    window.open(theURL,winName,features);
	}

