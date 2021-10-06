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

	modals()
	function modals() {
		const modal = document.getElementsByClassName('manager-modals')[0]
		const modals = document.getElementsByClassName('manager-modal')
		const triggers = document.getElementsByClassName('open-modal')
		const closers = document.getElementsByClassName('close-modal')

		if ( !modal ) {
			console.error('Не обнаружена система модальных окон!')
			return
		}

		Object.values(triggers).forEach(triggerClick)
		function triggerClick(trigger) {
			trigger.addEventListener('click', () => {
				modal.classList.add('active')
				document.body.classList.add('--block')
			})
		}

		Object.values(closers).forEach(closerClick)
		function closerClick(closer) {
			closer.addEventListener('click', () => {
				modal.classList.remove('active')
				document.body.classList.remove('--block')
				deactivateAll()
			})
		}

		function deactivateAll() {
			Object.values(modals).forEach(modal => {
				modal.classList.remove('active')
			})
		}
	}

})