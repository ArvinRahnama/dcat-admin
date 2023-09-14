<div class="input-group input-group-sm">
    @php
        $radio = new \Dcat\Admin\Widgets\Radio($name, $options);
        if ($inline) $radio->inline();

        $radio->check(request($name, is_null($value) ? [] : $value));

    @endphp
    @if($showLabel)
        <div class="float-start text-capitalize" style="margin-top: 6px;margin-right: 15px;">
            <b>{{ $label }}</b>
        </div>
        <div class="float-start">
            {!! $radio !!}
        </div>
    @else
        {!! $radio !!}
    @endif
</div>