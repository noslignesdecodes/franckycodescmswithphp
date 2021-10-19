function slide() {
    // var imgs = [
    //     'http://localhost/ecoleenligne/upload/profile/4/image/000417ba0791-6364d3f0-e2ef524f-7647966b.jpg',
    //     'http://localhost/ecoleenligne/upload/profile/4/image/00049e6a55b6-f457c545-e4da3b7f-072b030b.jpg',
    //     'http://localhost/ecoleenligne/upload/profile/4/image/00046c1e671f-c7e1249f-3c59dc04-3ef81541.PNG',
    //     'http://localhost/ecoleenligne/upload/profile/4/image/0004472b07b9-37693cfc-f7177163-d82c8d16.jpg',
    //     'http://localhost/ecoleenligne/upload/profile/4/image/00048e63fd3e-6ea9ab1b-a5771bce-9a115815.jpg',
    //     'http://localhost/ecoleenligne/upload/profile/4/image/00049109c85a-9a115815-6ea9ab1b-19ca14e7.jpg'
    // ];

    var imgs = document.querySelectorAll('.latestImages input');

    var totalButtons = imgs.length;

    var slideContainer = document.createElement('div');
    var slideBox = document.createElement('div');
    var banner = document.querySelector('#banner');

    banner.appendChild(slideContainer);

    slideContainer.appendChild(slideBox);

    banner.style.position = 'relative';
    slideContainer.style.position = 'absolute';
    slideContainer.style.top = '0';
    slideContainer.style.left = '0';
    slideContainer.style.width = '100%';
    slideContainer.style.height = '100%';


    var slideImg = document.createElement('img');

    slideImg.src = imgs[0].value;

    slideContainer.appendChild(slideImg);

    slideImg.style.position = 'absolute';
    slideImg.style.display = 'block';
    slideImg.style.top = '0';
    slideImg.style.left = '0';
    slideImg.style.width = '100%';
    slideImg.style.height = '100%';
    // slideImg.style.zIndex = '9997';

    //creating buttons
    var buttonsContainer = document.createElement('div');
    slideContainer.appendChild(buttonsContainer);

    buttonsContainer.setAttribute('id', 'slideButtonsContainer');

    buttonsContainer.style.width = (totalButtons * 15) + 'px';


    var buttons = document.querySelectorAll('#slideButtonsContainer div');

    //setting up timer 
    var slideTimerCount = 0;

    var slideTimer = function() {

        // slideTimerCount++;
        // console.log(slideTimerCount++);
        buttons[slideTimerCount].style.backgroundColor = '#4ad';

        //reset other buttons background
        for (var i = 0, c = buttons.length; i < c; i++) {
            if (i != slideTimerCount)
                buttons[i].style.backgroundColor = '#fff';
        }

        slideImg.src = imgs[slideTimerCount++].value;
        if (slideTimerCount >= imgs.length) {
            slideTimerCount = 0;
        }
        setTimeout(slideTimer, 400);
    };
    var slideLoop = function() {

    };
    setTimeout(slideTimer, 400);



    var slideBtEvent = function(bt, btId) {
        bt.addEventListener('click', function(e) {
            slideTimerCount = btId;
            slideImg.src = imgs[btId].value;
            bt.style.backgroundColor = '#4ad';
            console.log('u clicked button ' + btId);
            var buttons = document.querySelectorAll('#slideButtonsContainer div');
            for (var i = 0, c = buttons.length; i < c; i++) {
                if (i != btId)
                    buttons[i].style.backgroundColor = '#fff';
            }
        });
    };

    for (var i = 0, c = totalButtons; i < c; i++) {
        var bt = document.createElement('div');
        bt.className = "topbarSlideBt";
        buttonsContainer.appendChild(bt, i);
        slideBtEvent(bt, i);

    }

    //set default buttons bg color
    var buttons = document.querySelectorAll('#slideButtonsContainer div');
    buttons[0].style.backgroundColor = '#4ad';

}

