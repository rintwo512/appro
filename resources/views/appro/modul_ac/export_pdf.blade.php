

      <h3 style="text-align: center !important"><a href="">{{ $data->id_ac ? $data->id_ac : $data->ruangan}}</a></h3>
      <ol>      
            <li>Asset<hr><strong>{{ $data->asset }}</strong></li>
            <li>Wing<hr><strong>{{ $data->wing }}</strong></li>
            <li>Lantai<hr><strong>{{ $data->lantai }}</strong></li>
            <li>Ruangan<hr><strong>{{ $data->ruangan }}</strong></li>
            <li>Merk<hr><strong>{{ $data->merk }}</strong></li>
            <li>Type<hr><strong>{{ $data->type }}</strong></li>
            <li>Product<hr><strong>{{ $data->datasheetAc->product }}</strong></li>
            <li>Kapasitas<hr><strong>{{ $data->datasheetAc->daya_pk }}</strong></li>
            <li>Refrigrant<hr><strong>{{ $data->datasheetAc->refrigerant }}</strong></li>
            <li>Fasa<<hr><strong>{{ $data->datasheetAc->phase }}</strong></li>
            <li>Ukuran Pipa<small>(Inch)</small><hr><strong>{{ $data->datasheetAc->pipa }}</strong></li>
            <li>Daya Listrik<hr><strong>{{ $data->datasheetAc->daya_listrik }}</strong></li>
            <li>Rated Current<hr><strong>{{ $data->datasheetAc->current }}</strong></li>
            <li>Kapasitas Pendinginan<hr><strong>{{ $data->datasheetAc->daya_pendingin }}</strong></li>
            <li>Tanggal Maintenance<hr><strong>{{ $data->tgl_maintenance }}</strong></li>
            <li>Petugas Maintenance<hr><strong>{{ $data->petugas_maint }}</strong></li>
            <li>No Seri Indoor<hr><strong>{{ $data->datasheetAc->seri_indoor }}</strong></li>
            <li>No Seri Outdoor<hr><strong>{{ $data->datasheetAc->seri_outdoor }}</strong></li>
            <li>Berat Indoor<small>(kg)</small><hr><strong>{{ $data->datasheetAc->berat_indoor }}</strong></li>
            <li>Berat Outdoor<small>(kg)</small><hr><strong>{{ $data->datasheetAc->berat_outdoor }}</strong></li>
            <li>Dimensi Indoor<small>(cm)</small><hr><strong>{{ $data->datasheetAc->dimensi_indoor }}</strong></li>
            <li>Dimensi Outdoor<small>(cm)</small><hr><strong>{{ $data->datasheetAc->dimensi_outdoor }}</strong></li>
            <li>Tingkat Kebisingan Indoor<hr><strong>{{ $data->datasheetAc->kebisingan_indoor }}</strong></li>
            <li>Tingkat Kebisingan Outdoor<hr><strong>{{ $data->datasheetAc->kebisingan_outdoor }}</strong></li>
            <li>Status<hr><strong>{{ $data->status }}</strong></li>
            <li>Tanggal Pemasangan<hr><strong>{{ $data->tgl_pemasangan }}</strong></li>
            <li>Petugas Pemasangan<hr><strong>{{ $data->petugas_pemasangan }}</strong></li>
            <li>Kerusakan<hr><strong>{{ $data->kerusakan }}</strong></li>
            @if($data->keterangan)
            <li>Keterangan<hr><strong>{{ $data->keterangan }}</strong></li>
            @endif
            <li>Catatan<hr><strong>{{ $data->catatan }}</strong></li>
      </ol>