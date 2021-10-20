document.addEventListener('DOMContentLoaded', () => {
	const magicTabs = document.getElementsByClassName('magic-tabs-switches')

	Object.values(magicTabs).forEach(init)
	function init(switchesWrapper) {
		const switches = switchesWrapper.getElementsByClassName('magic-tabs-switch')
		const tabsWrapper = document.getElementById(switchesWrapper.dataset.tabsId)
		const tabs = tabsWrapper.getElementsByClassName('magic-tab')

		launch()
		function launch() {
			Object.values(tabs).forEach(tab => {
				tab.classList.add('--transparent')
				tab.classList.remove('active')
			})
			const firstSwitch = switches[0]
			firstSwitch.classList.add('active')

			setTab(firstSwitch.dataset.activateTab)
		}

		Object.values(switches).forEach( swtch => {
			swtch.addEventListener('click', () => {
				if ( swtch.classList.contains('active') ) return

				resetSwitches()
				resetTabs()

				swtch.classList.add('active')

				setTimeout( () => {
					setTab(swtch.dataset.activateTab)
				}, 200 )
			})
		} )

		function resetSwitches() {
			Object.values(switches).forEach(swtch => {
				swtch.classList.remove('active')
			})
		}

		function resetTabs() {
			Object.values(tabs).forEach(tab => {
				tab.classList.add('--transparent')
				setTimeout( () => {
					tab.classList.remove('active')
				}, 200 )
			})
		}

		function setTab(id) {
			const tab = document.getElementById(id)

			if (!tab) {
				console.warn('Вкладки с id "' + id + '" не существует!')
				return
			}

			tab.classList.add('active')
			setTimeout( () => {
				tab.classList.remove('--transparent')
			} )
		}
	}

})