document.addEventListener('DOMContentLoaded', () => {

	signIn()
	function signIn() {
		const form = document.getElementById('signin-form')

		form.addEventListener('submit', evt => {
			evt.preventDefault()

			console.log('Попытка отправить форму')

		})

		form.addEventListener('invalid', evt => {
			evt.preventDefault()
			evt.target.classList.add('--error')
		}, true)
	}

})