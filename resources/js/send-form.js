document.addEventListener('DOMContentLoaded', () => {
	const CSRFToken = document.querySelector('meta[name="csrf-token"]').content

	sendForm()
	function sendForm() {
		const forms = document.getElementsByClassName('send-form')

		Object.values(forms).forEach(init)

		function init(form) {
			form.addEventListener('invalid', invalid, true)
			form.addEventListener('submit', submit)

			function invalid(evt) {
				evt.preventDefault()
				evt.target.classList.add('--error')
			}

			function submit(evt) {
				evt.preventDefault()
				
				sendFormData( collectFormData() )
			}
			
			function collectFormData() {
				const formData = new FormData(form)

				const objData = {}

				for ( let [key, value] of formData.entries() ) {
					objData[key] = value
				}

				return objData
			}
			
			function sendFormData(data) {
				$.ajax({
					url: form.action,
					type: form.method,
					headers: {
							'X-CSRF-TOKEN': CSRFToken
					},
					data: data,
					dataType: 'JSON',
	
					success: responseHandler,
					error: errorHandler
				})
			}

			function responseHandler(data) {
				console.log(data)
				form.classList.add('--success')
			}

			function errorHandler(err) {
				console.log(err)
			}

		}

	}

})