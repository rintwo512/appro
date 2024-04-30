

<table>
      <thead>
      <tr>
          <th>No.</th>
          <th>ID</th>
          <th>Asset</th>
          <th>Wing</th>
          <th>Lantai</th> 
          <th>Ruangan</th>
          <th>Merk</th>
          <th>Type</th>
          <th>Product</th>
          <th>Kapasitas</th>
          <th>Refrigrant</th>
          <th>Fasa</th>
          <th>Ukuran Pipa</th>
          <th>Daya Listrik <small>(watt)</small></th>
          <th>Rated Current <small>(amper)</small></th>
          <th>Kapasitas Pendinginan <small>(Btu/h)</small></th>
          <th>TGL Mainten</th>
          <th>Petugas Mainten</th>
          <th>Seri Indoor</th>
          <th>Seri Outdoor</th>
          <th>Berat Indoor <small>(kg)</small></th>
          <th>Berat Outdoor <small>(kg)</small></th>
          <th>Dimensi Indoor <small>(cm)</small></th>
          <th>Dimensi Outdoor <small>(cm)</small></th>
          <th>Tingkat Kebisingan Indoor <small>(dB)</small></th>
          <th>Tingkat Kebisingan Outdoor <small>(dB)</small></th>
          <th>Status</th>
          <th>TGL Pemasangan</th>
          <th>Petugas Pemasangan</th>
          <th>Kerusakan</th>
          <th>Keterangan</th>
          <th>Catatan</th>
      </tr>
      </thead>
      <tbody>
      @foreach($dataExport as $data)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->id_ac }}</td>
              <td>{{ $data->asset }}</td>
              <td>{{ $data->wing }}</td>
              <td>{{ $data->lantai }}</td>
              <td>{{ $data->ruangan }}</td>
              <td>{{ $data->merk }}</td>
              <td>{{ $data->type }}</td>
              <td>{{ $data->datasheetAc->product }}</td>
              <td>{{ $data->datasheetAc->daya_pk }}</td>
              <td>{{ $data->datasheetAc->refrigerant }}</td>
              <td>{{ $data->datasheetAc->phase }}</td>
              <td>{{ $data->datasheetAc->pipa }}</td>
              <td>{{ $data->datasheetAc->daya_listrik }}</td>
              <td>{{ $data->datasheetAc->current }}</td>
              <td>{{ $data->datasheetAc->daya_pendingin }}</td>
              <td>{{ $data->tgl_maintenance }}</td>
              <td>{{ $data->petugas_maint }}</td>
              <td>{{ $data->datasheetAc->seri_indoor }}</td>
              <td>{{ $data->datasheetAc->seri_outdoor }}</td>
              <td>{{ $data->datasheetAc->berat_indoor }}kg</td>
              <td>{{ $data->datasheetAc->berat_outdoor }}kg</td>
              <td>{{ $data->datasheetAc->dimensi_indoor }}</td>
              <td>{{ $data->datasheetAc->dimensi_outdoor }}</td>
              <td>{{ $data->datasheetAc->kebisingan_indoor }}</td>
              <td>{{ $data->datasheetAc->kebisingan_outdoor }}</td>
              @if ($data->status == 'Rusak')
              <td style="background: red">{{ $data->status }}</td>
              @elseif ($data->status == 'Progres')
              <td style="background: yellow">{{ $data->status }}</td>
              @else
              <td style="background: green">{{ $data->status }}</td>
              @endif
              <td>{{ $data->tgl_pemasangan }}</td>
              <td>{{ $data->petugas_pemasangan }}</td>
              <td>{{ $data->kerusakan }}</td>
              <td>{{ $data->keterangan }}</td>
              <td>{{ $data->catatan }}</td>
          </tr>
      @endforeach
      </tbody>
  </table>
  