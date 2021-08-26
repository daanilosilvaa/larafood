
@include('admin.includes.alerts')

@csrf


<div class="form-group">
    <label for="">* Nome</label>
    <input type="text" name="name" class="form-control" required placeholder="Nome:" value="{{$city->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="">Ativo?</label>
    <select name="active" class="form-control">
        <option value="1" @if(isset($city)&& $city->active == '1')selected @endif>SIM</option>
        <option value="0" @if(isset($city)&& $city->active == '0')selected @endif>Não</option>
    </select>
</div>

<div class="form-group" >
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
