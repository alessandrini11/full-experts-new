const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});


window.addEventListener('scroll', reveal);

function reveal() {
  const reveals = document.querySelectorAll('.reveal');

  reveals.forEach(reveal => {
    const windowHeight = window.innerHeight;
    const revealTop = reveal.getBoundingClientRect().top;
    const revealPoint = 150;

    if (revealTop < windowHeight - revealPoint) {
      reveal.classList.add('active');
    } else {
      reveal.classList.remove('active');
    }
  });
}












//alert("Hello! I am an alert box!!");
//
//const boxes = document.querySelectorAll('#box')
//window.addEventListener('scroll', checkBoxes)
//    checkBoxes();
//
//    function checkBoxes(){
//        const triggerBottom = window.innerHeight / 5 * 4
//        boxes.forEach(#box => {
//            const boxTop = #box.getBoundingClientRect().top
//            if( boxTop < triggerBottom){
//                #box.classList.add('show')
//            }else{
//                #box.classList.remove('show')
//
//            }
//        })
//
//    }


//// Select all elements with the ID "box"
//const boxes = document.querySelectorAll('#box');
//
//// Add an event listener to execute the checkBoxes function when the window scrolls
//window.addEventListener('scroll', checkBoxes);
//
//// Call the checkBoxes function initially to check visibility on page load
//checkBoxes();
//
//function checkBoxes() {
//  // Calculate the trigger point for visibility (4/5th of the viewport height)
//  const triggerBottom = window.innerHeight * 0.8; // Using 0.8 for clarity
//
//  // Loop through each box element
//  boxes.forEach(box => {
//    // Get the distance from the top of the viewport to the top of the box
//    const boxTop = box.getBoundingClientRect().top;
//
//    // Check if the box is within the trigger point
//    if (boxTop < triggerBottom) {
//      // If visible, add the 'show' class
//      box.classList.add('show');
//    } else {
//      // If not visible, remove the 'show' class
//      box.classList.remove('show');
//    }
//  });
//}

