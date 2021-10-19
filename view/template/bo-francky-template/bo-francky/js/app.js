function successMessage(container)
{
	var successMsg=document.createElement('div');


	container.appendChild(successMsg);

	successMsg.style.width='100px';
	successMsg.style.height='50px';
	successMsg.style.background='#4ad';
	successMsg.style.color='#fff';
	successMsg.style.padding='20px';
	successMsg.style.position='fixed';
	successMsg.style.bottom='0';
	successMsg.style.right='0';

	successMsg.style.display='block';
	successMsg.textContent='done';
	setTimeout(function(){
		successMsg.style.right='-50px';
	}, 400);
	setTimeout(function(){
		successMsg.style.right='-75px';
	}, 600);
	setTimeout(function(){
		successMsg.style.right='-100px';
		container.removeChild(successMsg);
	}, 800);
	
}
function errorMessage(container)
{
	var successMsg=document.createElement('div');


	container.appendChild(successMsg);

	successMsg.style.width='100px';
	successMsg.style.height='50px';
	successMsg.style.background='#e49';
	successMsg.style.color='#fff';
	successMsg.style.padding='20px';
	successMsg.style.position='fixed';
	successMsg.style.bottom='0';
	successMsg.style.right='0';

	successMsg.style.display='block';
	successMsg.textContent='erreur';
	setTimeout(function(){
		successMsg.style.right='-50px';
	}, 1000);
	setTimeout(function(){
		successMsg.style.right='-75px';
	}, 1200);
	setTimeout(function(){
		successMsg.style.right='-100px';
		container.removeChild(successMsg);
	},1400);
	
}
function toggle(elemTarget)
{
	var elem=document.querySelector(elemTarget);
	var elemStyle=getComputedStyle(elem);

	console.log(elemStyle.display);
	if(elemStyle.display=='block')
	{
		elem.style.display='none';
	}else {
		elem.style.display='block';
	}
}
//getting images
function getImages(container, fallback)
{ 
	var xhr=new PhpChat();
	var baseUrl=document.querySelector('#baseUrl');
	var codeFallBack=fallback;
	xhr.getPage(baseUrl.value+'getimages/', function(e){ 
		var result=document.createElement('div');
		result.innerHTML=e;
		container.appendChild(result);
		 
		console.log(e);
		codeFallBack();
	});
}
//getting galleries
function getGalleries(container, fallback)
{ 
	var xhr=new PhpChat();
	var baseUrl=document.querySelector('#baseUrl');
	var codeFallBack=fallback;
	xhr.getPage(baseUrl.value+'getgalleries/', function(e){ 
		var result=document.createElement('div');
		result.innerHTML=e;
		container.appendChild(result);
		 
		console.log(e);
		codeFallBack();
	});
}
//admin search module
function search()
{
	var searchContainer=document.querySelector('.adminLeftSearch');

	var searchQuery=document.querySelector('.adminLeftSearch .q');

	searchContainer.addEventListener('submit',function(e){
		searchContainer.setAttribute('action', searchContainer.getAttribute('action')+encodeURIComponent(searchQuery.value)+'/');

	});

}
function App(){


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
//show modals 
	this.showModal=function(qmodal, qbox, fallback=function(){})
	{
		qmodal.style.display='block';
		qbox.style.width='30%';
		var codeFallBack=fallback;
        setTimeout(function(){

				qbox.style.width='30%';
			},400);

			setTimeout(function(){

				qbox.style.width='45%';
			},450);

			setTimeout(function(){

				qbox.style.width='65%';
				codeFallBack();
		},500);
	};
	//close modals 
	this.hideModal=function(qmodal, qbox, fallback=function(){})
	{
		var codeFallback=fallback;
		    setTimeout(function(){
				qbox.style.width='65%';
			},400);

			setTimeout(function(){

				qbox.style.width='45%';
			},450);

			setTimeout(function(){

				qbox.style.width='30%';
				qmodal.style.display='none';
				codeFallback();
			},500);
	};
this.run=function(){
	try{
		this.toggleMenus();
	}catch(e)
	{
		console.log('togglemenus error '+e);
	}
	try{
		addGalleriesToArticle();
	}catch(e){
		console.log('error adding galleries to article '+e);
	}
	this.checkModals();
};
this.checkModals=function(){
	var modals=document.querySelectorAll('.modalContainer');
	var modalBox=document.querySelectorAll('.modalBox');

	var modalEvt=function(qmodal, qbox){
		var boxStyle=getComputedStyle(qbox);
		var boxWidth=parseInt(boxStyle.width, 10)/100;
		qbox.style.width='25%';
		qbox.style.minWidth='0%';
		qbox.style.maxWidth='95%';
		console.log('modal width'+ boxStyle.width+'');
		if(qmodal.style.display=='block')
		{
			// qmodal.style.display='none';

			setTimeout(function(){
				qbox.style.width='30%';
			},400);

			setTimeout(function(){

				qbox.style.width='45%';
			},450);

			setTimeout(function(){

				qbox.style.width='65%';
			},500);
			// var widthTest=[0,10,20,30,40,50,60,70,80];
			// console.log(widthTest.length);
			// for(var i=0,c=widthTest.length;i<c;i++)
			// {

			// 	setTimeout(function(){
			// 		qbox.style.width= widthTest+'%';
			// 	}, 200+i);
			// }
		}else{
			 setTimeout(function(){
				qbox.style.width='65%';
			},400);

			setTimeout(function(){

				qbox.style.width='45%';
			},450);

			setTimeout(function(){

				qbox.style.width='30%';
				qmodal.style.display='none';
			},500);
		}
	};

	for(var i=0,c=modals.length;i<c;i++)
	{
		modalEvt(modals[i], modalBox[i]);
	}	
};
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
				// menu.style.background='#f8f8f8';
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
}
//ajax gotopage function
function gotoPage(url,fallback)
{
	var xhr=new PhpChat();
	// var baseUrl=document.querySelector('#baseUrl');
	var codeFallBack=fallback;
	xhr.getPage(url, function(e){ 
		// var result=document.createElement('div');
		// result.innerHTML=e;
		//container.appendChild(result);
		 
		// console.log(e);
		codeFallBack(e);
	});
}
//update div 
function updateDiv(url,container, fallback)
{
	var xhr=new PhpChat();
	// var baseUrl=document.querySelector('#baseUrl');
	var codeFallBack=fallback;
	xhr.getPage(url, function(e){ 
		// var result=document.createElement('div');
		// result.innerHTML=e;
		//container.appendChild(result);
		 
		// console.log(e);
		codeFallBack(e);
	});
}
//add galleries to articles
function addGalleriesToArticle()
{
	var articles=document.querySelectorAll('.addGalleriesToArticle');
 

	var addEvt=function(bt){

		bt.addEventListener('click',function(e){
			e.preventDefault();
			var mainBt=this;
			var galleriesModal=document.createElement('div');
			var galleriesBox=document.createElement('div'); 

			galleriesModal.setAttribute('id', 'galleriesModal');
			galleriesModal.className='modalContainer';
			galleriesBox.className='modalBox';
			document.body.appendChild(galleriesModal);
			galleriesModal.appendChild(galleriesBox);

			var closeBox=document.createElement('div');
			closeBox.className="modalCloseBt";
			galleriesModal.style.display='block';
			closeBox.textContent='x';
			galleriesBox.appendChild(closeBox);
 
			closeBox.addEventListener('click',function(e){
				e.preventDefault();
				var app=new App();
				app.hideModal(galleriesModal, galleriesBox, function(e){

				});
				//(qmodal, qbox, fallback=function(){})

			});
			getGalleries(galleriesBox, function(e){

				var galleries=document.querySelectorAll("#galleriesModal .showGalleriesContainer a");
 
				var gallerieEvt=function(bt){
					var gallerieId=bt.getAttribute('id');
					gallerieId=gallerieId.replace('galleryId_', '');

					bt.setAttribute('href', mainBt.href+'/'+gallerieId+'/ajax/');
					bt.addEventListener('click',function(e){
						e.preventDefault();
						// console.log('adding galleries '+this.textContent);
						// console.log(this.href);
						gotoPage(this.href,function(e){
							console.log(e);
							//add success message here 
							if(/error/.test(e)){
								errorMessage(galleriesModal);
							}else{
								successMessage(galleriesModal);
							}	
						});
					});
				};

				for(var i=0,c=galleries.length;i<c;i++)
				{
					gallerieEvt(galleries[i]);
				}
				// console.log(e);
			});
		});
	};
 
	for(var i=0,c=articles.length;i<c;i++)
	{
		addEvt(articles[i]);
	}
}
//adding image to galleries
function addImageToGallery()
{

	var buttons=document.querySelectorAll('.addImageGallery');
 
	var btEvent=function(bt)
	{
		bt.addEventListener('click',function(e){
			e.preventDefault();

			var modalContainer=document.createElement('div');
			var modalBox=document.createElement('div');
			var closeBt=document.createElement('div');

			closeBt.className='modalCloseBt';

			bt.parentNode.appendChild(modalContainer);
			modalContainer.appendChild(modalBox); 

			modalContainer.className='modalContainer';
			modalBox.className='modalBox modalFull';
			modalBox.setAttribute('id', 'modalBoxGallery');
			modalBox.appendChild(closeBt);

			closeBt.textContent='x';
			modalContainer.style.display='none';


			getImages(modalBox, function(e){ 
				modalContainer.style.display='block';
				//adding events to images 
				var images=document.querySelectorAll('#modalBoxGallery img');
				console.log('total images '+images.length);

				var imgEvent=function(myImage){
					myImage.addEventListener('click', function(e){
						e.preventDefault();
						var fileId=myImage.getAttribute('id');
						fileId=fileId.replace('fileId', '');
						var myUrl= bt.href+fileId+'/';
						gotoPage(myUrl,function(e){
							console.log(e);
							var modalAdded=document.createElement('div');
							modalBox.appendChild(modalAdded);
							modalAdded.style.position="fixed";
							modalAdded.style.right='0';
							modalAdded.style.bottom='0';
							modalAdded.style.width='100px';
							modalAdded.style.height='50px';
							modalAdded.style.background='#4ad';
							modalAdded.style.borderBottom='5px solid #4ad';
							modalAdded.style.color='#fff';
							modalAdded.style.padding='25px';
							modalAdded.textContent='added';
							// var modalAddedBox=document.createElement('div');
							modalAdded.style.display='block';

							setTimeout(function(){
								modalAdded.style.display='none';
								modalBox.removeChild(modalAdded);

							}, 1000);


							// modalContainer.style.display='none';
							// bt.parentNode.removeChild(modalContainer);
						});
						// modalContainer.style.display='block';
						// bt.parentNode.removeChild(modalContainer);
					});
					myImage.style.maxWidth='25%';
					myImage.style.minWidth='200px';
					myImage.style.cursor='pointer';

					myImage.setAttribute('title', 'click to add image to gallery');
					myImage.addEventListener('mouseover',function(e){
						this.style.border='2px solid #4ad';
					});

					myImage.addEventListener('mouseleave',function(e){
						this.style.border='none';
					});

				};


				for(var i=0,c=images.length;i<c;i++)
				{
					imgEvent(images[i]);

				}
				//close button event
				closeBt.addEventListener('click', function(e){
					modalContainer.style.display='block';
					bt.parentNode.removeChild(modalContainer);
					window.location.reload();
				});
			}); 
 
			console.log('adding image to gallery '+this.href);
		}); 
	};

	for(var i=0,c=buttons.length;i<c;i++)
	{
		btEvent(buttons[i]);
	}
}
//login 
function login()
{
	var loginForm=document.querySelector('.loginForm');

	loginForm.addEventListener('submit',function(e){
		e.preventDefault();

		var xhr=new PhpChat();
		xhr.post(this,function(e){
			if(/error/.test(e))
			{
				var errorContainer=document.createElement('div');

				errorContainer.className='error';
				errorContainer.textContent='Error login';
				loginForm.appendChild(errorContainer);
				setTimeout(function(){
					errorContainer.style.display='none';
					loginForm.removeChild(errorContainer);
				}, 2000);
				console.log('some error');
			}else{
				console.log('ok');
				var loginModal=document.createElement('div');
				var loginBox=document.createElement('div');
				var loginMessage=document.createElement('div');

				var closeBt=document.createElement('div');



				loginModal.className='modalContainer';
				loginBox.className='modalBox';

				loginForm.appendChild(loginModal);
				loginModal.appendChild(loginBox);

		
				loginMessage.textContent='welcome admin';

				loginMessage.className='success';
				loginBox.appendChild(loginMessage);
				loginBox.appendChild(closeBt);
				closeBt.style.marginTop='25px';
				closeBt.textContent='ok';
				closeBt.className='fullWidth blueBt';
				loginModal.style.display='block';



				closeBt.addEventListener('click',function(e){
					e.preventDefault();

					setTimeout(function(){
						loginModal.style.display='none'; 
						loginForm.removeChild(loginModal);
						window.location.reload();
					}, 1000);
				});

			}
			console.log(e);
		}); 
	}); 
}
//update left bar total of the admin panel each second
function updateTotal()
{
	var totals=document.querySelectorAll('.leftBar span.total');

	console.log(totals.length);
	var totalEvt=function(e){ 

	};
  
	for(var i=0,c=totals.length;i<c;i++)
	{

	}

}
function toggleElem(bt,elemTarget)
{
	var leftBar=document.querySelector(elemTarget);
	var mainBt=document.querySelector(bt);
	var leftBarEvt=function(toggleBt){
		toggleBt.addEventListener('click', function(e){
			e.preventDefault();
			console.log('click');
			toggle(elemTarget);
		}); 
	};

	leftBarEvt(mainBt, leftBar);
}

