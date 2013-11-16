var lastslideid=1; //stores last slide so I know what slide to go to next when timesout
var mytimer;

	function changeimg(index) // accepts the id of image to change to, if null (caused by timeout) change to next slide
	{
	var caroselitem = document.getElementById(index);
	var count = document.getElementById('').childNodes.length;
	if(lastslideid>=count)lastslideid=1;
	if(index==null)	index=lastslideid++;
	
		document.getElementById('mainimg').src = caroselitem.children[0].src;
		document.getElementById('description').innerHTML =  caroselitem.children[1].innerHTML;
		//document.getElementById('linkurl').href=imgarray[index].link;
		clearTimeout(mytimer);
		mytimer = setTimeout('changeimg()',3000);
	}