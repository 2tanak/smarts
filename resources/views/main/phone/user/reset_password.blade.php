@extends('main.desktop.layout')

@section('title', $title)

@section('content')

    <div class="reset_password-page register">
        @if($step == 1)
            <div>
                <h4 class="title">
                    Восстановление пароля
                </h4>
                <div class="global_input">
                    <p>Email*</p>
                    <input type="email" name="email" required>
                </div>

                <button class="button-green__cercle">восстановить</button>

                <div class="more">
                    Есть аккаунт?  <a href="#">Войдите</a>
                </div>
            </div>
        @endif

        @if($step == 2)
            <div>
                <h4 class="title">
                    Восстановление пароля
                </h4>

                <p class="send">
                    На ваш email <span>dsadasd@lsdad.com</span> Было отправлено письмо с восстановлением пароля. Следуйте инструкции из письма
                </p>

                <button class="button-green__cercle">войти</button>
            </div>
        @endif

        @if($step == 3)
            <div>
                <h4 class="title">Смена пароля</h4>

                <div class="global_input">
                    <p>Новый пароль*</p>
                    <input type="email" name="email" required>
                </div>

                <div class="global_input">
                    <p>Подтвердите пароль*</p>
                    <input type="email" name="email" required>
                </div>

                <button class="button-green__cercle">сменить пароль</button>
            </div>
        @endif

        @if($step == 4)
            <div>
                <h4 class="title">Смена пароля</h4>

                <p class="send mt-5">Вы успешно сменили пароль</p>

                <button class="button-green__cercle">войти</button>
            </div>
        @endif
    </div>

@endsection

@section('style')
@endsection

@section('script')
    <script>

    </script>
@endsection

