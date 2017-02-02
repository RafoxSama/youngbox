(function () {
	let search_input = document.querySelector('#q')
	let search = document.querySelector('#topbar-search')
		search_input.addEventListener('focus', function (e) {    
			search.classList.add('focus')
		})
		search_input.addEventListener('blur', function (e) {    
			search.classList.remove('focus')
		})
})()