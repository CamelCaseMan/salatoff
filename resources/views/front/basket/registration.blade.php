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
				<div class="-num">Шаг 1 из 5</div>
				<div class="-line">
					<div class="-passed" style="width: 20%;"></div>
				</div>
			</div>

			<form class="order__body-content">

				<div class="step-tabs-wrapper mb-40">

					<div class="step-tabs-tab order__tab">

						<div class="order__body-title mb-40">
							<div class="-title">Ваши данные</div>
						</div>
	
						<div class="superform order__form">

							<div class="order__form-row">
								<section class="-form-section">
										<label class="-prefix" for="tab-001-name">Ваше имя <span class="-star">*</span></label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style --required" name="name" id="tab-001-name" type="text" placeholder="Ваше имя">
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
										<label class="-prefix" for="tab-002-phone">Контактный номер <span class="-star">*</span></label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style --required input-phone" name="phone" id="tab-002-phone" placeholder="+7 (___) ___ ____" type="tel">
											<!-- * Это сообщение об ошибке -->
											<div class="-error-message">Обязательное поле</div>
											<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
											<!-- <div class="-message">Сообщение к полю</div> -->
										</div>
								</section>
								<section class="-form-section">
										<label class="-prefix" for="tab-002-email">E-mail</label>
										<div class="valinput">
											<!-- * Если успешно, то "--success", нет — "--error" -->
											<input class="input-style" name="email" id="tab-002-email" type="text" placeholder="example@mail.ru">
											<!-- * Это сообщение об ошибке -->
											<div class="-error-message">Обязательное поле</div>
											<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
											<!-- <div class="-message">Сообщение к полю</div> -->
										</div>
								</section>
							</div>

						</div>

					</div>
					
					<div class="step-tabs-tab order__tab">

						<div class="order__body-title mb-30">
							<div class="-back">← Назад</div>
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
										<input readonly type="text" name="date" class="input-style" id="datepicker" placeholder="Выберите дату">
										<!-- * Это сообщение об ошибке -->
										<div class="-error-message">Обязательное поле</div>
										<!-- * Если нужно доп. сообщение под инпутом (размещать под -error-message): -->
										<!-- <div class="-message">Сообщение к полю</div> -->
									</div>
								</section>
							</div>
						</div>

					</div>

					<div class="step-tabs-tab order__tab active">

						<div class="order__body-title mb-30">
							<div class="-back">← Назад</div>
							<div class="-title">Адрес доставки</div>
						</div>

						<a class="-link" href="/">Показать карту зоны доставки</a>
	
						<div class="superform order__form">
							<div class="order__form-row">
								<section class="-form-section">
									
								</section>
							</div>
						</div>

					</div>

				</div>

				<div class="order__body-buttons">
					<div class="-split-buttons">
						<div class="-button typical-button d-block text-center --square --stroke --thin">Отмена</div>
						<div class="-button typical-button d-block text-center --square">
							Далее
							<svg width="12" height="11" viewBox="0 0 12 11" fill="none">
								<path d="M9.26403 6.05598H0.400024V4.74398H9.26403L5.12002 0.599976H6.96002L11.76 5.39998L6.96002 10.2H5.12002L9.26403 6.05598Z" fill="#1A1A1A"/>
							</svg>
						</div>
					</div>
					<div class="-finish-buttons">
						<div class="-button typical-button d-block text-center --square">Оформить заказ</div>
						<div class="-button typical-button d-block text-center --square --stroke --thin">Отменить ввод данных</div>
					</div>
				</div>
				
			</form>

		</div>

	</div>

@endsection