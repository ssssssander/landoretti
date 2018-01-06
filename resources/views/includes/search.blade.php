{!! Form::open(['route' => 'isearch', 'method' => 'get', 'class' => 'search']) !!}
{!! Form::search('query', '', ['placeholder' => trans('header.search')]) !!}
{!! Form::submit('', ['class' => 'icons-magnifying_glass']) !!}
{!! Form::close() !!}
