(function () {
	    let logout_link = document.querySelector('.sidebar_logout')
	    let logout_form = document.querySelector('#logout-form')
	    logout_link.addEventListener('click', function (e) {
        // On empèche la propagration vers le parent
        e.stopPropagation()
        e.preventDefault()
        logout_form.submit();
    })
})()