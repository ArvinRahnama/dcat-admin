@if ($grid->allowToolbar())
    <div class="custom-data-table-header">
        <div class="table-responsive">
            <div class="d-block clearfix p-0">
                @if(!empty($title))
                    <h4 class="float-start" style="margin:5px 10px 0;">
                        {!! $title !!}&nbsp;
                        @if(!empty($description))
                            <small>{!! $description!!}</small>
                        @endif
                    </h4>
                    <div class="float-end" data-responsive-table-toolbar="{{$tableId}}">
                        {!! $grid->renderTools() !!}
                        {!! $grid->renderColumnSelector() !!}
                        {!! $grid->renderCreateButton() !!}
                        {!! $grid->renderExportButton() !!}
                        {!! $grid->renderQuickSearch() !!}
                    </div>
                @else
                    {!! $grid->renderTools() !!}  {!! $grid->renderQuickSearch() !!}

                    <div class="float-end" data-responsive-table-toolbar="{{$tableId}}">
                        {!! $grid->renderColumnSelector() !!}
                        {!! $grid->renderCreateButton() !!}
                        {!! $grid->renderExportButton() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif