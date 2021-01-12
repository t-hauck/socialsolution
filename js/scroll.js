// https://www.w3schools.com/howto/howto_js_navbar_slide.asp
// When the user scrolls down 20px from the top of the document, slide down the navbar
// When the user scrolls to the top of the page, slide up the navbar (50px out of the top view)

	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		  document.getElementById("menu-scroll").style.top= "0";
		  document.getElementById("menu-imgscroll").style.float= "left";
		  document.getElementById("menu-scroll").style.background= "linear-gradient(to left, #65259a 60%, #d4b870 )";
		  document.getElementById("menu-imgscroll").style.display= "inline-block";

	  } else if (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) {
		  document.getElementById("menu-scroll").style.background= "transparent";
		  document.getElementById("menu-imgscroll").style.display= "none";

		  }
	}
