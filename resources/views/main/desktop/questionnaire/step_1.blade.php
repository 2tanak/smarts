@extends('main.desktop.layout')

@section('title', $title)

@section('content')

    <div class="content">
        <div class="line_status" style="width: calc({{($step / $max_step) * 100 }}%)"></div>
        <div class="step_tabs">
            <ul>
                <li>Направления</li>
                <li>
                    <img src="/images/flags/40.png" alt="">
                    Kazakhstan
                </li>
                <li>Докторантура</li>
                <li>10 000–20 000 £/год</li>
            </ul>
        </div>

        @if($step == 1)
            <div class="variant_card">
                <p class="text">Выберите вариант поиска:</p>
                <div class="level">
                    <img src="/images/icons/varian_left.png" alt="">
                    <p>1/ <span>6</span></p>
                    <img src="/images/icons/varian_right.png" alt="">
                </div>

                <div class="btn-group">
                    <a href="#" class="button_green-border mr-1">Университеты</a>
                    <a href="#" class="button_green-border ml-1">Направления</a>
                </div>
            </div>
        @endif
        @if($step == 2)
            <div class="variant_card">
                <p class="text">Выберите страну обучения:</p>
                <div class="level">
                    <img src="/images/icons/varian_left.png" alt="">
                    <p>2/ <span>6</span></p>
                    <img src="/images/icons/varian_right.png" alt="">
                </div>


                <div class="global_select mb-3">
                    <select class="js_flag_select  js-states form-control">
                        <option value="40" >test</option>
                    </select>
                </div>
            </div>
        @endif
        @if($step == 3)
            <div class="variant_card">
                <p class="text">Выберите страну обучения:</p>
                <div class="level">
                    <img src="/images/icons/varian_left.png" alt="">
                    <p>3/ <span>6</span></p>
                    <img src="/images/icons/varian_right.png" alt="">
                </div>

                <div class="global_select mb-3">
                    <select class="js_flag_select  js-states form-control">
                        <option value="40" >test</option>
                    </select>
                </div>

                <a href="#" class="button-green mt-5">Далее</a>
            </div>
        @endif
        @if($step == 4)
            <div class="variant_card">
                <p class="text">Выберите интересующую вас образовательную ступень</p>
                <div class="level">
                    <img src="/images/icons/varian_left.png" alt="">
                    <p>1/ <span>6</span></p>
                    <img src="/images/icons/varian_right.png" alt="">
                </div>

                <div class="btn-group">
                    <a href="#" class="button_green-border mr-1">Бакалавриат</a>
                    <a href="#" class="button_green-border ml-1 mr-1">Магистратура</a>
                    <a href="#" class="button_green-border ml-1">Докторантура</a>
                </div>
            </div>
        @endif
        @if($step == 5)
            <div class="variant_card">
                <p class="text"> Укажите подходящую стоимость</p>
                <div class="level">
                    <img src="/images/icons/varian_left.png" alt="">
                    <p>5/ <span>6</span></p>
                    <img src="/images/icons/varian_right.png" alt="">
                </div>

                <div class="grid-checkbox">
                    <div class="global_checkbox">
                        <input type="checkbox" id="check-m-connect_1" name="connect_email" value='1'>
                        <label for="check-m-connect_1" style="color:#212529">0–5000 £/год </label>
                    </div>
                    <div class="global_checkbox">
                        <input type="checkbox" id="check-m-connect_2" name="connect_email" value='1'>
                        <label for="check-m-connect_2" style="color:#212529">5 000–10 000 £/год </label>
                    </div>
                    <div class="global_checkbox">
                        <input type="checkbox" id="check-m-connect_3" name="connect_email" value='1'>
                        <label for="check-m-connect_3" style="color:#212529">10 000–20 000 £/год</label>
                    </div>
                </div>

                <a href="#" class="button-green mt-5">Далее</a>
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

