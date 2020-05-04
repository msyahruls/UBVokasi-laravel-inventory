<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Fakultas</th>
        <th>Jumlah Ruangan</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $jurusan)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $jurusan->name }}</td>
          <td>{{ $jurusan->fakultas->name }}</td>
          <td>{{ $jurusan->ruangan->count() }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>