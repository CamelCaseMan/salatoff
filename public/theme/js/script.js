document.addEventListener('DOMContentLoaded', () => {
	
	toggleActive()
	function toggleActive() {
		const togglers = document.getElementsByClassName('toggle-active')

		for (let toggler of togglers) {
			toggler.addEventListener('click', toggle)
		}

		function toggle() {
			const id = this.dataset.toggleActive
			const element = document.getElementById(id)
			if (element) {
				this.classList.toggle('active')
				element.classList.toggle('active')
			} else {
				console.error(`Element by id "${id}" not found!`)
			}
		}
	}

})