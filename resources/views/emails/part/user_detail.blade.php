----------------- ユーザ情報 -----------------
@if($user->is_company==1)
業態:
法人

屋号または社名:
{{$user->store_name}}

会社住所:
{{ $user->post_code }}
{{ $user->prefecture->label }}{{ $user->address_detail }}{{ $user->address_room }}

代表電話番号:
{{ $user->tel }}

@if( $user->fax != null )
Fax番号:
{{ $user->fax }}
@endif

担当者情報:
氏名: {{ $user->last_name }}{{ $user->first_name }}
性別: {{ $user->gender == 0 ? "男性": "女性" }}
生年月日: @birthday($user->birthday)
電話番号: {{ $user->mobile_tel }}
職種: {{ $user->job->label }}

@else
業態:
個人

氏名:
{{$user->last_name}} {{$user->first_name}}

送付先住所:
{{ $user->post_code }}
{{ $user->prefecture->label }}{{ $user->address_detail }}{{ $user->address_room }}

電話番号:
{{$user->tel}}

@if( $user->mobile_tel != null )
携帯番号:
{{ $user->mobile_tel }}
@endif

@if( $user->fax != null )
Fax番号:
{{ $user->fax }}
@endif

性別:
{{ $user->gender == 0 ? "男性": "女性" }}

生年月日:
@birthday($user->birthday)

@endif
----------------------------------