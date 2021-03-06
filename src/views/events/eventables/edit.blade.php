@extends('maintenance::layouts.pages.main.panel')

@section('panel.head.content')
    Edit Event
@stop

@section('panel.body.content')
    {!!
        Form::open([
            'url' => action(currentControllerAction('update'), [$eventable->id, $event->id]),
            'method' => 'PATCH',
            'class' => 'form-horizontal ajax-form-post'
        ])
    !!}

    @include('maintenance::events.form', [
        'event' => $event
    ])

    {!! Form::close() !!}
@stop
