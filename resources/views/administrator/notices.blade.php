@extends('layouts.administrator_authed')

@section('content')
<div class="uk-margin">
    <h1 class="uk-inline uk-margin-remove">
        お知らせの管理
    </h1>
    <button class="uk-margin-left uk-button uk-button-primary" href="#add-modal" uk-toggle>
        追加
    </button>
</div>

<form class="form-horizontal" method="GET">
    <div class="uk-margin uk-grid-small uk-flex-bottom" uk-grid>
        <div class="uk-width-medium@s">
            <label class="uk-form-label" for="notice_status_id">
                ステータス
            </label>
            <div class="uk-form-controls">
                @include('component.input.notice_status', [ 'value' => isset($params['notice_status_id']) ? $params['notice_status_id']: null, "required" => false ])
            </div>
        </div>
        <div class="uk-width-large@s">
            <label class="uk-form-label" for="title">
                タイトル
            </label>
            <div class="uk-form-controls">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        <input class="uk-input" type="text" name="title" value="{{ isset($params['title']) ? $params['title']: null }}">
                    </div>
                    <div class="uk-width-auto">
                        <button type="submit" class="uk-button uk-button-primary">
                            検索
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-auto">
            <a class="uk-button uk-button-default" href="?">
                クリア
            </a>
        </div>
    </div>
</form>

<div class="uk-margin uk-overflow-auto">
    <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
        <thead>
            <tr>
                <th class="uk-table-shrink">
                    @include("component.part.sorter", ["order" => "notice_status_id", "label" => "status", "params" => $params])
                </th>
                <th class="uk-width-small">
                    @include("component.part.sorter", ["order" => "publish_date", "label" => "公開日", "params" => $params])
                </th>
                <th class="uk-width-small">
                    @include("component.part.sorter", ["order" => "title", "label" => "タイトル", "params" => $params])
                </th>
                <th class="uk-table-expand">
                    本文
                </th>
                <th class="uk-table-small">
                    操作
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notices as $notice)
            <tr>
                <td>
                    {{$notice->noticeStatus->label}}
                </td>
                <td>
                    @date($notice->publish_date)
                </td>
                <td>
                    {{$notice->title}}
                </td>
                <td>
                    @lined($notice->description)
                </td>
                <td>
                    <span class="uk-margin-small-right">
                        <button class="uk-icon-button" uk-icon="icon: file-edit" href="#edit-modal_{{$notice->id}}" uk-toggle>
                        </button>
                        <div id="edit-modal_{{$notice->id}}" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-modal-header">
                                    <h2 class="uk-modal-title">お知らせの編集</h2>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('administrator.notices.edit', ['notice' => $notice]) }}">
                                    {{ csrf_field() }}
                                    <div class="uk-modal-body" uk-overflow-auto>
                                        @component('component.editor.notice', ['notice' => $notice ])
                                        @endcomponent
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <a class="uk-button uk-button-default uk-modal-close">キャンセル</a>
                                        <button class="uk-button uk-button-primary" type="submit">保存</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </span>
                    <span class="uk-margin-small-right">
                        <form class="uk-display-inline-block" method="POST" action="{{ route('administrator.notices.delete', ['notice' => $notice->id]) }}" onSubmit="confirmDelete(event)">
                            {{ csrf_field() }}
                            <button class="uk-icon-button uk-button-danger" uk-icon="icon: trash">
                            </button>
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="uk-margin">
    {{ $notices->appends(isset($params)? $params: [])->links() }}
</div>

<div id="add-modal" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">お知らせの新規追加</h2>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('administrator.notices.add') }}">
            {{ csrf_field() }}
            <div class="uk-modal-body" uk-overflow-auto>
                @component('component.editor.notice', ['notice' => null ])
                @endcomponent
            </div>
            <div class="uk-modal-footer uk-text-right">
                <a class="uk-button uk-button-default uk-modal-close">キャンセル</a>
                <button class="uk-button uk-button-primary" type="submit">保存</button>
            </div>
        </form>
    </div>
</div>
@endsection
