<div class="input-field">
<input type="text" name="nome" value="{{ isset($linha->nome) ? $linha->nome : '' }}">
<label>Nome</label>
</div>
<div class="input-field">
<input type="text" name="celular" value="{{ isset($linha->celular) ? $linha->celular : '' }}">
<label>Celular</label>
</div>
<span>Imagem</span>
<input type="file" name="arquivo">
</div>
<div class="file-path-wrapper">
<input class="file-path validate" type="text">
</div>
</div>
@if(isset($linha->imagem))
<div class="input-field">
<img width="150" src="{{asset($linha->imagem)}}" />
</div>
@endif
</p> <br><br></div>
