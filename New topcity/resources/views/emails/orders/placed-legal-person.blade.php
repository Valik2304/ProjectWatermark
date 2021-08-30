
<table style="width: 100%; max-width: 750px;table-layout: fixed">
    <tr>
        <td rowspan="2"><img src="{{ $message->embed(public_path().'/img/image1.png') }}" alt="Logotype"></td>
        <td colspan="2">
            <b>Постачальник</b>
            <br>
            <b>ТОВ "ТОПСІТІСЕРВІС"</b>
            <br>
            Код ЄДРПОУ 36074695, ІПН 360746922251, номер свідоцтва 100312409
            <br>
            Р/р UA053005280000026009202326400 (застар. 26009202326400, МФО 300528) в ОТП БАНК АТ М.КИЇВ
            <br>
            Адреса: пров.Проїзний,буд.10,оф.503 м.Хмельницький,29000; тел.: 0382-78-40-51
            <br>
            підприємство є платником податку на загальних підставах
        </td>
    </tr>
    <tr>
        <td style="padding-top: 20px;" colspan="2">
            <b>Одержувач {{ json_decode($order->content)->legal_person->organization_name }} </b> <br>
            {{ json_decode($order->content)->legal_person->legal_address . ', ' . json_decode($order->content)->legal_person->inn}}
            {{ json_decode($order->content)->legal_person->last_name . ' ' . json_decode($order->content)->legal_person->first_name . '  ' . json_decode($order->content)->legal_person->patronymic_name  . ', '.json_decode($order->content)->legal_person->email}}
            <br>
            тел. {{ json_decode($order->content)->legal_person->phone }}
        </td>
    </tr>
    <tr>
        <td style="text-align: center; padding-top: 40px" colspan="3">
            <b>Рахунок-фактура № ТС-{{ $order->id }}</b>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="3">
            <b>від {{ Carbon\Carbon::parse(Carbon\Carbon::parse($order->created_at)->format('d.m.Y'))->format('d'). ' ' . getMonth(Carbon\Carbon::parse(Carbon\Carbon::parse($order->created_at)->format('d.m.Y'))->format('m')) . ' ' .Carbon\Carbon::parse(Carbon\Carbon::parse($order->created_at)->format('d.m.Y'))->format('Y') }} р.</b>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border: 1px solid black;">
                    <th style="border: 1px solid black;">№</th>
                    <th style="border: 1px solid black;">Назва</th>
                    <th style="min-width:50px; border: 1px solid black;">Од.</th>
                    <th style="border: 1px solid black;">Кількість</th>
                    <th style="min-width:150px; border: 1px solid black;">Ціна </th>
                    <th style="min-width:100px; border: 1px solid black;">Сума </th>
                </tr>
                @foreach(json_decode($order->content)->products as $product)
                <tr>
                        <td style="vertical-align: top; border: 1px solid black;">{{ $loop->index + 1 }}</td>
                        <td style="border: 1px solid black;">{{ $product->article }}<br>{{ $product->name }}</td>
                        <td style="vertical-align: top; text-align: center; border: 1px solid black;">шт</td>
                        <td style="vertical-align: top; text-align: right; border: 1px solid black;">{{ number_format($product->qty, 0, '', ',') }}</td>
                        <td style="vertical-align: top; text-align: right; border: 1px solid black;">{{ $product->price }}</td>
                        <td style="vertical-align: top; text-align: right; border: 1px solid black;">{{ round_up((1.0 * ($product->price*$product->qty))) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">Всього на суму:</td>
                    <td style="border: 1px solid black;">
                        <b>Разом без ПДВ:</b>
                    </td>
                    <td style="text-align: right; border: 1px solid black;">
                        <b>{{ round((($order->billing_total)-($order->billing_total*0.2)),2) }}</b>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" colspan="4" rowspan="2">{{ digit_text($order->billing_total,'uk',true) }}</td>
                    <td style="border: 1px solid black;">
                        <b>ПДВ:</b>
                    </td>
                    <td style="text-align: right; border: 1px solid black;">
                        <b>{{ round(($order->billing_total*0.2),2) }}</b>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">
                        <b>Всього з ПДВ:</b>
                    </td>
                    <td style="text-align: right; border: 1px solid black;">
                        <b>{{ $order->billing_total }}</b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 40px;">Термін поставки в тижнях: 1-2</td>
    </tr>
    <tr>
        <td style="padding-bottom: 40px;">Умови оплати: 100% - попередня оплата</td>
    </tr>
    <tr>
        <td>Сплатити до {{ Carbon\Carbon::parse(Carbon\Carbon::parse($order->created_at)->format('d.m.Y'))->addDays(2)->format('d'). ' ' . getMonth(Carbon\Carbon::parse(Carbon\Carbon::parse($order->created_at)->format('d.m.Y'))->addDays(2)->format('m')) . ' ' .Carbon\Carbon::parse(Carbon\Carbon::parse($order->created_at)->format('d.m.Y'))->addDays(2)->format('Y') }} р.</td>
        <td>Виписав(ла):</td>
        <td>
            <b>Романюк В.П</b>
        </td>
    </tr>
    <tr>
        <td>В платіжному дорученні прохання обов'язково вказувати номер цього рахунку.</td>
    </tr>
    <tr >
        <td colspan="2"><img style="width: 100%" src="{{ $message->embed(public_path().'/img/image3.png') }}" alt=""></td>
    </tr>
</table>
