document.addEventListener('DOMContentLoaded', () => {
	const CSRFToken = document.querySelector('meta[name="csrf-token"]').content

	logIn()
	function logIn() {
		const form1 = document.getElementById('login-form')
		const form2 = document.getElementById('login-code-form')
		const nextsWrapper = form2.getElementsByClassName('nexts-form__cells')[0]
		const nexts = nextsWrapper.getElementsByTagName('input')
		const codeInput = document.getElementById('code-value-input')
		const errorField = document.getElementById('login-error')

		const phoneInput = document.getElementById('wndw-login-phone')

		const sendData = {
			password: '0123456789'
		}

		form1.addEventListener('submit', (evt) => {
			evt.preventDefault()

			sendData.phone = phoneInput.value.replace(/[^+\d]/g, '')

			$.ajax({
				url: '/generate-code/login',
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': CSRFToken
				},
				data: sendData,
				success: function (data) {
					form1.classList.add('--success')
					nexts[0].focus()
				},
				error: function (msg) {
					console.log(msg)
				}
			})
		})

		Object.values(nexts).forEach( (input, i) => {
			input.addEventListener('input', evt => {
				if (i === nexts.length-1) {
					setTimeout( () => {
						checkInput()
					}, 100 )
				}
			})
		} )

		function checkInput() {
			if (codeInput.value.length === 4) {
				nextsWrapper.classList.add('--done')
				setTimeout( () => {
					sendCode()
				}, 200)
			} else {
				nextsWrapper.classList.add('--error')
				codeInput.classList.add('--error')
			}
		}

		function sendCode() {
			sendData.code = codeInput.value

			$.ajax({
				url: '/login',
				type: "POST",
				headers: {
						'X-CSRF-TOKEN': CSRFToken
				},
				data: sendData,
				dataType: 'JSON',

				success: function (data) {
					console.log(data)
					location.reload()
				},
				error: function (msg) {
					const errors = msg['responseJSON']['errors']

					if ('phone' in errors) {
						form1.classList.remove('--success')
						phoneInput.classList.add('--error')
						
						const errorField = document.querySelector('#wndw-login-phone + .-error-message')
						errorField.innerHTML = 'Ваш номер не был найден! Возможно вам нужно <span>зарегистрироваться</span>'
					}
					if ('code' in errors) {
						nextsWrapper.classList.add('--error')
						nextsWrapper.classList.remove('--done')
						codeInput.classList.add('--error')
	
						errorField.innerHTML = ''
						Object.values(errors).forEach(errArr => {
							errorField.innerHTML += errArr[0] + '<br>'
						})
					}
				}
			})
		}


	}

	signIn()
	function signIn() {
		const form1 = document.getElementById('signin-form')
		const form2 = document.getElementById('sendcode-form')

		const phoneInput = document.getElementById('wndw-signin-phone')
		const nextsWrapper = form2.getElementsByClassName('nexts-form__cells')[0]
		const nexts = nextsWrapper.getElementsByTagName('input')
		const codeInput = document.getElementById('sendcode-input')
		const errorField = document.getElementById('error-field')

		let sendData;

		let targetI = 0
		form1.addEventListener('invalid', evt => {
			evt.preventDefault()
			evt.target.classList.add('--error')

			if (targetI === 0) {
				evt.target.focus()
			}

			targetI++
		}, true)

		form1.addEventListener('submit', evt => {
			evt.preventDefault()

			sendData = new FormData(form1)
			sendData.set( 'phone', sendData.get('phone').replace(/[^+\d]/g, '') )

			let dataObj = {}

			for ( let pair of sendData.entries() ) {
				dataObj[ pair[0] ] = pair[1]
			}

			$.ajax({
				url: '/generate-code/login',
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': CSRFToken
				},
				data: dataObj,
				success: function (data) {
					form1.classList.add('--success')
					nexts[0].focus()
				},
				error: function (msg) {
					if (msg.status == 422) {
						phoneInput.classList.add('--error')
					} else if (msg.status == 429) {
						alert('Код был запрошен слишком много раз! Пожалуйста, попробуйте позже!')
					} else {
						alert('Произошла какая-то ошибка!')
						location.reload
					}
				}
			})

		})

		Object.values(nexts).forEach( (input, i) => {
			input.addEventListener('input', evt => {
				if (i === nexts.length-1) {
					setTimeout( () => {
						checkInput()
					}, 100 )
				}
			})
		} )

		function checkInput() {
			if (codeInput.value.length === 4) {
				nextsWrapper.classList.add('--done')
				setTimeout( () => {
					sendCode()
				}, 200)
			} else {
				nextsWrapper.classList.add('--error')
				codeInput.classList.add('--error')
			}
		}

		function sendCode() {
			sendData.append('code', codeInput.value)

			let dataObj = {}

			for ( let pair of sendData.entries() ) {
				dataObj[ pair[0] ] = pair[1]
			}

			$.ajax({
				url: '/register',
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': CSRFToken
				},
				data: dataObj,
				dataType: 'JSON',

				success: function (data) {
					location.reload()

				},
				error: function (msg) {
					nextsWrapper.classList.add('--error')
					nextsWrapper.classList.remove('--done')
					codeInput.classList.add('--error')

					const errors = msg['responseJSON']['errors']

					errorField.innerHTML = ''
					Object.values(errors).forEach(errArr => {
						errorField.innerHTML += errArr[0] + '<br>'
					})
				}
			})

		}

	}

})