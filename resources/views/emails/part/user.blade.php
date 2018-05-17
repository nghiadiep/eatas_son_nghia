----------------- ユーザ情報 -----------------
@if($user->is_company==1)
業態:
飲食店関係者

屋号または会社名:
{{$user->store_name}}

代表番号:
{{$user->tel}}

担当者:
{{$user->last_name}} {{$user->first_name}}
{{$user->email}}
{{$user->mobile_tel}}


@else
業態:
個人

氏名:
{{$user->last_name}} {{$user->first_name}}

メールアドレス:
{{$user->email}}

電話番号:
{{$user->tel}}
@endif
----------------------------------