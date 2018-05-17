@inject('categoryService', 'App\Services\CategoryService')

<footer class="uk-section uk-section-secondary">
    <div class="uk-container uk-text-center">
        <div class="uk-margin">
            <a href="{{route('root.index')}}" class="">
            @include("cell.logo")
            </a>
        </div>
        <p>Copyright&copy; 2017EATAS Co., Ltd. All Rights Reserved.</p>
    </div>
</footer>