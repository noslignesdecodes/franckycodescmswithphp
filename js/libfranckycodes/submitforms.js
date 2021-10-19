 (function() {

     //show search bar
     function showSearchBar() {
         var searchBt = document.querySelector('#topbar #searchbt');
         //to hide
         var mainMenuContainer = document.querySelector('#topbar #mainMenuContainer');
         var searchContainer = document.querySelector('#topbar #mainSearchInputContainer');
         var closeBt = document.querySelector('#closeSearchContainerBt');

         var searchQuery = document.querySelector('#mainSearchInputContainer input');

         closeBt.textContent = 'x';

         closeBt.addEventListener('click', function(e) {
             mainMenuContainer.style.display = 'block';
             searchBt.style.display = 'block';
             closeBt.style.display = 'none';
             mainSearchInputContainer.style.display = 'none';
         });


         searchBt.addEventListener('click', function(e) {
             console.log('showing search bar');
             mainMenuContainer.style.display = 'none';
             searchContainer.style.display = 'block';
             this.style.display = 'none';
             closeBt.style.display = 'block';
             searchQuery.select();
         });

     }
     //set page title
     function setPageTitle(title) {
         document.title = title;
     }
     //safe input
     function checkInput(txt) {
         return txt.replace('<', '<').replace('>', '>');

     }
     //check editor
     function checkEditor(editor, content) {
         //remove scripts

         var allScripts = document.querySelectorAll('#' + editor.getAttribute('id') + ' script');
         console.log('malicious code ' + allScripts.length);
         for (var i = 0, c = allScripts.length; i < c; i++) {
             var mCodeParent = allScripts[i].parentNode;

             mCodeParent.removeChild(allScripts[i]);
         }
         content += '<br><br>';
         for (var i = 0, c = editor.childNodes.length; i < c; i++)

         {
             var mytag = editor.childNodes[i].nodeName.toLowerCase();
             console.log(mytag);
             if (mytag == 'script') {
                 //console.log(mytag+' is not safe');
                 editor.removeChild(editor.childNodes[i]);

             } else {
                 //console.log('safe');
             }
             //remove class names and ids
             editor.childNodes[i].className = '';
             editor.childNodes[i].id = '';


         }
         console.log(editor.childNodes.length + ' left');
     }
     //customs editors
     function simpleEditor() {
         var editors = document.querySelectorAll('.customEditor');


         var editorEvent = function(customeditor) {

             //buttons
             var addLinkBt = document.createElement('a');
             var addImageBt = document.createElement('a');
             var addTitleBt = document.createElement('a');
             var addVideoBt = document.createElement('a');


             addLinkBt.setAttribute('id', 'addLinkBt');
             addImageBt.setAttribute('id', 'addImageBt');
             addTitleBt.setAttribute('id', 'addTitleBt');
             addVideoBt.setAttribute('id', 'addVideoBt');

             addLinkBt.textContent = '<a>';
             addImageBt.textContent = '<img>';
             addTitleBt.textContent = '<h2>';
             addVideoBt.textContent = '<video>';

             addLinkBt.className = 'simpleEditorBt submitBt';
             addImageBt.className = 'simpleEditorBt submitBt ';
             addTitleBt.className = 'simpleEditorBt submitBt';
             addVideoBt.className = 'simpleEditorBt submitBt';

             var parentForm = customeditor.parentNode;
             var editorTxt = document.createElement('textarea');

             editorTxt.setAttribute('name', 'editorTxt');

             parentForm.appendChild(editorTxt);
             //hide
             editorTxt.style.display = 'none';

             //adding buttons
             parentForm.appendChild(addLinkBt);
             parentForm.appendChild(addImageBt);
             parentForm.appendChild(addTitleBt);
             parentForm.appendChild(addVideoBt);


             //buttons events
             addLinkBt.addEventListener('click', function(e) {
                 e.preventDefault();
                 var linkHref = prompt('enter url');
                 var linkTxt = prompt('link text');

                 customeditor.innerHTML += '<a href="' + linkHref + '">' + linkTxt + '</a>';

             });

             //adding image 
             addImageBt.addEventListener('click', function(e) {
                 e.preventDefault();

                 var imageSrc = prompt('enter image src');
                 customeditor.innerHTML += '<img src="' + imageSrc + '">';

             });
             //adding video 
             addVideoBt.addEventListener('click', function(e) {
                 e.preventDefault();

                 var imageSrc = prompt('enter video src');
                 customeditor.innerHTML += '<video src="' + imageSrc + '">ataovy update ny navigateur webnao</video>';

             });

             //adding title
             addTitleBt.addEventListener('click', function(e) {
                 e.preventDefault();

                 var titleTxt = prompt('enter title text');
                 customeditor.innerHTML += '<h2>' + titleTxt + '</h2>';


             });


             //initialize editorTxt
             editorTxt.value = (customeditor.innerHTML);

             customeditor.addEventListener('keydown', function() {
                 editorTxt.value = customeditor.innerHTML;

             });


             /*
             parentForm.addEventListener('submit',function(e){
             e.preventDefault();


             });*/

             submitForm('#' + parentForm.getAttribute('id'), function(e) {

                 console.log(e.responseText);

             }, function(e) {
                 checkEditor(customeditor, customeditor.innerHTML);
                 editorTxt.value = customeditor.innerHTML + '<br>';

             });



         };

         for (var i = 0, c = editors.length; i < c; i++) {
             if (editors[i].getAttribute('id') == null) {
                 editors[i].setAttribute('id', 'editor' + i);
             }
             editorEvent(editors[i]);

         }
     }

     //saving visitor comments
     function saveComments() {
         var saveCommentsForm = document.querySelector('#saveCommentsForm');

         var mainEditor = document.querySelector('#saveCommentsForm .customEditor');


         var commentsEditor = document.createElement('textarea');
         commentsEditor.setAttribute('name', 'commentsTxt');


         saveCommentsForm.appendChild(commentsEditor);


         mainEditor.addEventListener('keydown', function() {

             //commentsEditor.value=mainEditor.textContent;
         });

         commentsEditor.style.display = 'none';


         saveCommentsForm.addEventListener('submit', function(e) {

             e.preventDefault();
             commentsEditor.value = mainEditor.innerHTML;


         });

     }

     //topbar menu arrows
     function topbarmenuArrows() {
         var topbarmenu = document.querySelector('#topbarmenu');
         var topArrow = document.createElement('div');
         var bottomArrow = document.createElement('div');
         topArrow.textContent = '+';
         bottomArrow.textContent = '-';
         topArrow.setAttribute('id', 'topArrow');
         bottomArrow.setAttribute('id', 'bottomArrow');

         //adding controlers to parent
         topbarmenu.appendChild(topArrow);
         topbarmenu.appendChild(bottomArrow);



         var top = topbarmenu.offsetTop;

         topArrow.addEventListener('click', function(e) {
             top -= 5;
             topbarmenu.style.top = top + 'px';
             console.log('up arrow clicked');

         });

         bottomArrow.addEventListener('click', function(e) {
             top += 5;
             topbarmenu.style.top = top + 'px';
             console.log('down arrow clicked');
         });


     }
     //main fall back
     function mainFallBack() {
         //uploading files
         try {
             upload(function() {
                 console.log('uploaded');
             });
         } catch (e) {
             console.log('uploading files error ' + e);
         }
         //loading search menu pages 
         try {
             loadHome('.searchMenu li a');
         } catch (e) {
             console.log('loading psearch menu page error ' + e);
         }

         //toggling buttons
         try {
             toggleButtons('#site-container'); //all toggle buttons and menus
         } catch (e) {
             console.log('toggle buttons error ' + e);
         }
         //simple editor
         try {
             simpleEditor();
         } catch (e) {
             console.log('simple editor error : ' + e);
         }
         //saving comments
         try {
             saveComments();
         } catch (e) {
             console.log('error saving comments ' + e);
         }
         //loading topbarmenu links pages
         try {
             //loadHome('#topbarmenu li a');
         } catch (e) {
             console.log('loading topbarmenu pages error ' + e);
         }

         //subscribe code
         try {
             subscribeCode();
         } catch (e) {
             console.log('subscribe error ' + e);
         }

         //subscribe form
         try {

             subscribeCode();
         } catch (e) {
             console.log('error subscribe form ' + e);

         }

         //loading profile menu bar pages
         try {
             loadHome('.profileMenuBar li a');
         } catch (e) {
             console.log('loading profile menu bar  page ' + e);
         }
         //contact
         try {
             contactCode();
         } catch (e) {

         }
         try {

             hideMessages();
         } catch (e) {

         }
         //loading article pages
         try {
             loadHome('article h2 a');
         } catch (e) {
             console.log('loading classrooms page ' + e);
         }
         try {
             loadHome('.homeBt');
         } catch (e) {
             console.log('loading home page ' + e);
         }


         try {
             closeModalContainer();
         } catch (e) {
             console.log('closing modal container');
         }
     }
     //login
     function loginCode() {
         var loginForm = document.querySelector('form#loginForm');

         loginForm.addEventListener('submit', function(e) {
             e.preventDefault();


         });
     }
     //subscribe form
     function subscribeCode() {

         var loginElem = document.querySelector('#toLoginPageBt');


         submitPostForm('#subscribeForm', function(e) {

             loginElem.click(); //trigger click


             loginElem.addEventListener('click', function(e) {
                 e.preventDefault();
                 loadPageElem(this, function(e) {

                     //start
                     var siteContainer = document.querySelector('#site-container');

                     var loadedPage = e.responseText;
                     var resultDiv = document.createElement('div');
                     var resultDivBox = document.createElement('div');

                     resultDiv.setAttribute('id', 'cresultDiv');
                     document.body.appendChild(resultDiv);

                     resultDiv.style.display = 'none';

                     resultDiv.appendChild(resultDivBox);
                     resultDivBox.innerHTML = e.responseText;

                     siteContainer.innerHTML = (document.querySelector('#cresultDiv #site-container')).innerHTML;

                     /*					if(/login|logout|subscribe|profile|classrooms/.test(mainLink.href))
                     					{
                     						banner.style.display='none';
                     					}else{
                     						banner.style.display='block';
                     						banner.innerHTML=document.querySelector('#cresultDiv #banner').innerHTML;
                      			*/
                     siteContainer.style.borderTop = '2px solid #4ad';
                     setTimeout(function() {
                         siteContainer.style.borderTop = '1px solid #ddd';
                     }, 400);
                     document.body.removeChild(document.querySelector('#cresultDiv'));

                     //main fall backs here
                     mainFallBack();




                     //end




                 });

             }); //end event loginElem


         });
     }
     //submitting post form
     function submitPostForm(id, codefallback) {
         var formId = document.querySelector(id);
         var codeFallBack = codefallback;



         formId.addEventListener('submit', function(e) {
             e.preventDefault();

             var xhr = new XMLHttpRequest();
             var phpchat = new PhpChat();

             xhr.open('POST', this.action);

             xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

             xhr.send(phpchat.serialize(this));


             xhr.addEventListener('readystatechange', function(e) {

                 if (this.status === 200 && this.readyState === 4) {

                     codeFallBack(this);
                     xhr.abort();
                     return 0;
                 }

             });


         });

     }
     //contact code
     function contactCode() {
         var contactForm = document.querySelector('#contactForm');

         var contactEditor = document.querySelector('#contactEditor');

         var msgTxt = document.createElement('textarea');

         contactForm.appendChild(msgTxt);

         msgTxt.setAttribute('name', 'visitorMessage');
         msgTxt.style.display = 'none';
         contactForm.addEventListener('keydown', function(e) {

             msgTxt.value = contactEditor.textContent;

         });

         contactForm.addEventListener('submit', function(e) {
             e.preventDefault();
             msgTxt.value = contactEditor.textContent;

             var xhr = new XMLHttpRequest();
             xhr.open('POST', this.action);
             xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

             var phpchat = new PhpChat();
             xhr.send(phpchat.serialize(this));
             //alert(phpchat.serialize(this));
             xhr.addEventListener('readystatechange', function(e) {

                 if (this.status === 200 && this.readyState === 4) {
                     //console.log(this.responseText);
                     alert('Message sent, thank you');
                     try { contactForm.empty(); } catch (e) {}

                     return 0;
                 }
             });



         });
     }

     //uploading files	
     function upload(codefallback) {
         var forms = document.querySelectorAll('.upload-form');
         console.log('upload form ' + forms.length);

         var uploadProgress = document.querySelector('#upload-progress');
         var uploadProgressLevel = document.querySelector('#upload-progress-level');
         var uploadProgressContainer = document.querySelector('#upload-progress-container');
         var codeFallBackMain = codefallback;
         var mainEvent = function(uploadForm) {
             uploadForm.addEventListener('submit', function(e) {
                 e.preventDefault();
                 validateData(uploadForm, function() {
                     uploadProgress.innerHTML = 'file uploaded';

                 });
             });
         };

         var validateData = function(mainForm, codeFallBack) {
             var xhr = new XMLHttpRequest();
             var ajax = new PhpChat();
             var formData = new FormData(mainForm);

             xhr.open('POST', mainForm.action);
             //mainForm.setAttribute('id', 'uploadForm');

             // alert(mainForm.action);
             // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 

             // formData.append('file', document.querySelector('#uploadForm #file') );
             // formData.append('title', document.querySelector('#uploadForm #title'));
             // formData.append('albumId',document.querySelector('#uploadForm #albumId'));
             // formData.append('appPageId',document.querySelector('#uploadForm #appPageId'));


             // xhr.send(ajax.serialize(mainForm));
             xhr.upload.addEventListener('progress', function(e) {

                 uploadProgressContainer.style.display = 'block';
                 var progressTotal = (parseInt(e.loaded, 10) * 100) / parseInt(e.total, 10);
                 setTimeout(function() {

                     uploadProgressLevel.style.width = progressTotal + '%';
                     uploadProgress.innerHTML = e.loaded + '/' + e.total + ' => ' + parseInt(progressTotal, 10) + '%';

                 }, 400);


             });
             xhr.addEventListener('readystatechange', function(o) {
                 if (this.status === 200 && this.readyState == 4) {
                     console.log('finished uploading');
                     codeFallBack();
                     codeFallBackMain(this);
                 }
             });
             xhr.send(formData);

         };
         for (var i = 0, c = forms.length; i < c; i++) {
             mainEvent(forms[i]);
         }
     }

     //submitforms
     function submitForms(codefallback) {
         var xhr = new XMLHttpRequest();

         var allForms = document.querySelectorAll('form');
         var phpchat = new PhpChat();
         var formEvent = function(e, codefallback) {
             e.preventDefault();
             if (this.getAttribute('method').toLowerCase() == 'post') {
                 xhr.open('POST', this.getAttribute('action'));
                 xhr.send(phpchat.serialize(this));

                 xhr.addEventListener('readystatechange', function(o) {
                     if (this.status === 200 && this.readyState == 4) {
                         codefallback();
                     }
                 });
             }
         };
         for (var i = 0, c = allForms.length; i < c; i++) {
             formEvent(allForms[i]);
         }
     }

     //updating total user blogs
     function updateTotalBlog(response) {
         var blogpostsbt = document.querySelector('#blogPostsBt');

         var resultDiv = document.createElement('div');
         resultDiv.setAttribute('id',
             'resultTotalBlog');

         document.body.appendChild(resultDiv);

         blogpostsbt.textContent = (document.querySelector('#resultTotalBlog #blogPostsBt')).textContent;

         document.body.removeChild(resultDiv);





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

                 xhr.abort();
                 return 0;
             } else {
                 console.log('loading..');
             }
         });
         xhr.send(null);





     }
     //loading a page
     function loadPage(linkId, codefallback) {
         var allForms = document.querySelector(linkId);
         var phpchat = new PhpChat();
         var clicked = false;


         var formEvent = function(e, codefallback) {
             var xhr = new XMLHttpRequest();

             e.addEventListener('click', function(o) {
                 o.preventDefault();
                 var codeFallBack = codefallback;

                 xhr.open('GET', (this.href));
                 //xhr.open('GET',this.href+phpchat.serialize(this));



                 xhr.addEventListener('readystatechange', function(f) {

                     if (this.status === 200 && this.readyState == 4) {
                         if (!clicked)
                             codeFallBack(this);
                         clicked = true;
                         return 0;

                     }
                 });
                 xhr.send(null);

             });

         };
         formEvent(allForms, codefallback);


     }
     //submit one specific form 
     function submitForm(formId, codefb, codesubmit) {
         var allForms = document.querySelector(formId);
         var phpchat = new PhpChat();
         try { var codeSubmit = codesubmit; } catch (e) {}

         var formEvent = function(e, codefallback) {
             e.addEventListener('submit', function(o) {
                 o.preventDefault();
                 var codeFallBack = codefallback;
                 try {
                     codeSubmit();
                 } catch (e) {}
                 if (this.getAttribute('method').toLowerCase() == 'post') {
                     var xhr = new XMLHttpRequest();

                     xhr.open('POST', this.getAttribute('action'));
                     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                     alert('done');
                     xhr.send(phpchat.serialize(this));

                     xhr.addEventListener('readystatechange', function(f) {

                         if (this.status === 200 && this.readyState == 4) {
                             codeFallBack(this);
                             return 0;

                         }
                     });

                 }
             });

         };
         formEvent(allForms, codefb);
     }
     //showing last creations
     function showLastCreations(e) {
         var loadedPage = e.responseText;
         var pagesArticle = document.querySelectorAll('article')[0];

         var resultDiv = document.createElement('div');
         var resultDivBox = document.createElement('div');

         resultDiv.setAttribute('id', 'resultDiv');
         document.body.appendChild(resultDiv);

         resultDiv.style.display = 'none';

         resultDivBox.innerHTML = e.responseText;
         resultDiv.appendChild(resultDivBox);

         var pagesArticleUpdated = (document.querySelectorAll('#resultDiv article')[0]).innerHTML;
         //page title
         var pageTitle = '';

         pageTitle = document.querySelector('#resultDiv  title').textContent;


         console.log(pageTitle);

         //page title
         setPageTitle(pageTitle);
         pagesArticle.innerHTML = pagesArticleUpdated;


         pagesArticle.style.borderTop = '2px solid #4ad';
         setTimeout(function() {
             pagesArticle.style.borderTop = '1px solid #ddd';
         }, 400);
         document.body.removeChild(document.querySelector('#resultDiv'));
         //alert(loadedPage);

     }

     //loading left col pages
     function loadLeftColPages() {
         var links = document.querySelectorAll('#siteleftcol ul li a');
         //alert(links.length);

         var banner = document.querySelector('#banner');

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
                 loadPageElem(this, function(e) {

                     //banner.style.display='block';
                     var siteContainer = document.querySelector('#site-container');

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
                     siteContainer.innerHTML = (document.querySelector('#cresultDiv #site-container')).innerHTML;

                     //page title
                     var pageTitle = '';

                     pageTitle = document.querySelector('#cresultDiv  title').textContent;


                     console.log(pageTitle);

                     //page title
                     setPageTitle(pageTitle);

                     if (/login|managecreation|logout|subscribe|profile|classrooms|search/.test(mainLink.href)) {
                         banner.style.display = 'none';
                     } else {
                         banner.style.display = 'block';
                         banner.innerHTML = document.querySelector('#cresultDiv #banner').innerHTML;
                     }

                     //console.log(siteContainer.innerHTML);
                     siteContainer.style.borderTop = '2px solid #4ad';
                     setTimeout(function() {
                         siteContainer.style.borderTop = '1px solid #ddd';
                     }, 400);
                     document.body.removeChild(document.querySelector('#cresultDiv'));
                     //alert(loadedPage);

                     //main fall backs here
                     mainFallBack();


                 });

             });
         };

         for (var i = 0, c = links.length; i < c; i++) {
             linksEvents(i, links[i]);
         }
     }
     //loading rightcol pages  
     function loadRightColPages() {
         var banner = document.querySelector('#banner');
         var links = document.querySelectorAll('#siterightcol ul li a');
         //alert(links.length);
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
                 loadPageElem(this, function(e) {
                     var siteContainer = document.querySelector('#site-container');

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
                     siteContainer.innerHTML = (document.querySelector('#cresultDiv #site-container')).innerHTML;

                     //page title
                     var pageTitle = '';

                     pageTitle = document.querySelector('#cresultDiv  title').textContent;


                     console.log(pageTitle);

                     //page title
                     setPageTitle(pageTitle);
                     if (/login|managecreation|logout|subscribe|profile|classrooms|search/.test(mainLink.href)) {
                         banner.style.display = 'none';
                     } else {
                         banner.style.display = 'block';
                         banner.innerHTML = document.querySelector('#cresultDiv #banner').innerHTML;
                     }

                     //console.log(siteContainer.innerHTML);
                     siteContainer.style.borderTop = '2px solid #4ad';
                     setTimeout(function() {
                         siteContainer.style.borderTop = '1px solid #ddd';
                     }, 400);
                     document.body.removeChild(document.querySelector('#cresultDiv'));
                     //alert(loadedPage);
                     //main fall backs here
                     mainFallBack();


                 });

             });
         };

         for (var i = 0, c = links.length; i < c; i++) {
             linksEvents(i, links[i]);
         }
     }
     //load home 
     function loadHome(alllinks) {
         var links = document.querySelectorAll(alllinks);
         //alert(links.length);

         var banner = document.querySelector('#banner');

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
                 loadPageElem(this, function(e) {

                     //banner.style.display='block';
                     var siteContainer = document.querySelector('#site-container');

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
                     siteContainer.innerHTML = (document.querySelector('#cresultDiv #site-container')).innerHTML;

                     //page title
                     var pageTitle = '';

                     pageTitle = document.querySelector('#cresultDiv  title').textContent;


                     console.log(pageTitle);

                     //page title
                     setPageTitle(pageTitle);


                     if (/login|managecreation|subscribe|profile|classrooms|search/.test(mainLink.href)) {
                         banner.style.display = 'none';
                     } else {
                         banner.style.display = 'block';
                         banner.innerHTML = document.querySelector('#cresultDiv #banner').innerHTML;
                     }


                     //console.log(siteContainer.innerHTML);
                     siteContainer.style.borderTop = '2px solid #4ad';
                     setTimeout(function() {
                         siteContainer.style.borderTop = '1px solid #ddd';
                     }, 400);
                     document.body.removeChild(document.querySelector('#cresultDiv'));
                     //alert(loadedPage);

                     //main fall backs here
                     mainFallBack();

                 });

             });
         };

         for (var i = 0, c = links.length; i < c; i++) {
             linksEvents(i, links[i]);
         }
     }

     //has banner 
     function hasBanner(result) {
         return /id="banner"/.test(result);
     }

     //main function
     (function() {
         try {
             showSearchBar();
         } catch (e) {
             console.log('error showing search bar ' + e);
         }
         //uploading files
         try {
             upload(function() {
                 console.log('uploaded');
             });
         } catch (e) {
             console.log('uploading files error ' + e);
         }
         //simple editor
         try {
             simpleEditor();
         } catch (e) {
             console.log('simple editor error : ' + e);
         }
         //saving comments
         try {
             saveComments();
         } catch (e) {
             console.log('error saving comments ' + e);
         }




         //subscribe form
         try {

             subscribeCode();
         } catch (e) {
             console.log('error subscribe form ' + e);

         }

         //loading topbarmenu links pages
         try {
             //loadHome('#topbarmenu li a');
         } catch (e) {
             console.log('loading topbarmenu pages error ' + e);
         }

         //loading profile menu bar pages
         try {
             loadHome('.profileMenuBar li a');
         } catch (e) {
             console.log('loading profilemenubar  page error ' + e);
         }

         //loading search menu pages 
         try {
             loadHome('.searchMenu li a');
         } catch (e) {
             console.log('loading psearch menu page error ' + e);
         }

         //contact code
         try {

             contactCode();
         } catch (e) {
             console.log('contact error' + e);
         }
         try {
             submitForm('#saveuserpost', function(e) {

                 console.log(e.responseText);
                 //alert('new page saved');
                 try {
                     showLastCreations(e);
                 } catch (e) {
                     console.log('error showing last creations ' + e);
                 }
             });
         } catch (e) {
             console.log(e);
         }
         try {
             loadHome('.homeBt');
         } catch (e) {
             console.log('loading home page ' + e);
         }
         //loading classrooms 
         try {
             loadHome('article h2 a');
         } catch (e) {
             console.log('loading classrooms page ' + e);
         }
         try {
             loadLeftColPages();
         } catch (e) {
             console.log('loading left col pages ' + e);
         }
         try {
             loadRightColPages();
         } catch (e) {
             console.log('loading right col pages ' + e);
         }
         /*loadPage('#showHome',function(e){
         	showLastCreations(e);
         });*/

     })();

 })();