//home classrooms slide
function classroomsSlide() {
    var imgs = document.querySelectorAll('.classroomsSlide article');

    var totalButtons = imgs.length;

    var slideContainer = document.createElement('div');
    var slideBox = document.createElement('div');
    var banner = document.querySelector('#classroomsSlide');

    banner.appendChild(slideContainer);

    slideContainer.appendChild(slideBox);

    banner.style.position = 'relative';
    slideContainer.style.position = 'absolute';
    slideContainer.style.top = '0';
    slideContainer.style.left = '0';
    slideContainer.style.width = '100%';
    slideContainer.style.height = '100%';


    var slideImg = document.createElement('div');

    slideImg.setAttribute('id', 'classroomsSlideContent');
    slideImg.innerHTML = imgs[0].innerHTML;

    slideContainer.appendChild(slideImg);

    // slideImg.style.position='absolute';
    slideImg.style.display = 'block';
    slideImg.style.margin = '0 auto';
    slideImg.style.width = '40%';
    slideImg.style.minWidth = '250px';
    // slideImg.style.left='0';
    // slideImg.style.width='100%';
    // slideImg.style.height='100%';
    // slideImg.style.zIndex = '111';

    //creating buttons
    var buttonsContainer = document.createElement('div');
    slideContainer.appendChild(buttonsContainer);

    buttonsContainer.setAttribute('id', 'classroomsSlideButtonsContainer');

    buttonsContainer.style.width = (totalButtons * 15) + 'px';


    var buttons = document.querySelectorAll('#classroomsSlideButtonsContainer div');

    //setting up timer 
    var slideTimerCount = 0;

    var slideTimer = function() {

        // slideTimerCount++;
        // console.log(slideTimerCount++);
        buttons[slideTimerCount].style.backgroundColor = '#4ad';

        //reset other buttons background
        for (var i = 0, c = buttons.length; i < c; i++) {
            if (i != slideTimerCount)
                buttons[i].style.backgroundColor = '#fff';
        }

        slideImg.innerHTML = imgs[slideTimerCount++].innerHTML;
        if (slideTimerCount >= imgs.length) {
            slideTimerCount = 0;
        }
        setTimeout(slideTimer, 3000);
    };
    var slideLoop = function() {

    };
    setTimeout(slideTimer, 3000);



    var slideBtEvent = function(bt, btId) {
        bt.addEventListener('click', function(e) {
            slideTimerCount = btId;
            slideImg.innerHTML = imgs[btId].innerHTML;
            bt.style.backgroundColor = '#4ad';
            console.log('u clicked button ' + btId);
            var buttons = document.querySelectorAll('#classroomsSlideButtonsContainer div');
            for (var i = 0, c = buttons.length; i < c; i++) {
                if (i != btId)
                    buttons[i].style.backgroundColor = '#fff';
            }
        });
    };

    for (var i = 0, c = totalButtons; i < c; i++) {
        var bt = document.createElement('div');
        bt.className = "topbarSlideBt";
        buttonsContainer.appendChild(bt, i);
        slideBtEvent(bt, i);

    }

    //set default buttons bg color
    var buttons = document.querySelectorAll('#classroomsSlideButtonsContainer div');
    buttons[0].style.backgroundColor = '#4ad';

}
//setting up a slide images version
function setSlide(slideName, items, carousselEnabled, carousselDisabled) {

    carousselEnabled = typeof carousselEnabled != 'undefined' ? carousselEnabled : '#4ad';
    carousselDisabled = typeof carousselDisabled != 'undefined' ? carousselDisabled : '#fff';

    var imgs = document.querySelectorAll(items);

    var totalButtons = imgs.length;

    var slideContainer = document.createElement('div');
    // var slideBox = document.createElement('div');
    var banner = document.querySelector('#' + slideName);

    banner.appendChild(slideContainer);

    var prevBt = document.createElement('div');
    var nextBt = document.createElement('div');

    prevBt.className = 'prevBt';
    nextBt.className = 'nextBt';

    prevBt.textContent = '<';
    nextBt.textContent = '>';

    banner.appendChild(prevBt);
    banner.appendChild(nextBt);


    var slideImg = document.createElement('img');

    slideImg.setAttribute('id', slideName + 'SlideContent');
    slideImg.src = imgs[0].value;

    slideContainer.appendChild(slideImg);


    //creating buttons
    var buttonsContainer = document.createElement('div');
    slideContainer.appendChild(buttonsContainer);

    buttonsContainer.setAttribute('id', slideName + 'SlideButtonsContainer');

    // buttonsContainer.style.width = (totalButtons * 15) + 'px';


    var buttons = document.querySelectorAll('#' + slideName + 'SlideButtonsContainer div');


    //setting up timer 
    var slideTimerCount = 0;

    var slideTimer = function() {

        // slideTimerCount++;
        // console.log(slideTimerCount++);
        buttons[slideTimerCount].style.backgroundColor = carousselEnabled;

        //reset other buttons background
        for (var i = 0, c = buttons.length; i < c; i++) {
            if (i != slideTimerCount)
                buttons[i].style.backgroundColor = carousselDisabled;
        }

        slideImg.src = imgs[slideTimerCount++].value;
        if (slideTimerCount >= imgs.length) {
            slideTimerCount = 0;
        }
        setTimeout(slideTimer, 3000);
    };
    var slideLoop = function() {

    };
    setTimeout(slideTimer, 3000);




    var slideBtEvent = function(bt, btId) {
        bt.addEventListener('click', function(e) {
            slideTimerCount = btId;
            slideImg.src = imgs[btId].value;
            bt.style.backgroundColor = carousselEnabled;
            console.log('u clicked button ' + btId);
            // var buttons = document.querySelectorAll('#'+slideName+'SlideButtonsContainer div');
            for (var i = 0, c = buttons.length; i < c; i++) {
                if (i != btId)
                    buttons[i].style.backgroundColor = carousselDisabled;
            }
        });
    };

    for (var i = 0, c = totalButtons; i < c; i++) {
        var bt = document.createElement('div');
        bt.className = "topbarSlideBt";
        buttonsContainer.appendChild(bt, i);
        slideBtEvent(bt, i);

    }

    //set default buttons bg color
    var buttons = document.querySelectorAll('#' + slideName + 'SlideButtonsContainer div');
    buttons[0].style.backgroundColor = carousselEnabled;

    //buttons events
    prevBt.addEventListener('click', function(e) {
        slideTimerCount -= 1;
        if (slideTimerCount <= 0) {
            slideTimerCount = 0;
        }
        console.log('prevBt clicked ' + slideTimerCount);
        slideImg.src = imgs[slideTimerCount].value;
        buttons[slideTimerCount].style.backgroundColor = carousselEnabled;
        for (var i = 0, c = buttons.length; i < c; i++) {
            if (i != slideTimerCount - 1)
                buttons[i].style.backgroundColor = carousselDisabled;
        }
    });

    nextBt.addEventListener('click', function(e) {
        slideTimerCount += 1;
        if (slideTimerCount >= imgs.length) {
            slideTimerCount = 0;
        }
        console.log('nextBt clicked ' + slideTimerCount);
        slideImg.src = imgs[slideTimerCount].value;
        buttons[slideTimerCount].style.backgroundColor = carousselEnabled;
        for (var i = 0, c = buttons.length; i < c; i++) {
            if (i != slideTimerCount - 1)
                buttons[i].style.backgroundColor = carousselDisabled;
        }
    });
}
//set slide all items version example image and title 

