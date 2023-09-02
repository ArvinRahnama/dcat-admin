@php
    $depth = $item['depth'] ?? 0;

    $horizontal = config('admin.layout.horizontal-menu');

    $defaultIcon = config('admin.menu.default_icon', 'feather icon-circle');
@endphp

@if($builder->visible($item))
    @if(empty($item['children']))
        <li class="nav-item">
            <a data-id="{{ $item['id'] ?? '' }}" @if(mb_strpos($item['uri'], '://') !== false || ( isset($item['is_target_blank']) && $item['is_target_blank'] == 1)) target="_blank" @endif
               href="{{ $builder->getUrl($item['uri']) }}"
               class="nav-link {!! $builder->isActive($item) ? 'active' : '' !!}">
                {!! str_repeat('&nbsp;', $depth) !!}<i class="fa fa-fw {{ $item['icon'] ?: $defaultIcon }}"></i>
                <span class="ms-2">
                    {!! $builder->translate($item['title']) !!}
                </span>
            </a>
        </li>
    @else
        <li class="{{ $horizontal ? 'dropdown' : 'has-treeview' }} {{ $depth > 0 ? 'dropdown-submenu' : '' }} nav-item {{ $builder->isActive($item) ? 'menu-open' : '' }}">
            <a href="#sidebar{{ $item['id'] ?? '' }}"  data-id="{{ $item['id'] ?? '' }}"
               class="nav-link {{ $builder->isActive($item) ? ($horizontal ? 'active' : '') : '' }}
                    {{ $horizontal ? 'dropdown-toggle' : '' }}">
                {!! str_repeat('&nbsp;', $depth) !!}<i class="fa fa-fw {{ $item['icon'] ?: $defaultIcon }}"></i>
                <span class="ms-2">
                    {!! $builder->translate($item['title']) !!}
                    @if(! $horizontal)
                        <i class="right fa fa-angle-left"></i>
                    @endif
                </span>
            </a>
            <div class="collapse collapse-box" id="sidebar{{ $item['id'] ?? '' }}">
                <ul class="nav nav-sm flex-column {{ $horizontal ? 'dropdown-menu' : 'nav-treeview' }}">
                    @foreach($item['children'] as $item)
                        @php
                            $item['depth'] = $depth + 1;
                        @endphp

                        @include('admin::partials.menu', ['item' => $item])
                    @endforeach
                </ul>
            </div>
        </li>
    @endif
@endif
