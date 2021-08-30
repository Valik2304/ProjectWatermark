<?php

namespace App\Http\Controllers\UserCabinet;

use App\Http\Controllers\Controller;

use App\Http\Requests\LegalEntityStoreRequest;
use App\Http\Requests\LegalEntityUpdateRequest;
use App\Models\LegalEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class LegalEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $legal_entities = $user->legal_entities;

        return view('user-cabinet.legal-person', compact('legal_entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $legal_entities = $user->legal_entities;

        return view('user-cabinet.legal-person', compact('legal_entities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LegalEntityStoreRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();

        $data['user_id'] = $user->id;

        $legalEntity = LegalEntity::create($data);

        if ($legalEntity) {
            return redirect()
                ->route('legal-person.create')
                ->with(['success' => __('voyager.generic.successfully_added_new')]);
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
    public function edit(LegalEntity $legal_person)
    {
        $user = auth()->user();
        $legal_entities = $user->legal_entities;

        return view('user-cabinet.legal-person', compact('legal_entities', 'legal_person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LegalEntityUpdateRequest $request, LegalEntity $legal_person)
    {
        $data = $request->all();

        unset($data['organization_name']);
        unset($data['email']);
//        dd($data);
        $legal_person = $legal_person->update($data);
        if ($legal_person) {
            return redirect()
                ->route('legal-person.create')
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
        $result = LegalEntity::destroy($id);
        if ($result) {
            return redirect()
                ->route('legal-person.create')
                ->with(['success' => "Запись id[{$id}] удалена"]);
        } else {
            return back()->withErrors(['msg' => __('voyager.generic.internal_error')]);
        }
    }
}
