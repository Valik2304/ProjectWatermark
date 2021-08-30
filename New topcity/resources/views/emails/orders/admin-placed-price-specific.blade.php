@component('mail::message')
# Нове замовлення, але товарів вказаних клієнтом немає на складі! Перейдіть в
@component('mail::button', ['url' =>  url('admin/orders'), 'color' => 'blue'])
    Адмін панель
@endcomponent

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


@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Перейти на веб-сайт
@endcomponent

@endcomponent
