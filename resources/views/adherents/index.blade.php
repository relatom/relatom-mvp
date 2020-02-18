@extends('layouts.app')

@section('content')
            
    <div>
        <h1 class="text-xl font-semibold pb-4">Adhérents</h1>
        <div class="cards border-0">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border pl-4 py-2 text-left">Nom</th>
                        <th class="border px-4 py-2"></th>
                        <th class="border px-4 py-2"></th>
                        <th class="border px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($adherents as $adherent)
                        <tr>
                            <td class="border px-4 py-2">
                                @component('components.display-adherent', ['adherent' => $adherent])
                                @endcomponent
                            </td> 
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
