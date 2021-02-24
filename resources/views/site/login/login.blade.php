@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>..:: Login ::..</h1>
        </div>

        <div class="informacao-pagina">
            {{-- Aqui fica o conteúdo da página login --}}
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <input name="usuario" type="text" placeholder="Entre com seu e-mail" value="{{ old('usuario') }}" class="borda-preta">
                    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                    <br>
                    <input name="senha" type="password" placeholder="Digite sua senha" value="{{ old('senha') }}" class="borda-preta">
                    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    <br>
                    <button name="btn_enviar" type="submit" class="borda-preta">ACESSAR</button>
                </form>
                {{isset($erro) && $erro != '' ? $erro : ''}}
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
