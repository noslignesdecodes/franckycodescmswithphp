				
				function hide(elem) {
    elem.style.display = 'none';
}

function toggle(elem) {

    if (elem.style.display == 'none') {
        elem.style.display = 'block';
    } else {
        elem.style.display = 'none';
    }

}


//set page title
function setPageTitle(title) {
    document.title = title;
}

function toggleBts() {
    var buttons = document.querySelectorAll('.toggleBt');
    var menus = document.querySelectorAll('.toggleMenu');


    var toggleEvt = function(bt, menu) {

        bt.addEventListener('click', function(e) {
            e.preventDefault();
            toggle(menu);
        });
    };



    for (var i = 0, c = menus.length; i < c; i++) {
        menus[i].style.display = 'none';
        toggleEvt(buttons[i], menus[i]);
    }
}

function closeModal() {
    var bts = document.querySelectorAll('.modalCloseBt');
    var modals = document.querySelectorAll('.modalContainer');
    var btEvt = function(bt, modal) {
        bt.addEventListener('click', function(e) {
            e.preventDefault();
            hide(modal);
        });
    };
    for (var i = 0, c = modals.length; i < c; i++) {
        btEvt(bts[i], modals[i]);
    }

}

//loading a page using an element only
function loadPageElem(elem, codefallback) {
    var allForms = elem;
    var phpchat = new PhpChat();
    var clicked = false;

    var codeFallBack = codefallback;
    var xhr = new XMLHttpRequest();

    xhr.open('GET', (elem.href), true);
    //xhr.open('GET',this.href+phpchat.serialize(this));


    xhr.addEventListener('readystatechange', function(f) {

        if (this.status === 200 && this.readyState == 4) {
            if (!clicked)
                codeFallBack(this);
            clicked = true;
            mainFallBack();
            xhr = null;
        } else {
            console.log('loading..');
        }
    });
    xhr.send(null);

}
//main fallback
function mainFallBack() {

    try {
        // var app = new App();
        // app.loadPages('#topbarMenu li a', 'site-container');
    } catch (e) {
        console.log('error topbarmenu ' + e);
    }
    try {
        closeModal();
    } catch (e) {
        console.log('error close modal ' + e);
    }
    try {
        toggleBts();
    } catch (e) {
        console.log('error toggle buttons ' + e);
    }
}
//main app
function App() {
    this.ajax = new PhpChat();

    //2 main methods: links, idcontainer without #
    //container example: #site-container

    this.loadPages = function(alllinks, elemParent) {
        var links = document.querySelectorAll(alllinks);
        //alert(links.length);

        var banner = document.querySelector('#banner');
        var xhrCount = 0;

        var linksEvents = function(linkid, mylink) {
            mylink.addEventListener('click', function(o) {
                o.preventDefault();

                var mainLink = this;
                try {
                    window.history.pushState('', this.href, this.href);

                } catch (e) {
                    console.log('error ' + e);
                }
                /*if(!this.getAttribute('id'))
                {
                	this.setAttribute('id', 'link'+linkid);
                }*/
                if (xhrCount <= 0) {
                    loadPageElem(this, function(e) {

                        loadMainPages(e, elemParent);

                    });
                }
                xhrCount++;

            });
        };

        for (var i = 0, c = links.length; i < c; i++) {
            // console.log(/hasSubMenu/.test(links[i].className));
            if (!(/hasSubMenu/i.test(links[i].className))) {
                linksEvents(i, links[i]);
            }
        }
    };
}

function loadMainPages(e, elemParent) {
    //banner.style.display='block';
    var siteContainer = document.querySelector('#' + elemParent);

    var loadedPage = e.responseText;
    //alert(mylink.href) ;
    //console.log(e.responseText);
    var resultDiv = document.createElement('div');
    var resultDivBox = document.createElement('div');

    resultDiv.setAttribute('id', 'cresultDiv');
    document.body.appendChild(resultDiv);

    resultDiv.style.display = 'none';

    resultDiv.appendChild(resultDivBox);
    resultDivBox.innerHTML = e.responseText;

    //console.log(resultDiv);
    siteContainer.innerHTML = (document.querySelector('#cresultDiv #' + elemParent)).innerHTML;

    //page title
    var pageTitle = '';

    pageTitle = document.querySelector('#cresultDiv  title').textContent;


    console.log(pageTitle);

    //page title
    setPageTitle(pageTitle);


    // if (/login|managecreation|subscribe|profile|classrooms|search/.test(mainLink.href)) {
    //     banner.style.display = 'none';
    // } else {
    //     banner.style.display = 'block';
    //     banner.innerHTML = document.querySelector('#cresultDiv #banner').innerHTML;
    // }


    //console.log(siteContainer.innerHTML);
    // siteContainer.style.borderTop = '2px solid #4ad';
    // setTimeout(function() {
    //     siteContainer.style.borderTop = '1px solid #ddd';
    // }, 400);


    document.body.removeChild(document.querySelector('#cresultDiv'));
    //alert(loadedPage);

    //main fall backs here
    mainFallBack();
}
(function() {


    mainFallBack();
})();	
//some code here 
//write your code here
//put some code here








		












							