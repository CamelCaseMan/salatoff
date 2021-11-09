document.addEventListener('DOMContentLoaded', () => {
	const CSRFToken = document.querySelector('meta[name="csrf-token"]').content

	signIn()
	function signIn() {
		const form1 = document.getElementById('signin-form')
		const form2 = document.getElementById('sendcode-form')

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

			fetch('/generate-code/login', {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': CSRFToken
				},
				body: sendData
			})
			.then(response => {
				form1.classList.add('--success')
				nexts[0].focus()
			})
			.catch(err => {
				alert('Произошла какая-то ошибка')
				location.reload()
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
					//window.location.href = '/customer';
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
			});

			// fetch('/register', {
			// 	method: 'POST',
			// 	headers: {
			// 		'X-CSRF-TOKEN': CSRFToken
			// 	},
			// 	body: sendData
			// })
			// .then(response => {
			// 	console.log(response)
			// 	return response.text
			// })
			// .then(data => {
			// 	console.log(data)
			// })
			// .catch(err => {
			// 	// console.log( err )
			// 	console.log(err);
			// })
		}

	}

})