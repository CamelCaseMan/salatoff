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
				setTimeout( () => {
					element.classList.add('--animated')
				} )
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
				setTimeout( () => {
					modal.classList.add('--animated')
				} )
				document.body.style.paddingRight = window.innerWidth - document.documentElement.clientWidth + 'px'
				document.body.classList.add('--block')
			})
		}

		Object.values(closers).forEach(closerClick)
		function closerClick(closer) {
			closer.addEventListener('click', () => {
				modal.classList.remove('--animated')
				deactivateAll()
				setTimeout( () => {
					modal.classList.remove('active')
					document.body.style.paddingRight = 0
					document.body.classList.remove('--block')
				}, 500 )
			})
		}

		function deactivateAll() {
			Object.values(modals).forEach(modal => {
					modal.classList.remove('--animated')
					setTimeout( () => {
						modal.classList.remove('active')
					}, 500 )
			})
		}
	}

	expandElements();
	function expandElements() {
		const togglers = document.getElementsByClassName('expand-toggler');

		for (let toggler of togglers) {
			toggler.addEventListener('click', toggle);
		}

		function toggle(evt) {
			const target = document.getElementById(this.dataset.expand);
			if (!target) return;

			if ( this.classList.contains('active') ) {
				this.classList.remove('active');
				if ( target.classList.contains('active') ) {
					target.classList.remove('active');
					cut(target);
				}
			} else {
				this.classList.add('active');
				if ( !target.classList.contains('active') ) {
					target.classList.add('active');
					expand(target);
				}
			}
		}

		function cut(target) {
			target.style.height = 0;
		}
		function expand(target) {
			const height = target.scrollHeight;
			target.style.height = height + 'px';
		}
	}

})