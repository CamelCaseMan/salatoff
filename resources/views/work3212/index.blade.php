<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Загрузка товара</title>
</head>
<body>
<div class="container">
    @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <h2>Добавление товара</h2>
    <form method="GET" action="{{route('addwork3212')}}">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Название товара</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <input type="text" class="form-control" id="category_id" name="category_id">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Стоимость товара</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Урл изображения</label>
                    <input type="text" class="form-control" id="image" name="image">
                </div>


                <div class="mb-3">
                    <label for="weight" class="form-label">Вес товара</label>
                    <input type="text" class="form-control" id="weight" name="weight">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="nutrients" class="form-label">Белки</label>
                    <input type="text" class="form-control" id="nutrients" name="nutrients">
                </div>

                <div class="mb-3">
                    <label for="energy" class="form-label">Энергия</label>
                    <input type="text" class="form-control" id="energy" name="energy">
                </div>

                <div class="mb-3">
                    <label for="composition" class="form-label">Состав</label>
                    <input type="text" class="form-control" id="composition" name="composition">
                </div>

                <div class="mb-3">
                    <label for="implementation_period" class="form-label">Срок реализации</label>
                    <input type="text" class="form-control" id="implementation_period" name="implementation_period">
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
    <br>
    <h3 class="text-center">Загружено {{$count}}%</h3>


    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: {{$count}}%" aria-valuenow="{{$count}}"
             aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

<!-- Дополнительный JavaScript; выберите один из двух! -->

<!-- Вариант 1: Bootstrap в связке с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Вариант 2: Bootstrap JS отдельно от Popper
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>