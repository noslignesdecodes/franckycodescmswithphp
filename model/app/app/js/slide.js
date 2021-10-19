function slide()
{
	var images=document.querySelectorAll('.banner .images input');

	var slideContainer=document.querySelector('.imgContainer');

	var banner=document.querySelector('.banner');
 	var slideBox=document.querySelector('.slideBox');

 	var slideBoxWidth=images.length*100;
 	slideBox.style.width=slideBoxWidth+'%';
 	console.log((images.length*100)+'%');
 	console.log(images.length);
 	var leftBt=document.createElement('div');
 	var rightBt=document.createElement('div');

 	leftBt.className='prevBt';
 	rightBt.className='nextBt';

 	leftBt.textContent='<';
 	rightBt.textContent='>';

 	var imagesWidth=0;
	for(var i=0,c=images.length;i<c;i++)
	{
		var img=document.createElement('img');
		img.src='img/'+images[i].value;
		slideBox.appendChild(img);
		imagesWidth=(slideBoxWidth/images.length)/images.length;
		img.style.width=imagesWidth+'%';
	} 

	banner.appendChild(leftBt);
	banner.appendChild(rightBt);
 
	var slideCount=1;
	var leftVal=0;

	leftBt.addEventListener('click',function(e){ 
		// setTimeout(function(){

		// 	slideBox.style.left='-'+(100*(slideCount/2))+'%';	
		// }, 400);
		// setTimeout(function(){ 
		// 	slideBox.style.marginLeft='-'+(100*slideCount)+'%';
		// 	slideCount--;
		// }, 800);
		leftVal-=100*slideCount;
		slideBox.style.marginLeft=leftVal+'%';
		slideCount--;
		// slideBox.style.marginLeft='-'+(100*slideCount--)+'%';
		// console.log(100*slideCount); 
		console.log(leftVal);
	});
	rightBt.addEventListener('click',function(e){
 
 	// 	setTimeout(function(){

		// 	slideBox.style.marginLeft=''+(100*(slideCount/2))+'%';	
		// }, 400);
		// setTimeout(function(){ 
		// 	slideBox.style.marginLeft=''+(100*slideCount)+'%';
		// 	slideCount++;
		// }, 800);

		leftVal+=100*slideCount;
		slideBox.style.marginLeft=leftVal+'%';
		slideCount++;
		// slideBox.style.marginLeft=''+(100*slideCount++)+'%';
		// console.log(100*slideCount);
		console.log(leftVal);
	}); 
}