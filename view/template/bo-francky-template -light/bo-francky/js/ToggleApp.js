function ToggleApp(){


this.toggleMenus=function(){
		var menus=document.querySelectorAll('.toggleMenus');
		var buttons=document.querySelectorAll('.toggleBt');

		var __self=this;

		var toggleEvt=function(bt, menu){
			var toggleIcon=document.createElement('span');

			toggleIcon.className='block blueBt alignCenter toggleIcon absolute';
			toggleIcon.style.display='block';

			toggleIcon.style.position='absolute';
			toggleIcon.style.top='5px';
			toggleIcon.style.right='5px';

			var btStyle=getComputedStyle(bt);

			if(btStyle.position!='absolute' || btStyle.position !='fixed')
			{
				bt.style.position='relative';
			}

			menu.style.display='none';
			bt.appendChild(toggleIcon);
			toggleIcon.textContent='+';
			toggleIcon.style.borderRadius='100%';
			toggleIcon.style.width='25px';
			toggleIcon.style.minWidth='25px';
			toggleIcon.style.height='25px';
			toggleIcon.style.lineHeight='1';
			var toggleIconStyle=getComputedStyle(toggleIcon);
			//events 
			toggleIcon.addEventListener('mouseover', function(e){
				this.style.border='3px solid '+toggleIconStyle.color;
			});
			toggleIcon.addEventListener('mouseleave', function(e){
				setTimeout(function(){
					toggleIcon.style.border='2px solid '+toggleIconStyle.color;
				}, 400);
				setTimeout(function(){
					toggleIcon.style.border='1px solid '+toggleIconStyle.color;
				}, 800);
			});
			var menuStyle=getComputedStyle(menu);

			if(menuStyle.backgroundColor!='undefined')
			{
				menu.style.background='#f8f8f8';
				menu.style.padding='10px';
				menu.style.paddingLeft='50px';
			}
			bt.addEventListener('click',function(e){
				e.preventDefault();
				__self.toggle(menu,function(){
					//some code here
					// console.log('some code here');
					if(menu.style.display=='block')
					{ 
						toggleIcon.textContent='-';
					}else{

				 
						toggleIcon.textContent='+';
					}
					//after 5 seconds of inactivity hide menu
					if(menu.style.display=='block'){
						var myTimer = setTimeout(function(e){
								menu.style.display='none';
								toggleIcon.textContent='+';
						}, 5000);
						
						menu.addEventListener('mouseover',function(e){
							clearTimeout(myTimer);
						}) ;
						menu.addEventListener('mouseleave',function(e){
							
							myTimer = setTimeout(function(e){
								menu.style.display='none';
								toggleIcon.textContent='+';
							}, 5000);
						}) ;
					}
					
					


				});
			});
		};
		for(var i=0,c=menus.length;i<c;i++)
		{
			toggleEvt(buttons[i], menus[i]);
		} 
	};
	this.toggle=function(e, fallback){
		if(e.style.display=='block'){
			e.style.display='none';
		}else{
			e.style.display='block';
		}

		var codeFallback=fallback;
		codeFallback();
	};

}


var app=new ToggleApp();
app.toggleMenus();