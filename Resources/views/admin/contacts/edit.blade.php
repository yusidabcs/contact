@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('contact::contacts.title.edit contact') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.contact.contact.index') }}">{{ trans('contact::contacts.title.contacts') }}</a></li>
        <li class="active">{{ trans('contact::contacts.title.edit contact') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.contact.contact.update', $contact->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">

                    <table class="table">

                        <thead>

                        </thead>

                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $contact->email }}</td>
                            </tr>

                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td>{{ $contact->phone }}</td>
                            </tr>

                            <tr>
                                <td>Message</td>
                                <td>:</td>
                                <td>{{ $contact->message }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">

                    @if($contact->last_replys)
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Last Reply</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">

                                <tbody>

                                    <tr>
                                        <td>Message</td>
                                        <td>:</td>
                                        <td>{!! $contact->last_replys->message !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Created at</td>
                                        <td>:</td>
                                        <td>{{ $contact->last_replys->created_at }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Reply Message</h3>
                        </div>
                        <div class="box-body">
                            @include('contact::admin.contacts.partials.edit-fields')
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('contact::contacts.button.reply') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.contact.contact.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.contact.contact.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
