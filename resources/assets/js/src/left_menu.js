(function () {
	    let topbar_logo = document.querySelector('.topbar-logo')
	    let topbar_menu = document.querySelector('.topbar-menu')
	    let left_menuOpened = false
	    topbar_logo.addEventListener('click', function (e) {
	    	if (window.innerWidth < 1010 && !left_menuOpened ) { 
        // On empèche la propagration vers le parent
		        e.stopPropagation()
		        e.preventDefault()
		        topbar_menu.classList.add('is-active')
		        left_menuOpened = true
        	}else if (left_menuOpened && window.innerWidth < 1010){
        		e.stopPropagation()
		        e.preventDefault()
        		topbar_menu.classList.remove('is-active')
        		left_menuOpened = false
        	}
  		}) 

		document.body.addEventListener('click', function () {
		    if(left_menuOpened && window.innerWidth < 1010) {
		        topbar_menu.classList.remove('is-active')
		        left_menuOpened = false
		    }
		})
})()