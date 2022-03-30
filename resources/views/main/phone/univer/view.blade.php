@extends('main.phone.layout')

@section('title', $title)

@section('content')
    <div class="manager-button js_manager">
        @lang('front_main.univer.contact_manager')
    </div>
    @include('main.phone.univer.__block.__view_menu')

    @include('main.phone.univer.__block.__view_header')

    <div class="sidebar-card">
        <h3>@lang('front_main.univer.contact')</h3>

        @if ($univer->relData->address_off)
            <p>@lang('front_main.univer.address'):</p>
            <span>{{ $univer->relData->address_off }}</span>
        @endif

        @if ($univer->relData->phones)
            <p>@lang('front_main.univer.phone'):</p>
            <span>{{ $univer->relData->phones }}</span>
        @endif

        @if ($univer->relData->email)
            <p>@lang('front_main.univer.email'):</p>
            <span>{{ $univer->relData->email }}</span>
        @endif

        @if ($univer->relData->web_sait)
            <p>@lang('front_main.univer.sait'):</p>

			@if(isset($url))
                <a href="{{ $univer->relData->web_sait }}" target="_blank"> &nbsp;{{ $url }}</a>
            @else
                <a href="{{ $univer->relData->web_sait }}" target="_blank"> &nbsp;{{ $univer->relData->web_sait }}</a>
            @endif
        @endif

        <div class="socialBlock">
            <p class="social">@lang('fr.social_network'):</p>
            <div class="__social">
                <ul>
                    <li><a href="#" target="_blank"><img src="/images/icons/twitter_t.png" alt=""></a></li>
                    <li><a href="#" target="_blank"><img src="/images/icons/insta.png" alt=""></a></li>
                    <li><a href="#" target="_blank"><img src="/images/icons/youtube.png" alt=""></a></li>
                    <li><a href="#" target="_blank"><img src="/images/icons/facebook-t.png" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section content">
        <div class="univerInfo">
            @if ($univer->cat_name)
                <div class="univerInfoItem univerInfoType">
                    <div class="univerInfoItemTitle">
                        @lang('fr.uni_type')
                    </div>
                    <div class="univerInfoItemBody">
                        {{ $univer->cat_name }}
                    </div>
                </div>
            @endif
            @if ($univer->lang_name)
                <div class="univerInfoItem univerInfoType">
                    <div class="univerInfoItemTitle">
                        @lang('fr.uni_lang')
                    </div>
                    <div class="univerInfoItemBody">
                        {{ $univer->lang_name }}
                    </div>
                </div>
            @endif
            @if ($univer->origin_name)
                <div class="univerInfoItem univerInfoType">
                    <div class="univerInfoItemTitle">
                        @lang('fr.origin_name')
                    </div>
                    <div class="univerInfoItemBody">
                        {{ $univer->origin_name }}
                    </div>
                </div>
            @endif
        </div>
        @if ($univer->relData && $univer->relData->about_text)
            <div class="univerDesc">
                <h4 class="univerDescTitle">
                    @lang('fr.uni_about_text')
                </h4>
                <div class="__text">
                    {!! $univer->relData->about_text !!}
                </div>
            </div>
        @endif


        @if ($univer->relFees()->where('for_citizen_min', '>', 0)->count() || $univer->relFees()->where('for_inter_min', '>', 0)->count())
            <div class="__text">
                <h4>@lang('front_main.univer.costs')</h4>

                <div class="unvierCost">
                    @if ($univer->relFees()->where('for_citizen_min', '>', 0)->count())
                        <div class="univerCostCitizen">
                            <div class="unvierCostTitle">
                                @lang('fr.uni_local_student')
                            </div>
                            <div class="univerCostList">
                                <div class="row">
                                    @foreach ($univer->getDegreeItems() as $degree)
                                        @if (!$univer->getFeeByDegree($degree->id, 'for_citizen_min'))
                                            @continue
                                        @endif
                                        <div class="col-md-4">
                                            <div class="univerCostItem">
                                                <div class="univerCostItemTitle">
                                                    {{ $degree->name }}
                                                </div>
                                                <div class="univerCostItemNum">
                                                    <span>${{ $univer->getFeeByDegree($degree->id, 'for_citizen_min') }}</span> / @lang('fr.uni_in_year')
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($univer->relFees()->where('for_inter_min', '>', 0)->count())
                        <div class="univerCostInter">
                            <div class="unvierCostTitle">
                                @lang('fr.uni_for_student')
                            </div>
                            <div class="univerCostList">
                                <div class="row">
                                    @foreach ($univer->getDegreeItems() as $degree)
                                        @if (!$univer->getFeeByDegree($degree->id, 'for_inter_min'))
                                            @continue
                                        @endif
                                        <div class="col-md-4">
                                            <div class="univerCostItem">
                                                <div class="univerCostItemTitle">
                                                    {{ $degree->name }}
                                                </div>
                                                <div class="univerCostItemNum">
                                                    <span>${{ $univer->getFeeByDegree($degree->id, 'for_inter_min') }}</span> / @lang('fr.uni_in_year')
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="unvierCostInfo">
                        @lang('fr.uni_cost_letter_note')
                    </div>
                </div>
            </div>
        @endif
        @if ($univer->relStat && ($univer->relStat->num_student_total || $univer->relStat->num_teacher_total))
            <div class="__text">
                <div class="studentsTeachers">
                    <h4 class="studentsTeacherTitle">
                        @lang('fr.uni_stat_block')
                    </h4>
                    <div class="studentsTeachersRow">
                        @if ($univer->relStat->num_student_total )
                            <div class="students studentsTeachersCol">
                                <div class="studentsTeachersColLeft">
                                    <div class="studentsTeachersColAll studentsTeachersColItem total">
                                        <div class="studentsTeachersColItemTitle">
                                            @lang('fr.uni_all_count')
                                        </div>
                                        <div class="studentsTeachersColItemNum">
                                            {{ $univer->relStat->num_student_total }}
                                        </div>
                                    </div>

                                    @if ($univer->relStat->num_student_citizen && $univer->relStat->num_student_inter)
                                        <div class="studentsTeachersColItem citizen">
                                            <div class="studentsTeachersColItemTitle">
                                                @lang('front_main.univer.num_student_citizen')
                                            </div>
                                            <div class="studentsTeachersColItemNum">
                                                {{ $univer->relStat->num_student_citizen }}
                                            </div>
                                        </div>
                                        <div class="studentsTeachersColItem inter">
                                            <div class="studentsTeachersColItemTitle">
                                                @lang('front_main.univer.num_student_inter')
                                            </div>
                                            <div class="studentsTeachersColItemNum">
                                                {{ $univer->relStat->num_student_inter }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if ($univer->relStat->num_student_citizen && $univer->relStat->num_student_inter)
                                    <div class="studentsTeachersColRight">
                                        <canvas id="diagram" class="diagram" width="130" height="130"></canvas>
                                        <div class="count">
                                            {{ $univer->relStat->num_student_total }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @if ($univer->relStat->num_teacher_total)
                            <div class="teachers studentsTeachersCol">
                                <div class="studentsTeachersColLeft">
                                    <div class="studentsTeachersColAll studentsTeachersColItem total">
                                        <div class="studentsTeachersColItemTitle">
                                            @lang('fr.uni_total_teacher_count')
                                        </div>
                                        <div class="studentsTeachersColItemNum">
                                            {{ $univer->relStat->num_teacher_total }}
                                        </div>
                                    </div>

                                    @if ($univer->relStat->num_teacher_citizen && $univer->relStat->num_teacher_inter)
                                        <div class="studentsTeachersColItem citizen">
                                            <div class="studentsTeachersColItemTitle">
                                                @lang('front_main.univer.num_teacher_citizen')
                                            </div>
                                            <div class="studentsTeachersColItemNum">
                                                {{ $univer->relStat->num_teacher_citizen }}
                                            </div>
                                        </div>
                                        <div class="studentsTeachersColItem inter">
                                            <div class="studentsTeachersColItemTitle">
                                                @lang('front_main.univer.num_teacher_inter')
                                            </div>
                                            <div class="studentsTeachersColItemNum">
                                                {{ $univer->relStat->num_teacher_inter }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if ($univer->relStat->num_teacher_citizen && $univer->relStat->num_teacher_inter)
                                    <div class="studentsTeachersColRight">
                                        <canvas id="diagram" class="diagram" width="130" height="130"></canvas>
                                        <div class="count">
                                            {{ $univer->relStat->num_teacher_total }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if ($univer->relDormitory &&  $univer->relDormitory->note)
                <div class="__text">
                    <h4>@lang('front_main.univer.dormitory')</h4>
                    <p>{!! $univer->relDormitory->note !!}</p>

                    @if ($univer->relDormitory->cost_min || $univer->relDormitory->cost_max)
                        <div class="__flex">
                            @if ($univer->relDormitory->cost_min)
                                <p>@lang('front_main.univer.dormitory_min') <span>{{ $univer->relDormitory->cost_min }} $</span></p>
                            @endif
                            @if ($univer->relDormitory->cost_max)
                                <p>@lang('front_main.univer.dormitory_max') <span>{{ $univer->relDormitory->cost_max }} $</span></p>
                            @endif
                        </div>
                    @endif
                </div>
            @endif
        @endif

        @if ($univer->relData && ($univer->relData->is_campus || $univer->relData->is_library || $univer->relData->is_career
                                                || $univer->relData->is_clubs || $univer->relData->is_med_insurance || $univer->relData->is_inter_programm))
            <div class="__text extra">
                <h4>@lang('fr.uni_addition')</h4>
                @if ($univer->relData->is_campus)
                    <div class="extraItem">
                        <div class="extraItemText">
                            @lang('fr.is_campus')
                        </div>
                        <img src="{{asset('images/icons/check.png')}}" alt="">
                    </div>
                @endif
                @if ($univer->relData->is_library)
                    <div class="extraItem">
                        <div class="extraItemText">
                            @lang('fr.is_library')
                        </div>
                        <img src="{{asset('images/icons/check.png')}}" alt="">
                    </div>
                @endif
                @if ($univer->relData->is_career)
                    <div class="extraItem">
                        <div class="extraItemText">
                            @lang('fr.is_career')
                        </div>
                        <img src="{{asset('images/icons/check.png')}}" alt="">
                    </div>
                @endif
                @if ($univer->relData->is_clubs)
                    <div class="extraItem">
                        <div class="extraItemText">
                            @lang('fr.is_clubs')
                        </div>
                        <img src="{{asset('images/icons/check.png')}}" alt="">
                    </div>
                @endif
                @if ($univer->relData->is_med_insurance)
                    <div class="extraItem">
                        <div class="extraItemText">
                            @lang('fr.is_med_insurance')
                        </div>
                        <img src="{{asset('images/icons/check.png')}}" alt="">
                    </div>
                @endif
                @if ($univer->relData->is_inter_programm)
                    <div class="extraItem">
                        <div class="extraItemText">
                            @lang('fr.is_inter_programm')
                        </div>
                        <img src="{{asset('images/icons/check.png')}}" alt="">
                    </div>
                @endif
            </div>
        @endif

        @if ($univer->relDeadLineApps->count())
            <div class="__text time">
                <h4>@lang('fr.uni_app_dealdine')</h4>
                <table class="timeTable">
                    <thead>
                        <tr>
                            <td> @lang('fr.uni_app_dealdine_date') </td>
                            <td> @lang('fr.uni_app_dealdine_note')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($univer->relDeadLineApps as $d)
                            <tr>
                                <td>{{ $d->getDateTr() }}</td>
                                <td>{{ $d->getNoteTr() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if ($univer->relRequirements->count() || $univer->relData->sait_priem)
            <div class="__text requirements">
                <h4>@lang('fr.uni_requered')</h4>

                @foreach ($univer->relRequirements as $r)
                    <div class="requirementsItem">
                        <div class="requirementsItemTitle">
                            {{ $r->relRequirement->name }}
                        </div>
                        <div class="requirementsItemText">
                            {{ $r->getNoteTr() }}
                        </div>
                    </div>
                @endforeach
                @if ($univer->relData->sait_priem)
                    <div class="requirementsItemFooter">
                        <div class="requirementsItemFooterTitle">
                            @lang('fr.uni_priem_siat')
                        </div>
                        <a href="//{{ $univer->relData->sait_priem }}" class="requirementsItemFooterText" target="_blank">
                            {{ $univer->relData->sait_priem_clean }}
                        </a>
                    </div>
                @endif
            </div>
        @endif
    </section>

    @include('main.phone.univer.__block.__connect_manager')
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $('.studentsTeachersCol').each(function(i, item) {
        var ctx = $(item).find(".diagram")

        var total = +$(item).find('.total').find('.studentsTeachersColItemNum').html()
        var citizen = +$(item).find('.citizen').find('.studentsTeachersColItemNum').html()
        var inter = +$(item).find('.inter').find('.studentsTeachersColItemNum').html()

        let citizenTitle = $(item).find('.citizen').find('.studentsTeachersColItemTitle').html()
        let interTitle = $(item).find('.inter').find('.studentsTeachersColItemTitle').html()

        var citizenPerc = Math.round(citizen * 100 / total);
        var interPerc = Math.round(inter * 100 / total);

        $(item).find('.citizen').find('.studentsTeachersColItemNum').html(citizenPerc + '%')
        $(item).find('.inter').find('.studentsTeachersColItemNum').html(interPerc + '%')

        new Chart(ctx, {
            "type":"doughnut",
            "data": {
                "labels":[$.trim(citizenTitle),$.trim(interTitle)],
                "datasets": [
                    {
                        "label":"My First Dataset",
                        "data":[citizen,inter],
                        "backgroundColor": [
                            "#6AC142",
                            "#FFC120",
                        ]
                    }
                ]
            },
            options: {
                legend: {
                    display: false,
                },
                cutoutPercentage: 60,
                rotation: 1.6,
            }
        });
    });
</script>
@endsection

@section('top_js')
    <script src="https://yastatic.net/share2/share.js" async="async" charset="utf-8"></script>
@endsection