//hide all commands container 
function hideCommandContainer(commandId)
{
	var commands=document.querySelectorAll('.commandContainer');
	
	for(var i=0,c=commands.length;i<c;i++)
	{
		if(commands[i].getAttribute('id')!=commandId)
		{
			commands[i].style.display='none';
		}
	}
}
//setting up a slide images version
function setSlideItems(slideName, items, carousselEnabled, carousselDisabled) {

    carousselEnabled = typeof carousselEnabled != 'undefined' ? carousselEnabled : '#4ad';
    carousselDisabled = typeof carousselDisabled != 'undefined' ? carousselDisabled : '#fff';


    var imgs = document.querySelectorAll(items);

    var totalButtons = imgs.length;

    var slideContainer = document.createElement('div');
    // var slideBox = document.createElement('div');
    var banner = document.querySelector('#' + slideName);

    banner.appendChild(slideContainer);

	var commandContainer=document.createElement('div');
	
	commandContainer.className='commandContainer';
	commandContainer.setAttribute('id', 'commandContainer'+slideName);  //giving original id to each command container
	
    var prevBt = document.createElement('div');
    var nextBt = document.createElement('div');
    var pausedSlide = false;
    var pauseBt = document.createElement('div');

    var loadingBt=document.createElement('div');
	
    banner.appendChild(loadingBt);
	
    loadingBt.className='loadingBt';
    
    loadingBt.textContent='loading...';
	pauseBt.style.zIndex='12';
    pauseBt.className = 'pauseBt'; //you have to create a class in your .css file   
    pauseBt.textContent='pause';
    prevBt.className = 'prevBt';
    nextBt.className = 'nextBt';

    prevBt.textContent = '<';
    nextBt.textContent = '>';

	//adding commands container
	banner.appendChild(commandContainer);
	
	commandContainer.appendChild(prevBt);
	commandContainer.appendChild(nextBt);
	commandContainer.appendChild(pauseBt);
	
    //banner.appendChild(prevBt);
    //banner.appendChild(nextBt);
	pauseBt.style.position='static';
	pauseBt.style.display='inline-block';
	pauseBt.style.verticalAlign='top';
	
    pauseBt.style.display='none';
    //banner.appendChild(pauseBt);
	
	commandContainer.style.display='none';
	commandContainer.style.position='fixed';
	commandContainer.style.bottom='0';
	commandContainer.style.left='0';
	commandContainer.style.height='50px';
	commandContainer.style.width='100%';
	commandContainer.style.background='#000';
	commandContainer.style.color='#fff';
	commandContainer.style.zIndex='14';
	
    //events 
	banner.addEventListener('mouseover',function(e){
		commandContainer.style.display='block';
		//hiding all commands container except this one
		hideCommandContainer(commandContainer.getAttribute('id'));
		
	});
	banner.addEventListener('mouseleave',function(e){
		//commandContainer.style.display='block';
	});
	
	
    //pause bt events 
    pauseBt.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('click paused');
        // pausedSlide = pausedSlide ? true : false;
        if(pausedSlide)
        {
            pauseBt.textContent='pause';
            pausedSlide=false;
        }else{
            pauseBt.textContent='paused';
            pausedSlide=true;
        }
        console.log(pausedSlide);
    });



    var slideImg = document.createElement('div');

    slideImg.setAttribute('id', slideName + 'SlideContent');
    slideImg.innerHTML = imgs[0].innerHTML;

    slideContainer.appendChild(slideImg);


    //creating buttons
    var buttonsContainer = document.createElement('div');
    //slideContainer.appendChild(buttonsContainer);
	
	//adding buttons to command container 
	commandContainer.appendChild(buttonsContainer);
	

    buttonsContainer.setAttribute('id', slideName + 'SlideButtonsContainer');
	buttonsContainer.style.width='70%';
	buttonsContainer.style.paddingTop='25px';
    // buttonsContainer.style.width = (totalButtons * 15) + 'px';

	//some style 
	buttonsContainer.style.position='absolute';
	buttonsContainer.style.top='0';
	
	buttonsContainer.style.left='20%';
	buttonsContainer.style.display='inline-block';
	buttonsContainer.style.verticalAlign='top';
	//buttonsContainer.style.marginTop='-35px';
    var buttons = document.querySelectorAll('#' + slideName + 'SlideButtonsContainer div');


    //setting up timer 
    var slideTimerCount = 0;

    var slideTimer = function() {
        loadingBt.style.display='none';
        pauseBt.style.display='block';
        if (!pausedSlide) {
            buttons[slideTimerCount].style.backgroundColor = carousselEnabled;

            //reset other buttons background
            for (var i = 0, c = buttons.length; i < c; i++) {
                if (i != slideTimerCount)
                    buttons[i].style.backgroundColor = carousselDisabled;
            }

            slideImg.innerHTML = imgs[slideTimerCount++].innerHTML;
            if (slideTimerCount >= imgs.length) {
                slideTimerCount = 0;
            }
        } else {
            console.log('please run slide');
        }
        setTimeout(slideTimer, 3000); 
    };
    var slideLoop = function() {

    };
    setTimeout(slideTimer, 3000);




    var slideBtEvent = function(bt, btId) {
        bt.addEventListener('click', function(e) {
            slideTimerCount = btId;
            slideImg.innerHTML = imgs[btId].innerHTML;
            bt.style.backgroundColor = carousselEnabled;
            console.log('u clicked button ' + btId);
            // var buttons = document.querySelectorAll('#'+slideName+'SlideButtonsContainer div');
            for (var i = 0, c = buttons.length; i < c; i++) {
                if (i != btId)
                    buttons[i].style.backgroundColor = carousselDisabled;
            }
        });
    };

    for (var i = 0, c = totalButtons; i < c; i++) {
        var bt = document.createElement('div');
        bt.className = "topbarSlideBt";
        buttonsContainer.appendChild(bt, i);
        slideBtEvent(bt, i);

    }

    //set default buttons bg color
    var buttons = document.querySelectorAll('#' + slideName + 'SlideButtonsContainer div');
    buttons[0].style.backgroundColor = carousselEnabled;

    //buttons events
    prevBt.addEventListener('click', function(e) {
        slideTimerCount -= 1;
        if (slideTimerCount <= 0) {
            slideTimerCount = 0;
        }
        console.log('prevBt clicked ' + slideTimerCount);
        slideImg.innerHTML = imgs[slideTimerCount].innerHTML;
        buttons[slideTimerCount].style.backgroundColor = carousselEnabled;
        for (var i = 0, c = buttons.length; i < c; i++) {
            if (i != slideTimerCount - 1)
                buttons[i].style.backgroundColor = carousselDisabled;
        }
    });

    nextBt.addEventListener('click', function(e) {
        slideTimerCount += 1;
        if (slideTimerCount >= imgs.length) {
            slideTimerCount = 0;
        }
        console.log('nextBt clicked ' + slideTimerCount);
        slideImg.innerHTML = imgs[slideTimerCount].innerHTML;
        buttons[slideTimerCount].style.backgroundColor = carousselEnabled;
        for (var i = 0, c = buttons.length; i < c; i++) {
            if (i != slideTimerCount - 1)
                buttons[i].style.backgroundColor = carousselDisabled;
        }
    });
}
// function runAllSlide()
// {
//  try{
//          setSlide('projects', '.projectsSlide article');
//      }catch(e)
//      {
//          console.log('projects slide error '+e);
//      }
//      try {
//          console.log('running classrooms slide');
//          // classroomsSlide();
//          setSlide('classrooms', '.classroomsSlide article');
//      } catch (e) {
//          console.log("classrooms slide error " + e);
//      }
//      try {
//          console.log('running slide');
//          slide();
//      } catch (e) {
//          console.log("slide error " + e);
//      }
// }
// (function() {
//  runAllSlide();
// })();