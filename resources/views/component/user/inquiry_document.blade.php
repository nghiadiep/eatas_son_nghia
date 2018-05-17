@if($inquiryDocument->doc_type_id == $inquiryDocument::WEB)
<a href="{{$inquiryDocument->link}}" target="_blank" class="btn btn--block btn--blue">
    <span class="btn__head">
        {{$inquiryDocument->name}}
    </span>
    <span class="btn__bottom"> 企業サイトの情報ページを見る</span>
</a>
@elseif($inquiryDocument->doc_type_id == $inquiryDocument::DL)
<a href="{{route('user.inquiryDocuments.download', ['inquiryDocument' => $inquiryDocument ])}}" target="_blank" class="btn btn--block btn--pink">
    <span class="btn__head">
        {{$inquiryDocument->name}}
    </span>
    <span class="btn__bottom">資料を表示する</span>
</a>
@elseif($inquiryDocument->doc_type_id == $inquiryDocument::SEND)
<a class="btn btn--block btn--gray">
    <span class="btn__head">
        {{$inquiryDocument->name}}
    </span>
    <span class="btn__bottom"> 郵送でお届けします</span>
</a>
@endif