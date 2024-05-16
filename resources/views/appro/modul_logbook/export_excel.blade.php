

<table>
      <thead>
        <tr>
            <th>No.</th>
            <th>Nama Tugas</th>
            <th>Wing</th>
            <th>Lantai</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Prioritas</th>
            <th>Type</th>
            <th>Petugas</th>
            <th>Evidens</th>
        </tr>
      </thead>
      <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_tugas }}</td>
                <td>{{ $data->wing }}</td>
                <td>{{ $data->lantai }}</td>
                <td>{{ $data->lokasi }}</td>
                <td>{{ Illuminate\Support\Carbon::parse($data->tanggal)->format('Y-m-d'); }}</td>

                @if ($data->status == 'Pending')
                <td style="background: red">{{ $data->status }}</td>
                @elseif ($data->status == 'Progress')
                <td style="background: yellow">{{ $data->status }}</td>
                @else                
                <td style="background: green">{{ $data->status }}</td>
                @endif
                <td>{{ $data->prioritas }}</td>
                <td>{{ $data->type }}</td>
                <td>{{ $data->users->implode('name', ', ') }}</td>
                <td>
                  @foreach($data->evidens as $eviden)
                  <img src="{{ public_path($eviden->path) }}" width="100" height="100">
                  @endforeach
              </td>
            </tr>
        @endforeach
      </tbody>
  </table>
  