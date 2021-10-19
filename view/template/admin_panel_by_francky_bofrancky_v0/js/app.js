function loading(containerId)
{
	// var loaderContainer=document.createElement('div');
	// var myLoader=document.createElement('div');

	// var imgLoader=document.createElement('img');

	// imgLoader.setAttribute('src', '')

	var myLoader=document.querySelector(containerId+' .appLoader');
	var imgLoader=document.querySelector(containerId+' .appLoader img');
	imgLoader.style.display='none';

	imgLoader.style.display='block';
	imgLoader.style.width='25px';
	imgLoader.style.height='25px';
	imgLoader.style.margin='0 auto';

	myLoader.style.position='fixed';
	myLoader.style.zIndex='17';
	myLoader.style.background='#fff';
	myLoader.style.width='150px';
	myLoader.style.height='50px';
	myLoader.style.padding='20px';
	myLoader.style.textAlign='center';
	myLoader.style.borderRadius='5px';
	myLoader.style.top='35%';
	myLoader.style.left='40%';
	myLoader.style.display='block';
	imgLoader.style.display='block';
 
	myLoader.style.border='1px solid #ddd';




}
function basicEditor()
{
	// mytextarea.value.split('\n').length;
	var container=document.querySelector('textarea.basicEditor');

	container.parentNode.style.position='relative';
	var linesNumber=document.createElement('div');
	var totalLines=container.value.split('\n').length;

	container.parentNode.appendChild(linesNumber);

	container.style.lineHeight='32px';
	linesNumber.style.lineHeight='32px';

	var linesEvt=function(lines)
	{

	};

	container.style.background='#000';
	container.style.color='#fff';
	// container.style.position='absolute';
	linesNumber.style.position='absolute';
	linesNumber.style.top='0';
	linesNumber.style.left='0';
	linesNumber.style.width='32px';
	linesNumber.style.background='#000';
	linesNumber.style.color='#a4d';
	linesNumber.style.height=(totalLines*32)+'px';
	linesNumber.style.top='83px';
	container.style.paddingLeft='55px';
	container.style.height=(totalLines*32)+'px';
	// container.style.maxHeight=(totalLines*32)+'px';
	container.style.minHeight=(totalLines*32)+'px';
	// container.style.overflow='hidden';
	// var closeBt=document.createElement('div');

	// closeBt.textContent='x';

	// closeBt.className='modalCloseBt';

	// container.parentNode.appendChild(closeBt);
	var updateLinesEvt=function(){

	};

	var showLinesEvt=function(){
		linesNumber.innerHTML='';
		var totalLines=container.value.split('\n').length;
		// console.log(totalLines);
		container.style.height=(totalLines*32)+'px'; 
		linesNumber.style.height=(totalLines*32)+'px';

		for(var i=0,c=totalLines;i<c;i++)
		{
			var lines=document.createElement('span');
			var linesBreak=document.createElement('br');
			lines.textContent=(i+1);
			linesNumber.appendChild(lines);
			linesNumber.appendChild(linesBreak);
		} 
	};


	container.addEventListener('keydown',function(e){
		// console.log(e);
		showLinesEvt();
	});

	for(var i=0,c=totalLines;i<c;i++)
	{
		var lines=document.createElement('span');
		var linesBreak=document.createElement('br');
		lines.textContent=(i+1);
		linesNumber.appendChild(lines);
		linesNumber.appendChild(linesBreak);
	} 
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
		loading('#testLoader');
		window.addEventListener('load',function(){
			setTimeout(function(){
				document.querySelector('#testLoader').style.display='none';
			 	console.log('loaded');
			}, 1000);
		});
		
	}catch(e)
	{
		console.log('error displaying loader '+e);
	}
	try{
		basicEditor();
	}catch(e)
	{
		console.log('basic editor error '+e);
	}
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