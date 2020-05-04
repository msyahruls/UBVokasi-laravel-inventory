<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Ruangan</th>
        <th>Total</th>
        <th>Broken</th>
        <th>Created by</th>
        <th>Updated by</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $barang)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $barang->name }}</td>
          <td>{{ $barang->ruangan->name }}</td>
          <td>{{ $barang->total }}</td>
          <td>{{ $barang->broken }}</td>
          <td>{{ $barang->create_by->name }}</td>
          <td>{{ $barang->update_by->name }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>