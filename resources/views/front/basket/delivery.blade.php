<form action="/save-order" method="GET" name="order">
    <input name="total" type="text" class="d-none form-control @error('total') is-invalid @enderror" id="phoneOrder"
           value="{{ old('name') }}">
    {{csrf_field()}}
    @error('total')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-lg-8 order-1">
        <div class="profile__block">
            <p class="profile__title">Доставка</p>
            <div class="form-group">
                <label for="phone">Имя</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="phoneOrder"
                       value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input name="phone" class="form-control @error('phone') is-invalid @enderror" type="tel" class="form-control" id="phoneOrder"  value="{{ old('phone') }}">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="adress">Адрес доставки</label>
                <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="adres"  value="{{ old('address') }}"
                       autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                       style="box-sizing: border-box;">
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="suggestions-wrapper">
                    <div class="suggestions-suggestions" style="display: none;"></div>
                </div>
            </div>
            <div class="catalog__wrap">
                <div class="form-group">
                    <label for="porch">Подъезд</label>
                    <input name="entrance" type="text" class="form-control" id="porch"  value="{{ old('entrance') }}">
                </div>
                <div class="form-group">
                    <label for="Intercom">Домофон</label>
                    <input name="intercom" type="text" class="form-control" id="intercom" value="{{ old('intercom') }}">
                </div>
                <div class="form-group">
                    <label for="Floor">Этаж</label>
                    <input name="floor" type="text" class="form-control" id="floor" value="{{ old('floor') }}">
                </div>
                <div class="form-group">
                    <label for="Flat">Квартира</label>
                    <input name="flat" type="text" class="form-control" id="Flat" value="{{ old('flat') }}">
                </div>
                <div class="form-group">
                    <label for="Flat">Купон</label>
                    <input name="cupon" type="text" class="form-control" id="Flat" value="481WSZF3KF">
                </div>
            </div>
            <div class="form-group">
                <textarea name="comment" placeholder="Комментарий к заказу" class="form-control"></textarea>
            </div>
        </div>
        <div class="profile__block">
            <p class="profile__title">Карта доставки</p>
            <img src="https://edabezzabot.net/theme/images/map-delivery.png" class="img-fluid map" alt="карта доставки">
        </div>
        <div class="profile__block">
            <p class="profile__title">Оплата</p>
            <div class="radio__wrap">
                <input type="radio" id="card" name="pay" value="card" class="input-radio" checked="">
                <label for="card" class="radio-label">
                    <span class="radio-btn"></span>
                    Банковской картой
                </label>
            </div>

            <div class="radio__wrap">
                <input type="radio" id="cash" name="payment_method" value="cash" class="input-radio">
                <label for="cash" class="radio-label">
                    <span class="radio-btn"></span>
                    Наличными курьеру
                </label>
            </div>

            <div class="form-group form-group_pay">
                <textarea name="cash" placeholder="Нужна сдача с…" class="form-control"></textarea>
            </div>

            <button style="margin-top: 30px; margin-bottom: 30px" type="submit" class="btn btn-success">Подтвердить и
                оплатить заказ
            </button>
        </div>
    </div>
</form>