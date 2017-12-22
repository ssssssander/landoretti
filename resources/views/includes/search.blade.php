{!! Form::open(['route' => 'isearch', 'method' => 'get', 'class' => 'search']) !!}
{!! Form::text('query', '', ['placeholder' => trans('header.search')]) !!}
{!! Form::submit('') !!}
{!! Form::close() !!}
