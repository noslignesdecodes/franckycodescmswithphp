 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		/*
Author: Francky RAKOTO
email: franckywebdesign@gmail.com
Copyright: Francky RAKOTO
*/
//safe libs
//hide messages
function hideMessages()
{
	var messages=document.querySelectorAll('.message');

	var hidethem=function(bt,elem)
	{
		bt.addEventListener('click',function(e){
			e.preventDefault();
			elem.style.display='none';
		});
	};
	for(var i=0,c=messages.length;i<c;i++)
	{
		var hidebt=document.createElement('div');
		hidebt.className='closeMessageBt';

		hidebt.textContent='x';

		messages[i].appendChild(hidebt);

		hidethem(hidebt,messages[i]);

	}
}

//close modal container
function closeModalContainer()
{

	var modalBox=document.querySelectorAll('.modalBox');
	var mainCore=document.querySelector('#core');
	
	var hideContainer=function(closebt,container)
	{
		closebt.addEventListener('click',function(e){
			e.preventDefault();
			container.style.display="none";
			mainCore.style.display='block';
			//mainCore.style.marginLeft='50px';
		});
	};

	for(var i=0,c=modalBox.length;i<c;i++)
	{
		var closebt=document.createElement('div');

		closebt.textContent='x';

		closebt.className='closemodalbt';
		modalBox[i].appendChild(closebt); 
		hideContainer(closebt, modalBox[i].parentNode);

	}
}
//tsy maintsy englobena amin'izay tsy misy olona afaka mi-executer ireo fonctions ireo
//amin'ilay site
//toggle all toggle blocks
function toggleButtons(containerId)
{
if(typeof containerId=='undefined')
{
containerId='';
}
	var buttons=document.querySelectorAll(containerId+' .toggleBt');
	var toToggle=document.querySelectorAll(containerId+' .toggleMain');
	
	 
	var toggleElem=function(bt, elem)
	{
		bt.addEventListener("click",function(e){
			e.preventDefault();
			toggle(elem);
		});
	};
	
	for(var i=0,c=buttons.length;i<c;i++)
	{
		toToggle[i].style.display="none";
		toggleElem(buttons[i], toToggle[i]); 
	}
}
//toggle an element
function toggle(elem)
{
	console.log('toggle '+elem);
	
	var elemDisplay=elem.style.display;
	console.log(elemDisplay);
	if(elemDisplay=='block')
	{
		elem.style.display='none';
	}else if(elemDisplay=='none')
	{
		elem.style.display='block';
	}
}

