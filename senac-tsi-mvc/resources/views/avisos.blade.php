@extends('layouts.externo')
@section('title', 'Quadro de Avisos da Empresa')
@section('sidebar')
    @parent
    <p>^ ^ Barra superior adicionada do layout pai/mae ^ ^</p>
@endsection
@section('content')
    <p>Quadro de Avisos da Empresa</p>
    <br><br>
    <p>Olá, {{ $nome }}! Veja abaixo os avisos de hoje!</p>

    @if($mostrar)
        @foreach($avisos as $aviso)
            <p>Aviso #{{$aviso['id']}}: {{$aviso['texto']}}</p>
        @endforeach
    @else
        O aviso não será exibido!
    @endif

@endsection
