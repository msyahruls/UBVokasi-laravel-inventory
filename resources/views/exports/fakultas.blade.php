<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Jumlah Jurusan</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $fakultas)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $fakultas->name }}</td>
          <td>{{ $fakultas->jurusan->count() }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="3"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>