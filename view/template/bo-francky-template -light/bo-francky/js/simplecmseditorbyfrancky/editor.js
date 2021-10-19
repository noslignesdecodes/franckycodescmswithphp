(function(){
function loadPage(page)
{

}
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
function addStyle(elem, styles)
{
	for(var i=0,c=style.length;i<c;i++)
	{
		// elem.style.styles[i]=
	}
}
function app()
{
	var totalEditor=document.querySelectorAll('.simpleCmsEditor');

	var editor=document.querySelectorAll('.simpleCmsEditor textarea');
	var customEditor=document.querySelectorAll('.simpleCmsEditor .customEditor');
	
	
	var editorEvt=function(mainForm, editor1, editor2){
		//editor2 styles

		//menus 
		var menus=document.createElement('div');

		menus.className='customEditorMenus';

		menus.style.position='fixed';

		menus.style.bottom='0';
		menus.style.left='0';

		menus.style.width='100%';
		menus.style.height='50px';
		menus.style.padding='10px';
		menus.style.color='#fff';
		// menus.style.background: '#'
		// menus.style.background='#000';
		menus.style.textAlign='left';

		var addImage=document.createElement('div');
		addImage.className='addImage';

		var addTitle=document.createElement('div');
		addTitle.className='addTitle';

		var addLink=document.createElement('div');
		addLink.className='addLink';

		mainForm.appendChild(menus);

		menus.appendChild(addImage);
		menus.appendChild(addTitle);
		menus.appendChild(addLink);

		addImage.textContent='add image';
		addTitle.textContent='add title';
		addLink.textContent='add link';

		addImage.style.display='inline-block';
		addTitle.style.display='inline-block';
		addTitle.style.display='inline-block';
		addImage.className='blueBt';
		addTitle.className='blueBt';
		addLink.className='blueBt';
		
		//form style
		mainForm.style.paddingTop='55px';


		//menus events 
		addImage.addEventListener('click',function(e){
			var imageModal=document.createElement('div');
			var imageModalBox=document.createElement('div');
			var closeModal=document.createElement('div');

			closeModal.className='modalCloseBt';

			closeModal.textContent='x';

			imageModal.className='modalContainer';
			imageModalBox.className='modalBox';

			
			mainForm.appendChild(imageModal);
			imageModal.appendChild(imageModalBox);

			imageModalBox.appendChild(closeModal);

			var inputs=document.createElement('input');

			inputs.setAttribute('type', 'text');
			imageModalBox.appendChild(inputs);

			imageModal.style.display='block';

			var imgContainer=document.createElement('div');
			imgContainer.className='imgContainer';

			imgContainer.style.maxWidth='100%';

			imageModalBox.appendChild(imgContainer); 
			
			

			getImages(imgContainer,function(){
				//images events
				var images=document.querySelectorAll('.imgContainer img');

				if(images.length>0)
				{


					var imgEvt=function(myImg){
						myImg.addEventListener('click',function(e){

							editor2.appendChild(myImg);
							imageModal.style.display='none';
							mainForm.removeChild(imageModal);

						});
					};

					for(var i=0,c=images.length;i<c;i++)
					{
						imgEvt(images[i]);
					}
				}else{
					console.log('no images found');
				}
			});
			
			closeModal.addEventListener('click',function(e){
				imageModal.style.display='none';
				mainForm.removeChild(imageModal);

			});
			// var imageSrc= prompt('add image src');
		});

		addTitle.addEventListener('click',function(e){
			var imageModal=document.createElement('div');
			var imageModalBox=document.createElement('div');
			var closeModal=document.createElement('div');

			closeModal.className='modalCloseBt';

			closeModal.textContent='x';
			
			imageModal.className='modalContainer';
			imageModalBox.className='modalBox';

			
			mainForm.appendChild(imageModal);
			imageModal.appendChild(imageModalBox);

			imageModalBox.appendChild(closeModal);

			var inputs=document.createElement('input');

			inputs.setAttribute('type', 'text');
			imageModalBox.appendChild(inputs);

			imageModal.style.display='block';

			//main bt 
			var mainBt=document.createElement('div');
			mainBt.className='redBt';

			mainBt.textContent='add title';
			
			imageModalBox.appendChild(mainBt);

 
		  
			//main bt events 

			mainBt.addEventListener('click', function(e){
				var myTitle=document.createElement('h2');
 
				myTitle.textContent=inputs.value;
				editor2.appendChild(myTitle);
				imageModal.style.display='none';
				mainForm.removeChild(imageModal);
			});



			closeModal.addEventListener('click',function(e){
				imageModal.style.display='none';
				mainForm.removeChild(imageModal);

			});
		});

		addLink.addEventListener('click',function(e){
			var imageModal=document.createElement('div');
			var imageModalBox=document.createElement('div');
			var closeModal=document.createElement('div');

			closeModal.className='modalCloseBt';

			closeModal.textContent='x';
			
			imageModal.className='modalContainer';
			imageModalBox.className='modalBox';

			
			mainForm.appendChild(imageModal);
			imageModal.appendChild(imageModalBox);

			imageModalBox.appendChild(closeModal);

			//inputs needed
			var hrefInput=document.createElement('input');

			hrefInput.setAttribute('type', 'text');

			var labelInput=document.createElement('input');
			labelInput.setAttribute('type', 'text');

			labelInput.value='link text';
			hrefInput.value='link href';

			imageModalBox.appendChild(hrefInput);

			imageModalBox.appendChild(labelInput);

			//main bt 
			var mainBt=document.createElement('div');
			mainBt.className='redBt';

			mainBt.textContent='add link';

			imageModalBox.appendChild(mainBt);



			imageModal.style.display='block';


			//main bt events 

			mainBt.addEventListener('click', function(e){
				var myLink=document.createElement('a');

				myLink.href=hrefInput.value;
				myLink.textContent=labelInput.value;
				editor2.appendChild(myLink);
				imageModal.style.display='none';
				mainForm.removeChild(imageModal);
			});

			closeModal.addEventListener('click',function(e){
				imageModal.style.display='none';
				mainForm.removeChild(imageModal);

			});
		});
		//add link menus

		//events
		editor2.setAttribute('contenteditable', 'true');

		editor1.style.maxHeight='50px';
		editor2.style.border='1px solid #4ad';
		editor2.style.padding='5px';
		editor2.style.minHeight='100px';
		editor2.style.textAlign='left';
		editor1.style.height='50px';
		editor1.style.display='none';
		mainForm.style.position='relative'; //useful if we want to add menu to this simple editor


		editor2.addEventListener('keydown', function(e){
			 
			editor1.value=editor2.innerHTML;
		});

		editor1.addEventListener('keydown', function(e){

		});

		mainForm.addEventListener('submit',function(e){
			e.preventDefault();
			var xhr=new PhpChat(); 
			editor1.value=editor2.innerHTML;
			console.log('submited');


			//success message 
			var successMessage=document.createElement('div');

			mainForm.appendChild(successMessage);

			successMessage.textContent='done';
			successMessage.style.position='fixed';
			successMessage.style.zIndex='99';

			successMessage.style.background='#000';

			successMessage.style.color='#fff';

			successMessage.style.padding='10px';

			successMessage.style.bottom='0';

			successMessage.style.right='0';

			successMessage.style.display='none';
			successMessage.style.width='200px';
			successMessage.style.height='100px';


			//end success message

			xhr.post(this, function(e){
				console.log(e);
				successMessage.style.display='block';
				setTimeout(function(){
					successMessage.style.display='none';
					mainForm.removeChild(successMessage);
				}, 1000);
			}); 
		}); 
	};


	for(var i=0,c=totalEditor.length;i<c;i++)
	{
		editorEvt(totalEditor[i], editor[i], customEditor[i]);
	}

	console.log('total editor '+totalEditor.length);
}

//main function
try{
app();
}catch(e)
{
	console.log('editor error '+e);
}
})();
