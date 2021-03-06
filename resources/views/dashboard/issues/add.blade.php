@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="fa fa-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="fa fa-exclamation-circle"></i> {{ trans('dashboard.issues.issues') }}
        </span>
        &gt; <small>{{ trans('dashboard.issues.add.title') }}</small>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                @include('dashboard.partials.errors')
                <form class="form-horizontal" name="IssueForm" role="form" method="POST" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label" for="issue-name">{{ trans('forms.issues.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="issue-name" required value="{{ Input::old('issue.name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="issue-name">{{ trans('forms.issues.status') }}</label>
                            <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="status" value="1">
                                <i class="fa fa-flag"></i>
                                {{ trans('gitamin.issues.status')[1] }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="2">
                                <i class="fa fa-exclamation-circle"></i>
                                {{ trans('gitamin.issues.status')[2] }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="3">
                                <i class="fa fa-eye"></i>
                                {{ trans('gitamin.issues.status')[3] }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="4">
                                <i class="fa fa-check-circle"></i>
                                {{ trans('gitamin.issues.status')[4] }}
                            </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="issue-name">{{ trans('forms.issues.visibility') }}</label>
                            <div class="col-sm-10">
                            <select name='visible' class="form-control">
                                <option value='1' selected>{{ trans('forms.issues.public') }}</option>
                                <option value='0'>{{ trans('forms.issues.logged_in_only') }}</option>
                            </select>
                            </div>
                        </div>
                        @if(!$projects_in_teams->isEmpty() || !$projects_out_teams->isEmpty())
                        <div class="form-group">
                            <label class="control-label">{{ trans('forms.issues.project') }} <small class="text-muted">{{ trans('forms.optional') }}</small></label>
                            <div class="col-sm-10">
                            <select name='project_id' class='form-control'>
                                <option value='0' selected></option>
                                @foreach($projects_in_teams as $team)
                                <optgroup label="{{ $team->name }}">
                                    @foreach($team->projects as $project)
                                    <option value='{{ $project->id }}'>{{ $project->name }}</option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                                @foreach($projects_out_teams as $project)
                                <option value='{{ $project->id }}'>{{ $project->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label">{{ trans('forms.issues.message') }}</label>
                            <div class="col-sm-10">
                            <div class='markdown-control'>
                                <textarea name="message" class="form-control autosize" rows="4" required>{{ Input::old('issue.message') }}</textarea>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ trans('forms.issues.issue_time') }} <small class="text-muted">{{ trans('forms.optional') }}</small></label>
                            <div class="col-sm-10">
                            <input type="text" name="created_at" class="form-control" rel="datepicker-any">
                            </div>
                        </div>
                        @if(subscribers_enabled())
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="notify" value="1" checked="{{ Input::old('issue.message', 'checked') }}">
                                {{ trans('forms.issues.notify_subscribers') }}
                            </label>
                        </div>
                        @endif
                    </fieldset>

                    <div class="form-actions">
                            <button type="submit" class="btn btn-success">{{ trans('forms.add') }}</button>
                            <a class="btn btn-default" href="{{ route('dashboard.issues.index') }}">{{ trans('forms.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
