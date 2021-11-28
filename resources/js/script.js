const { values } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {

	cutMenuOnClick()
	function cutMenuOnClick() {
		const hamburger = document.getElementsByClassName('header__hamburger')[0]
		const menu = document.getElementById('header-drop')

		if (! menu || ! hamburger) return

		document.addEventListener('click', (evt) => {

			if ( !menu.classList.contains('active') ) return

			const menuBottom = menu.getBoundingClientRect().bottom

			if (evt.clientY > menuBottom) {
				menu.style.height = 0

				menu.classList.remove('active')
				hamburger.classList.remove('active')
			}

		})

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

	prettySlider();
	function prettySlider() {

		const sliders = document.getElementsByClassName('pretty-slider');

		for (let slider of sliders) {
			init(slider);
		}

		function init(slider) {
			const togglers      = slider.querySelectorAll('.pretty-slider__navigation .-arrow');
			const conveyor      = slider.getElementsByClassName('pretty-slider__visible-slides-wrapper')[0];
			const slides        = slider.querySelectorAll('.pretty-slider__hidden-slides .pretty-slider__slide');
			const dotsWrapper   = slider.getElementsByClassName('pretty-slider__dots')[0];
			const dots          = dotsWrapper.getElementsByClassName('-dot');
			const visibleSlides = conveyor.getElementsByClassName('pretty-slider__slide');
			const sliderEngine  = slider.getElementsByClassName('pretty-slider__wrapper')[0];
						
			if ( !conveyor ) return;
			
			let changeAllow = true;
			let currentIndex = 0;

			for (let i = 0; i < togglers.length; i++) {
				togglers[i].addEventListener('click', () => {
					if (!changeAllow) return;
					if (i == 0) slideBack();
					if (i == 1) slideNext();
				});
			}

			let sliderTimer = setTimeout(autoslide, 3000);
			function autoslide() {
				slideNext();
				sliderTimer = setTimeout(autoslide, 3000);
			}

			if (sliderEngine) {
				sliderEngine.addEventListener('mouseenter', () => {
					clearTimeout(sliderTimer);
				});
				sliderEngine.addEventListener('mouseleave', () => {
					sliderTimer = setTimeout(autoslide, 3000);
				});
			}

			loadStart();
			function loadStart() {
				for (let i = -1; i < 2; i++) {
					const slide = slides[ filterIndex(i) ].cloneNode(true);
					conveyor.insertAdjacentElement('beforeend', slide);
				}
			}

			createDots();
			function createDots() {
				if ( !dotsWrapper ) return;
				for (let i = 0; i < slides.length; i++) {
					const dot = document.createElement('div');
					dot.classList.add('-dot');
					dotsWrapper.append(dot);
				}
			}

			changeDot();
			function changeDot() {
				for (let dot of dots) {
					dot.classList.remove('active');
				}
				let targetDot = dots[currentIndex];
				if (targetDot) targetDot.classList.add('active');
			}

			function filterIndex(i) {
				if (i < 0) return slides.length - 1;
				if (i >= slides.length) return 0;
				return i;
			}

			function slideBack() {
				// Включаем анимацию и перелистываем
				currentIndex = filterIndex(currentIndex - 1);
				changeAllow = false;
				conveyor.classList.remove('--no-animate');
				conveyor.style.left = '0';

				changeDot();

				conveyor.addEventListener('transitionend', function changeSlide() {
					// Выключаем анимацию
					conveyor.classList.add('--no-animate');

					// Удаляем ненужный слайд
					visibleSlides[ visibleSlides.length-1 ].remove();

					// Копируем и вставляем дополнительный слайд
					const slide = slides[ filterIndex(currentIndex-1) ].cloneNode(true);
					conveyor.insertAdjacentElement('afterbegin', slide);

					conveyor.style.left = '-100%';
					changeAllow = true;
					conveyor.removeEventListener('transitionend', changeSlide);
				});

			}

			function slideNext() {
				// Включаем анимацию и перелистываем
				currentIndex = filterIndex(currentIndex + 1);
				changeAllow = false;
				conveyor.classList.remove('--no-animate');
				conveyor.style.left = '-200%';

				changeDot();

				conveyor.addEventListener('transitionend', function changeSlide() {
					// Выключаем анимацию
					conveyor.classList.add('--no-animate');

					// Удаляем ненужный слайд
					visibleSlides[0].remove();

					// Копируем и вставляем дополнительный слайд
					const slide = slides[ filterIndex(currentIndex+1) ].cloneNode(true);
					conveyor.insertAdjacentElement('beforeend', slide);

					conveyor.style.left = '-100%';
					changeAllow = true;
					conveyor.removeEventListener('transitionend', changeSlide);
				});

			}

		}

	}

	toggleActive();
	function toggleActive() {
		const togglers = document.getElementsByClassName('toggle-active');

		for (let toggler of togglers) {
			toggler.addEventListener('click', toggle);
		}

		function toggle() {
			const id = this.dataset.toggleActive;
			const element = document.getElementById(id);
			if (element) {
				element.classList.toggle('active');
				this.classList.toggle('active');
			} else {
				console.error(`Element by id "${id}" not found!`);
			}
		}
	}

	tabs();
	function tabs() {
		const tabs = document.getElementsByClassName('tabs-system');
		for (let tab of tabs) {
			init(tab);
		}

		function init(tab) {
			const triggers = tab.getElementsByClassName('tabs-system__trigger');
			const tabs = tab.getElementsByClassName('tabs-system__tab');

			for (let i = 0; i < triggers.length; i++) {
				triggers[i].addEventListener('click', () => {
					if ( tabs[i] ) {
						deactivate();
						tabs[i].classList.add('active');
						triggers[i].classList.add('active');
					}
				});
			}

			function deactivate() {
				for (let tab of tabs) {
					tab.classList.remove('active');
				}
				for (let trigger of triggers) {
					trigger.classList.remove('active');
				}
			}
		}
	}

	modals()
	function modals() {
		const modals = document.getElementsByClassName('modal')
		const header = document.getElementById('header')
		const openers = document.getElementsByClassName('open-modal')
		const closers = document.getElementsByClassName('close-modal')

		Object.values(openers).forEach(opener => {
			opener.addEventListener('click', () => {
				openWind(opener.dataset.openModal)
			})
		})

		Object.values(closers).forEach(closer => {
			closer.addEventListener('click', () => {
				closeWind()
			})
		})

		function openWind(id) {			
			const modal = document.getElementById(id)
			if ( !modal ) {
				console.warn('Модального окна с id "' + id + '" не существует')
				return
			}

			document.body.style.paddingRight = window.innerWidth - document.documentElement.clientWidth + 'px'
			if (header) {
				header.style.paddingRight = window.innerWidth - document.documentElement.clientWidth + 'px'
			}
			document.body.classList.add('--fixed')

			const modalBody = modal.getElementsByClassName('modal__body')[0]

			modal.classList.add('active')
			modal.classList.add('--transparent')

			modalBody.classList.add('active')
			modalBody.classList.add('--transparent')
			
			setTimeout( () => {
				modal.classList.remove('--transparent')

				modalBody.classList.remove('--transparent')
			} )
		}

		function closeWind() {
			
			Object.values(modals).forEach(modal => {
				const modalBody = modal.getElementsByClassName('modal__body')[0]
				
				modal.classList.add('--transparent')
				modalBody.classList.add('--transparent')

				setTimeout( () => {
					modal.classList.remove('active')
					modal.classList.remove('--transparent')
	
					modalBody.classList.remove('active')
					modalBody.classList.remove('--transparent')
	
				}, 300 )
				
			})
			
			setTimeout( () => {
				document.body.style.paddingRight = 0
				if (header) {
					header.style.paddingRight = 0
				}
				document.body.classList.remove('--fixed')
			}, 300 )

		}

	}

	formDroplists();
	function formDroplists() {

		const droplists = document.getElementsByClassName('input-droplist');

		for (let droplist of droplists) {
			init(droplist);
		}

		function init(droplist) {
			const input      = droplist.getElementsByClassName('-input')[0];
			const list       = droplist.getElementsByClassName('-list')[0];
			const listItems  = droplist.getElementsByTagName('li');

			if ( !input || !list ) return;

			input.addEventListener('focus', function(evt) {
				list.classList.add('active');
			});
			input.addEventListener('blur', function(evt) {
				setTimeout( () => {
					list.classList.remove('active');
				}, 100);
			});

			for (let li of listItems) {
				li.addEventListener('mousedown', set);
			}

			function set(evt) {
				if ( input.tagName == 'INPUT' ) input.value = this.dataset.value;
				if ( input.tagName == 'DIV' ) {
					input.innerHTML = this.innerHTML;
					input.dataset.value = this.dataset.value;
				}
			}
		}

	}

	nextsForm()
	function nextsForm() {

		const forms = document.getElementsByClassName('nexts-form')

		Object.values(forms).forEach(init)

		function init(form) {
			const input = form.getElementsByClassName('nexts-form__input')[0]

			if ( !input ) {
				console.warn('Не обнаружен "input.nexts-form__input"!')
				return
			}

			const nextsWrapper = form.getElementsByClassName('nexts-form__cells')[0]
			const nexts = nextsWrapper.getElementsByTagName('input')

			Object.values(nexts).forEach( (input, i) => {
				input.value = ''

				input.addEventListener('input', evt =>{
					input.value = input.value.replace(/[^\d]/g,'')

					if (input.value.length > 0) {
						if (i < nexts.length-1) {
							nexts[i+1].focus()
							input.value = input.value[ input.value.length-1 ]
						} else {
							input.value = input.value[ input.value.length-1 ]
							finish()
						}
					}

				})
			} )

			function finish() {
				input.value = ''

				Object.values(nexts).forEach(next => {
					input.value += next.value
				})

				// if (input.value.length === 4) {
				// 	setTimeout( () => {
				// 		nextsWrapper.classList.add('--done')
				// 	}, 200)
				// 	// form.submit()
				// } else {
				// 	nextsWrapper.classList.add('--error')
				// 	input.classList.add('--error')
				// }
			}

		}

	}

	stepTabs()
	function stepTabs() {
		const stepForms = document.getElementsByClassName('step-tabs')

		Object.values(stepForms).forEach(init)

		function init(form) {
			const htmlForm = form.getElementsByTagName('form')[0]

			const layoutLine = form.getElementsByClassName('step-tabs-line')[0]
			const layoutNum = form.getElementsByClassName('step-tabs-num')[0]

			const nextButtons = form.getElementsByClassName('step-tabs-next')
			const backButtons = form.getElementsByClassName('step-tabs-back')
			const triggers = form.getElementsByClassName('step-tabs-trigger')
			const checkEntries = form.getElementsByClassName('step-tabs-check-entry')

			const tabs = form.getElementsByClassName('step-tabs-tab')

			let currentNum = 0

			setTab(0)

			Object.values(triggers).forEach(trigger => {
				trigger.addEventListener('click', () => {
					setTab(+trigger.dataset.num)
				})
			})
			Object.values(nextButtons).forEach(btn => {
				btn.addEventListener('click', setNextTab)
			})
			Object.values(backButtons).forEach(btn => {
				btn.addEventListener('click', setPrevTab)
			})

			function setNextTab() {
				if ( ! validateTab() ) return

				addToCheckout()
				setTab(++currentNum)
			}

			function setPrevTab() {
				setTab(--currentNum)
			}

			function setTab(num) {
				num = normalizeNum(num)

				currentNum = num

				setLayout(num)
				deactivateAllTabs()
				activateTab(num)

				if (num === tabs.length-1) {
					form.classList.add('--finish')
				} else {
					form.classList.remove('--finish')
				}
				
			}

			function validateTab() {
				const tab = tabs[currentNum]
				const inputs = tab.getElementsByTagName('input')

				let isValid = true

				for(let input of inputs) {
					if (input.required && input.value === '') {
						input.classList.add('--error')
						isValid = false
					}
				}

				return isValid
			}

			function setLayout(num) {
				layoutNum.innerText = `Шаг ${num+1} из ${tabs.length}`
				layoutLine.style.width = 100 / ( tabs.length / (num+1) ) + '%'
			}

			function deactivateAllTabs() {
				Object.values(tabs).forEach(tab => {
					tab.classList.remove('active')
				})
			}

			function activateTab(num) {
				tabs[num].classList.add('active')
			}
			
			function addToCheckout() {
				const formData = new FormData(htmlForm)

				for ( let [name, value] of formData.entries() ) {
					if ( ! value ) continue

					const targetEntry = Object.values(checkEntries).filter(entry => name === entry.dataset.name)[0]
					if (targetEntry) {
						targetEntry.innerText = value
					}
				}

			}

			function normalizeNum(num) {
				if (num < 0) return 0
				if (num >= tabs.length) return tabs.length-1
				return num
			}

		}
	}

	inputStyle()
	function inputStyle() {
		const inputs = document.getElementsByClassName('input-style')

		Object.values(inputs).forEach(init)

		function init(input) {
			input.addEventListener('blur', () => {
				setTimeout( () => {
					if (! input.value && input.required) {
						addError()
					} else {
						removeError()
					}
				}, 200 )
			})
			input.addEventListener('input', () => {
				if (input.value) removeError()
			})

			function addError() {
				input.classList.add('--error')
			}
			function removeError() {
				input.classList.remove('--error')
			}
		}
	}

	setCity() 
	function setCity() {
		const radioWrapper = document.getElementById('set-city-radio')

		if (! radioWrapper) return

		const targetInput = document.getElementById( radioWrapper.dataset.target )
		const radioInputs = radioWrapper.getElementsByTagName('input')

		radioInputs[0].checked = true

		Object.values(radioInputs).forEach( (input, i) => {
			input.addEventListener('change', () => {
				if (i === 0) {
					targetInput.readOnly = true
					targetInput.value = input.value
				}
				if (i === 1) {
					targetInput.readOnly = false
					targetInput.value = ''
					targetInput.focus()
				}
			})
		} )

	}

	basketSubmit()
	function basketSubmit() {
		const form = document.getElementById('basket-submit')
		const total = document.getElementById('basket-submit-total')

		if (! form || ! total) return

		const button = form.getElementsByClassName('basket__order-button')[0]
		let allowSubmit = false

		setForm()

		total.addEventListener('change', setForm)

		form.addEventListener('submit', (evt) => {
			evt.preventDefault()

			if (! allowSubmit) return
			form.submit()
		})

		function setForm() {
			if ( checkPrice() ) {
				activateForm()
			} else {
				deactivateForm()
			}
		}

		function checkPrice() {
			const minPrice = +total.dataset.minPrice
			const currentPrice = +total.value

			if (currentPrice >= minPrice) return true
			return false	
		}

		function activateForm() {
			if (button) {
				button.classList.remove('--disabled')
			}
			allowSubmit = true
		}

		function deactivateForm() {
			if (button) {
				button.classList.add('--disabled')
			}
			allowSubmit = false
		}

	}

	cartDatepicker()
	function cartDatepicker() {
		const datePicker = $( "#datepicker" )

		if (! datePicker[0]) return

		datePicker.datepicker( { 
			beforeShowDay: disableSpecificWeekDays,
			firstDay: 1,
			dateFormat: "dd.mm.yy",
			dayNames: [ "Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
			dayNamesShort: [ "Вск", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Сбт" ],
			dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
			monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Окрябрь", "Ноябрь", "Декабрь" ],
			monthNamesShort: [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окр", "Ноя", "Дек" ],
			showOtherMonths: true,
			selectOtherMonths: true,
		} )
	
		datePicker.datepicker('setDate', datePicker[0].dataset.minDate)
		datePicker.datepicker('option', 'minDate', datePicker[0].dataset.minDate)

		function disableSpecificWeekDays(date) {
			const day = date.getDay();
			if (day === 0) {
				return [false]
			} else {
				return [true]
			}
		}
	}


	$('.clients-logos').owlCarousel({
    loop: false,
    margin: 20,
    nav: false,
		dots: false,
    responsive: {
			0: {
				items: 1
			},
			480: {
				items: 2
			},
			770: {
				items: 3
			},
			1200: {
				items: 4
			}
    }
	})

	$('.reviews-slider').owlCarousel({
    loop: false,
    margin: 25,
    nav: false,
		dots: true,
    responsive: {
			0: {
				items: 1
			},
			770: {
				items: 2
			}
    }
	})

	$('#main-slider').owlCarousel({
		items: 1,
		loop: true,
		nav: true,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		navContainer: '#main-slider-nav',
		dotsContainer: '#main-slider-dots',
		navText: [
			`
			<svg width="10" height="16" viewBox="0 0 10 16" fill="none">
				<path d="M8.32448 0.5C8.03208 0.5 7.79816 0.581081 7.62273 0.743243L0.473603 7.31081C0.268925 7.52703 0.166585 7.75676 0.166585 8C0.166585 8.24324 0.268925 8.45946 0.473603 8.64865L7.62273 15.2162C7.8274 15.4054 8.06132 15.5 8.32448 15.5C8.58764 15.5 8.82156 15.4054 9.02623 15.2162C9.23091 15.027 9.33325 14.8108 9.33325 14.5676C9.33325 14.3243 9.23091 14.1081 9.02623 13.9189L2.62273 8L9.02623 2.08108C9.23091 1.89189 9.33325 1.66216 9.33325 1.39189C9.33325 1.12162 9.23822 0.905405 9.04816 0.743243C8.85811 0.581081 8.61688 0.5 8.32448 0.5Z" fill="#828282"/>
			</svg>
			`,
			`
			<svg width="10" height="16" viewBox="0 0 10 16" fill="none">
				<path d="M1.67552 0.5C1.96792 0.5 2.20184 0.581081 2.37727 0.743243L9.5264 7.31081C9.73108 7.52703 9.83342 7.75676 9.83342 8C9.83342 8.24324 9.73108 8.45946 9.5264 8.64865L2.37727 15.2162C2.1726 15.4054 1.93868 15.5 1.67552 15.5C1.41236 15.5 1.17844 15.4054 0.973766 15.2162C0.769087 15.027 0.666748 14.8108 0.666748 14.5676C0.666748 14.3243 0.769087 14.1081 0.973766 13.9189L7.37727 8L0.973766 2.08108C0.769087 1.89189 0.666748 1.66216 0.666748 1.39189C0.666748 1.12162 0.761777 0.905405 0.951836 0.743243C1.14189 0.581081 1.38312 0.5 1.67552 0.5Z" fill="#828282"/>
			</svg>
			`
		],
		responsive: {
			0: {
				margin: 10
			},
			771: {
				margin: 0
			}
		}
	})

	$('.input-phone').mask("+7 (999) 999 9999")

});