(function(){
//show web editor
function showWebEditor()
{

}



//close left col
function closeLeftCol()
{
	var leftcol=document.querySelector('#siteleftcol');
	var leftcolbt=document.querySelector('#closeleftcolbt');

	var mainCore=document.querySelector('#core');
	
	leftcolbt.addEventListener("click",function(e){
		e.preventDefault();
		leftcol.style.display="none";
		mainCore.style.display='block';
		//mainCore.style.marginLeft='50px';
	});
}
//toggle select menus 
function selectMenus()
{
	var inputs=document.querySelector('.selectInput');
	var menus=document.querySelector('.selectInputMenu');
	
	
	for(var i=0,c=menus.length;i<c;i++)
	{
		
	} 
}
//centering articles
function centerArticles()
{
	var articles=document.querySelectorAll('article');

	var articleContainer=articles[0].parentNode;

	articleContainer.style.textAlign='center';


}
//showing left column
function toggleLeftCol(btId, colId,fallback)
{
	var leftBt=document.querySelector(btId);
	var leftMenu=document.querySelector(colId); 
	var codefallback=fallback;
	if(typeof fallback ==='undefined')
	{
		codefallback=function(){
		};
	}
    //var mainCore=document.querySelector('#core');
	leftMenu.style.display='none';
	//console.log('core '+mainCore);
	leftBt.addEventListener('click',function(e){
		e.preventDefault();
		//console.log(mainCore);
	    /*mainCore.style.position='fixed';
		mainCore.style.left='250px';
		mainCore.style.top='0';*/
		toggle(leftMenu);
		codefallback();
	});
}
//showing search bar
function showSearch ()
{
	var searchBt=document.querySelector('#searchBt');
	var topbarButtons=document.querySelector('#topbarButtons');
	var closeSearchBt=document.querySelector('#closeSearchBt');
	var searchForm=document.querySelector('#searchForm');
	
	var searchQuery=document.querySelector('#searchQuery');
	searchBt.addEventListener("click", function(e){
		e.preventDefault();
		topbarButtons.style.display="none";
		searchForm.style.display="block";
		searchQuery.select();
	});
	
	closeSearchBt.addEventListener("click",function(e){ 
		e.preventDefault();
		searchForm.style.display="none";
		topbarButtons.style.display="block";
	});
	
}
function populateDays()
{
	 
}
function checkSubscribeForm()
{
	var subscribeForm=document.querySelector("#subscribeForm");
	var userName=subscribeForm[0];
	var firstName=subscribeForm[1];
	var email=subscribeForm[2];
	var address=subscribeForm[3];
	var dayBirth=subscribeForm[4];
	var birthMonth=subscribeForm[5];
	var yearBirth=subscribeForm[6];
	var gender=subscribeForm[6];
	var password=subscribeForm[8];
	
	//erros handling
	var lastNameError=document.querySelector('#userNameErrorLbl');
	var firstNameError=document.querySelector('#userFirstNameErrorLbl');
	var addressError=document.querySelector('#userAddressErrorLbl');
	var birthError=document.querySelector('#userBirthErrorLbl');
	var genderError=document.querySelector('#userGenderErrorLbl');
	var passwordError=document.querySelector('#userPasswordErrorLbl');
	var emailError=document.querySelector('#userEmailErrorLbl');
	
	//events 
	email.addEventListener("keyup",function(){
		 if(this.value.length>=10 && this.value.indexOf("@")>0)
		 {
		 	emailError.textContent="";
		 }else{
			 emailError.textContent="Votre mail doit etre au moins 10 caracteres";
		 }
	});
	userName.addEventListener("keyup",function(){
		if(this.value.length>1)
		{
			lastNameError.textContent="";
		}else 
		{ 
			lastNameError.textContent="Veuillez remplir le nom";
		}
	});
	firstName.addEventListener("keyup",function(){
		if(this.value.length>1)
		{
			firstNameError.textContent="";
		}else 
		{ 
			firstNameError.textContent="Remplissez votre prenom";
		}
	});
	address.addEventListener("keyup",function(){
		if(this.value.length>10)
		{
			addressError.textContent="";
		}else 
		{ 
			addressError.textContent="Votre adresse doit etre au moins 10 caracteres";
		}
	});
	
	//password error 
	password.addEventListener("keyup",function(){
		if(this.value.length>=8)
		{
			passwordError.textContent="";
		}else{
			passwordError.textContent="Le mot de passe doit etre au moins 8 caracteres";
		}
	});
	subscribeForm.addEventListener("submit",function(e){
		e.preventDefault();
		if(userName.value.length>1 
		&& firstName.value.length>1
		&& address.value.length>10
		&& password.value.length>=8)
		{
			this.submit();
		}
		
		if(userName.value.length<1)
		{
			lastNameError.textContent="Veuillez remplir le nom";
		}
		if(firstName.value.length<1)
		{ 
			firstNameError.textContent="Veuillez remplir le prenom";
		}
		if(address.value.length<10)
		{
			addressError.textContent="Veuillez adresse est trop court";
			
		}
		if(password.value.length<8)
		{
			passwordError.textContent="Le mot de passe doit etre au moins 8 caracteres";
			
		}
	});
}
function checkLoginForm()
{
	var loginForm=document.querySelector('#loginForm');
	var login=loginForm[0];
	var password=loginForm[1];
	var loginError=document.querySelector('#errorLoginLbl');
	var passwordError=document.querySelector('#errorPasswordLbl');
	loginForm.addEventListener("submit",function(e){
		e.preventDefault();
		if(login.value.length<2)
		{
			loginError.textContent="Login trop court";
		}
		if(password.value.length<8)
		{
			passwordError.textContent="Mot de passe doit etre >=8 caracteres";
		}
		if(login.value.length>=2)
		{
			loginError.textContent="";
		}
		if(password.value.length>=8)
		{
			passwordError.textContent="";
		}
		if(login.value.length>=2 && password.value.length>=8)
		{
			 
			this.submit();
		}
	});
}

//main function
(function(){
	
//contact code
try{

    contactCode();
}catch(e)
{
    console.log('contact form error '+e);

} 
	try{
        closeModalContainer();
	}catch(e)
	{
		console.log(e);
	}
	try{
		hideMessages();
	}catch(e)
	{
		console.log(e);
	}
	try{
		closeLeftCol();
	}catch(e)
	{
        console.log(e);
	}
	try{
		checkLoginForm();
	}catch(e)
	{
	}
	try{
		checkSubscribeForm();
	}catch(e)
	{
		console.log(e);
	}
try{
var leftmenubt=document.querySelector('#leftmenubt');
var siteleftcol=document.querySelector('#siteleftcol');
var mainCore=document.querySelector('#core');
 
siteleftcol.style.display='none';
leftmenubt.addEventListener('click',function(){
	if(siteleftcol.style.display=='none'){
		mainCore.style.display='block';
		// mainCore.style.marginLeft='250px';
		siteleftcol.style.display='block';
	 
	}else{
	    mainCore.style.display='block';
		//mainCore.style.marginLeft='50px';
		siteleftcol.style.display='none';
		 
	}
});
	/*
toggleLeftCol('#leftmenubt', '#siteleftcol',function(){
	console.log('showing left col');
}); //toggling left col
  */
}catch(e)
{
	console.log(e);
}
try{
	toggleLeftCol('#rightColBt', '#siteRightCol');
}catch(e)
{
}
try{showSearch(); //show search bar
}catch(e)
{
}
try{toggleButtons(); //all toggle buttons and menus
}catch(e)
{
}

try
{
	centerArticles();
}catch(e)
{

}
})();


})();