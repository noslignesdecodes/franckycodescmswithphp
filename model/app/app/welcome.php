<!doctype>
<html lang="mg">
<head>
	 <title><?php echo $title;?></title> 
	 <meta charset="utf-8">
	<style>
		/*

* All fonts goes here
*/
@font-face {
  font-family: 'Open Sans';
  src: url("fonts/OpenSans-Light.ttf");
}
.reset {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.openSans {
  font-family: 'Open Sans';
}
.block {
  display: block;
}
.hide {
  display: none;
}
.fullWidth {
  display: block;
  min-width: 100%;
  width: 100%;
}
.ib {
  display: inline-block;
  vertical-align: top;
}
.rounded {
  border-radius: 2px;
}
.alignCenter {
  text-align: center;
}
.alignLeft {
  text-align: left;
}
.alignRight {
  text-align: right;
}
.floatLeft {
  float: left;
}
.floatRight {
  float: right;
}
.bold {
  font-weight: bold;
}
.uppercase {
  text-transform: uppercase;
}
.lowercase {
  text-transform: lowercase;
}
.lightBt {
  display: inline-block;
  vertical-align: top;
  border: 2px solid #fff;
  min-width: 100px;
  border-radius: 2px;
  padding: 5px;
  cursor: pointer;
}
.darkBt,
a.darkBt:link,
a.darkBt:visited {
  display: inline-block;
  vertical-align: top;
  border: 2px solid #282828;
  min-width: 100px;
  border-radius: 2px;
  color: #282828;
  text-align: center;
  cursor: pointer;
}
a.darkBt:hover,
.darkBt:hover {
  background: #282828;
  color: #fff;
}
a.lightBt:link,
a.lightBt:visited {
  color: #fff;
  text-align: center;
}
.lightBt:hover,
a.lightBt:hover {
  background: #fff;
  color: #282828;
  font-weight: bold;
}
.redBt,
a.redBt:link,
a.redBt:visited {
  display: inline-block;
  vertical-align: top;
  color: #f75561;
  text-align: center;
  border: 2px solid #f75561;
  min-width: 100px;
  border-radius: 2px;
  padding: 5px;
  cursor: pointer;
}
.redBt:hover,
a.redBt:hover {
  background: #f75561;
  color: #fff;
  font-weight: bold;
}
.redBg {
  background: #dd3b77;
}
.centerBox {
  margin: 0 auto;
}
.imenu li {
  list-style-type: none;
  display: inline-block;
  vertical-align: top;
}
.ib2 {
  display: inline-block;
  vertical-align: top;
  width: 49%;
}
.ib3 {
  display: inline-block;
  vertical-align: top;
  width: 30%;
}
a:link,
a:visited {
  color: #fff;
  text-decoration: none;
}
.redBg {
  background: #f75561;
}
.iconBt,
a.iconBt {
  display: inline-block;
  vertical-align: top;
  width: 30px;
  height: 32px;
  background-color: transparent;
}
.relative {
  position: relative;
}
.absolute {
  position: absolute;
}
.static {
  position: static;
}
.fixed {
  position: fixed;
}
.lightBg {
  background: #fff;
}
.pauseBt {
  position: absolute;
  top: 45%;
  left: 45%;
  z-index: 11;
  color: #fff;
  background: rgba(0, 0, 0, 0.7);
  display: block;
  width: 60px;
  height: 60px;
  border-radius: 100%;
  font-weight: bold;
  text-align: center;
  line-height: 3.2;
  cursor: pointer;
}
.pauseBt:hover {
  border: 1px solid #f75561;
}
.borderLess,
.noBorder {
  border: none;
}
.redText {
  color: #f75561;
}
.loadingBt {
  position: absolute;
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
  text-align: center;
  bottom: 40%;
  left: 44%;
  z-index: 13;
  padding: 5px;
}
.p25 {
  padding: 25px;
}
.nullBg {
  background: transparent;
}
.prevBt {
  position: absolute;
  top: 45%;
  left: 20px;
  z-index: 11;
  color: #fff;
  background: #282828;
  display: block;
  width: 50px;
  height: 50px;
  border-radius: 100%;
  font-weight: bold;
  text-align: center;
  line-height: 3;
  cursor: pointer;
  display: none;
}
.isBt {
  cursor: pointer;
}
.nextBt {
  cursor: pointer;
  position: absolute;
  text-align: center;
  top: 45%;
  right: 20px;
  z-index: 11;
  color: #fff;
  background: #282828;
  display: block;
  width: 50px;
  height: 50px;
  border-radius: 100%;
  font-weight: bold;
  line-height: 3;
  display: none;
}
.italic {
  font-style: italic;
}
.toTop {
  z-index: 11;
  position: fixed;
  bottom: 0;
  right: 0;
}
.prevBt:hover,
.nextBt:hover {
  height: 55px;
  width: 55px;
  line-height: 3.5;
}
.circle {
  border-radius: 100%;
}
.darkBg {
  background: #282828;
}
.b7 {
  display: block;
  width: 70%;
}
.b8 {
  display: block;
  width: 80%;
}
.b5 {
  display: block;
  width: 50%;
}
.fb {
  display: inline-block;
  vertical-align: top;
  width: 30px;
  height: 32px;
  background-color: transparent;
  background: url('../img/main_icons.png') top 0 left 0 no-repeat, transparent;
}
.youtube {
  display: inline-block;
  vertical-align: top;
  width: 30px;
  height: 32px;
  background-color: transparent;
  background: url('../img/main_icons.png') top 0 left -52px no-repeat, transparent;
}
.instagram {
  display: inline-block;
  vertical-align: top;
  width: 30px;
  height: 32px;
  background-color: transparent;
  background: url('../img/main_icons.png') top 0 left -78px no-repeat, transparent;
}
.twitter {
  display: inline-block;
  vertical-align: top;
  width: 30px;
  height: 32px;
  background-color: transparent;
  background: url('../img/main_icons.png') top 0 left -25px no-repeat, transparent;
}
.searchIcon {
  display: inline-block;
  vertical-align: top;
  width: 30px;
  height: 32px;
  background-color: transparent;
  background: url('../img/main_icons.png') top 0 right -3px no-repeat, transparent;
}
.mobileMenuIcon {
  display: inline-block;
  vertical-align: top;
  width: 30px;
  height: 32px;
  background-color: transparent;
  background: url('../img/main_icons.png') top 0 right -30px no-repeat, transparent;
}
@media (max-width: 800px) {
  .ib2,
  .ib3,
  .b5,
  .b8,
  .b7 {
    display: block;
    width: 100%;
  }
}
#bannerSlideButtonsContainer {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  text-align: center;
  z-index: 11;
}
.topbarSlideBt {
  width: 10px;
  height: 10px;
  border-radius: 100%;
  display: inline-block;
  vertical-align: top;
}
.modalContainer {
  position: fixed;
  z-index: 15;
  background: rgba(0, 0, 0, 0.7);
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
  display: none;
}
.modalBox {
  background: #fff;
  margin: 0 auto;
  width: 50%;
  min-width: 300px;
  border: 1px solid #f75561;
  padding: 25px;
  position: relative;
  margin-top: 100px;
  border-radius: 2px;
}
.modalBox img {
  display: inline-block;
  vertical-align: top;
  max-width: 100%;
}
.modalFull {
  min-width: 80%;
  width: 80%;
}
.closeModalBt {
  position: absolute;
  top: 0;
  right: 0;
  width: 50px;
  height: 50px;
  display: block;
  line-height: 3;
  color: #f75561;
  text-align: center;
  cursor: pointer;
  z-index: 1;
}
.closeModalBt:hover {
  font-weight: bold;
}
.customEditor {
  min-height: 200px;
  border-bottom: 2px solid #81dafc;
  font-size: 100%;
}
.myBtn {
  display: inline-block;
  vertical-align: top;
  color: #808080;
  border: 1px solid #808080;
  padding: 5px;
  border-radius: 5px;
  min-width: 50px;
  cursor: pointer;
}
.greenBt,
.greenBt:link,
.greenBt:visited {
  display: inline-block;
  vertical-align: top;
  color: #808080;
  border: 1px solid #808080;
  padding: 5px;
  border-radius: 5px;
  min-width: 50px;
  cursor: pointer;
  color: #7ED097;
  border: 1px solid #7ED097;
}
.greenBt:hover,
.greenBt:link:hover,
.greenBt:visited:hover {
  background: #7ED097;
  color: #fff;
}
.blueBt,
.blueBt:link,
.blueBt:visited {
  display: inline-block;
  vertical-align: top;
  color: #808080;
  border: 1px solid #808080;
  padding: 5px;
  border-radius: 5px;
  min-width: 50px;
  cursor: pointer;
  color: #2BB6CF;
  border: 1px solid #2BB6CF;
}
.blueBt:hover,
.blueBt:link:hover,
.blueBt:visited:hover {
  background: #2BB6CF;
  color: #fff;
}
body {
  background: #eee;
  color: #282828;
  font-family: 'Open Sans';
}
.welcomeAppContainer {
  width: 80%;
  margin: 0 auto;
  margin-top: 50px;
}
.welcomeAppContainer a:link,
.welcomeAppContainer a:visited {
  color: #2BB6CF;
}
.welcomeAppContainer input {
  color: #2BB6CF;
}
.mainTopbar {
  position: relative;
  display: block;
  height: 50px;
  background: #fff;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 14;
  border-bottom: 1px solid #f8f8f8;
}
.mainTopbar .searchIcon {
  width: 32px;
  height: 32px;
  border: 2px solid #f75561;
  border-radius: 100%;
  cursor: pointer;
}
.mainTopbar .searchIcon:hover {
  background-color: rgba(0, 0, 0, 0.7);
}
.mainTopbar .mobileMenuIcon {
  display: inline-block;
  vertical-align: top;
  width: 35px;
  height: 35px;
  border: 2px solid #f75561;
  border-radius: 100%;
  cursor: pointer;
  z-index: 14;
  position: fixed;
  top: 5px;
  right: 5%;
  background-color: #282828;
  display: none;
}
.mainTopbar .mobileMenuIcon:hover {
  background-color: rgba(0, 0, 0, 0.7);
}
.topbarContainer {
  width: 70%;
  display: block;
  margin: 0 auto;
}
svg {
  font-family: 'Open Sans';
}
.appLogo {
  display: inline-block;
  vertical-align: top;
  width: 100px;
  height: 35px;
  padding: 5px;
  position: relative;
  margin-top: 5px;
  z-index: 13;
  border-radius: 2px;
}
.appLogo .mainLogoImg {
  display: block;
  width: 100%;
  font-family: 'Open Sans';
}
.appLogo .appName {
  font-weight: bold;
  position: absolute;
  top: 15px;
  left: 10px;
  font-style: italic;
}
.mainMenuBt {
  display: block;
  background: url('../img/mainmenudark.png') top 5px left 2px no-repeat;
  width: 32px;
  height: 32px;
  position: absolute;
  top: 10px;
  left: 20px;
  cursor: pointer;
}
.mainMenuBt:hover {
  background-color: #eee;
}
.mainMenu {
  background: #fff;
  display: block;
  display: none;
  min-height: 50px;
  line-height: 1.5;
  padding-left: 50px;
  margin-top: 50px;
}
.mainMenu li {
  list-style-type: none;
  display: inline-block;
  vertical-align: top;
}
.mainMenu li a {
  display: block;
  min-width: 50px;
  height: 50px;
  line-height: 3.5;
  padding: 5px;
  text-align: center;
}
.mainMenu li a:link,
.mainMenu li a:visited {
  color: #282828;
  border-bottom: 2px solid transparent;
}
.mainMenu li a:hover {
  border-bottom: 2px solid #f75561;
}
.mainMenu li a::first-letter {
  text-transform: uppercase;
}
.aboutMenu {
  position: fixed;
  top: 0;
  right: 0;
  display: inline-block;
  vertical-align: top;
  width: 49%;
  height: 50px;
  text-align: right;
  z-index: 12;
  padding-right: 10px;
}
.aboutMenu li {
  list-style-type: none;
  display: inline-block;
  vertical-align: top;
}
.aboutMenu li a:link,
.aboutMenu li a:visited {
  display: block;
  height: 50px;
  line-height: 3;
  color: #282828;
  border-bottom: 3px solid transparent;
}
.aboutMenu li a:link:hover,
.aboutMenu li a:visited:hover {
  background: transparent;
  border-bottom: 3px solid #f75561;
}
::placeholder {
  color: #f75561;
  opacity: 1;
}
input,
select,
textarea,
.customEditor {
  border: 1px solid #ddd;
  margin-bottom: 5px;
  padding: 5px;
  min-width: 150px;
  display: block;
  width: 100%;
}
.success {
  border-left: 2px solid #7dc864;
  padding: 25px;
  color: #808080;
  display: block;
  width: 70%;
}
.topbarSearchForm {
  margin-top: 10px;
  z-index: 14;
  position: relative;
  display: none;
}
.topbarSearchForm input {
  border: none;
  background: transparent;
  color: #f75561;
  height: 26px;
  font-weight: bold;
  padding-left: 10px;
  border-bottom: 2px solid #f75561;
}
.topbarSearchForm input:hover {
  background: #eee;
}
.topbarSearchForm .searchIcon {
  border: none;
  position: absolute;
  top: 0px;
  right: 0;
  height: 25px;
  border-radius: 0;
}
.topbarSearchForm .searchIcon:hover {
  border-color: #f75561;
}
.topbarSlideBt {
  margin: 2px;
  cursor: pointer;
}
.galleriesSample img {
  display: inline-block;
  vertical-align: top;
  min-width: 50px;
  width: 25%;
}
.banner {
  background: #808080;
  min-height: 200px;
  max-height: 600px;
  overflow: hidden;
  position: relative;
}
.banner img {
  display: block;
  min-width: 100%;
  width: 100%;
  z-index: 1;
  max-height: 600px;
}
.banner .bannerSlide2 {
  position: relative;
}
.banner .bannerMessage {
  position: absolute;
  background: rgba(0, 0, 0, 0.7);
  padding: 50px;
  color: #fff;
  top: 0;
  left: 0;
  min-width: 200px;
  width: 25%;
  min-height: 200px;
  height: 100%;
  max-height: 100%;
}
.banner .topbarSlideBt {
  border: 1px solid #f75561;
}
.banner #bannerSlide2SlideButtonsContainer {
  position: absolute;
  top: 0;
  text-align: center;
}
.banner #bannerSlide2SlideButtonsContainer .topbarSlideBt {
  width: 10px;
  height: 2px;
  border-radius: 0;
  border: none;
}
.newsLetterForm #userEmail {
  border: none;
  background: transparent;
  border-bottom: 2px solid #f75561;
  margin-bottom: 5px;
  color: #fff;
}
.appCore {
  min-height: 600px;
}
.appCore section {
  min-height: 400px;
  padding: 25px;
}
.misEnAvant {
  text-align: center;
  padding: 50px;
  background: #dd3b77;
  background: #f75561;
}
.misEnAvant h1 {
  margin-bottom: 25px;
  color: #fff;
}
.actu {
  background: #dd3b77;
  background: #f75561;
  position: relative;
  min-height: 400px;
}
.actu h1 {
  margin-bottom: 25px;
  z-index: 11;
  position: absolute;
  width: 50%;
  top: 50px;
  left: 5px;
  background: rgba(0, 0, 0, 0.7);
}
.actu .actuBtContainer {
  position: absolute;
  width: 50%;
  z-index: 12;
  top: 75%;
  left: 5%;
}
.actu .actuSlide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.actu #actuSlide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  min-width: 100%;
  min-height: 100%;
}
.actu #actuSlide h2 {
  position: absolute;
  top: 50px;
  right: 0;
  z-index: 12;
  width: 50%;
  padding: 5px;
}
.actu #actuSlide div.ib2 {
  position: absolute;
  top: 30%;
  right: 0;
  z-index: 12;
  width: 50%;
  padding: 5px;
}
.actu #actuSlide #actuSlideSlideContent {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.actu #actuSlide img {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  min-width: 100%;
  height: 100%;
  max-width: 100%;
  min-height: 100%;
}
.actu #actuSlide #actuSlideSlideButtonsContainer {
  position: absolute;
  top: 70%;
  left: 0;
  width: 100%;
  height: 50px;
  text-align: center;
  z-index: 12;
}
.services {
  background: #fff;
  color: #282828;
}
.services .servicesContainer {
  text-align: center;
}
.services .servicesContainer div.ib {
  width: 25%;
}
.services h1 {
  margin-bottom: 50px;
}
.services h2 {
  margin-bottom: 25px;
  color: #81dafc;
}
.services .servicesSlide {
  text-align: center;
  width: 50%;
  margin: 0 auto;
  min-height: 250px;
}
.services .servicesSlide .pauseBt {
  top: 75%;
}
#promoModal {
  padding: 0;
}
#promoModal .modalBox {
  text-align: center;
  border: 1px solid #f8f8f8;
  color: #282828;
  padding: 0;
  border: none;
  border-radius: 2px;
}
#promoModal h2 {
  min-height: 50px;
  text-transform: uppercase;
  display: none;
}
#promoModal .redBt {
  border-radius: 2px;
}
#promoModal img {
  display: block;
  width: 100%;
  min-width: 100%;
}
.promotions {
  background: #dd3b77;
  background: #f75561;
}
.promotions h1 {
  margin-bottom: 25px;
}
.blueBg {
  background: #81dafc;
  color: #fff;
}
.darkBg {
  background: #282828;
  color: #fff;
}
.showRooms {
  background: #282828;
  color: #fff;
}
.map {
  padding: 0;
  position: relative;
}
.map h1 {
  position: absolute;
  width: 35%;
  min-width: 250px;
  height: 50px;
  padding: 5px;
  right: 20px;
  top: 20px;
  z-index: 11;
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
  font-size: 125%;
}
.map img {
  display: block;
  min-width: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
}
.map .mapEffect {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  background: rgba(0, 0, 0, 0.7);
}
.map iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.contactUs {
  text-align: center;
  background: #dd3b77;
  background: #f75561;
  padding: 50px;
}
.contactUs h1 {
  text-align: left;
  padding-left: 9%;
  margin-bottom: 25px;
  color: #fff;
}
.contactUs input,
.contactUs textarea {
  background: transparent;
  border: 1px solid transparent;
  border-bottom: 2px solid #fff;
  color: #fff;
}
.contactUs input:hover,
.contactUs .messageEditor:hover {
  background: #ea3d4a;
}
.contactUs input {
  margin-bottom: 20px;
  height: 35px;
}
.contactUs .message {
  width: 70%;
}
.contactUs .message .messageEditor {
  width: 100%;
  min-height: 150px;
}
.contactUs .name {
  width: 20%;
}
.produits {
  color: #282828;
  background: #fff;
}
.produits #produitsSlide {
  width: 70%;
  margin: 0 auto;
  text-align: center;
  min-height: 200px;
  height: 200px;
  max-height: 200px;
  margin-bottom: 25px;
}
.produits #produitsSlide a:link,
.produits #produitsSlide a:visited {
  display: block;
  min-height: 200px;
}
.produits #produitsSlide img {
  display: block;
  width: 150px;
  margin: 0 auto;
}
.produits #produitsSlide .produitsSlideSlideButtonsContainer {
  display: block;
  margin-top: 50px;
}
.produitsLogos {
  width: 70%;
  margin: 0 auto;
  margin-top: 50px;
  text-align: center;
}
.produitsLogos img {
  display: inline-block;
  vertical-align: top;
  width: 150px;
}
.mainFooter {
  background: #eee;
  padding-top: 100px;
  padding-bottom: 50px;
  background: #282828;
  color: #fff;
}
.mainFooter .logoFooter img {
  display: block;
  max-width: 100%;
}
.mainFooter div.ib {
  width: 15%;
  min-width: 50px;
}
.mainFooter .social {
  min-height: 150px;
  padding-top: 50px;
}
.customEditor {
  min-height: 200px;
  border-bottom: 2px solid #81dafc;
  font-size: 100%;
}
.closeBt {
  width: 32px;
  height: 32px;
  display: block;
  line-height: 1.5;
  text-align: center;
  position: absolute;
  top: 5px;
  right: 5px;
  cursor: pointer;
  border: 2px solid #282828;
  border-radius: 100%;
}
.closeBt:hover {
  font-weight: bold;
  border-color: #fff;
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
}
.mainMenuContainer {
  position: fixed;
  z-index: 11;
  top: 50px;
  left: 0;
  width: 300px;
  min-width: 300px;
  width: 25%;
  height: 100%;
  min-height: 100%;
  max-height: 100%;
  background: #fff;
  border-right: 1px solid #f8f8f8;
}
.mainMenuContainer nav {
  padding: 10px;
}
.mainMenuContainer nav li {
  display: block;
}
.mainMenuContainer nav li a:link,
.mainMenuContainer nav li a:visited {
  color: #282828;
  display: block;
  min-height: 50px;
  padding: 5px;
}
.mainMenuContainer nav li a::first-letter {
  text-transform: uppercase;
}
.mainMenuContainer nav li a:hover {
  border-left: 2px solid #4ad;
}
.mainMenuContainer .cover {
  min-width: 100%;
  width: 100%;
  display: block;
}
@media (max-width: 1200px) {
  .banner .bannerMessage {
    min-width: 250px;
    width: 50%;
    height: 100%;
    min-height: 100%;
    max-height: 100%;
    top: 0;
    left: 0;
    padding: 20px;
  }
  .banner .pauseBt {
    left: 60%;
  }
  .banner #bannerSlide2SlideButtonsContainer {
    text-align: right;
    padding-right: 25px;
  }
}
@media (max-width: 800px) {
  .modalContainer .modalBox {
    width: 95%;
  }
  .aboutMenu {
    display: none;
  }
  .mainTopbar .mobileMenuIcon {
    display: none;
  }
  .mainMenuContainer #moreMenu {
    display: block;
  }
  .banner .bannerMessage {
    min-width: 250px;
    width: 50%;
    height: 100%;
    min-height: 100%;
    max-height: 100%;
    top: 0;
    left: 0;
    padding: 10px;
  }
  .banner .pauseBt {
    left: 60%;
  }
  .banner #bannerSlide2SlideButtonsContainer {
    text-align: right;
    padding-right: 25px;
  }
  .contactUs .name {
    display: block;
    min-width: 100%;
    width: 100%;
  }
  .contactUs .name input {
    display: block;
    min-width: 100%;
    width: 100%;
  }
  .contactUs .message {
    display: block;
    min-width: 100%;
    width: 100%;
  }
  .mainFooter .logoFooter {
    text-align: center;
  }
  .mainFooter .logoFooter img {
    margin: 0 auto;
  }
  .mainFooter div.ib {
    display: block;
    min-width: 100%;
    width: 100%;
    margin-bottom: 20px;
  }
}

	</style>
</head>
<body>

	 
	<?php 
		include $core;
	?>

	 
	<script></script>
</body> 
</html>