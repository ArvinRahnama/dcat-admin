<div class="grid-selector">
    @foreach($self->all(true) as $column => $selector)
        <div class="wrap">
            <div class="select-label">{{ $selector['label'] }}</div>
            <div class="select-options">
                <ul>
                    @foreach($selector['options'] as $value => $option)
                        @php
                            $active = in_array((string) $value, \Illuminate\Support\Arr::get($selected, $column, []), true);
                        @endphp
                        <li>
                            <a href="{{ $self->url($column, $value, true) }}"
                               class="{{$active ? 'active' : ''}}">{{ $option }}</a>
                            @if(!$active && $selector['type'] == 'many')
                                &nbsp;
                                <a href="{{ $self->url($column, $value) }}" class="add"><i class="fas fa-plus-square"></i></a>
                            @else
                                <a style="visibility: hidden;"><i class="fas fa-plus-square"></i></a>
                            @endif
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ $self->url($column) }}" class="clear"><i class="fas fa-trash"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
</div>
