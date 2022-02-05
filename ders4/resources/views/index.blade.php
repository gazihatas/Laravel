<form action="{{ route('guncelle')}}" method="POST">
    @csrf
    @method('PUT')
  {{-- {{ method_field('PUT')}} --}}
  {{--  <input type="text" name="_method" value="PUT"> --}}

    <input type="text" name="name" value="TEST">
    <button type="submit">Gönder</button>
</form>

<form action="{{ route('sil')}}" method="POST">
    @csrf
    @method('DELETE')
  {{-- {{ method_field('PUT')}} --}}
  {{--  <input type="text" name="_method" value="PUT"> --}}

    <input type="text" name="name" value="TEST">
    <button type="submit">Gönder</button>
</form>
