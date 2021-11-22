const { values } = require("lodash");

document.addEventListener('DOMContentLoaded', () => {

	cutMenuOnClick()
	function cutMenuOnClick() {
		const hamburger = document.getElementsByClassName('header__hamburger')[0]
		const menu = document.getElementById('header-drop')

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
			header.style.paddingRight = window.innerWidth - document.documentElement.clientWidth + 'px'
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
				header.style.paddingRight = 0
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
					console.log('here')
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

	$( "#datepicker" ).datepicker( { 
		firstDay: 1,
		dateFormat: "dd.mm.yy",
		dayNames: [ "Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
		dayNamesShort: [ "Вск", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Сбт" ],
		dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
		monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Окрябрь", "Ноябрь", "Декабрь" ],
		monthNamesShort: [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окр", "Ноя", "Дек" ],
		showOtherMonths: true,
    selectOtherMonths: true
	} );

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
	});

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
	});

	$('.input-phone').mask("+7 (999) 999 9999")

});