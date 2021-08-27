
@include('admin.includes.alerts')

<div class="form-group">
    <select name="state"  class="form-control" id="" >
        <option value="">Selecione Seu estado</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{$state->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">* Logradouro/Rua</label>
    <input type="text" name="address" class="form-control" placeholder="Logradouro/Rua:" value="{{$product->title ?? old('title')}}" autofocus>
</div>
<div class="form-group">
    <label for="">* Bairro</label>
    <input type="text" name="district" class="form-control" placeholder="Bairro:" value="{{$product->district ?? old('district')}}">
</div>
<div class="form-group">
    <label for="">* Numero</label>
    <input type="text" name="number" class="form-control" placeholder="Numero:" value="{{$product->number ?? old('district')}}">
</div>
<div class="form-group">
    <label for="">* Complemento</label>
    <textarea name="complement" cols="30" rows="5" class="form-control">{{$product->complement ?? old('complement')}}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>


