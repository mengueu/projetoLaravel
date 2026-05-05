@foreach($dados as $f)
    <tr>
        <td>{{ $f->id }}</td>
        <td>{{ $f->nome }}</td>
        <td>{{ $f->email }}</td>
    </tr>
@endforeach