@extends('layout.app')
<!-- Passar o nome da pagina para o titulo -->
 @section('title', 'Home')

 @section('content')
    <h1>Loja Senges</h1>
    @foreach($produtos as $categoria)
    <div>
        <h3>{{$categoria->nome}}</h3>
        <img src="{{$categoria->imagem}}" alt="" srcset="">
    </div>
    @endforeach
 @endsection