@component('mail::message')
# Замовлення отримано

Дякуємо за замовлення.

**Номер замовлення:** {{ $order->id }}

**Email замовника:** {{ $order->billing_email }}

**Ім'я замовника:** {{ $order->billing_name }}

**Сума:** {{ $order->billing_total  }} грн

**Замовлено товари:**

<table border="1" cellspacing="0" cellpadding="10" style="min-width: 300px; max-width: 850px;">
    <thead>
    <tr>
        <th><b>Назва послуги</b></th>
        <th><b>Кількість, шт</b></th>
        <th><b>Сума, грн</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach(json_decode($order->content)->products  as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->qty }}</td>
            <td>{{ ($product->price * $product->qty) ?? 'під замовлення'}}</td>
        </tr>
    @endforeach
    <tbody>

</table>

@if($user)
**Також ми зареєстрували вас на нашому сайті**
<table border="1" cellspacing="0" cellpadding="10" style="min-width: 300px; max-width: 850px;">
    <thead>
    <tr>
        <th><b>Логін</b></th>
        <th><b>Пароль</b></th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
        </tr>
    <tbody>

</table>
@endif

Ви можете отримати інформацію про замовлення зайшовши на наш сайт під своїм акаунтом.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Перейти на веб-сайт
@endcomponent

Дякуємо ще раз, що обрали нас.

З повагою,<br>
{{ __('general.Official_distributor_Siemens') }}
@endcomponent
