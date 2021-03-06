@extends('layouts.administrator_authed')

@section('content')

<div class="uk-margin">
    <h1 class="uk-inline uk-margin-remove">
        広告主の管理
    </h1>
    <button class="uk-margin-left uk-button uk-button-primary" href="#add-advertiser-modal" uk-toggle>
        追加
    </button>
</div>

<form class="form-horizontal" method="GET">
    <div class="uk-margin uk-grid-small uk-flex-bottom" uk-grid>
        <div class="uk-width-large@s">
            <label class="uk-form-label" for="company_name">
                会社名
            </label>
            <div class="uk-form-controls">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand">
                        <input class="uk-input" type="text" name="company_name" value="{{ isset($params['company_name']) ? $params['company_name']: null }}">
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
                    @include("component.part.sorter", ["order" => "created_at", "label" => "登録日", "params" => $params])
                </th>
                <th>
                    @include("component.part.sorter", ["order" => "company_name", "label" => "会社名", "params" => $params])
                </th>
                <th>
                    操作
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($advertisers as $advertiser)
            <tr>
                <td>
                    @date($advertiser->created_at)
                </td>
                <td>
                    {{$advertiser->company_name}}
                </td>
                <td>
                    <span class="uk-margin-small-right">
                        <button class="uk-icon-button" uk-icon="icon: file-edit" href="#edit-advertiser-modal_{{$advertiser->id}}" uk-toggle>
                        </button>
                        <div id="edit-advertiser-modal_{{$advertiser->id}}" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-modal-header">
                                    <h2 class="uk-modal-title">広告主情報の編集</h2>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('administrator.advertisers.edit', ['advertiser' => $advertiser]) }}">
                                    {{ csrf_field() }}
                                    <div class="uk-modal-body" uk-overflow-auto>
                                        @component('component.editor.advertiser', ['advertiser' => $advertiser, 'form' => 'attribute_only'])
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
                        <form class="uk-display-inline-block" method="POST" action="{{ route('administrator.advertisers.delete', ['advertiser' => $advertiser->id]) }}" onSubmit="confirmDelete(event)">
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
    {{ $advertisers->appends(isset($params)? $params: [])->links() }}
</div>

<div id="add-advertiser-modal" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">広告主の新規追加</h2>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('administrator.advertisers.add') }}">
            {{ csrf_field() }}
            <div class="uk-modal-body" uk-overflow-auto>
                @component('component.editor.advertiser', ['advertiser' => null ])
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
