function toInt(str)
{
	return parseInt(str, 10);
}
function App()
{
	this.showBannerImgList=function(){
		var imgList=document.querySelector('.bannerImgList');
		var images=document.querySelector('.banner .images input');

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

	this.showMainMenu=function(e){
		var mainMenuBt=document.querySelector('.mainMenuBt');
		var mainMenu=document.querySelector('.mainMenuContainer');
		var appCore=document.querySelector('.appCore');
		var banner=document.querySelector('#banner');
		var appFooter=document.querySelector('.mainFooter');
		var _self=this;
		var closeMenu=document.querySelector('.mainMenuContainer .closeBt');

		var changeWidthEvt=function(e, val){
			e.style.width=val;
			// e.style.minWidth=val;
		};

		var tempStyle=getComputedStyle(mainMenu);
		var tempStyleWidth=parseInt(tempStyle.width, 10);

		mainMenu.style.left=((-1)*(tempStyleWidth))+'px';
		var toggleEvt=function(){
			_self.toggle(mainMenu, function(){

				var menuStyle=getComputedStyle(mainMenu); 
				var menuWidth=parseInt(menuStyle.width,10); //in pixels

			 	//initiate main menu width 
			 	// mainMenu.style.width='0';
			 	mainMenu.style.width='0';
				// mainMenu.style.minWidth='0';
				if(mainMenu.style.display=='block'){
					var toDivide=5;


					for(var i=0,c=5;i<c;i++)
					{

						setTimeout(function(){
							var tempWidth=parseInt(menuWidth/toDivide, 10)+'px';
							appCore.style.marginLeft=tempWidth;
							banner.style.marginLeft=tempWidth;
							appFooter.style.marginLeft=tempWidth;
							//main menu 
							// var temp2= parseInt(menuWidth/5, 10)+'px';

						 	if(i>=5){
						 		mainMenu.style.left='0';
						 	}else{
								mainMenu.style.left=((-1)*(toInt(tempWidth)))+'px';
							}
							toDivide--;
						}, 200*i);
					}
				 
					
				}else{
					var toDivide=5; //init
					for(var i=5,c=0;i>=c;i--)
					{

						setTimeout(function(){
							var tempWidth=parseInt(menuWidth/toDivide, 10)+'px';
							appCore.style.marginLeft=tempWidth;
							banner.style.marginLeft=tempWidth;
							appFooter.style.marginLeft=tempWidth;
							//main menu 
							// var temp2= parseInt(menuWidth/5, 10)+'px';

						 	if(i<=0){
						 		mainMenu.style.left='0';
						 	}else{
								mainMenu.style.left=((-1)*(Math.abs(toInt(tempWidth))))+'px';
							}
							toDivide--;
						}, 200*i);
					}
					 
				}
			});
		};
		closeMenu.addEventListener('click', function(e){
			toggleEvt();
		});

		mainMenuBt.addEventListener('click',function(e){
			toggleEvt();

		});

		mainMenu.addEventListener('mouseover',function(e){
			this.style.overflowY='scroll';
			this.style.paddingBottom='100px';
		});

		mainMenu.addEventListener('mouseleave',function(e){
			this.style.overflowY='hidden';
			
		});

	};

	this.showPromo=function(){
		var promoModal=document.querySelector('#promoModal');
		promoModal.style.display='none';

		setTimeout(function(){
			promoModal.style.display='block';
		}, 3000);
	};
	this.closeModals=function(){
		var modals=document.querySelectorAll('.modalContainer');
		var boxes=document.querySelectorAll('.modalBox');
		var closeBts=document.querySelectorAll('.closeModalBt');


		var closeEvt=function(bt, modal){
			bt.addEventListener('click',function(e){
				modal.style.display='none';
			});
		};

		for(var i=0,c=modals.length;i<c;i++)
		{
			closeEvt(closeBts[i], modals[i]);
		}
	};
	this.saveMessage=function(){
		var contactForms=document.querySelectorAll('.contactForm');

		var contactEvt=function(qform){

			qform.addEventListener('submit',function(e){
				e.preventDefault();

				var xhr=new PhpChat();

				xhr.post(this, function(e){
					var contactModal=document.createElement('div');
					var contactBox=document.createElement('div');

					contactModal.className='modalContainer';
					contactBox.className='modalBox';
					contactModal.appendChild(contactBox);
					var messageSent=document.createElement('div');

					messageSent.className='success';

					messageSent.textContent='Message envoyé';
					contactBox.appendChild(messageSent);

					var sentBt=document.createElement('div');

					sentBt.className='modalCloseBt';

					sentBt.textContent='x';

					contactBox.appendChild(sentBt);


					//close modal bt events 

					sentBt.addEventListener('click',function(e){
						e.preventDefault();
						// modalContainer.style.display='none';
						qform.removeChild(contactModal);
						qform.reset();

					});
					qform.appendChild(contactModal);
					contactModal.style.display='block';

				}); 
			});
		};

		for(var i=0,c=contactForms.length;i<c;i++)
		{
			contactEvt(contactForms[i]);
		}
	};
	this.run=function(){
		try 
		{
			this.showMainMenu();
		}catch(e)
		{
			console.log('main menu desktop error '+e);
		}
		// try{
		// 	console.log('run banner slide');
	 
		// 	setSlide('banner', '.banner .images input', '#f75561', '#222');

		// }catch(e){
		// 	console.log(e);
		// }
		try{
			this.saveMessage();
		}catch(e)
		{
			console.log(e);
		}
		try{
			this.showPromo();
		}catch(e)
		{
			console.log('promo error '+e);
		}
		try{
			console.log('run banner slide 1');
	 
			setSlideItems('bannerSlide2', '.imageToSlide .imgContainer', '#f75561', '#222');

		}catch(e){
			console.log(e);
		}
		try{
			console.log('run banner slide 2');
	 
			//setSlideItems('bannerSlide2', '.bannerSlide2Hidden div.slides', '#f75561', '#222');

		}catch(e){
			console.log(e);
		}
		try{
			console.log('run actu slide');
			// slide();
			setSlideItems('actuSlide', '.actuImagesHidden article', '#000');
			 
		}catch(e){
			console.log(e);
		}
		try{
			console.log('run services slide');
			// slide();
			setSlideItems('servicesSlide', '.servicesContainer div.ib', '#282828', '#ccc');
			 
		}catch(e){
			console.log(e);
		}
		try{
			console.log('run produits marques slide');
			// slide();
			setSlideItems('produitsSlide', '.produitsLogos div', '#282828', '#ccc');
			 
		}catch(e){
			console.log(e);
		}

		try 
		{
			this.closeModals();
		}catch(e)
		{
			console.log('close modals error '+e);
		}
	};
}
(function(){
	var app=new App();
	app.run();
})();