var lastslideid=1; //stores last slide so I know what slide to go to next when timesout
var mytimer;

	function changeimg(index) // accepts the id of image to change to, if null (caused by timeout) change to next slide
	{
		var count = document.getElementById('carosel').getElementsByClassName("galleryitem").length;
		var caroselitem;
		
		
		if(lastslideid>=count)  index=1;
		if(index==null) 			 index=lastslideid+1;
		
		document.getElementById(lastslideid).className='galleryitem';
		caroselitem = document.getElementById(index);
		caroselitem.className='galleryitem highlight';
		document.getElementById('mainimg').src = caroselitem.children[0].src;
		document.getElementById('description').innerHTML =  caroselitem.children[1].innerHTML;
		document.getElementById('price').innerHTML = 'From as low as $'+caroselitem.children[2].innerHTML;
		
		clearTimeout(mytimer);
		mytimer = setTimeout('changeimg()',7000);
		lastslideid=parseInt(index);
	}
	
	function fillorder()
	{
	console.log('Filled form based on package: '+lastslideid);
	}