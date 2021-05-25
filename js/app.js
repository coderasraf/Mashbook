// Set Post preview image ===========
const previewImg = document.querySelector('.preview-img');
const previewImg2 = document.querySelector('#previewImage');
const previewInput = document.querySelector('#file');
function display_images(file){
	previewImg.classList.add('active');
	previewImg.src = URL.createObjectURL(file);
	previewImg2.src = URL.createObjectURL(file);
}
function display_images2(file){
	previewImg2.src = URL.createObjectURL(file);
}

// Sidebar menu ===========
const Sidebar = document.querySelector(".sidebar-right");
const closeBtn = document.querySelector('.closeBtn');
const overlay = document.querySelector('.overlay');
const showBar = document.querySelector('#showbar');

showbar.addEventListener('click', function(){
	Sidebar.classList.add('active');
	overlay.classList.add('active');
})

closeBtn.addEventListener('click', function(){
	Sidebar.classList.remove('active');
	overlay.classList.remove('active');
})

overlay.addEventListener('click', function() {
	Sidebar.classList.remove('active');
	overlay.classList.remove('active');
})


// Fixed menubar area ============
// const menuArea = document.querySelector('.bar-top');
// window.addEventListener('scroll', function(){
// 	let offsetHeight = menuArea.offsetHeight;
// 	let pageYOffset = window.pageYOffset;
// 	if (pageYOffset > 400 ) {
// 		menuArea.classList.add('fixed');
// 		document.body.style.paddingTop = offsetHeight + 'px';
// 	}else{
// 		menuArea.classList.remove('fixed');
// 		document.body.style.paddingTop = 0;
// 	}
// })

// cookie constant box
const cookieBox = document.querySelector('.cookie-box'),
acceptBtn = cookieBox.querySelector('.buttons button');

acceptBtn.addEventListener('click', function(){
	document.cookie = "CookieBy=Mashbook;max-age="+60*60*24*30;
	if (document.cookie) {
		cookieBox.classList.add('hide');
	}else{
		alert('Cookie cant be set');
	}
})

// if cookie box already set then hide the box else show the box
const checkCookie = document.cookie.indexOf("CookieBy=Mashbook");
checkCookie != -1 ? cookieBox.classList.add('hide') : cookieBox.classList.remove('hide');
