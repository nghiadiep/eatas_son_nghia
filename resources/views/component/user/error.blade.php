@if(isset($errors) && count($errors->all()) > 0 )
<section class="block-alert">
    <h2 class="block-alert__title">
        <span>ご確認ください</span>
    </h2>
    <ul class="block-alert__list">
        @foreach ($errors->all() as $message)
        <li>
            {{$message}}
        </li>
        @endforeach
    </ul>
</section>
@endif