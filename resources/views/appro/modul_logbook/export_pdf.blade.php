

<h3 style="text-align: center !important"><a href="">{{ $data->nama_tugas}}</a></h3>
<ol>      
      <li>Wing<hr><strong>{{ $data->asset }}</strong></li>
      <li>Lantai<hr><strong>{{ $data->lantai }}</strong></li>
      <li>Lokasi<hr><strong>{{ $data->wing }}</strong></li>
      <li>Petugas<hr><strong>{{ $data->users->implode('name', ', ') }}</strong></li>
      <li>Tanggal<hr><strong>{{ Illuminate\Support\Carbon::parse($data->tanggal)->format('Y-m-d') }}</strong></li>      
      <li>Status<hr><strong>{{ $data->status }}</strong></li>      
      <li>Prioritas<hr><strong>{{ $data->prioritas }}</strong></li>      
      <li>Type<hr><strong>{{ $data->type }}</strong></li>      
      <li>Kategori<hr><strong>{{ $data->kategori }}</strong></li>      
      <li>Jenis Pekerjaan<hr><strong>{{ $data->jenis_pekerjaan }}</strong></li>      
      @if($data->keterangan)
      <li>Keterangan<hr><strong>{{ $data->keterangan }}</strong></li>
      @endif
</ol>