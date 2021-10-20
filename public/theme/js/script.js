document.addEventListener('DOMContentLoaded', () => {

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

	modals();
	function modals() {
		const triggers = document.getElementsByClassName('open-modals');
		const windows  = document.getElementsByClassName('modals__modal');
		const closers  = document.getElementsByClassName('modals__close');
		const back     = document.getElementsByClassName('modals__bg')[0];

		if (back) {
			back.addEventListener('click', closeModal);
		}

		const modals = document.getElementsByClassName('modals')[0];
		if ( !modals ) return;

		for (let trigger of triggers) {
			trigger.addEventListener('click', openModal);
		}

		for (let closer of closers) {
			closer.addEventListener('click', closeModal);
		}

		function closeAll() {
			for (let window of windows) {
				window.classList.remove('active');
			}
		}

		function openModal() {
			document.body.classList.add('--fixed');
			modals.classList.add('active');
		}

		function closeModal() {
			closeAll();
			document.body.classList.remove('--fixed');
			modals.classList.remove('active');
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

});