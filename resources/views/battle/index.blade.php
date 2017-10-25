@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($chars as $char)
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="battle-char-params">
                    <table class="table table-striped">
                        <thead>
                            <th colspan="2" class="tab-title">Parameters</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Strength</td>
                                <td>{{$char->strength}}</td>
                            </tr>
                            <tr>
                                <td>Dexterity</td>
                                <td>{{$char->dexterity}}</td>
                            </tr>
                            <tr>
                                <td>Intuition</td>
                                <td>{{$char->intuition}}</td>
                            </tr>
                            <tr>
                                <td>Stamina</td>
                                <td>{{$char->stamina}}</td>
                            </tr>
                            <tr>
                                <td>Intelect</td>
                                <td>{{$char->intelect}}</td>
                            </tr>
                            <tr>
                                <td>Mana</td>
                                <td>{{$char->mana}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="battle-params-tab">
                    <table class="table table-striped battle">
                        <thead>
                        <th colspan="2" class="tab-title">Modificators</th>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Critical Hit (%)</td>
                                <td><b>{{$char->critical_hit}}</b></td>
                            </tr>
                            <tr>
                                <td>Dodge (%)</td>
                                <td><b>{{$char->dodge}}</b></td>
                            </tr>
                            <tr>
                                <td>Power (%)</td>
                                <td><b>{{$char->power}}</b></td>
                            </tr>
                            <tr>
                                <td>Magic Power (%)</td>
                                <td><b>{{$char->magic_power}}</b></td>
                            </tr>
                            <tr>
                                <td>Magic Critical (%)</td>
                                <td><b>{{$char->magic_critical}}</b></td>
                            </tr>
                            <tr>
                                <td>Head armor (%)</td>
                                <td><b>{{$char->ar_head}}</b></td>
                            </tr>
                            <tr>
                                <td>Chest armor (%)</td>
                                <td><b>{{$char->ar_chest}}</b></td>
                            </tr>
                            <tr>
                                <td>Belt armor (%)</td>
                                <td><b>{{$char->ar_belt}}</b></td>
                            </tr>
                            <tr>
                                <td>Foots armor (%)</td>
                                <td><b>{{$char->ar_foots}}</b></td>
                            </tr>
                            <tr>
                                <td>Fire resist (%)</td>
                                <td><b>{{$char->ar_fire}}</b></td>
                            </tr>
                            <tr>
                                <td>Water resist (%)</td>
                                <td><b>{{$char->ar_water}}</b></td>
                            </tr>
                            <tr>
                                <td>Earth resist (%)</td>
                                <td><b>{{$char->ar_earth}}</b></td>
                            </tr>
                            <tr>
                                <td>Air resist (%)</td>
                                <td><b>{{$char->ar_air}}</b></td>
                            </tr>
                            <tr>
                                <td>Hits (%)</td>
                                <td><b>{{$char->min_hit}} - {{$char->max_hit}}</b></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @endforeach
    </div>
@endsection