@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p> Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                {{-- Mensagem de retorno --}}
                {{$msg ?? ''}}
                <form method="POST" action="{{ route('app.fornecedor.adicionar') }}"> 
                    <input type="hidden" name="id" value="{{$fornecedor->id ?? '' }}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" value="{{$fornecedor->nome ?? old('nome') }}" class="borda-preta">
                    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="site" placeholder="Site" value="{{$fornecedor->site ?? old('site') }}"class="borda-preta">
                    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    <input type="text" name="uf" placeholder="UF" value="{{$fornecedor->uf ?? old('uf') }}" class="borda-preta">
                    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <input type="text" name="email" placeholder="E-Mail" value="{{$fornecedor->email ?? old('email') }}" class="borda-preta">
                    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit" class="borda-presta"> Cadastrar</button>
                </form>
            </div>
        </div>

    </div>
@endsection


    
