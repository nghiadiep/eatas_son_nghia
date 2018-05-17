@extends('layouts.administrator_authed')

@section('content')

<div class="uk-margin">
    <h1 class="uk-inline uk-margin-remove">
        管理者の管理
    </h1>
    <button class="uk-margin-left uk-button uk-button-primary" href="#add-administrator-modal" uk-toggle>
        追加
    </button>
</div>

<div class="uk-margin uk-overflow-auto">
    <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
        <thead>
            <tr>
                <th>
                    登録日
                </th>
                <th>
                    名前
                </th>
                <th>
                    メールアドレス
                </th>
                <th>
                    操作
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($administrators as $administrator)
            <tr>
                <td>
                    @date($administrator->created_at)
                </td>
                <td>
                    {{$administrator->name}}
                </td>
                <td>
                    {{$administrator->email}}
                </td>
                <td>
                    <span class="uk-margin-small-right">
                        <form class="uk-display-inline-block" method="POST" action="{{ route('administrator.administrators.delete', ['administrator' => $administrator]) }}" onSubmit="confirmDelete(event)">
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
    {{ $administrators->appends(isset($params)? $params: [])->links() }}
</div>

<div id="add-administrator-modal" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">管理者の新規追加</h2>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('administrator.administrators.add') }}">
            {{ csrf_field() }}
            <div class="uk-modal-body" uk-overflow-auto>
                @component('component.editor.administrator', ['administrator' => null ])
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
