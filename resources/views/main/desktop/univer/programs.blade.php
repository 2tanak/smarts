@extends('main.desktop.layout')

@section('title', $title)

@section('content')
    @include('main.desktop.univer.__block.__view_header')
    @include('main.desktop.univer.__block.__view_menu')
    <section class="section view-content univerProgram">
        <div class="container">
            <div>
                <div class="__more" style="padding-top: 0;">
                    @include('main.desktop.univer.__block.__program_filter', ['program' => $program_model, 'request' => $request])

                    {{-- <div class="list_filter__items">
                        <ul>
                            <li>Бакалавриат <i class="fa fa-times"></i></li>
                            <li>Архитектура <i class="fa fa-times"></i></li>
                        </ul>
                    </div> --}}

				    @foreach($programs as $program)
                        <div class="univerProgramItem">
                            <div class="univerProgramItemContent">
                                <div class="univerProgramItemHeader" data-id="{{ $program->id}}">
                                    <div class="univerProgramItemTitle">
                                        {{ $program->name }}
                                    </div>
                                    <div class="univerProgramItemRight">
                                        {{ $program->degree_name }}
                                    </div>
                                </div>
                                <div class="univerProgramItemBody id_{{ $program->id}}">
                                    <div class="univerProgramItemBodyList">
                                        <div class="row">
                                            @foreach ($program->relChilds as $c)
                                                @if ($loop->iteration > 10)
                                                    @break;
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="univerProgramItemBodyListItem">
                                                        {{ $c->getNoteTr() }}
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- <div class="col-md-6">
                                                @foreach ($program->relChilds as $c)
                                                    @if ($loop->iteration > 8)
                                                        @break;
                                                    @endif
                                                    @if($loop->iteration % 2 == 0)
                                                        <div class="univerProgramItemBodyListItem">
                                                            {{ $c->getNoteTr() }}
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-md-6">
                                                @foreach ($program->relChilds as $c)
                                                    @if ($loop->iteration > 8)
                                                        @break;
                                                    @endif
                                                    @if($loop->iteration % 2 == 1)
                                                        <div class="univerProgramItemBodyListItem">
                                                            {{ $c->getNoteTr() }}
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    @if ($program->relChilds()->count() > 10)
                                        <a href="#child_detail_{{ $program->id }}" class="popup-modal univerProgramItemBodyMore">
                                            {{ Lang::get('front_main.program.majors') }}
                                        </a>
                                        <div id="child_detail_{{ $program->id }}" class="mfp-hide white-popup-block" style="min-width:1000px">
                                            <div class="univerProgramItemBodyListModal">
                                                <div class="univerProgramItemBodyList">
                                                    <div class='row'>
                                                        @foreach ($program->relChilds as $c)
                                                            <div class="col-md-12">
                                                                <div class="univerProgramItemBodyListItem">
                                                                    {{ $c->getNoteTr() }}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <!-- <div class="col-md-6">
                                                            @foreach ($program->relChilds as $c)
                                                                @if($loop->iteration % 2 == 0)
                                                                    <div class="univerProgramItemBodyListItem">
                                                                        {{ $c->getNoteTr() }}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-6">
                                                            @foreach ($program->relChilds as $c)
                                                                @if($loop->iteration % 2 == 1)
                                                                    <div class="univerProgramItemBodyListItem">
                                                                        {{ $c->getNoteTr() }}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! $programs->appends($request->all())->links('vendor.pagination.ss') !!}
                </div>
            </div>



            @include('main.desktop.univer.__block.__view_sidebar')
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('.menu li.program').removeClass('active')
    </script>
@endsection

