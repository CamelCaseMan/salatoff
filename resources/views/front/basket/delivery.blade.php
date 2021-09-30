<form action="/save-order" method="GET" name="order">
    {{csrf_field()}}
    <div class="col-lg-8 order-1">
        <div class="profile__block">
            <p class="profile__title">Доставка</p>
            <div class="form-group">
                <label for="phone">Имя</label>
                <input name="name" type="text" class="form-control" id="phoneOrder" value="">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input name="phone" type="tel" class="form-control" id="phoneOrder" value="">
            </div>
            <div class="form-group">
                <label for="adress">Адрес доставки</label>
                <input name="adres" type="text" class="form-control suggestions-input" id="adres" value=""
                       autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                       style="box-sizing: border-box;">
                <div class="suggestions-wrapper">
                    <div class="suggestions-suggestions" style="display: none;"></div>
                </div>
            </div>
            <div class="catalog__wrap">
                <div class="form-group">
                    <label for="porch">Подъезд</label>
                    <input name="porch" type="text" class="form-control" id="porch" value="">
                </div>
                <div class="form-group">
                    <label for="Intercom">Домофон</label>
                    <input name="intercom" type="text" class="form-control" id="intercom" value="">
                </div>
                <div class="form-group">
                    <label for="Floor">Этаж</label>
                    <input name="floor" type="text" class="form-control" id="floor" value="">
                </div>
                <div class="form-group">
                    <label for="Flat">Квартира</label>
                    <input name="flat" type="text" class="form-control" id="Flat" value="">
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
                <input type="radio" id="cash" name="pay" value="cash" class="input-radio">
                <label for="cash" class="radio-label">
                    <span class="radio-btn"></span>
                    Наличными курьеру
                </label>
            </div>

            <div class="form-group form-group_pay">
                <textarea name="cash" placeholder="Нужна сдача с…" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-default">Продолжить</button>
        </div>
    </div>
</form>