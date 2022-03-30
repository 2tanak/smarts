@extends('main.phone.layout')

@section('title', $title)

@section('content')
    @include('main.phone.univer.__block.__view_menu')
    <section class="section main-tabs">
        <ul>
            <li class="js-open-filter">
                <i class="fa fa-filter"></i>
                @lang('front_main.filter.title')
            </li>
        </ul>
    </section>
    <section class="section view-content univerProgram">
        <div class="container">
            <div>
                <div class="__more" style="padding-top: 0;">
                    <div class="filter">
                        <h4>Фильтр</h4>
                        @include('main.phone.univer.__block.__program_filter', ['program' => $program_model, 'request' => $request])
                    </div>
                    <!--
                    <div class="univerProgramFilterList">	
                        <div class="univerProgramFilterItem">
                            <div class="univerProgramFilterItemText">
                                Бакалавриат
                            </div>
                            <button class="univerProgramFilterItemClose" style="background: url({{asset('images/icons/close.png')}}) no-repeat center/cover">
                                
                            </button>
                        </div>
                        <div class="univerProgramFilterItem">
                            <div class="univerProgramFilterItemText">
                                Архитектура
                            </div>
                            <button class="univerProgramFilterItemClose" style="background: url({{asset('images/icons/close.png')}}) no-repeat center/cover">
                                
                            </button>
                        </div>
                    </div>	
                    -->	
                    @foreach($programs as $program)
                        <div class="univerProgramItem">
                            <div class="univerProgramItemContent">
                                <div class="univerProgramItemHeader">
                                    <div class="univerProgramItemTitle">
                                        {{ $program->name }}
                                    </div>
                                    <div class="univerProgramItemRight">
                                        {{ $program->degree_name }}
                                    </div>
                                </div>
                                <div class="univerProgramItemBody">
                                    <!-- <div class="univerProgramItemBodyTitle">
                                        @lang('fr.discipline')
                                    </div> -->
                                    <div class="univerProgramItemBodyList">
                                        <div class="row">
                                            @foreach ($program->relChilds as $c)
                                                @if ($loop->iteration > 10)
                                                    @break;
                                                @endif
                                                <div class="col-md-6">
                                                    <div class="univerProgramItemBodyListItem">
                                                        {{ $c->getNoteTr() }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    @if ($program->relChilds()->count() > 10)
                                        <a href="#child_detail_{{ $program->id }}" class="popup-modal univerProgramItemBodyMore">
                                            {{ Lang::get('front_main.program.majors') }}
                                        </a>
                                        <div id="child_detail_{{ $program->id }}" class="mfp-hide white-popup-block" style="min-width:300px">
                                            <div class="univerProgramItemBodyListModal">
                                                <div class="univerProgramItemBodyList">
                                                    <div class='row'>
                                                        @foreach ($program->relChilds as $c)
                                                            <div class="col-md-6">
                                                                <div class="univerProgramItemBodyListItem">
                                                                    {{ $c->getNoteTr() }}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! $programs->appends($request->all())->links('vendor.pagination.ss_mobile') !!}
                </div>
            </div>
        </div>
    </section>
@endsection

