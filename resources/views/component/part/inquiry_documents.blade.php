<div class="uk-overflow-auto">
    <table class="uk-margin-small uk-table uk-table-striped">
        <thead>
            <tr>
                <th class="uk-table-expand">資料名</th>
                <th class="uk-width-small">形式</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inquiryDocuments as $inquiryDocument)
            <tr>
                <td class="uk-text-truncate">
                    {{$inquiryDocument->name}}
                </td>
                <td>
                    @if( !isset($downloadable) || $downloadable )
                        @if($inquiryDocument->doc_type_id == $inquiryDocument::DL)
                            @if(!isset($mode) || $mode != "admin")
                            <a href="{{route('user.inquiryDocuments.download', ['inquiryDocument' => $inquiryDocument ])}}" target="_blank">
                                <span uk-icon="icon: cloud-download"></span>
                            </a>
                            @else
                            <a href="{{route('administrator.inquiryDocuments.download', ['inquiryDocument' => $inquiryDocument ])}}" target="_blank">
                                <span uk-icon="icon: cloud-download"></span>
                            </a>
                            @endif
                        @elseif($inquiryDocument->doc_type_id == $inquiryDocument::WEB)
                            <a href="{{$inquiryDocument->link}}" target="_blank">
                                {{$inquiryDocument->docType->label}}    
                            </a>
                        @else
                            {{$inquiryDocument->docType->label}}
                        @endif
                    @else
                        {{$inquiryDocument->docType->label}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>