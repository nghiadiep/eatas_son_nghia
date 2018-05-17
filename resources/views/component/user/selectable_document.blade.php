@if($inquiryDocument->doc_type_id == $inquiryDocument::WEB)
<div class="btn-checkbox-group">
    <div class="btn btn--block btn--blue">
        <div class="btn__head">
            <label>
                <span>
                    {{$inquiryDocument->name}}
                </span>
            </label>
        </div>
        <div class="btn__bottom">
            企業サイトの情報ページ
        </div>
    </div>
</div>

@elseif($inquiryDocument->doc_type_id == $inquiryDocument::DL)
<div class="btn-checkbox-group">
    <div class="btn btn--block btn--gray">
        <div class="btn__head">
            <label>
                <span>
                    {{$inquiryDocument->name}}
                </span>
            </label>
        </div>
        <div class="btn__bottom">
            資料ファイルを表示
        </div>
    </div>
</div>

@elseif($inquiryDocument->doc_type_id == $inquiryDocument::SEND)
<div class="btn-checkbox-group">
    <div class="btn btn--block btn--blue">
        <div class="btn__head">
            <label>
                <span>
                    {{$inquiryDocument->name}}
                </span>
            </label>
        </div>
        <div class="btn__bottom">
            郵送でお届け
        </div>
    </div>
</div>

@endif