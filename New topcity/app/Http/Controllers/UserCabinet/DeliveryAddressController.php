<?php

namespace App\Http\Controllers\UserCabinet;

use App\Http\Requests\DeliveryAddressStoreRequest;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-cabinet.delivery-address');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $deliveryAddresses = $user->delivery_addresses;


        return view('user-cabinet.delivery-address', compact('deliveryAddresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryAddressStoreRequest $request)
    {
        $data['city'] = $request->get('city');
        $data['address'] = $request->get('address');
        $user = auth()->user();

        $data['user_id'] = $user->id;

        $deliveryAddress = DeliveryAddress::create($data);

        if ($deliveryAddress) {
            return redirect()
                ->route('delivery-address.create')
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['message' => __('voyager.generic.internal_error')])
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryAddress $delivery_address)
    {

        $user = auth()->user();
        $deliveryAddresses = $user->delivery_addresses;

        return view('user-cabinet.delivery-address', compact('deliveryAddresses', 'delivery_address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryAddressStoreRequest $request, DeliveryAddress $delivery_address)
    {
        $delivery_address = $delivery_address->update($request->all());
        if ($delivery_address) {
            return redirect()
                ->route('delivery-address.create')
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['message' => __('voyager.generic.internal_error')])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DeliveryAddress::destroy($id);
        if ($result) {
            return redirect()
                ->route('delivery-address.create')
                ->with(['success' => "Запись id[{$id}] удалена"]);
        } else {
            return back()->withErrors(['msg' => __('voyager.generic.internal_error')]);
        }
    }
}