function contactUs()
{
	var contactForm=document.querySelectorAll('.contactForm');


	var contactEvt=function(mainForm){
		mainForm.addEventListener('submit', function(e){

		}); 
	};

	for(var i=0,c=contactForm.length;i<c;i++)
	{
		contactEvt(contactForm[i]);
	}
}

function updateLeftBarTotal()
{

}

function uploadFile()
{
	var uploadForm=document.querySelectorAll('.uploadForm')[0];
	var xhr=new PhpChat();
	console.log('test upload');

	var uploadModal=document.createElement('div');
	var uploadModalBox=document.createElement('div');

	uploadModal.className='modalContainer';
	uploadModalBox.className='modalBox';

	var progressBarContainer=document.createElement('div');
	var progressContainer=document.createElement('div');


	uploadForm.appendChild(uploadModal);
	uploadModal.appendChild(uploadModalBox);
	uploadModalBox.appendChild(progressBarContainer);
	progressBarContainer.appendChild(progressContainer);

	uploadModal.style.display='none';

	var message=document.createElement('div');

	message.textContent='uploading file..';

	var mainBt=document.createElement('div');

	uploadModalBox.appendChild(message);
	uploadModalBox.appendChild(mainBt);

	mainBt.textContent='ok';
	mainBt.className='redBt';
	mainBt.style.margin='25px';

	mainBt.addEventListener('click',function(e){
		uploadModal.style.display='none';
		// uploadForm.removeChild(uploadModal);
	});


	uploadForm.addEventListener('submit',function(e){
		e.preventDefault();
		xhr.uploadFile(this,function(e){
			console.log(e);
			uploadModal.style.display='block';

			console.log('uploaded');
		}, progressContainer);
	});
}

function mainFallBack(){

	try{
		var app=new App();
		app.run();
	}catch(e)
	{
		console.log('error app '+e);
	}
	try{
		search();
	}catch(e)
	{
		console.log('search error '+e);
	}
	try{
		login();
	}catch(e)
	{
		console.log('login error '+e);
	}
	try{
		addImageToGallery();
	}catch(e){
		console.log('error adding image to gallery '+e);
	}
	try{
		updateTotal();
	}catch(e)
	{
		console.log('error updating total '+e);
	}
	try{
		uploadFile();
	}catch(e){
		console.log('upload error '+e);
	}
try{
	console.log('running');
	toggleElem('.mainMenuIcon','.leftBar');
}catch(e)
{
	console.log('error leftbar' +e); 
}
}
//main function
(function(){

	mainFallBack();
})();