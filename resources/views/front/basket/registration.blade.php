@extends('front.master')
@section('content')

	<div class="order-page container mb-160 l-mb-130">

		<div class="order__header mb-60">

			<div class="product-page__back">
					<a href="/basket">
							<svg width="12" height="11" viewBox="0 0 12 11" fill="none">
									<path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
											fill="#1A1A1A"/>
							</svg>
							Назад в корзину
					</a>
			</div>

			<h1 class="second-title">Оформление заказа</h1>

		</div>

		<div class="order__body step-tabs">

			<div class="order__body-header">
				<div class="-num step-tabs-num"></div>
				<div class="-line">
					<div class="-passed step-tabs-line"></div>
				</div>
			</div>

			<form action="/basket" class="order__body-content">

				<div class="step-tabs-wrapper mb-40">

					<div class="step-tabs-tab order__tab" id="form-tab-01">

						<div class="order__body-title mb-40">
							<div class="-title">Ваши данные</div>
						</div>
	
						<div class="superform order__form">

							<div class="order__form-row">
								<section class="-form-section">
										<label class="-prefix" for="tab-001-name">Ваше имя <span class="-star">*</span></label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style --required" required name="name" id="tab-001-name" type="text" placeholder="Ваше имя">
											<!-- * Это сообщение об ошибке -->
											<div class="-error-message">Обязательное поле</div>
											<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
											<!-- <div class="-message">Сообщение к полю</div> -->
										</div>
								</section>
								<section class="-form-section">
										<label class="-prefix" for="tab-001-team">Название организации</label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style" name="team" id="tab-001-team" type="text" placeholder="ООО «Кофейня»">
											<!-- * Это сообщение об ошибке -->
											<div class="-error-message">Обязательное поле</div>
											<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
											<!-- <div class="-message">Сообщение к полю</div> -->
										</div>
								</section>
							</div>
							
							<div class="order__form-row">
								<section class="-form-section">
										<label class="-prefix" for="tab-001-phone">Контактный номер <span class="-star">*</span></label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style --required input-phone" required name="phone" id="tab-001-phone" placeholder="+7 (___) ___ ____" type="tel">
											<!-- * Это сообщение об ошибке -->
											<div class="-error-message">Обязательное поле</div>
											<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
											<!-- <div class="-message">Сообщение к полю</div> -->
										</div>
								</section>
								<section class="-form-section">
										<label class="-prefix" for="tab-001-email">E-mail</label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style" name="email" id="tab-001-email" type="text" placeholder="example@mail.ru">
											<!-- * Это сообщение об ошибке -->
											<div class="-error-message">Обязательное поле</div>
											<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
											<!-- <div class="-message">Сообщение к полю</div> -->
										</div>
								</section>
							</div>

						</div>

					</div>
					
					<div class="step-tabs-tab order__tab" id="form-tab-02">

						<div class="order__body-title mb-30">
							<div class="-back step-tabs-back">← Назад</div>
							<div class="-title">Дата доставки</div>
						</div>

						<p class="mb-40">
							Ближайшая дата доставки — 21.11.2021 <br>
							Вы можете выбрать другой удобный день
						</p>
	
						<div class="superform order__form">
							<div class="order__form-row">
								<section class="-form-section">
									<div class="valinput --date">
										<!-- * Если успешно, то "--success", нет — "--error" -->
										<label for="datepicker">
											<svg class="-icon" width="18" height="20" viewBox="0 0 18 20" fill="none">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M5 2H13V0H15V2H16C16.5304 2 17.0391 2.21071 17.4142 2.58579C17.7893 2.96086 18 3.46957 18 4V18C18 18.5304 17.7893 19.0391 17.4142 19.4142C17.0391 19.7893 16.5304 20 16 20H2C1.46957 20 0.960859 19.7893 0.585786 19.4142C0.210714 19.0391 0 18.5304 0 18V4C0 3.46957 0.210714 2.96086 0.585786 2.58579C0.960859 2.21071 1.46957 2 2 2H3V0H5V2ZM2 6V18H16V6H2ZM4 9H6V11H4V9ZM8 9H10V11H8V9ZM12 9H14V11H12V9ZM12 13H14V15H12V13ZM8 13H10V15H8V13ZM4 13H6V15H4V13Z" fill="#C4C4C4"/>
											</svg>
										</label>
										<input readonly type="text" required name="date" class="input-style" id="datepicker" placeholder="Выберите дату">
										<!-- * Это сообщение об ошибке -->
										<div class="-error-message">Обязательное поле</div>
										<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
										<!-- <div class="-message">Сообщение к полю</div> -->
									</div>
								</section>
							</div>
						</div>

					</div>

					<div class="step-tabs-tab order__tab" id="form-tab-03">

						<div class="order__body-title mb-30">
							<div class="-back step-tabs-back">← Назад</div>
							<div class="-title">Адрес доставки</div>
						</div>
						
						<a class="-link mb-40" href="/">Показать карту зоны доставки</a>
	
						<div class="superform order__form">
							<div class="order__form-row">
								<section class="-form-section">
									<label class="-prefix" for="tab-003-city">Город</label>
									<div class="input-droplist">
										<input id="tab-003-city" name="city" required readonly value="Москва" class="input-style -input" tabindex="-1">
										<div class="-focus-elements">
											<svg class="-arrow" width="14" height="9" viewBox="0 0 14 9" fill="none">
												<path d="M7 9L13.9282 0H0.0717969L7 9Z" fill="#C4C4C4"/>
											</svg>									
											<div class="-list">
												<ul class="-new">
													<li data-value="Москва">Москва</li>
													<li data-value="Лобня">Лобня</li>
													<li data-value="Курск">Курск</li>
												</ul>
											</div>
										</div>
									</div>
								</section>
								<section class="-form-section">
										<label class="-prefix" for="tab-003-street">Улица</label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style --required" required name="street" id="tab-003-street" type="text">
											<!-- * Это сообщение об ошибке -->
											<div class="-error-message">Обязательное поле</div>
											<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
											<!-- <div class="-message">Сообщение к полю</div> -->
										</div>
								</section>
							</div>
						</div>

						<div class="superform order__form">
							<div class="order__form-row">
								<div class="order__form-row-split">
									<section class="-form-section">
										<label class="-prefix" for="tab-003-home">Дом</label>
										<div class="valinput">
												<!-- * Если успешно, то "--success", нет — "--error" -->
												<input class="input-style --required" required name="home" id="tab-003-home" type="text">
												<!-- * Это сообщение об ошибке -->
												<div class="-error-message">Обязательное поле</div>
												<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
												<!-- <div class="-message">Сообщение к полю</div> -->
											</div>
									</section>
									<section class="-form-section">
										<label class="-prefix" for="tab-003-prehome">Подъезд</label>
										<div class="valinput">
												<!-- * Если успешно, то "--success", нет — "--error" -->
												<input class="input-style --required" required name="entrance" id="tab-003-prehome" type="text">
												<!-- * Это сообщение об ошибке -->
												<div class="-error-message">Обязательное поле</div>
												<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
												<!-- <div class="-message">Сообщение к полю</div> -->
											</div>
									</section>
								</div>
								<div class="order__form-row-split">
									<section class="-form-section">
										<label class="-prefix" for="tab-003-floor">Этаж</label>
										<div class="valinput">
												<!-- * Если успешно, то "--success", нет — "--error" -->
												<input class="input-style --required" required name="floor" id="tab-003-floor" type="text">
												<!-- * Это сообщение об ошибке -->
												<div class="-error-message">Обязательное поле</div>
												<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
												<!-- <div class="-message">Сообщение к полю</div> -->
											</div>
									</section>
									<section class="-form-section">
										<label class="-prefix" for="tab-003-office">Квартира/офис</label>
										<div class="valinput">
												<!-- * Если успешно, то "--success", нет — "--error" -->
												<input class="input-style --required" required name="office" id="tab-003-office" type="text">
												<!-- * Это сообщение об ошибке -->
												<div class="-error-message">Обязательное поле</div>
												<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
												<!-- <div class="-message">Сообщение к полю</div> -->
											</div>
									</section>
								</div>
							</div>
						</div>

					</div>

					<div class="step-tabs-tab order__tab" id="form-tab-04">

						<div class="order__body-title mb-30">
							<div class="-back step-tabs-back">← Назад</div>
							<div class="-title">Способ оплаты</div>
						</div>
						
						<div class="superform order__form mb-60">
							<div class="order__form-row">
								<div class="radio-selector">
									<label class="-radio input-style">
										<input type="radio" checked name="card">
										<div class="-circle"></div>
										<div class="-name">Картой онлайн</div>
									</label>
									<label class="-radio input-style">
										<input type="radio" name="card">
										<div class="-circle"></div>
										<div class="-name">Картой при получении</div>
									</label>
									<label class="-radio input-style">
										<input type="radio" name="card">
										<div class="-circle"></div>
										<div class="-name">Наличными курьеру</div>
									</label>
								</div>
							</div>
						</div>

						<div class="order__body-title mb-30">
							<div class="-title">Комментарий к заказу</div>
						</div>
						<div class="superform order__form" style="padding-bottom: 1px;">
							<section class="-form-section">
								<div class="valinput">
									<!-- * Если успешно, то "--success", нет — "--error" -->
									<textarea class="input-style --required" name="comment" rows="6" placeholder="Если мы должны что-то знать дополнительно, напишите об этом здесь "></textarea>
									<!-- * Это сообщение об ошибке -->
									<div class="-error-message">Обязательное поле</div>
									<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
									<!-- <div class="-message">Сообщение к полю</div> -->
								</div>
							</section>
						</div>

					</div>

					<div class="step-tabs-tab step-tabs-checkout-tab order__tab">

						<div class="order__body-title mb-60">
							<div class="-back step-tabs-back">← Назад</div>
							<div class="-title">Проверим, всё ли верно</div>
						</div>

						<section class="-checkout-section">
							<div class="-title">
								<div class="-text">Ваши данные</div>
								<svg class="-icon step-tabs-trigger" data-num="0" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M18.5 2.50023C18.8978 2.1024 19.4374 1.87891 20 1.87891C20.5626 1.87891 21.1022 2.1024 21.5 2.50023C21.8978 2.89805 22.1213 3.43762 22.1213 4.00023C22.1213 4.56284 21.8978 5.1024 21.5 5.50023L12 15.0002L8 16.0002L9 12.0002L18.5 2.50023Z" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<p>
								Ваше имя: Валентин Константинович <br>
								Организация: ОАО «Все свои» <br>
								Контактный номер: +7 (916) 000 15 10
							</p>
						</section>

						<section class="-checkout-section">
							<div class="-title">
								<div class="-text">Дата доставки</div>
								<svg class="-icon step-tabs-trigger" data-num="1" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M18.5 2.50023C18.8978 2.1024 19.4374 1.87891 20 1.87891C20.5626 1.87891 21.1022 2.1024 21.5 2.50023C21.8978 2.89805 22.1213 3.43762 22.1213 4.00023C22.1213 4.56284 21.8978 5.1024 21.5 5.50023L12 15.0002L8 16.0002L9 12.0002L18.5 2.50023Z" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<p>
								16.12.2021
							</p>
						</section>

						<section class="-checkout-section">
							<div class="-title">
								<div class="-text">Адрес доставки</div>
								<svg class="-icon step-tabs-trigger" data-num="2" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M18.5 2.50023C18.8978 2.1024 19.4374 1.87891 20 1.87891C20.5626 1.87891 21.1022 2.1024 21.5 2.50023C21.8978 2.89805 22.1213 3.43762 22.1213 4.00023C22.1213 4.56284 21.8978 5.1024 21.5 5.50023L12 15.0002L8 16.0002L9 12.0002L18.5 2.50023Z" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<p>
								Москва, ул. Маршала Катукова, д. 13 <br>
								Подъезд 4, этаж 3
							</p>
						</section>

						<section class="-checkout-section">
							<div class="-title">
								<div class="-text">Способ оплаты</div>
								<svg class="-icon step-tabs-trigger" data-num="3" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M18.5 2.50023C18.8978 2.1024 19.4374 1.87891 20 1.87891C20.5626 1.87891 21.1022 2.1024 21.5 2.50023C21.8978 2.89805 22.1213 3.43762 22.1213 4.00023C22.1213 4.56284 21.8978 5.1024 21.5 5.50023L12 15.0002L8 16.0002L9 12.0002L18.5 2.50023Z" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<p>
								Картой онлайн
							</p>
						</section>						

						<section class="-checkout-section">
							<div class="-title">
								<div class="-text">Комментарий к заказу</div>
								<svg class="-icon step-tabs-trigger" data-num="3" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M18.5 2.50023C18.8978 2.1024 19.4374 1.87891 20 1.87891C20.5626 1.87891 21.1022 2.1024 21.5 2.50023C21.8978 2.89805 22.1213 3.43762 22.1213 4.00023C22.1213 4.56284 21.8978 5.1024 21.5 5.50023L12 15.0002L8 16.0002L9 12.0002L18.5 2.50023Z" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<p>
								Пожалуйста, не кладите пластиковые приборы
							</p>
						</section>

						<div class="order__tab-total">
							<div class="-top">
								<div class="-title">Итого</div>
								<ul>
									<li>
										<div class="-item">1. Салат свекольный с майонезом</div>
										<div class="-price">260 ₽</div>
									</li>
									<li>
										<div class="-item">2. Крем-суп тыквенный</div>
										<div class="-price">105 ₽</div>
									</li>
								</ul>
							</div>
							<ul class="-bottom">
								<li>
									<div class="-item">Скидка</div>
									<div class="-price">10 ₽</div>
								</li>
								<li>
									<div class="-item">К оплате</div>
									<div class="-price">155 ₽</div>
								</li>
							</ul>
						</div>

					</div>

				</div>

				<div class="order__body-buttons">
					<div class="-split-buttons">
						<a href="/basket" class="-button typical-button d-block text-center --square --stroke --thin">Отмена</a>
						<div class="-button typical-button d-block text-center --square step-tabs-next">
							Далее
							<svg width="12" height="11" viewBox="0 0 12 11" fill="none">
								<path d="M9.26403 6.05598H0.400024V4.74398H9.26403L5.12002 0.599976H6.96002L11.76 5.39998L6.96002 10.2H5.12002L9.26403 6.05598Z" fill="#1A1A1A"/>
							</svg>
						</div>
					</div>
					<div class="-finish-buttons">
						<button type="submit" class="-button typical-button d-block text-center --square">Оформить заказ</button>
						<a href="/basket" class="-button typical-button d-block text-center --square --stroke --thin">Отменить ввод данных</a>
					</div>
				</div>
				
			</form>

		</div>

	</div>

@endsection