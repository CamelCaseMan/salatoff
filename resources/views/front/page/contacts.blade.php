@extends('front.master')

@section('content')

<div class="contacts-page container mb-160 l-mb-120">

	<div class="product-page__back mb-30 xs-mb-20">
			<a href="{{ URL::previous() }}">
					<svg width="12" height="11" viewBox="0 0 12 11" fill="none">
							<path d="M0.240234 5.39998L5.04023 0.599976H6.88023L2.73623 4.74398H11.6002V6.05598H2.73623L6.88023 10.2H5.04023L0.240234 5.39998Z"
										fill="#1A1A1A"/>
					</svg>
					Назад
			</a>
	</div>

	<h2 class="second-title">Контактная информация</h2>

	<div class="contacts__split">
		<div class="contacts__info">
			<div class="contacts__info-block">
				<div class="-title">ООО «Кухня №1»</div>
				<p class="-text">
					ИНН/КПП 7726752821/772601001  <br>
					Юридический адрес: Россия, г Москва, ул. Кировоградская 22 Г. <br>
					Фактический адрес: Россия, г Москва, ул. Кировоградская 22 Г. <br>
					Тел./Факс: +7 (495) 797 64 57
				</p>
			</div>
			<div class="contacts__info-block --important">
				<div class="-title">Руководитель отдела продаж</div>
				<p class="-text">
					Позднякова Наиля: +7 (964) 504-48-70 <br>
					Nailya@salatoff.ru 
				</p>
			</div>
			<div class="contacts__info-block">
				<div class="-title">Предложения по поставкам сырья</div>
				<p>
					Менеджер отдела закупок Ирина Ким: +7 (921) 992 70 87<br>
					0707816@mail.ru
				</p>
			</div>
			<div class="contacts__info-block">
				<div class="-title">Мы можем организовать дегустацию на вашем предприятии или в сети наших кулинарий-кондитерских "Беззабот" по адресам</div>
				<p class="-text">
					МО, г. Одинцово, ул. Молодежная д. 46 <br>	
					МО, г .Одинцово, улица Говорова д. 24А.
				</p>
			</div>
		</div>

		<div class="contacts__images">
			<div class="-img" style="background-image: url({{asset('theme')}}/img/contacts/1.jpeg);"></div>
			<div class="-img" style="background-image: url({{asset('theme')}}/img/contacts/2.jpg);"></div>
			<div class="-img" style="background-image: url({{asset('theme')}}/img/contacts/3.jpeg);"></div>
			<div class="-img" style="background-image: url({{asset('theme')}}/img/contacts/4.jpeg);"></div>
			<div class="-img" style="background-image: url({{asset('theme')}}/img/contacts/5.jpeg);"></div>
			<div class="-img" style="background-image: url({{asset('theme')}}/img/contacts/6.jpeg);"></div>
		</div>
	</div>

</div>

@endsection