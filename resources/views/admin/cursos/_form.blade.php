
<div class="container">
    <div class="input-field">
        <input type="text" name="titulo" value="{{isset($registro->titulo)? $registro->titulo:''}}">
        <label >Título</label>
    </div>

<div class="input-field">
    <input type="text" name="descricao" value="{{isset($registro->descricao)? $registro->descricao:''}}">
    <label >Descrição</label>
</div>

<div class="input-field">
    <input type="text" name="valor" value="{{isset($registro->valor)? $registro->valor:''}}">
    <label >Valor</label>
</div>

<div class="file-field input-field">

    <div class="btn blue">
        <span>Imagem</span>
    <input type="file" name="imagem">
</div>
<div class="file-path-wrapper">
    <input class="file-path validate" type="text">
</div>


  </div>

@if(isset($registro->imagem))
    <div class="input-field">
        <img width="120" src="{{asset($registro->imagem)}}"/>
    </div>
@endif
    <div class="input-field">
        <p>
            <label>
                <input type="checkbox" id="test5" name="publicado" {{isset($registro->publicado) && $registro->publicado ? 'checked' : ''}} value="true"/>
                <span><label for="test5">Publicar?</label></span>
                </label>

        </p>
        <div>
            <button type="submit" class="btn deep-orange">Salvar</button>
        </div>
    </div>
</div>
</div>

