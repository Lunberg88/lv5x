@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="char-bag">
                @foreach($items as $item)
                    @foreach($item->objects as $i)
                    {{-- <div class="cloth-box">
                        <div class="cl-name">
                            {{$i->name}}
                        </div>
                        <div class="cl-img">
                            <img src="http://imgs.neverfate.ru/items/gun.png" alt="">
                        </div>
                        <div class="cl-params">
                            @if($i->dur_min && $i->dur_max)
                                Durability: {{$i->dur_min}}/{{$i->dur_max}}
                            @endif
                            @if($i->strength > 0)
                                <li>Strength +{{$i->strength}}</li>
                            @endif
                            @if($i->dexterity > 0)
                                <li>Dexterity +{{$i->dexterity}}</li>
                            @endif
                            @if($i->intuition > 0)
                                <li>Intuition +{{$i->intuition}}</li>
                            @endif
                            @if($i->stamina > 0)
                                <li>Stamina +{{$i->stamina}}</li>
                            @endif
                            @if($i->intelect > 0)
                                <li>Intelect +{{$i->intelect}}</li>
                            @endif
                            @if($i->mana > 0)
                                <li>Mana +{{$i->mana}}</li>
                            @endif
                        </div>
                    </div> --}}
                    <div class="char-item">
                            <div class="char-item-title">
                                {{$i->name}}
                            </div>
                            <div class="char-item-img">
                                <img src="http://imgs.neverfate.ru/items/gun.png" alt="">
                            </div>
                            <div class="char-item-params">
                                @if($i->dur_min && $i->dur_max)
                                    Durability: {{$i->dur_min}}/{{$i->dur_max}}
                                @endif
                                @if($i->strength > 0)
                                    <li>Strength +{{$i->strength}}</li>
                                @endif
                                @if($i->dexterity > 0)
                                    <li>Dexterity +{{$i->dexterity}}</li>
                                @endif
                                @if($i->intuition > 0)
                                    <li>Intuition +{{$i->intuition}}</li>
                                @endif
                                @if($i->stamina > 0)
                                    <li>Stamina +{{$i->stamina}}</li>
                                @endif
                                @if($i->intelect > 0)
                                    <li>Intelect +{{$i->intelect}}</li>
                                @endif
                                @if($i->mana > 0)
                                    <li>Mana +{{$i->mana}}</li>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection