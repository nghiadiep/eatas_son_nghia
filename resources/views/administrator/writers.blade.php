@extends('layouts.administrator_authed')

@section('content')
<div class="uk-margin">
    <h1 class="uk-inline uk-margin-remove">
        ライターの管理
    </h1>
    <button class="uk-margin-left uk-button uk-button-primary" href="#add-writer-modal" uk-toggle>
        追加
    </button>
</div>

<form class="form-horizontal" method="GET">
    <div class="uk-margin uk-grid-small uk-flex-bottom" uk-grid>
        <div class="uk-width-medium@s">
            <label class="uk-form-label" for="pen_name">
                ペンネーム
            </label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="pen_name" value="{{ isset($params['pen_name']) ? $params['pen_name']: null }}">
            </div>
        </div>
        <div class="uk-width-large@s">
            <label class="uk-form-label" for="email">
                メールアドレス
            </label>
            <div class="uk-form-controls">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        <input class="uk-input" type="text" name="email" value="{{ isset($params['email']) ? $params['email']: null }}">
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
                <th>
                    @include("component.part.sorter", ["order" => "pen_name", "label" => "ペンネーム", "params" => $params])
                </th>
                <th>
                    @include("component.part.sorter", ["order" => "email", "label" => "メールアドレス", "params" => $params])
                </th>
                <th>
                    操作
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($writers as $writer)
            <tr>
                <td>
                    {{$writer->pen_name}}
                </td>
                <td>
                    {{$writer->email}}
                </td>
                <td>
                    <span class="uk-margin-small-right">
                        <button class="uk-icon-button" uk-icon="icon: file-edit" href="#edit-writer-modal_{{$writer->id}}" uk-toggle>
                        </button>
                        <div id="edit-writer-modal_{{$writer->id}}" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-modal-header">
                                    <h2 class="uk-modal-title">ライター情報の編集</h2>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('administrator.writers.edit', ['writer' => $writer]) }}">
                                    {{ csrf_field() }}
                                    <div class="uk-modal-body" uk-overflow-auto>
                                        @component('component.editor.writer', ['writer' => $writer, 'form' => 'attribute_only' ])
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
                        <button class="uk-icon-button" uk-icon="icon: lock" href="#rest-writer-modal_{{$writer->id}}" uk-toggle>
                        </button>
                        <div id="rest-writer-modal_{{$writer->id}}" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-modal-header">
                                    <h2 class="uk-modal-title">パスワードのリセット</h2>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('administrator.writers.resetPassword', ['writer' => $writer]) }}">
                                    {{ csrf_field() }}
                                    <div class="uk-modal-body" uk-overflow-auto>
                                        @component('component.editor.writer', ['writer' => $writer, 'form' => 'password_only' ])
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
                        <form class="uk-display-inline-block" method="POST" action="{{ route('administrator.writers.delete', ['writer' => $writer->id]) }}" onSubmit="confirmDelete(event)">
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
    {{ $writers->appends(isset($params)? $params: [])->links() }}
</div>

<div id="add-writer-modal" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">ライターの新規追加</h2>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('administrator.writers.add') }}">
            {{ csrf_field() }}
            <div class="uk-modal-body" uk-overflow-auto>
                @component('component.editor.writer', ['writer' => null ])
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
