@if ($univer->relGalary()->count())
    <div class="__text">
        <h4>@lang('fr.uni_student_life_galary')</h4>

        <div class="imageGallery">
            <ul>
                @foreach ($univer->relGalary as $g)
                    <li>
                        <a href="{{ fileLink($g->photo) }}" style="background: url({{ fileLink($g->photo) }})"><img src="{{ fileLink($g->photo) }}" alt="{{ $g->getNoteTr() }}"></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> 
@endif
