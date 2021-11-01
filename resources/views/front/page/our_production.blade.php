@extends('front.master')

@section('content')

<div class="our-production-page container mb-160 l-mb-120">

	<div class="product-page__back mb-30 xs-mb-20">
			<a href="{{ URL::previous() }}">
					<svg width="12" height="11" viewBox="0 0 12 11" fill="none">
							<path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
										fill="#1A1A1A"/>
					</svg>
					Назад
			</a>
	</div>

	<h2 class="second-title">Производство</h2>

	<div class="our-production__top mb-160 l-mb-120 s-mb-100">
		<img src="/theme/img/our-production/start-image.jpg" alt="Производство" class="our-production__top-image d-block mb-100 l-mb-60 s-mb-30">

		<div class="our-production__top-row our-production__top-text mb-100 s-mb-60">
			<p>
				Каждое конкурентоспособное современное кафе или супермаркет предлагает клиентам услугу доставки готовой еды. В условиях городского ритма жизни большинство людей не могут проводить на кухне много времени, поэтому спрос на готовую кулинарию с каждым годом только растёт. <br>
				<br>
				Мы учли эти факты, и создали компанию, где каждый день создаём свежие блюда высшего качества с точки зрения технологии приготовления и вкуса.
			</p>
		</div>

		<div class="our-production__top-row our-production__top-split">
			<img src="/theme/img/our-production/split-image.jpg" alt="Наше производство" class="-img d-block">
			<p>
				«Еда без забот» — отличная возможность насладиться блюдами домашней кухни без затрат времени и сил на готовку. <br>
				<br>
				Заказать блюда можно на сайте из дома или откуда угодно.<br>
				<br>
				Обслуживаем как частных клиентов, так и поставляем оптом в офисы, кофейни, магазины и другие точки общепита.
			</p>
		</div>

	</div>

	<div class="our-production__cooking mb-220 l-mb-140 m-mb-120 xs-mb-100">
		<div class="our-production__cooking-title">Готовим для вас</div>

		<div class="our-production__cooking-products-wrapper">

			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/1.png" alt="Традиционные салаты">
				</div>
				<div class="-name">Традиционные салаты</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/2.png" alt="Салаты корейской кухни">
				</div>
				<div class="-name">Салаты корейской кухни</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/3.png" alt="Блюда русской и украинской кухни">
				</div>
				<div class="-name">Блюда русской и украинской кухни</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/4.png" alt="Суши и роллы">
				</div>
				<div class="-name">Суши и роллы</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/5.png" alt="Бутерброды и сэндвичи">
				</div>
				<div class="-name">Бутерброды и сэндвичи</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/6.png" alt="Выпечку">
				</div>
				<div class="-name">Выпечку</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/7.png" alt="Супы">
				</div>
				<div class="-name">Супы</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/8.png" alt="Кондитерские изделия">
				</div>
				<div class="-name">Кондитерские изделия</div>
			</div>
			
			<div class="-product">
				<div class="-img">
					<img src="/theme/img/our-production/products/9.png" alt="Напитки">
				</div>
				<div class="-name">Напитки</div>
			</div>

		</div>
	</div>

	<div class="our-production__two info-screen mb-100 l-mb-80 xs-mb-60">
			<div class="info-screen__container">
					<div class="info-screen__title">
							Главный принцип нашей кулинарии — <br>
							<div class="-highlighting">
									эксклюзивность.
									<svg class="-outline" width="372" height="96" viewBox="0 0 372 96" fill="none">
											<ellipse cx="186.427" cy="47.5" rx="184.19" ry="46.5" stroke="#A2CD3A"/>
											<path d="M370.617 47.5009C372.783 76.313 284.937 90.5472 189.294 95.435M370.617 47.5009V47.5009ZM186.427 94.0009C84.6655 92.4458 -1.31047 73.3142 1.04738 48.2339M2.23783 47.5009C-0.222605 18.9259 83.9874 4.84858 186.267 3.81902M186.427 1.0009C289.039 0.855765 370.587 18.3191 370.423 43.6075"
														stroke="#A2CD3A" stroke-linecap="round"/>
									</svg>
							</div>
					</div>
					<div class="info-screen__text">
							<p>Наши технологи разрабатывают блюда, которых нет больше нигде, регулярно улучшают их вкусовые
									качества, и делают так, чтобы кулинария соответствовала нормам высшего качества по приготовлению,
									хранению и фасовке.</p>
							<p>Поэтому производство регулярно расширяется, чтобы обслуживать больше клиентов и радовать их более
									широким ассортиментом.</p>
					</div>
			</div>
	</div>

	<div class="our-production__middle mb-180 l-mb-120 s-mb-100">
		<img src="/theme/img/our-production/middle-image.jpg" alt="Готовая кулинария">
	</div>

	<div class="our-production__why mb-180 l-mb-120 xs-mb-100">
		<div class="our-production__why-title mb-120 l-mb-80">
			Почему стоит попробовать <br> нашу кулинарию
		</div>

		<div class="our-production__why-answers mb-80 l-mb-60">
			<div class="-answer">
				<div class="-num">1</div>
				<p class="-text">используем только свежие проверенные продукты</p>
			</div>
			<div class="-answer">
				<div class="-num">2</div>
				<p class="-text">доставляем заказы <br> оперативно и вовремя</p>
			</div>
			<div class="-answer">
				<div class="-num">3</div>
				<p class="-text">соблюдаем нормы чистоты и гигиены в цехах и во время работы *</p>
			</div>
			<div class="-answer">
				<div class="-num">4</div>
				<p class="-text">довольные клиенты хвалят и обращаются снова</p>
			</div>
		</div>

		<p class="our-production__why-note">
			<span class="--green">*</span> Придерживаемся всех норм САНПИНа, следуем Программе производственного контроля и работаем исключительно на основании системы пищевой безопасности ХАССП
		</p>

	</div>

	<div class="our-production__split-blocks mb-120 m-mb-100">
		<p class="-text">
			Клиенты часто обращаются в «Еда без забот» и за услугой
			<a class="-link" href="/catering">
				кейтеринга
				<svg class="-underline" width="136" height="10" viewBox="0 0 136 10" fill="none">
					<path d="M1 1L7.99353 7.68039C8.76652 8.41876 9.98348 8.41876 10.7565 7.68039L16.3685 2.31961C17.1415 1.58124 18.3585 1.58124 19.1315 2.31961L24.7435 7.68039C25.5165 8.41876 26.7335 8.41876 27.5065 7.68039L33.1185 2.31961C33.8915 1.58124 35.1085 1.58124 35.8815 2.31961L41.4935 7.68039C42.2665 8.41876 43.4835 8.41876 44.2565 7.68039L49.8685 2.31961C50.6415 1.58124 51.8585 1.58124 52.6315 2.31961L58.2435 7.68039C59.0165 8.41876 60.2335 8.41876 61.0065 7.68039L66.6185 2.31961C67.3915 1.58124 68.6085 1.58124 69.3815 2.31961L74.9935 7.68039C75.7665 8.41876 76.9835 8.41876 77.7565 7.68039L83.3685 2.31961C84.1415 1.58124 85.3585 1.58124 86.1315 2.31961L91.7435 7.68039C92.5165 8.41876 93.7335 8.41876 94.5065 7.68039L100.119 2.31961C100.892 1.58124 102.108 1.58124 102.881 2.31961L108.494 7.68039C109.267 8.41876 110.483 8.41876 111.256 7.68039L116.869 2.31961C117.642 1.58124 118.858 1.58124 119.631 2.31961L125.244 7.68039C126.017 8.41876 127.233 8.41876 128.006 7.68039L135 1" stroke="#A2CD3A" stroke-width="2" stroke-linecap="round"/>
				</svg>
			</a>
			. Кулинария из свежих продуктов высшего качества будет радовать гостей на всех типах мероприятий. Наш менеджер обсудит детали заказа и поможет составить персонализированное меню.
		</p>
		<img src="/theme/img/our-production/sp-image-1.jpg" alt="Производство" class="-img d-block">
		<img src="/theme/img/our-production/sp-image-2.jpg" alt="Производство" class="-img d-block">
	</div>

	<div class="our-production__right mb-180 l-mb-120 m-mb-100 xs-mb-80">
		<div class="our-production__right-content">
			<p class="-text mb-50">
				Ассортимент предлагаемых блюд можно попробовать в стационарных фирменных кафе. <br>
				<br>
				Для небольших кафе и магазинов, у которых нет возможности организовать собственное производство, мы предлагаем контрактное сотрудничество. Наши курьеры ежедневно будут доставлять на точки продаж свежую выпечку и блюда из цехов. 
			</p>
			<img src="/theme/img/our-production/right-image.jpg" alt="Готовая кулинария" class="-img d-block">
		</div>
	</div>

	<div class="our-production__before-end mb-180 l-mb-120 s-mb-100 xs-mb-80">
		<p class="our-production__before-end-text mb-60">
			Мы трезво оцениваем оборот кулинарии и минимизируем издержки производства, что позволяет устанавливать демократичную цену на нашу продукцию. 
		</p>
		<div class="our-production__before-end-split">
			<img src="/theme/img/our-production/be-image-1.jpg" alt="Готовая кулинария" class="-img d-block">
			<img src="/theme/img/our-production/be-image-2.jpg" alt="Готовая кулинария" class="-img d-block">
		</div>
	</div>

	<div class="our-production__end">
		<p class="-text mb-40">
			Ценим каждого клиента. Домашний вкус за приятную стоимость.
		</p>
		<img src="/theme/img/our-production/last-image.jpg" alt="Производство" class="-img d-block">
	</div>
</div>

@endsection