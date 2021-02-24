{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    <!-- Cria-se um token aleatório para esse form -->
    @csrf
    <input name="nome" type="text" placeholder="Nome" value="{{ old('nome') }}" class="{{ $classe }}">
    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" type="text" placeholder="Telefone" value="{{ old('telefone') }}"
        class="{{ $classe }}">
    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" type="text" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}">
    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        {{-- old -> retorna  o valor escolhido, porem não funciona nessa versão --}}
        @foreach ($motivo_contatos ?? '' as $key => $motivo_contato)

            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach

    </select>
    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name="mensagem"
        class="{{ $classe }}"> {{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem...' }} </textarea>
    {{-- Apresenta a mensagem de erro -> Caso houver ele será mostrado, caso não hover ficará em oculto --}}
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button name="btn_enviar" type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

