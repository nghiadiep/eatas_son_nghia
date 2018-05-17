<div class="uk-margin-small">
    <label class="uk-form-label" for="notice_status_id">
        ステータス
    </label>
    <div class="uk-form-controls">
        @include('component.input.notice_status', [ 'value' => old('notice_status_id', isset($notice) ? $notice->notice_status_id: null ) ])
    </div>
</div>

<div class="uk-margin-small">
    <label class="uk-form-label" for="title">
        タイトル
    </label>
    <div class="uk-form-controls">
        <input class="uk-input" type="text" name="title" required value="{{old('title', isset($notice) ? $notice->title: null )}}">
    </div>
</div>

<div class="uk-margin-small">
    <label class="uk-form-label" for="description">
        本文
    </label>
    <div class="uk-form-controls">
        <textarea class="uk-textarea uk-height-small" type="text" name="description" required>{{old('description', isset($notice) ? $notice->description: null )}}</textarea>
    </div>
</div>

<div class="uk-margin-small">
    <label class="uk-form-label" for="publish_date">
        公開日
    </label>
    <div class="uk-form-controls">
        <input class="uk-input datepicker" type="text" name="publish_date" required value="@if(isset($notice))@date($notice->publish_date)@endif">
    </div>
</div>