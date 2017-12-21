{!! Form::open(['route' => 'isearch', 'method' => 'get']) !!}
{!! Form::text('query', '', ['placeholder' => trans('header.search')]) !!}
{!! Form::submit('') !!}
{!! Form::close() !!}
